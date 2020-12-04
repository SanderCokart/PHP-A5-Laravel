<?php

namespace Tests\Feature;

use App\Models\Band;
use App\Models\BandBio;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;
    use HasFactory;

    public function testRoot200()
    {
        $response = $this->get('/');
        $response->assertSeeText('Laravel');
        $response->assertSeeText('Band List');
    }

    public function testLoginPage()
    {
        $response = $this->get(route('login'));
        $response->assertSeeText('E-Mail');
        $response->assertSeeText('Password');
    }


    public function testLoginAndRedirectToDashboard()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'i-love-laravel')]);
        $response = $this->post(route('login'), [
            'email' => $user->email, 'password' => $password,
        ]);
        $response->assertRedirect(route('dashboard'));
        $this->assertAuthenticatedAs($user);
    }


    public function testElectronicPressKitNotLoggedIn()
    {
        $band = Band::factory()->has(BandBio::factory())->create();
        $band_links = collect([$band->bandBio->link_1, $band->bandBio->link_2, $band->bandBio->link_3])->filter();


        $view = $this->view('band.show', compact('band', 'band_links'));

        $view->assertSeeText($band->name);
        $view->assertSeeText($band->bandBio->bio);
        $view->assertSeeText($band->bandBio->image);
    }

    public function testWrongUser()
    {
        $user = User::factory()->create([
            'password' => bcrypt($password = 'i-love-laravel')]);
        $response = $this->post(route('login'), [
            'email' => $user->email, 'password' => 'secret',
        ]);
        $response->assertRedirect(route('root'));
        $this->assertGuest(null);
    }
}

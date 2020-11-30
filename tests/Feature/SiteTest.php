<?php

namespace Tests\Feature;

use App\Models\Band;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SiteTest extends TestCase
{
    use RefreshDatabase;
    use HasFactory;

    public function testExample()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function testBasicSite()
    {
        $response = $this->get('/');
        $response->assertSeeText('Laravel');
        $response->assertSeeText('Band List');
    }

    public function testEPKLoggedIn()
    {
        $band = Band::factory()->make();
        $response = $this->get(route(route('bands.show', $band->id)));
        dd($response->status());
    }
//    public function testEPKNotLoggedIn()
//    {
//        $response = $this->get(route('bands.show', 1));
//    }

    public function testLoginPage()
    {
        $response = $this->get(route('login'));
        $response->assertSeeText('E-Mail');
        $response->assertSeeText('Password');
    }
}

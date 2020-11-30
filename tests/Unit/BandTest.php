<?php

namespace Tests\Unit;

use App\Models\Band;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BandTest extends TestCase
{
    use RefreshDatabase;
    use HasFactory;

    /**
     * @test
     */
    public function createBands()
    {
        Band::factory()->count(5)->create();
        Band::factory()->create(['name' => 'name']);
        Band::factory()->create(['name' => 'name2']);
        Band::factory()->create(['name' => 'name3']);

        $bands = Band::searchByNameAndBio("name");

        $this->assertEquals(3, $bands->count());
        $this->assertEquals(8, Band::all()->count());
    }
}

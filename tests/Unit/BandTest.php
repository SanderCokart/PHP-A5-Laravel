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

    public function testCreateBands()
    {
        Band::factory()->count(5)->create();
        $this->assertEquals(5, Band::all()->count());
    }

    public function testSearchBands()
    {
        Band::factory()->create(['name' => 'name']);
        Band::factory()->create(['name' => 'name1']);

        $searchResult_1 = Band::searchByNameAndBio("name");
        $searchResult_2 = Band::searchByNameAndBio("name1");

        $this->assertEquals(2, $searchResult_1->count());
        $this->assertEquals(1, $searchResult_2->count());
    }
}

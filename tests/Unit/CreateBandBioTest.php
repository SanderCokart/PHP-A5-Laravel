<?php

namespace Tests\Unit;

use App\Models\Band;
use App\Models\BandBio;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CreateBandBioTest extends TestCase
{
    use RefreshDatabase;
    use HasFactory;

    /**
     * @test
     */
    public function bandHasBio()
    {
        $band = Band::factory()->create();
        $bandBio = BandBio::factory()->create(['band_id' => $band->id]);

        $this->assertInstanceOf(BandBio::class, $band->bandBio);
    }
}

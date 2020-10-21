<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandModeratorPivotTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('band_moderator', function (Blueprint $table) {
            $table->id();
            $table->foreignId('band_id');
            $table->foreignId('moderator_id');
            $table->timestamps();

            $table->index(['band_id', 'moderator_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('band_moderator');
    }
}

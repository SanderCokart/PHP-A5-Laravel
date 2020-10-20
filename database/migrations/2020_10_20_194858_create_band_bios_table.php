<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBandBiosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('band_bios', function (Blueprint $table) {
            $table->id();
            $table->string('bio', 4000);
            $table->string('link_1', 100);
            $table->string('link_2', 100);
            $table->string('link_3', 100);
            $table->string('bg_color', 7);
            $table->string('text_color', 7);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('band_bios');
    }
}

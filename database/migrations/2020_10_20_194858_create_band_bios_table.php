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
            $table->string('bio', 4000)->nullable();
            $table->string('link_1', 100)->nullable();
            $table->string('link_2', 100)->nullable();
            $table->string('link_3', 100)->nullable();
            $table->string('bg_color', 7)->nullable();
            $table->string('text_color', 7)->nullable();
            $table->string('image')->nullable();
            $table->foreignId('band_id');
            $table->timestamps();

            $table->index(['band_id']);
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

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEpisodesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('episodes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('hosting');
            $table->string('file_name');
            //ขาดไปซี่รี่ไอดี
            $table->unsignedBigInteger('serie_id')->nullable();
            // $table->unsignedBigInteger('serie_id')->nullable(); อนุญาติให้ว่างได้
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
        Schema::dropIfExists('episodes');
    }
}

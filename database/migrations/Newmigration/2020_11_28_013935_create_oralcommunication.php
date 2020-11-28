<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOralcommunication extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('oralcommunication', function (Blueprint $table) {
            $table->Increments('id');
            $table->integer('assessmentid')->unsigned();
            $table->foreign('assessmentid')->references('id')->on('assessments');
            $table->string('name')->nullable();;
            $table->string('semestertxt')->nullable();;
            $table->string('outcometxt')->nullable();;
            $table->string('filetxt')->nullable();;
            $table->string('use_media')->nullable();;
            $table->string('quality_slides')->nullable();;
            $table->string('opening_statement')->nullable();;
            $table->string('organization')->nullable();;
            $table->string('content')->nullable();;
            $table->string('conclusion')->nullable();;
            $table->string('timing')->nullable();;
            $table->string('clarity')->nullable();;
            $table->string('audience')->nullable();;
            $table->string('apperance')->nullable();;
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
        Schema::dropIfExists('oralcommunication');
    }
}

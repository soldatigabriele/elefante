<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFantasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fantas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('year')->nullable();
            $table->integer('capacity')->nullable();
            $table->integer('country_id')->nullable();
            $table->integer('flavour_id')->nullable();
            $table->integer('logo_id')->nullable();
            $table->string('preview')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fantas');
    }
}

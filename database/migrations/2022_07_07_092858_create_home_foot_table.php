<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('home_foot', function (Blueprint $table) {
            $table->id();

            $table->string('t1')->nullable();
            $table->string('p1')->nullable();
            $table->string('t2')->nullable();
            $table->string('p2')->nullable();
            $table->string('t3')->nullable();
            $table->string('p3')->nullable();
            $table->string('t4')->nullable();
            $table->string('p4')->nullable();
            $table->string('t5')->nullable();
            $table->string('p5')->nullable();
            $table->string('photo')->nullable();

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
        Schema::dropIfExists('home_foot');
    }
};

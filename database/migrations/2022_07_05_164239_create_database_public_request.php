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
        Schema::create('database_public_requests', function (Blueprint $table) {
            $table->id();

            $table->string('database_id')->nullable();
            $table->string('name')->nullable();
            $table->string('nik')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();

            $table->foreign('database_id')->references('id')->on('regulations')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('database_public_requests');
    }
};

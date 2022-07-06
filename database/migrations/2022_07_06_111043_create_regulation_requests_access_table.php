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
        Schema::create('regulation_requests_access', function (Blueprint $table) {
            $table->id();

            $table->uuid('database_id')->nullable(false);
            // $table->string('database_id')->nullable();
            $table->string('name')->nullable();
            $table->string('nik')->nullable();
            $table->string('location')->nullable();
            $table->timestamps();

            $table->foreign('database_id')->references('id')->on('databases')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('regulation_requests_access');
    }
};

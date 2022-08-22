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
        Schema::create('regulations', function (Blueprint $table) {
            $table->string('id')->unique();
            // $table->uuid('id')->primary();

            $table->string('name');
            $table->string('type');
            $table->string('file')->nullable();
            $table->string('number')->nullable();
            $table->date('date')->nullable();
            $table->text('about')->nullable();
            $table->date('set_date')->nullable();
            $table->string('agency')->nullable();
            $table->string('status')->nullable();
            $table->string('privilege')->nullable();

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
        Schema::dropIfExists('regulations');
    }
};

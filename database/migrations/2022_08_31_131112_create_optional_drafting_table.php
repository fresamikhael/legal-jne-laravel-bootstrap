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
        Schema::create('optional_drafting', function (Blueprint $table) {
            $table->uuid('drafting_id');
            $table->string('name');
            $table->string('file');
            $table->timestamps();

            $table->foreign('drafting_id')->references('id')->on('leases')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('optional_drafting');
    }
};

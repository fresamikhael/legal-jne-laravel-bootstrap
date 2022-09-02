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
        Schema::create('databases', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name')->nullable();
            $table->string('type')->nullable();
            $table->string('entity')->nullable();
            $table->string('number')->nullable();
            $table->string('year')->nullable();
            $table->text('about')->nullable();
            $table->date('set_date')->nullable();
            $table->string('bn_number')->nullable();
            $table->string('tbn_number')->nullable();
            $table->date('promulgated_date')->nullable();
            $table->text('note')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('databases');
    }
};

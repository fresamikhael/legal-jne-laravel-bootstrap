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
        Schema::create('top_level_identity', function (Blueprint $table) {
            $table->id();
            $table->string('regulation_id', '255');
            $table->string('name', '255')->nullable();
            $table->string('country', '255')->nullable();
            $table->string('position', '255')->nullable();
            $table->integer('len_service')->nullable();
            $table->integer('share_amount')->nullable();
            $table->timestamps();
            $table->foreign('regulation_id')
                ->references('id')
                ->on('regulations')
                ->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('top_level_identity');
    }
};

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
        Schema::create('document_request', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('user_id');
            $table->text('request_document_reason');

            // $table->string('document_name');
            // $table->string('document_type');
            // $table->string('document_code')->nullable();
            // $table->string('file_number')->nullable();
            // $table->dateTime('doc_out')->nullable();
            // $table->dateTime('doc_in')->nullable();
            // $table->boolean('cost_control')->nullable();
            $table->string('status')->default('PENDING');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('file_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_request');
    }
};

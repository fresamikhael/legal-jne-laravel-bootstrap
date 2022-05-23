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
        Schema::create('file_document_request', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('document_id');
            $table->string('document_name');
            $table->string('document_type');
            $table->string('document_code')->nullable();
            $table->string('file_number')->nullable();
            $table->dateTime('doc_out')->nullable();
            $table->dateTime('doc_in')->nullable();
            // $table->boolean('cost_control')->nullable();
            $table->string('status')->default('PENDING');
            $table->foreign('document_id')->references('id')->on('document_request')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('file_document_request');
    }
};

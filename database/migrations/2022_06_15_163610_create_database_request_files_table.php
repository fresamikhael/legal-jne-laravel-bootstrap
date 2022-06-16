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
        Schema::create('database_request_files', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('document_id');
            $table->string('document_name');
            $table->string('document_type');
            $table->string('document_code')->nullable();
            $table->string('file_number')->nullable();
            $table->dateTime('doc_out')->nullable();
            $table->dateTime('doc_in')->nullable();
            $table->string('file_id')->nullable();
            $table->string('note')->nullable();

            $table->string('status')->default('PENDING');
            $table->foreign('document_id')->references('id')->on('database_requests')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('file_id')->references('id')->on('regulations')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('database_request_files');
    }
};

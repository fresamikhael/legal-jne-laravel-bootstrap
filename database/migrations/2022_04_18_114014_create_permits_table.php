<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permits', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('user_id');

            $table->string('permit_type');
            $table->string('location');
            $table->string('specification');
            $table->text('application_reason');
            $table->string('file_disposition');
            $table->string('file_document1');
            $table->string('file_document2');
            $table->string('file_document3');
            $table->text('note')->nullable();
            $table->string('latest_skpd')->nullable();
            $table->string('proof_of_payment')->nullable();
            $table->string('status')->default('PENDING');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            // $table->foreign('file_disposition')->references('id')->on('upload_files')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('file_document1')->references('id')->on('upload_files')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('file_document2')->references('id')->on('upload_files')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('file_document3')->references('id')->on('upload_files')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permits');
    }
}

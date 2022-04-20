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
        Schema::create('other_litigations', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('user_id');

            $table->string('party_name');
            $table->string('party_province');
            $table->string('party_regency');
            $table->string('party_district');
            $table->string('party_village');
            $table->string('party_zip_code');
            $table->text('party_address');

            $table->string('department');
            $table->string('document_number');
            $table->integer('total_loss');
            $table->text('incident_chronology');

            $table->string('file_document');
            $table->string('file_proof');

            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('other_litigations');
    }
};

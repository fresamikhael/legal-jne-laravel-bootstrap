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
        Schema::create('outstandings', function (Blueprint $table) {
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
            $table->string('agreement_number');
            $table->integer('total_loss');
            $table->date('from_date');
            $table->date('till_date');
            $table->text('incident_chronology');

            $table->string('file_pcrf');
            $table->string('file_recapitulation');
            $table->string('file_packing_list');
            $table->string('file_billing_proof');
            $table->string('file_deed_company')->nullable();
            $table->string('file_nib')->nullable();
            $table->string('file_other')->nullable();

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
        Schema::dropIfExists('outstandings');
    }
};

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
        Schema::create('land_sells', function (Blueprint $table) {
            $table->string('id')->unique();

            $table->string('name');
            $table->string('user_province');
            $table->string('user_regency');
            $table->string('user_district');
            $table->string('user_village');
            $table->string('user_zip_code');
            $table->text('user_address');
            $table->string('ownership_proof');
            $table->string('ownership_number');
            $table->string('agreement_nominal');
            $table->string('payment_type');
            $table->string('notaris_note');
            $table->string('file_advice_planning');
            $table->string('file_kjjp');
            $table->string('file_bca');
            $table->string('file_disposition');
            $table->string('file_ownership_proof');
            $table->string('file_imb');
            $table->string('file_sppt');
            $table->string('file_im');
            $table->string('file_purchase');

            $table->string('identity_type');

            $table->string('file_ktp')->nullable();
            $table->string('file_npwp')->nullable();
            $table->string('file_marriage')->nullable();
            $table->string('file_kk')->nullable();
            $table->string('file_bpjs')->nullable();
            $table->string('file_death_statement')->nullable();
            $table->string('file_legal_heir')->nullable();
            $table->string('file_heir_id')->nullable();
            $table->string('file_heir_npwp')->nullable();

            $table->string('file_legal_corp')->nullable();
            $table->string('file_sk')->nullable();
            $table->string('file_director_id')->nullable();
            $table->string('file_legal_npwp')->nullable();
            $table->string('file_nib')->nullable();
            $table->string('file_business_permit')->nullable();
            $table->string('file_pb_umku')->nullable();
            $table->string('file_location_permit')->nullable();
            $table->string('file_npwp_card')->nullable();

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
        Schema::dropIfExists('land_sells');
    }
};

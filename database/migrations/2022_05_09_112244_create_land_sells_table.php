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
            $table->string('user_id');

            $table->string('regional');
            $table->string('user_province');
            $table->string('user_regency');
            $table->string('user_district');
            $table->string('user_village');
            $table->string('user_zip_code');
            $table->text('user_address');
            $table->string('ownership_proof');
            $table->string('ownership_number');
            $table->string('agreement_nominal');
            $table->string('notaris_note');
            $table->string('file_certificate');
            $table->string('file_ippt');
            $table->string('file_imb');
            $table->string('file_sppt');
            $table->string('file_mom');
            $table->string('file_previous_owner_id');

            $table->string('identity_type');

            $table->string('file_internal_memo')->nullable();
            $table->string('file_ktp')->nullable();
            $table->string('file_npwp')->nullable();
            $table->string('file_marriage')->nullable();
            $table->string('file_ktp_pasutri')->nullable();
            $table->string('file_death_statement')->nullable();
            $table->string('file_legal_heir')->nullable();
            $table->string('file_heir_id')->nullable();
            $table->string('file_kk')->nullable();

            $table->string('file_internal_memo_legal')->nullable();
            $table->string('file_legal_corp')->nullable();
            $table->string('file_sk')->nullable();
            $table->string('file_director_id')->nullable();
            $table->string('file_legal_npwp')->nullable();
            $table->string('file_nib')->nullable();
            $table->string('file_power_attorney')->nullable();

            $table->string('file_location')->nullable();
            $table->string('file_coordinate')->nullable();
            $table->string('file_business_case')->nullable();
            $table->string('file_appraisal')->nullable();

            $table->string('user_note')->nullable();
            $table->string('cb_note')->nullable();

            $table->string('file_sale_agreement_draft_')->nullable();
            $table->string('status')->default('PENDING');

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');


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

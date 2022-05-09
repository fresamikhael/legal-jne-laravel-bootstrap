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
        Schema::create('others', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('user_id');

            $table->string('party_name');
            $table->string('party_province');
            $table->string('party_regency');
            $table->string('party_district');
            $table->string('party_village');
            $table->string('party_zip_code');
            $table->text('party_address');

            $table->string('optional_party_name');
            $table->string('optional_party_province');
            $table->string('optional_party_regency');
            $table->string('optional_party_district');
            $table->string('optional_party_village');
            $table->string('optional_party_zip_code');
            $table->text('optional_party_address');

            $table->string('type');
            $table->string('addendum_to')->nullable();
            $table->integer('discount');

            $table->text('other_point');

            $table->string('landlord_type');

            // General
            $table->string('file_director_disposition');
            $table->string('file_internal_memo');
            $table->string('file_lease_application_form');

            // Perorangan
            $table->string('file_right_owner_id_card')->nullable();
            $table->string('file_npwp_individual')->nullable();
            $table->string('file_family_card')->nullable();
            $table->string('file_marriage_certificate')->nullable();
            $table->string('file_death_certificate')->nullable();
            $table->string('file_heir_certificate')->nullable();

            // Badan Hukum
            $table->string('file_director_id_card')->nullable();
            $table->string('file_deed_of_incorporation')->nullable();
            $table->string('file_sk_menkumham')->nullable();
            $table->string('file_siup')->nullable();
            $table->string('file_tdp')->nullable();
            $table->string('file_npwp_legal_entity')->nullable();
            $table->string('file_skd')->nullable();
            $table->string('file_skdu')->nullable();

            // Objek Sewa
            $table->string('file_certificate');
            $table->string('file_imb');
            $table->string('file_sppt');

            // Lain - Lain
            $table->string('file_dp_receipt')->nullable();
            $table->string('file_payment_imb')->nullable();
            $table->string('file_procuration')->nullable();
            $table->string('file_previous_agreement')->nullable();
            $table->string('file_director_procuration')->nullable();
            $table->string('file_lease_application')->nullable();
            $table->string('file_lease_eligibility')->nullable();

            $table->string('user_note')->nullable();
            $table->string('cb_note')->nullable();
            $table->string('status')->default('PENDING');


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
        Schema::dropIfExists('others');
    }
};

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
        Schema::create('leases', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('user_id');

            $table->string('landlord_name');
            $table->string('landlord_province');
            $table->string('landlord_regency');
            $table->string('landlord_village');
            $table->string('landlord_district');
            $table->string('landlord_zip_code');
            $table->string('landlord_address');

            $table->string('type');
            $table->string('addendum_to')->nullable();
            $table->string('regional');
            $table->integer('rental_value');

            $table->string('rental_object_province');
            $table->string('rental_object_regency');
            $table->string('rental_object_district');
            $table->string('rental_object_village');
            $table->string('rental_object_zip_code');
            $table->string('rental_object_address');

            $table->string('optional_landlord_name')->nullable();
            $table->string('optional_landlord_province')->nullable();
            $table->string('optional_landlord_regency')->nullable();
            $table->string('optional_landlord_village')->nullable();
            $table->string('optional_landlord_district')->nullable();
            $table->string('optional_landlord_zip_code')->nullable();
            $table->string('optional_landlord_address')->nullable();

            $table->string('period_of_time');
            $table->string('guarantee_nominal');
            $table->string('main_branch');

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

            $table->string('status')->default('PENDING');
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
        Schema::dropIfExists('leases');
    }
};

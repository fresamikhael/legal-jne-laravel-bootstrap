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
        Schema::create('vendors', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('user_id');

            $table->string('party_name');
            $table->string('party_province');
            $table->string('party_regency');
            $table->string('party_district');
            $table->string('party_village');
            $table->string('party_zip_code');
            $table->text('party_address');
            $table->integer('agreement_nominal');
            $table->string('party_name_optional')->nullable();
            $table->string('party_province_optional')->nullable();
            $table->string('party_regency_optional')->nullable();
            $table->string('party_district_optional')->nullable();
            $table->string('party_village_optional')->nullable();
            $table->string('party_zip_code_optional')->nullable();
            $table->text('party_address_optional')->nullable();
            $table->string('vendor_type');
            $table->string('guarantee');
            $table->string('relation_period');
            $table->text('other_point');
            $table->string('name_responden');
            $table->string('province_responden');
            $table->string('regency_responden');
            $table->string('district_responden');
            $table->string('village_responden');
            $table->string('zip_code_responden');
            $table->string('address_responden');
            $table->string('tel_responden');
            $table->string('mail_responden');
            $table->string('file_deed_of_company');
            $table->string('file_nib');
            $table->string('file_npwp');
            $table->string('file_business_permit');
            $table->string('file_oss_location');
            $table->string('file_director_id_card');
            $table->string('file_sk');
            $table->string('file_other')->nullable();
            $table->string('file_vendor_offer');
            $table->string('file_mom');
            $table->string('file_dispotition');
            $table->string('file_agreement_draft');
            $table->string('file_customer_entity');
            $table->string('file_sk_menkumham');
            $table->string('file_nib2');
            $table->string('file_npwp2');
            $table->string('file_business_permit2');
            $table->string('file_director_id_card2');
            $table->string('file_other2')->nullable();
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
        Schema::dropIfExists('vendors');
    }
};

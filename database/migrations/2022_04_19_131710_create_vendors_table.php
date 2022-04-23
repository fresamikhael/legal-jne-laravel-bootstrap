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
            $table->string('vendor_type');
            $table->text('file_form_vendor')->nullable();
            $table->string('file_supporting_attachment')->nullable();

            $table->string('optional_party_name')->nullable();
            $table->string('optional_party_province')->nullable();
            $table->string('optional_party_regency')->nullable();
            $table->string('optional_party_district')->nullable();
            $table->string('optional_party_village')->nullable();
            $table->string('optional_party_zip_code')->nullable();
            $table->text('optional_party_address')->nullable();
            $table->string('type');
            $table->string('addendum_to')->nullable();
            $table->string('guarantee');
            $table->string('bank_guarantee')->nullable();
            $table->string('deposit_guarantee')->nullable();
            $table->string('relation_period');

            $table->text('other_point');

            $table->string('file_deed_of_company');
            $table->string('file_nib');
            $table->string('file_npwp');
            $table->string('file_business_permit');
            $table->string('file_oss_location');
            $table->string('file_director_id_card');
            $table->string('file_sk')->nullable();
            $table->string('file_other')->nullable();

            $table->string('correspondence_name');
            $table->string('correspondence_province');
            $table->string('correspondence_regency');
            $table->string('correspondence_district');
            $table->string('correspondence_village');
            $table->string('correspondence_zip_code');
            $table->text('correspondence_address');
            $table->string('correspondence_phone');
            $table->string('correspondence_email');

            $table->string('file_vendor_offer');
            $table->string('file_mom');
            $table->string('file_dispotition');
            $table->string('file_agreement_draft');

            $table->string('file_sk_menkumham');
            $table->string('file_nib2');
            $table->string('file_npwp2');
            $table->string('file_business_permit2');
            $table->string('file_director_id_card2');
            $table->string('file_other2')->nullable();
            $table->string('file_internal_memo')->nullable();

            $table->string('user_note')->nullable();
            $table->string('cb_note')->nullable();
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

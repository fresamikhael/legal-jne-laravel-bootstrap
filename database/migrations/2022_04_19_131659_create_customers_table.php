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
        Schema::create('customers', function (Blueprint $table) {
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

            $table->string('file_mom')->nullable();
            $table->string('file_agreement_draft')->nullable();
            $table->string('file_claim_form');

            $table->string('correspondence_name');
            $table->string('correspondence_province');
            $table->string('correspondence_regency');
            $table->string('correspondence_district');
            $table->string('correspondence_village');
            $table->string('correspondence_zip_code');
            $table->text('correspondence_address');
            $table->string('correspondence_phone');
            $table->string('correspondence_email');

            $table->string('sales_name');
            $table->string('sales_email');
            $table->string('sales_phone');
            $table->string('sales_department');

            $table->string('file_deed_of_company')->nullable();
            $table->string('file_nib');
            $table->string('file_npwp');
            $table->string('file_business_permit')->nullable();
            $table->string('file_oss_location')->nullable();
            $table->string('file_director_id_card')->nullable();
            $table->string('file_sk')->nullable();
            $table->string('file_other');
            $table->string('file_internal_memo')->nullable();

            $table->string('user_note')->nullable();
            $table->string('cb_note')->nullable();

            $table->string('file_agreement_signature')->nullable();
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
        Schema::dropIfExists('customers');
    }
};

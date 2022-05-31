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

            $table->string('company_name');
            $table->string('person_responsible');
            $table->string('agent_province');
            $table->string('agent_regency');
            $table->string('agent_district');
            $table->string('agent_village');
            $table->string('agent_zip_code');
            $table->text('agent_address');

            $table->string('total_outstanding');
            $table->string('outstanding_type');
            $table->string('outstanding_types')->nullable();
            $table->string('outstanding_sales')->nullable();
            $table->string('outstanding_cod')->nullable();
            $table->date('outstanding_start');
            $table->date('outstanding_end');
            $table->text('incident_chronology');

            $table->string('file_management_disposition')->nullable();
            $table->string('file_deed_of_incoporation')->nullable();
            $table->string('file_sk_menkumham')->nullable();
            $table->string('file_director_id_card')->nullable();
            $table->string('file_npwp')->nullable();
            $table->string('file_nib')->nullable();
            $table->string('file_business_permit')->nullable();
            $table->string('file_location_permit')->nullable();
            $table->string('file_outstanding_recap')->nullable();
            $table->string('file_billing_letter')->nullable();
            $table->string('file_internal_memo')->nullable();

            $table->string('outstanding_packing_list')->nullable();

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

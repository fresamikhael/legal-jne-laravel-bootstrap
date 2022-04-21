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
        Schema::create('customer_disputes', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('user_id');
            $table->date('shipping_date');

            $table->string('sender_name');
            $table->string('sender_province');
            $table->string('sender_regency');
            $table->string('sender_district');
            $table->string('sender_village');
            $table->string('sender_zip_code');
            $table->text('sender_address');
            $table->string('sender_phone_number');

            $table->string('case_type');
            $table->string('causative_factor');
            $table->string('causative_factor_others')->nullable();

            $table->string('receiver_name');
            $table->string('receiver_province');
            $table->string('receiver_regency');
            $table->string('receiver_district');
            $table->string('receiver_village');
            $table->string('receiver_zip_code');
            $table->text('receiver_address');
            $table->string('receiver_phone_number');

            $table->string('total_loss');
            $table->string('item_nominal');
            $table->string('connote');
            $table->string('customer');
            $table->string('shipping_type');
            $table->string('assurance');
            $table->string('assurance_nominal')->nullable();

            $table->text('incident_chronology');
            $table->string('shipping_form');
            $table->string('detail_shipping_form')->nullable();

            $table->string('file_connote');
            $table->string('file_orion');
            $table->string('file_pod')->nullable();
            $table->string('file_customer_case_form');
            $table->string('file_destination_chronology')->nullable();
            $table->string('file_orion_chronology')->nullable();
            $table->string('file_cs_chronology')->nullable();
            $table->string('file_subpoena')->nullable();
            $table->string('file_procuration')->nullable();
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
        Schema::dropIfExists('customer_disputes');
    }
};

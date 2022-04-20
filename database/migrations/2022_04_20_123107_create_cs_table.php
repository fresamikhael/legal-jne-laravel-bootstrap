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
        Schema::create('cs', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('user_id')->nullable();
            $table->string('form_id');
            $table->string('file_consumer_dispute_case_form')->nullable();
            $table->string('file_operational_delivery_chronology')->nullable();
            $table->string('file_cs_handling_chronology')->nullable();
            $table->string('file_pod_evidence')->nullable();
            $table->string('file_receipt_proof')->nullable();
            $table->string('file_proof_of_documentation1')->nullable();
            $table->string('file_proof_of_documentation2')->nullable();
            $table->string('file_proof_of_documentation3')->nullable();
            $table->string('file_other_supporting_document')->nullable();
            $table->integer('nominal_indemnity_offer')->nullable();
            $table->text('note')->nullable();
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
        Schema::dropIfExists('cs');
    }
};

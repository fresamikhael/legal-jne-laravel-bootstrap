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
        Schema::create('frauds', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('user_id');
            $table->date('date');
            $table->string('case_type');
            $table->string('causative_factor');
            $table->string('perpetrator');
            $table->string('unit');
            $table->integer('total_loss');
            $table->date('incident_date');
            $table->string('incident_scane');
            $table->text('incident_chronology');
            $table->string('fraud_classification');
            $table->string('witness1');
            $table->string('witness1_department');
            $table->string('witness2');
            $table->string('witness2_department');
            $table->string('file_document_proof');
            $table->string('file_perpetrator_statement');
            $table->string('file_witness_statement');
            $table->string('file_other')->nullable();
            $table->string('file_evidence_documentation');
            $table->string('file_investigation_document');
            $table->string('file_other_evidence')->nullable();
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
        Schema::dropIfExists('frauds');
    }
};

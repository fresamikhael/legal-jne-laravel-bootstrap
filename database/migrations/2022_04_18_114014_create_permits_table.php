<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permits', function (Blueprint $table) {
            $table->string('id')->unique();
            $table->string('user_id');

            // IMB SLF
            $table->string('permit_type')->nullable();
            $table->string('location')->nullable();
            $table->string('building_area')->nullable();
            $table->string('surface_area')->nullable();
            $table->text('application_reason')->nullable();
            $table->string('file_disposition')->nullable();
            $table->string('file_me')->nullable();
            $table->string('file_architect')->nullable();
            $table->string('file_technical')->nullable();
            $table->string('file_building_photo')->nullable();
            $table->string('file_other')->nullable();

            // Reklame
            $table->string('owner_name')->nullable();
            $table->string('ads_type')->nullable();
            $table->string('address')->nullable();
            $table->string('ads_title')->nullable();
            $table->string('ads_size')->nullable();
            $table->string('ads_height')->nullable();
            $table->string('ads_period')->nullable();
            $table->string('file_ads_photo')->nullable();
            $table->string('file_statement_letter')->nullable();
            $table->string('file_building_ownership')->nullable();
            $table->string('file_pbb')->nullable();
            $table->string('file_ownership_statement')->nullable();
            $table->string('file_tlbbr')->nullable();

            // OSS
            $table->string('branch_name')->nullable();
            $table->string('branch_location')->nullable();
            $table->string('branch_rt')->nullable();
            $table->string('branch_village')->nullable();
            $table->string('branch_district')->nullable();
            $table->string('branch_regency')->nullable();
            $table->string('branch_province')->nullable();
            $table->string('branch_postal_code')->nullable();
            $table->string('branch_longtitude')->nullable();
            $table->string('branch_latitude')->nullable();
            $table->string('permit_process')->nullable();
            $table->string('file_location_polygon')->nullable();
            $table->string('file_oss_form')->nullable();

            // Perpanjangan SLF
            $table->string('file_imb')->nullable();
            $table->string('file_old_slf')->nullable();

            // Perpanjangan Reklame
            $table->string('file_payment_proof')->nullable();
            $table->string('file_old_skpd')->nullable();

            $table->text('note')->nullable();
            $table->string('latest_skpd')->nullable();
            $table->string('proof_of_payment')->nullable();
            $table->string('permit_model')->nullable();
            $table->string('cost_control')->default('FALSE');
            $table->string('status')->default('PENDING');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');

            // $table->foreign('file_disposition')->references('id')->on('upload_files')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('file_document1')->references('id')->on('upload_files')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('file_document2')->references('id')->on('upload_files')->onUpdate('cascade')->onDelete('cascade');
            // $table->foreign('file_document3')->references('id')->on('upload_files')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permits');
    }
}

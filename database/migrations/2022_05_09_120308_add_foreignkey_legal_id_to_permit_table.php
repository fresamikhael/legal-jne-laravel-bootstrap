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
        Schema::table('permits', function (Blueprint $table) {
            //
            $table->string('legal_id')->after('user_id')->nullable();
            $table->string('check_expired')->after('status')->default('FALSE');
            $table->string('update_photo')->after('proof_of_payment')->nullable();
            $table->date('expired')->after('check_expired')->nullable();
            $table->string('extend')->after('expired')->nullable();
            $table->string('receipt')->after('proof_of_payment')->nullable();



            $table->foreign('legal_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('permits', function (Blueprint $table) {
            //
        });
    }
};

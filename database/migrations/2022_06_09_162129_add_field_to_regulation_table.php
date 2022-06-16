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
        Schema::table('regulations', function (Blueprint $table) {
            $table->string('rule_number')->after('rule_type')->nullable();
            $table->string('rule_year')->after('rule_number')->nullable();
            $table->string('about')->after('rule_year')->nullable();
            $table->date('set_date')->after('about')->nullable();
            $table->string('bn_number')->after('set_date')->nullable();
            $table->string('tbn_number')->after('bn_number')->nullable();
            $table->date('promulgation_date')->after('tbn_number')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('regulation', function (Blueprint $table) {
            $table->dropColumn('rule_number');
            $table->dropColumn('rule_year');
            $table->dropColumn('about');
            $table->dropColumn('set_date');
            $table->dropColumn('bn_number');
            $table->dropColumn('tbn_number');
            $table->dropColumn('promulgation_date');
        });
    }
};

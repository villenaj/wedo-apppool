<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tbl_applicant', function (Blueprint $table) {
            $table->id();
            $table->char('first',50)->nullable()->default('0');
            $table->char('middle',50)->nullable()->default('0');
            $table->char('last',50)->nullable()->default('0');
            $table->char('suf',50)->nullable()->default('0');
            $table->char('gen',50)->nullable()->default('0');
            $table->char('citizen',50)->nullable()->default('0');
            $table->char('rel',50)->nullable()->default('0');
            $table->char('bdate',50)->nullable()->default('0');
            $table->char('stat',50)->nullable()->default('0');
            $table->char('mob',50)->nullable()->default('0');
            $table->char('eml',50)->nullable()->default('0');
            $table->char('prov',50)->nullable()->default('0');
            $table->char('ct',50)->nullable()->default('0');
            $table->char('brgy',50)->nullable()->default('0');
            $table->char('strt',50)->nullable()->default('0');
            $table->char('zip',50)->nullable()->default('0');
            $table->char('cntry',50)->nullable()->default('0');
            $table->char('chse',50)->nullable()->default('0');
            $table->text('path')->nullable()->default('0');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('applicants');
    }
};

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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address');
            $table->string('socialMediaLinks');
            $table->timestamps();
            $table->softDeletes();

            $table->unsignedBigInteger('typeOfBusiness_id')->nullable();
            $table->index('typeOfBusiness_id', 'company_type_of_businesses_idx');
            $table->foreign('type_of_businesses','companies_fk')->on('type_of_businesses')->references('id');php
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
};

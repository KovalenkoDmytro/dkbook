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
        Schema::create('logo_companies', function (Blueprint $table) {
            $table->id();
            $table->string('logo');
            $table->timestamps();

            $table->unsignedBigInteger('companies_id')->nullable();
            $table->index('companies_id', 'logoCompany_companies_idx');
            $table->foreign('companies_id','logoCompany_companies_fk')->on('companies')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('logo_companies');
    }
};

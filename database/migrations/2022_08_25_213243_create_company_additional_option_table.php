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
        Schema::create('company_additional_option', function (Blueprint $table) {
            $table->id();

            $table->foreignId('additional_option_id')->constrained();
            $table->foreignId('company_id')->constrained();
            $table->unique(['additional_option_id','company_id']);


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
        Schema::dropIfExists('company_additional_option');
    }
};

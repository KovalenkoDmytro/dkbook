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
        Schema::create('client_opinions', function (Blueprint $table) {
            $table->id();
            $table->mediumText('text');
            $table->foreignId('company_id')->constrained();
            $table->foreignId('employee_id')->constrained();
            $table->foreignId('service_id')->constrained();
            $table->foreignId('client_id')->constrained();
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
        Schema::dropIfExists('client_opinions');
    }
};

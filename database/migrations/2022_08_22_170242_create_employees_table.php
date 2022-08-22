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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email');
            $table->string('position');
            $table->timestamps();

            $table->unsignedBigInteger('companies_id')->nullable();
            $table->index('companies_id', 'employee_companies_idx');
            $table->foreign('companies_id','employee_companies_fk')->on('companies')->references('id');

            $table->unsignedBigInteger('employeeSchedules_id')->nullable();
            $table->index('employeeSchedules_id', 'employee_employeeSchedules_idx');
            $table->foreign('employeeSchedules_id','employee_employeeSchedules_fk')->on('employee_schedules')->references('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
};

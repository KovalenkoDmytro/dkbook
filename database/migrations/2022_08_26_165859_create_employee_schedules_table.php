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
        Schema::create('employee_schedules', function (Blueprint $table) {
            $table->id();
            $table->string('monday')->nullable();;
            $table->string('tuesday')->nullable();;
            $table->string('wednesday')->nullable();;
            $table->string('thursday')->nullable();;
            $table->string('friday')->nullable();;
            $table->string('saturday')->nullable();;
            $table->string('sunday')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('employee_schedules');
    }
};

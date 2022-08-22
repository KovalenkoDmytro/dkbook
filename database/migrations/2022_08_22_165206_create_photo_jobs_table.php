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
        Schema::create('photo_jobs', function (Blueprint $table) {
            $table->id();
            $table->string('links');
            $table->timestamps();

            $table->unsignedBigInteger('companies_id')->nullable();
            $table->index('companies_id', 'photoJob_companies_idx');
            $table->foreign('companies_id','photoJob_companies_fk')->on('companies')->references('id');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('photo_jobs');
    }
};

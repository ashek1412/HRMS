<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryProfile extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_profile', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type');
            $table->decimal('hourly_rate',8,2);
            $table->decimal('overtime_hourly_rate',8,2);
            $table->decimal('late_hourly_rate',8,2);
            $table->decimal('early_leaving_hourly_rate',8,2);
            $table->string('description');
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
        Schema::dropIfExists('salary_profile');
    }
}

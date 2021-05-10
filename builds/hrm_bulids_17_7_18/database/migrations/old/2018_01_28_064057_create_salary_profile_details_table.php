<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalaryProfileDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salary_profile_details', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('salary_profile_id');
            $table->integer('salary_head_id');
            $table->integer('base_head_id');
            $table->decimal('base_head_percent',5,2);
            $table->decimal('amount',10,2);
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
        Schema::dropIfExists('salary_profile_details');
    }
}

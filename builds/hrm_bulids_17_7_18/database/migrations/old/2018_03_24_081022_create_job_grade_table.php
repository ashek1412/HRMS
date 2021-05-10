<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJobGradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('job_grade', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type',50);
            $table->string('code',20);
            $table->string('name',100);
            $table->decimal('start_point',8,2);
            $table->decimal('mid_point',8,2);
            $table->decimal('end_point',8,2);
            $table->integer('spread');
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
        //
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddRemarksToClocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('clocks', function (Blueprint $table) {
            $table->integer('updated_by')->nullable()->after('updated_at');
            $table->string('remarks')->nullable()->after('updated_by');
            //$table->foreign('shift_id')->references('id')->on('shifts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('clocks', function (Blueprint $table) {
            $table->dropColumn('updated_by');
            $table->dropColumn('remarks');
            //$table->foreign('shift_id')->references('id')->on('shifts');
        });
    }
}

<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddProbationToUserEmployments extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_employments', function(Blueprint $table)
        {
            $table->date('probation_from_date')->after('date_of_joining');
            $table->date('probation_to_date')->after('probation_from_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_employments', function(Blueprint $table)
        {
            $table->dropColumn('probation_from_date');
            $table->dropColumn('probation_to_date');

        });
    }
}

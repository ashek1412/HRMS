<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdatreUserQualificationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_qualifications', function(Blueprint $table)
        {
            $table->Integer('qualification_score_type_id')->after('qualification_skill_id');
            $table->String('qualification_score',25)->after('qualification_score_type_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_qualifications', function(Blueprint $table)
        {
            $table->dropColumn('qualification_score_type_id');
            $table->dropColumn('qualification_score');
        });
    }
}

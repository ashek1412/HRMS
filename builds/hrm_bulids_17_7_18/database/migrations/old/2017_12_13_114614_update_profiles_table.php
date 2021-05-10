<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('profiles', function(Blueprint $table)
        {
            $table->String('paddress_line_1',225)->after('country_id');
            $table->String('paddress_line_2',225)->after('paddress_line_1');
            $table->String('pcity',50)->after('paddress_line_2');
            $table->String('pstate',50)->after('pcity');
            $table->String('pzipcode',20)->after('pstate');
            $table->String('pcountry_id',20)->after('pzipcode');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profiles', function(Blueprint $table)
        {
            $table->dropColumn('paddress_line_1');
            $table->dropColumn('paddress_line_2');
            $table->dropColumn('pcity');
            $table->dropColumn('pstate');
            $table->dropColumn('pzipcode');
            $table->dropColumn('pcountry_id');
        });
    }
}

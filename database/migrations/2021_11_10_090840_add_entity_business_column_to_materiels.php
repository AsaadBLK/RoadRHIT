<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddEntityBusinessColumnToMateriels extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('Materiels', function (Blueprint $table) {
            $table->string('entity');
            $table->string('business');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('Materiels', function (Blueprint $table) {
            $table->dropColumn('entity');
            $table->dropColumn('business');
        });
    }
}

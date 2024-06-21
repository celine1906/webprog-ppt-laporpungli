<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('aduan', function (Blueprint $table) {
            $table->integer('cluster')->nullable();
        });
    }

    public function down()
    {
        Schema::table('aduan', function (Blueprint $table) {
            $table->dropColumn('cluster');
        });
    }
};

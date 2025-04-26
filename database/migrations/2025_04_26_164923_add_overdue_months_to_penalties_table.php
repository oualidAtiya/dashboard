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
        Schema::table('penalties', function (Blueprint $table) {
            $table->integer('overdue_months')->default(0)->after('amount');
        });
    }

    public function down()
    {
        Schema::table('penalties', function (Blueprint $table) {
            $table->dropColumn('overdue_months');
        });
    }
};

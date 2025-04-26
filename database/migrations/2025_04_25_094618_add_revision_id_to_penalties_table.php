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
            $table->unsignedBigInteger('revision_id')->nullable();  // Add this if it's missing
            $table->foreign('revision_id')->references('id')->on('revision_metrologiques');  // Optional, add if necessary
        });
    }

    public function down()
    {
        Schema::table('penalties', function (Blueprint $table) {
            $table->dropColumn('revision_id');
        });
    }
};

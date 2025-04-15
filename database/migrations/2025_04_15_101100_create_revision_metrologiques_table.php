<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('revision_metrologiques', function (Blueprint $table) {
            $table->id();
            $table->foreignId('scale_id')->constrained('bascules')->onDelete('cascade');
            $table->date('last_revision_date');
            $table->string('status');
            $table->text('verification_report');
            $table->string('verification_responsible');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revision_metrologiques');
    }
};

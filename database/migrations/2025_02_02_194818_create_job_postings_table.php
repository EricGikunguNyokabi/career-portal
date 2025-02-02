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
        Schema::create('job_postings', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Job title
            $table->integer('position_needed'); // Number of positions needed
            $table->string('job_grade')->nullable(); // Job grade (optional)
            $table->string('advert_no')->nullable(); // Advertisement number (optional)
            $table->text('description')->nullable(); // Job description (optional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_postings');
    }
};


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
        Schema::create('job_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('applicant_id')->constrained('users')->onDelete('cascade'); 
            $table->foreignId('job_id')->constrained('job_postings')->onDelete('cascade'); 

            $table->foreignId('education_id')->nullable()->constrained('educations')->onDelete('cascade');
            $table->foreignId('other_training_id')->nullable()->constrained('other_trainings')->onDelete('cascade');
            $table->foreignId('experience_id')->nullable()->constrained('previous_employments')->onDelete('cascade');
            $table->foreignId('referee_id')->nullable()->constrained('referees')->onDelete('cascade');
            $table->foreignId('document_id')->nullable()->constrained('documents')->onDelete('cascade');
            // $table->string('status')->default('pending'); // Default status is 'pending'

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_applications');
    }
};

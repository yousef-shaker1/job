<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('Positions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('hr_id')->constrained('hr_accounts')->onDelete('cascade');
            $table->string('number_of_employees');
            $table->string('job_title');
            $table->text('job_description');
            $table->text('company_about');
            $table->text('job_requirements');
            $table->string('experience_years');
            $table->string('salary')->nullable();
            $table->enum('salary_period', ['month', 'year']);
            $table->enum('employment_type', ['full_time', 'part_time', 'contract', 'remote', 'temporary','training', 'Fresh-graduate'])->default('full_time');
            $table->foreignId('section_id')->constrained('sections')->onDelete('cascade');
            $table->string('url')->nullable();
            $table->boolean('is_expired')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};

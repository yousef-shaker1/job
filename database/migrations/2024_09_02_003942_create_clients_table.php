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
        // أولاً، قم بإنشاء الجداول التي تحتوي على foreign keys
        Schema::create('user_personals', function (Blueprint $table) {
            $table->id();
            $table->string('img')->nullable();
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->integer('age');
            $table->string('job_title');
            $table->string('year_experience')->nullable();
            $table->string('phone');
            $table->date('birth_day');
            $table->enum('gender', ['male', 'female', 'other']);
            $table->timestamps();
        });
        
        Schema::create('user_work_experiences', function (Blueprint $table) {
            $table->id();
            $table->string('company_name1')->nullable();
            $table->string('job_title1')->nullable();
            $table->string('job_description1')->nullable();
            $table->string('start_date_month1')->nullable();
            $table->string('start_date_year1')->nullable();
            $table->string('end_date_month1')->nullable();
            $table->string('end_date_year1')->nullable();
            $table->string('currently_working')->nullable();
            $table->timestamps();
        });

        Schema::create('user_projects', function (Blueprint $table) {
            $table->id();
            $table->string('project_name')->nullable();
            $table->string('project_description')->nullable();
            $table->string('skills_project')->nullable();
            $table->string('project_url')->nullable();
            $table->string('project_name2')->nullable();
            $table->string('project_description')->nullable();
            $table->string('skills_project2')->nullable();
            $table->string('project_url2')->nullable();
            $table->string('project_name3')->nullable();
            $table->string('project_description')->nullable();
            $table->string('skills_project3')->nullable();
            $table->string('project_url3')->nullable();
            $table->timestamps();
        });
    
        Schema::create('user_work_experience2s', function (Blueprint $table) {
            $table->id();
            $table->string('company_name2')->nullable();
            $table->string('job_title2')->nullable();
            $table->string('job_description2')->nullable();
            $table->string('start_date_month2')->nullable();
            $table->string('start_date_year2')->nullable();
            $table->string('end_date_month2')->nullable();
            $table->string('end_date_year2')->nullable();
            $table->string('company_name3')->nullable();
            $table->string('job_title3')->nullable();
            $table->string('job_description3')->nullable();
            $table->string('start_date_month3')->nullable();
            $table->string('start_date_year3')->nullable();
            $table->string('end_date_month3')->nullable();
            $table->string('end_date_year3')->nullable();
            $table->timestamps();
        });
        
        Schema::create('user_addresses', function (Blueprint $table) {
            $table->id();
            $table->string('address');
            $table->string('city');
            $table->string('state');
            $table->string('zip');
            $table->timestamps();
        });
    
        Schema::create('user_education_informations', function (Blueprint $table) {
            $table->id();
            $table->string('college');
            $table->string('major');
            $table->string('start_date_month_university');
            $table->string('start_date_year_university');
            $table->string('end_date_month_university')->nullable();
            $table->string('end_date_year_university')->nullable();
            $table->string('university_year')->nullable();
            $table->timestamps();
        });
    
        Schema::create('user_skills', function (Blueprint $table) {
            $table->id();
            $table->string('skills');
            $table->string('cv')->nullable();
            $table->string('linkedin');
            $table->string('github')->nullable();
            $table->timestamps();
        });
    
        // ثم قم بإنشاء جدول user_profiles الذي يحتوي على foreign keys
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_personal_id')->constrained('user_personals')->onDelete('cascade');
            $table->foreignId('user_work_experience_id')->constrained('user_work_experiences')->nullable()->onDelete('cascade');
            $table->foreignId('user_work_experience2_id')->constrained('user_work_experience2s')->nullable()->onDelete('cascade');
            $table->foreignId('user_project_id')->constrained('user_projects')->onDelete('cascade')->nullable();
            $table->foreignId('user_address_id')->constrained('user_addresses')->onDelete('cascade');
            $table->foreignId('user_education_information_id')->constrained('user_education_informations')->onDelete('cascade');
            $table->foreignId('user_skill_id')->constrained('user_skills')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clients');
    }
};

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
        Schema::create('hr_accounts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('img')->nullable();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('company_name');
            $table->string('business_email')->unique();
            $table->string('business_password');
            $table->foreignId('section_id')->constrained()->onDelete('cascade');
            $table->string('phone');
            $table->string('company_location');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hr_accounts');
    }
};

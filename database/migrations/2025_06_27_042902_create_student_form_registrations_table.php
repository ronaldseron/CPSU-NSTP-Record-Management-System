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
        Schema::create('student_form_registrations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('category')->index();
            $table->string('status')->index()->default('pending');
        
            $table->string('school_year')->index();
            $table->string('school_id')->index();
            $table->string('course')->index();
            
            // Personal information 
            $table->string('last_name');
            $table->string('first_name');
            $table->string('middle_initial')->nullable();
            $table->string('extension_name')->nullable();
            $table->string('gender')->index();
            $table->string('cp_number');
            
            // Address information
            $table->string('province_code');
            $table->string('province_name');
            $table->string('city_code');
            $table->string('city_name');
            $table->string('brgy_code');
            $table->string('brgy_name');
            
            // Institution information
            $table->string('hei_name');
            $table->string('constitution_code');
            $table->string('type_heis');
            $table->string('program_level_code');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_form_registrations');
    }
};

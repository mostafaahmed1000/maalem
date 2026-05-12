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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->date('dob');
            $table->string('nationality');
            $table->string('mobile');
            $table->string('email');
            $table->string('city_country');
            
            $table->string('position');
            $table->string('organization');
            $table->string('experience');
            $table->string('qualification')->nullable();
            $table->string('specialization')->nullable();
            
            $table->string('pathway');
            $table->json('levels')->nullable();
            
            $table->string('learning_mode');
            $table->string('schedule');
            
            $table->text('motivation')->nullable();
            $table->text('goals')->nullable();
            
            $table->string('ai_experience');
            $table->string('ai_details')->nullable();
            
            $table->string('signature');
            $table->date('application_date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};

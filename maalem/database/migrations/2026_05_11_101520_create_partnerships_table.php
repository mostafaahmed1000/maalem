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
        Schema::create('partnerships', function (Blueprint $table) {
            $table->id();
            $table->string('school_name');
            $table->json('school_type')->nullable();
            $table->string('address');
            $table->string('city_country');
            $table->string('website')->nullable();
            
            $table->string('contact_name');
            $table->string('contact_position');
            $table->string('contact_mobile');
            $table->string('contact_email');
            
            $table->integer('total_staff')->nullable();
            $table->integer('total_teachers')->nullable();
            $table->json('curriculum')->nullable();
            
            $table->json('pathways')->nullable();
            $table->json('participants')->nullable();
            $table->json('departments')->nullable();
            
            $table->string('delivery_model')->nullable();
            $table->date('start_date')->nullable();
            $table->string('training_period')->nullable();
            $table->json('priorities')->nullable();
            $table->text('notes')->nullable();
            
            $table->string('rep_name');
            $table->string('rep_position');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partnerships');
    }
};

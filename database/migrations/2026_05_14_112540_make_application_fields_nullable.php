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
        Schema::table('applications', function (Blueprint $table) {
            $table->date('dob')->nullable()->change();
            $table->string('nationality')->nullable()->change();
            $table->string('experience')->nullable()->change();
            $table->string('ai_experience')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->date('dob')->nullable(false)->change();
            $table->string('nationality')->nullable(false)->change();
            $table->string('experience')->nullable(false)->change();
            $table->string('ai_experience')->nullable(false)->change();
        });
    }
};

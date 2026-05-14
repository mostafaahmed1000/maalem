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
        Schema::table('partnerships', function (Blueprint $table) {
            $table->string('school_status')->nullable()->after('school_type');
        });

        Schema::table('consultations', function (Blueprint $table) {
            $table->string('school_status')->nullable()->after('school_type');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partnerships', function (Blueprint $table) {
            $table->dropColumn('school_status');
        });

        Schema::table('consultations', function (Blueprint $table) {
            $table->dropColumn('school_status');
        });
    }
};

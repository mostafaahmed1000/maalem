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
            $table->integer('established_years')->nullable()->after('school_status');
        });

        Schema::table('consultations', function (Blueprint $table) {
            $table->integer('established_years')->nullable()->after('school_status');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('partnerships', function (Blueprint $table) {
            $table->dropColumn('established_years');
        });

        Schema::table('consultations', function (Blueprint $table) {
            $table->dropColumn('established_years');
        });
    }
};

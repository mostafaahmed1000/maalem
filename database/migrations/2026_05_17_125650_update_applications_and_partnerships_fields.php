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
            $table->string('rep_name')->nullable()->change();
            $table->string('rep_position')->nullable()->change();
        });

        Schema::table('applications', function (Blueprint $table) {
            $table->string('school_name')->nullable()->after('application_type');
            $table->json('school_type')->nullable()->after('school_name');
            $table->string('school_status')->nullable()->after('school_type');
            $table->string('school_address')->nullable()->after('school_status');
            $table->integer('total_staff')->nullable()->after('participant_count');
            $table->integer('total_teachers')->nullable()->after('total_staff');
            $table->json('curriculum')->nullable()->after('total_teachers');
            $table->json('participants')->nullable()->after('curriculum');
            $table->json('departments')->nullable()->after('participants');
            $table->date('start_date')->nullable()->after('departments');
            $table->json('priorities')->nullable()->after('start_date');
            $table->text('notes')->nullable()->after('priorities');
            $table->string('rep_name')->nullable()->after('notes');
            $table->string('rep_position')->nullable()->after('rep_name');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('applications', function (Blueprint $table) {
            $table->dropColumn([
                'school_name',
                'school_type',
                'school_status',
                'school_address',
                'total_staff',
                'total_teachers',
                'curriculum',
                'participants',
                'departments',
                'start_date',
                'priorities',
                'notes',
                'rep_name',
                'rep_position'
            ]);
        });

        Schema::table('partnerships', function (Blueprint $table) {
            $table->string('rep_name')->nullable(false)->change();
            $table->string('rep_position')->nullable(false)->change();
        });
    }
};

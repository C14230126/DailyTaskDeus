<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->string('priority')->default('Sedang')->after('type');
            $table->string('target_audience')->default('Semua')->after('priority');
            $table->date('end_date')->nullable()->after('target_audience');
        });
    }

    public function down(): void
    {
        Schema::table('announcements', function (Blueprint $table) {
            $table->dropColumn(['priority', 'target_audience', 'end_date']);
        });
    }
};
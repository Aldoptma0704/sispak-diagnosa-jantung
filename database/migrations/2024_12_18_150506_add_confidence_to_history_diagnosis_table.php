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
        Schema::table('history_diagnosis', function (Blueprint $table) {
            $table->float('confidence')->nullable()->after('solusi');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('history_diagnosis', function (Blueprint $table) {
            $table->dropColumn('confidence');
        });
    }
};

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
        Schema::table('sequences', function (Blueprint $table) {
            $table->dropForeign(['term_id']); 
            $table->dropColumn('term_id'); 
        });

        Schema::table('sequences', function (Blueprint $table) {
            $table->string('term')->after('academic_year');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('sequences', function (Blueprint $table) {
            $table->dropColumn('term'); 
        });

        Schema::table('sequences', function (Blueprint $table) {
            $table->foreignId('term_id')->constrained()->onDelete('cascade');
        });
    }
};

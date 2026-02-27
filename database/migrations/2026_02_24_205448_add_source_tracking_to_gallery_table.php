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
        Schema::table('gallery', function (Blueprint $table) {
            // Add source tracking fields to identify where the gallery image came from
            $table->string('source_type')->nullable()->after('image'); // 'manual', 'program', 'project', 'news'
            $table->unsignedBigInteger('source_id')->nullable()->after('source_type'); // ID of the source record
            $table->string('image_type')->nullable()->after('source_id'); // 'cover', 'gallery'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('gallery', function (Blueprint $table) {
            $table->dropColumn(['source_type', 'source_id', 'image_type']);
        });
    }
};

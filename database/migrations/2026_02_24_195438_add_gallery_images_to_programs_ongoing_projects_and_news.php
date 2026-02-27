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
        // Add gallery_images to programs table
        Schema::table('programs', function (Blueprint $table) {
            $table->json('gallery_images')->nullable()->after('image');
        });

        // Add gallery_images to ongoing_project table
        Schema::table('ongoing_project', function (Blueprint $table) {
            $table->json('gallery_images')->nullable()->after('image');
        });

        // Add gallery_images to latest_news table
        Schema::table('latest_news', function (Blueprint $table) {
            $table->json('gallery_images')->nullable()->after('image');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('programs', function (Blueprint $table) {
            $table->dropColumn('gallery_images');
        });

        Schema::table('ongoing_project', function (Blueprint $table) {
            $table->dropColumn('gallery_images');
        });

        Schema::table('latest_news', function (Blueprint $table) {
            $table->dropColumn('gallery_images');
        });
    }
};

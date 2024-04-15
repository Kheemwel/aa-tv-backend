<?php

use App\Models\VideoCategories;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('video_categories', function (Blueprint $table) {
            $table->id();
            $table->string('category_name');
            $table->timestamps();
        });

        VideoCategories::insert([
            [
                'category_name' => 'Live TV',
            ],
            [
                'category_name' => 'News',
            ],
            [
                'category_name' => 'Politics',
            ],
            [
                'category_name' => 'Education',
            ],
            [
                'category_name' => 'Sports',
            ],
            [
                'category_name' => 'Music & Arts',
            ],
            [
                'category_name' => 'Business',
            ]
        ]);

        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->binary('thumbnail');
            $table->binary('video');
            $table->foreignId('video_category_id')->constrained(
                table: 'video_categories'
            );
            $table->timestamps();
        });

        DB::statement("ALTER TABLE videos MODIFY thumbnail MEDIUMBLOB");
        DB::statement("ALTER TABLE videos MODIFY video LONGBLOB");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('videos');
        Schema::dropIfExists('video_categories');
    }
};

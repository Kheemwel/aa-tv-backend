<?php

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
        Schema::create('videos', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->longText('description');
            $table->binary('thumbnail');
            $table->binary('video');
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
    }
};

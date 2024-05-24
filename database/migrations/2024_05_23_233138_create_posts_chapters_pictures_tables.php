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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('team_id');
            $table->string('title')->unique();
            $table->text('image_url');
            $table->text('description');
            $table->string('author');
            $table->timestamps();

            $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        });

        Schema::create('chapters',function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('post_id');
            $table->string('title');
            $table->timestamps();

            $table->foreign('post_id')->references('id')->on('posts')->onDelete('cascade');
        });

        Schema::create('pictures',function(Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chapter_id');
            $table->text('image_url');

            $table->foreign('chapter_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');

        Schema::dropIfExists('chapters');

        Schema::dropIfExists('pictures');
    }
};

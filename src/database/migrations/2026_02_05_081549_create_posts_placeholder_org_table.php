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
        Schema::create('posts_placeholder_org', function (Blueprint $table) {
            $table->id();
            //  slug must be unique for the post but in the dataset many posts have same slug.
            $table->string('slug');
            $table->string('url');
            $table->string('title');
            $table->text('content');
            $table->string('image')->nullable();
            $table->string('thumbnail')->nullable();
            $table->string('status')->default('draft');
            $table->string('category')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->timestamp('updated_at_api')->nullable();
            $table->unsignedBigInteger('user_id')->index();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_placeholder_org');
    }
};

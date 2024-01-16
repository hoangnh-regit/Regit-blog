<?php

use App\Models\Blog;
use App\Models\User;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create(
            'blogs',
            function (Blueprint $table) {
                $table->id();
                $table->bigInteger('user_id');
                $table->string('title', 255);
                $table->text('content');
                $table->string('img', 255)->nullable();
                $table->bigInteger('category_id');
                $table->boolean('status')->default(Blog::STATUS_INACTIVE);
                $table->timestamps();
            }
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};

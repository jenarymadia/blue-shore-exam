<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('votes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('album_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('vote', ['up', 'down']);
            $table->timestamps();

            $table->unique(['album_id', 'user_id']); // One vote per user per album
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};

<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('news_place', function (Blueprint $table) {
            $table->id();

            $table->foreignId('news_id')->constrained()->cascadeOnDelete();
            $table->foreignId('place_id')->constrained()->cascadeOnDelete();

            $table->unique(['news_id', 'place_id']);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('news_place');
    }
};

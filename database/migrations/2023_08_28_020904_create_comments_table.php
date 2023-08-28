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
        //  php artisan make:model Comment -cmf
        // php artisan migrate
        Schema::create('comments', function (Blueprint $table) {
            $table->id();
            $table->string('content');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->morphs('commentable');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};

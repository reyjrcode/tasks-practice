<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tasks', function (Blueprint $table) {
            // php artisan make:model Task -cm
            // composer dump-autoload
            // php artisan tinker
            // $task = new Task()
            // $task -> title = 'Do my homework'
            // $task->save()
            $table->id();
            $table->string('title');
            $table->boolean('is_done')->default(false);
            // $table->foreignId('creator_id')->constrained('users');
            $table->foreignId('creator_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('project_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
            // not changes timestamp in migration
            // delete create_project migration
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
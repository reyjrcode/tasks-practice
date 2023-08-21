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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            // $table->foreignId('creator_id')->constrained('users');
            $table->foreignId('creator_id')->constrained('users')->cascadeOnDelete();
            $table->timestamps();
            // php artisan tinker
            // $p = Project::factory()->create()
            // Task::factory()->for($p)->create()
            // $p->delete()
            // Task::withoutGlobalScopes()->find(1)
            // $u = User::find(2)
            // $u->delete(1)
            // Task::withGlobalScopes()->find(1)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
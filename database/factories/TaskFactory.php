<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //php artisan make:factory TaskFactory --model=Task
            // php artisan tinker
            // Task::factory(50)->create()
            // {{DOMAIN}}/api/tasks?page=2
            
            'title'=> $this->faker->sentence(),
            'is_done'=> false,
            'creator_id'=>User::factory(),
            
        ];
    }
}

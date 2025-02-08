<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPSTORM_META\elementType;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\RecentActivity>
 */
class RecentActivityFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            //
            'user_id' => User::whereIn('role', ['teacher', 'admin'])->inRandomOrder()->first()?->id,
            'activity_type' => $this->faker->randomElement(['New User Added', 'New User Created', 'New User Updated', 'New User Deleted']),
            'details' => $this->faker->sentence(),
            'icon_type' => $this->faker->randomElement(['fas fa-user-edit', 'fas fa-user-plus', 'fas fa-user-times']),
            'color_type' => $this->faker->randomElement(['primary', 'secondary', 'success', 'danger', 'warning']),
        ];
    }
}

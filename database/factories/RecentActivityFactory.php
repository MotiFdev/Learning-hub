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
            'activity_type' => $this->faker->randomElement(['login', 'user_updated', 'created_post', 'deleted_post']),
            'details' => $this->faker->sentence(),
        ];
    }
}

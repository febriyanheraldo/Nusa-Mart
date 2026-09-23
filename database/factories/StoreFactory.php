<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<Store>
 */
class StoreFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $name = fake()->company() . ' Store';
        return [
            // Mengambil User dengan role seller yang sudah ada, atau membuat baru
            'user_id' => User::where('role', 'seller')->inRandomOrder()->first()?->id ?? User::factory()->create(['role' => 'seller'])->id,
            'name' => $name,
            'slug' => Str::slug($name) . '-' . Str::random(5),
            'description' => fake()->paragraph(),
            'status' => 'active',
        ];
    }
}

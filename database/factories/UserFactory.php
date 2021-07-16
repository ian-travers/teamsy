<?php

namespace Database\Factories;

use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'role' => 'admin',
            'email_verified_at' => now(),
            'password' => bcrypt('1qaz2wsx'),
            'remember_token' => Str::random(10),
            'tenant_id' => Tenant::factory(),
        ];
    }

    public function unverified(): Factory
    {
        return $this->state(fn() => [
            'email_verified_at' => null,
        ]);
    }
}

<?php

namespace Database\Factories;

use App\Models\Login;
use App\Models\Tenant;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class LoginFactory extends Factory
{
    protected $model = Login::class;

    public function definition()
    {
        $randomDateTime = $this->faker->dateTimeBetween('-6 hours');

        return [
            'user_id' => User::factory(),
            'created_at' => $randomDateTime,
            'updated_at' => $randomDateTime,
            'tenant_id' => Tenant::factory(),
        ];
    }
}

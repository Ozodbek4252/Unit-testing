<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition()
    {
        $name = $this->faker->firstName;

        return [
            'name' => $name,
            'last_name' => $this->faker->lastName,
            'phone' => $this->faker->phoneNumber,
            'email' => $name.Str::random(4).'@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'.$name), // password + name
            'remember_token' => Str::random(10),
        ];
    }
}

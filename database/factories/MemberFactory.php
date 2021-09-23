<?php

namespace Database\Factories;

use App\Models\Member;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MemberFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Member::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $username = Str::lower($this->faker->firstName() . $this->faker->lastName());
        return [
            'username'  => $username,
            'password'  => Hash::make($username),
            'balance'   => $this->faker->randomNumber()
        ];
    }
}
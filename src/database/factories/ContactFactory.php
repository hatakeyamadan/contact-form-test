<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $firstNames = ['佐藤', '鈴木', '高橋', '田中', '伊藤', '渡辺', '山本', '中村', '小林', '西村'];
        $lastNames = ['直樹', '一郎', '俊', '美玖', '咲', 'さくら', '里香', '大輔', 'よしき', '葵'];

        return [
            'category_id' => $this->faker->numberBetween(1,5),
            'first_name' => $this->faker->randomElement($firstNames),
            'last_name' => $this->faker->randomElement($lastNames),
            'gender' => $this->faker->numberBetween(1,3),
            'email' => $this->faker->safeEmail(),
            'tel' => str_replace('-', '', $this->faker->phoneNumber()),
            'address' => mb_substr($this->faker->address(), 9),
            'detail' => $this->faker->text(100),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}

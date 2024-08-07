<?php

namespace Database\Factories;

use App\Models\HolidayPlan;
use Illuminate\Database\Eloquent\Factories\Factory;

class HolidayPlanFactory extends Factory
{
    protected $model = HolidayPlan::class;

    public function definition()
    {
        return [
            'title' => $this->faker->sentence,
            'description' => $this->faker->paragraph,
            'date' => $this->faker->date,
            'location' => $this->faker->address,
            'participants' => json_encode($this->faker->randomElements(['John Doe', 'Jane Doe', 'Alice', 'Bob'], $this->faker->numberBetween(0, 4))),
        ];
    }
}
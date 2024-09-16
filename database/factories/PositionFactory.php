<?php

namespace Database\Factories;

use App\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PositionFactory extends Factory
{
    protected $model = Position::class; 
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'hr_id' => $this->faker->randomElement([1,3]),
            'number_of_employees' => $this->faker->numberBetween(1, 9), // رقم عشوائي بين 1 و 10
            'job_title' => $this->faker->jobTitle(), // وظيفة عشوائية
            'job_description' => $this->faker->text(), // نص عشوائي
            'company_about' => $this->faker->text(), // نص عشوائي
            'job_requirements' => $this->faker->text(), // نص عشوائي
            'experience_years' => $this->faker->randomElement(['0-1', '1-3', '3-5', '5-10', '+10']), // اختيار عشوائي من السنوات
            'salary' => $this->faker->numberBetween(200, 5000) . ' USD',
            'salary_period' => $this->faker->randomElement(['month', 'year']),
            'employment_type' => $this->faker->randomElement(['full_time', 'part_time', 'contract','remote', 'temporary', 'training', 'Fresh-graduate']), // نوع التوظيف عشوائي
            'section_id' => $this->faker->randomElement([1,2]),
            'url' => $this->faker->randomElement([null, 'https://www.google.co.uk/']), // قيمة عشوائية بين null والرابط
        ];
    }
}

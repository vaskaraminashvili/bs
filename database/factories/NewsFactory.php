<?php

namespace Database\Factories;

use App\Enums\NewsStatus;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{

    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     * protected $model = News::class;
     */

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'title' => $this->generateTranslatableField(['ka', 'en']),
            'slug' => $this->faker->slug(),
            'description' => $this->generateTranslatableField(['ka', 'en']),
            'short_desc' => $this->generateTranslatableField(['ka', 'en']),
            'video_link' => $this->faker->word(),
            'author_id' => User::factory(),
            'status' => $this->faker->randomElement(NewsStatus::class),
            'publish_date' => $this->faker->dateTime(),
        ];
    }


    protected function generateTranslatableField(
        array $locales,
        $number = 4
    ): array {
        $field = [];
        foreach ($locales as $locale) {
            $field[$locale]
                = $this->faker->sentence($number); // Generate fake data for each locale
        }
        return $field;
    }

}

<?php

namespace Database\Factories;
use app\Models\Book;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BookFactory extends Factory
{

    protected $model = Book::class;
    /**
     * Define the model's default state.
     * 
     *
     * @return array
     */

    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'publisher' => $this->faker->name,
            'abstract' => $this->faker->text(),

        ];
    }
}

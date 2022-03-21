<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Book::factory()
                ->times(3)
                ->create();
        //
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BooksCategories;

class BooksCategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        BooksCategories::create([
            'books_id' => 1,
            'categories_id' => 1,
        ]);
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Books;

class BooksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Books::create([
            'title' => 'Book 1',
            'authors_id' => 1,
            'publishers_id' => 1,
            'number_of_pages' => 200,
        ]);
    }
}

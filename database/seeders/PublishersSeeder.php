<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Publishers;

class PublishersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Publishers::create([
            'name' => 'Publisher 1',
        ]);
    }
}

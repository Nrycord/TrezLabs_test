<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Authors;

class AuthorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Authors::create([
            'first_name' => 'Carlos',
            'last_name' => 'Cordero',
            'birthday' => '07/11/2001',
        ]);
    }
}

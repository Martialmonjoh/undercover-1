<?php

namespace Database\Seeders;

use App\Models\Word;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Word::factory(10)->create();

        Word::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}

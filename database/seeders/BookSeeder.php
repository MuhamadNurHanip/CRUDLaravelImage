<?php

namespace Database\Seeders;

use App\Models\Books;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * 
     * @return void
     */

    public function run()
    {
        Books::create([
            'judul' => 'Tutorial Lolos Play Off MPL',
            'pengarang' => 'Rizqi Yassar',
            'penerbit' => 'Gramedia',
        ]);
    }
}

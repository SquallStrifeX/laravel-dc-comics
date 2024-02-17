<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ComicSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comics = include 'config/comics.php';

        foreach ($comics as $comic) {
            \App\Models\Comic::create([
                'title' => $comic['title'],
                'description' => $comic['description'],
                'thumb' => $comic['thumb'],
                'price' => $comic['price'],
                'series' => $comic['series'],
                'sale_date' => $comic['sale_date'],
                'type' => $comic['type'],
                'artists' => json_encode($comic['artists']), // Converti l'array in stringa JSON
                'writers' => json_encode($comic['writers']), // Converti l'array in stringa JSON
            ]);

    }
}}

<?php

namespace Database\Seeders;

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = [
            ['name' => 'Мода'],
            ['name' => 'Стил'],
            ['name' => 'Тренд'],
            ['name' => 'Опуштено'],
            ['name' => 'Формално'],
            ['name' => 'Додатоци'],
            ['name' => 'Обувки'],
            ['name' => 'Торби'],
            ['name' => 'Накит'],
            ['name' => 'Убавина'],
            ['name' => 'Нега на кожа'],
            ['name' => 'Шминка'],
            ['name' => 'Нега на коса'],
            ['name' => 'Здравје'],
            ['name' => 'Фитнес']
        ];

        // Insert data into the tags table
        foreach ($tags as $tag) {
            Tag::create($tag);
        }
    }
}

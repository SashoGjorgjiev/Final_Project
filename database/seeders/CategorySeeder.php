<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            'Горници и маици',
            'Фустан',
            'Ролка',
            'Панталони и фармерки',
            'Сукњи',
            'Јакни и палта',
            'Дуксери и џемпери',
            'Активни облеки',
            'Костими за капење',
            'ноќни облеки',
            'Формална облека',
            'Работна облека',
            'Бременосна облека',
            'Облека за поголеми големини',
            'Винтиџ облека',
            'Костими и косплеј',
        ];

        foreach ($categories as $category) {
            DB::table('category')->insert([
                'name' => $category,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}

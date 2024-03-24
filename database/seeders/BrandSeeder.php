<?php

namespace Database\Seeders;

use App\Models\Brand;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BrandSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $brands = [
            ['name' => 'Nike'],
            ['name' => 'Adidas'],
            ['name' => 'Zara'],
            ['name' => 'H&M'],
            ['name' => 'Gucci'],
            ['name' => 'Louis Vuitton'],
            ['name' => 'Levi\'s'],
            ['name' => 'Calvin Klein'],
            ['name' => 'Puma'],
            ['name' => 'Tommy Hilfiger'],
            ['name' => 'Versace'],
            ['name' => 'Chanel'],
            ['name' => 'Fendi'],
            ['name' => 'Balenciaga'],
            ['name' => 'Prada'],
            ['name' => 'Dior'],
            ['name' => 'Burberry'],
            ['name' => 'Under Armour'],
            ['name' => 'Ralph Lauren'],
            ['name' => 'Armani']
        ];

        foreach ($brands as $brand) {
            Brand::create($brand);
        }
    }
}

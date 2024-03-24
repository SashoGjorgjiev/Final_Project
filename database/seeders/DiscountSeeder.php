<?php

namespace Database\Seeders;

use App\Models\Discount;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DiscountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $discounts = [
            ['code' => 'DISCOUNT10', 'amount' => 10.00],
            ['code' => 'SALE15', 'amount' => 15.00],
            ['code' => 'HALFOFF', 'amount' => 50.00],
            ['code' => 'SUMMER', 'amount' => 20.00],
            ['code' => 'FALL', 'amount' => 25.00],
            ['code' => 'SPRING', 'amount' => 30.00],
            ['code' => 'WINTER', 'amount' => 40.00],
        ];

        // Insert data into the discounts table
        foreach ($discounts as $discount) {
            Discount::create($discount);
        }
    }
}

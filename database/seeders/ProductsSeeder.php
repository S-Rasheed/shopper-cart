<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create sample products
        Product::create([
            'image' => 'https://m.media-amazon.com/images/I/81cfIW5+p7L._AC_SX522_.jpg',
            'name' => 'Apple 2025 MacBook Pro Laptop with M5 chip ',
            'description' => 'SUPERCHARGED BY M5 — The 14-inch MacBook Pro with M5 brings next-generation speed and powerful on-device AI to personal, professional, and creative tasks',
            'price' => 1781,
            'stock_quantity' => 3,
        ]);

        Product::create([
            'image' => 'https://m.media-amazon.com/images/I/71Z401LjFFL._AC_SY300_SX300_QL70_FMwebp_.jpg',
            'name' => 'Instant Pot Duo 7-in-1 Electric Pressure Cooker',
            'description' => '7 Cooking Functions: Pressure cook, slow cook, sauté, steam, make rice, yogurt, or simply keep your meal warm—all in one appliance',
            'price' => 79.99,
            'stock_quantity' => 2,
        ]);

        Product::create([
            'image' => 'https://m.media-amazon.com/images/I/71BQpA02w1L._AC_UL480_FMwebp_QL65_.jpg',
            'name' => 'CHRLEISURE Leggings with Pockets for Women',
            'description' => 'High Waisted Tummy Control Workout Yoga Pants',
            'price' => 55.99,
            'stock_quantity' => 20,
        ]);

        Product::create([
            'image' => 'https://m.media-amazon.com/images/I/81ZKXC3OcVL._SX466_.jpg',
            'name' => 'Graco Slimfit 3-in-1 Convertible Car Seat',
            'description' => 'Ultra-Space-Saving Design, Jarret, Suitable for Rear and Forward-Facing, Highback Booster Seat with 10-Position Headrest',
            'price' => 239.99,
            'stock_quantity' => 5,
        ]);

        Product::create([
            'image' => 'https://m.media-amazon.com/images/I/71ciRkzjncL._AC_SY300_SX300_QL70_FMwebp_.jpg',
            'name' => 'Lifezone Queen Bed Frame with 2-Tier Storage Headboard',
            'description' => 'Metal Platform Bed Frame with 4 Storage Drawers, Built in Charging Station & LED',
            'price' => 209.99,
            'stock_quantity' => 1,
        ]);

        Product::create([
            'image' => 'https://m.media-amazon.com/images/I/81Qs0R-Q1KL._AC_SY300_SX300_QL70_FMwebp_.jpg',
            'name' => '11 Pack Refrigerator Organizers and Storage',
            'description' => 'Stackable Fridge Organizer Bins, BPA-Free Clear Plastic Fruit Storage Containers for Fridge',
            'price' => 21.98,
            'stock_quantity' => 1,
        ]);
    }
}

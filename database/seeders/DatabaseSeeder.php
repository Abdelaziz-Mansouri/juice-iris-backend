<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\Admin::updateOrCreate(
            ['email' => 'admin@juiceiris.com'],
            [
                'name' => 'Admin',
                'password' => \Illuminate\Support\Facades\Hash::make('Juice@@iris@@2026'),
            ]
        );

        $category = \App\Models\Category::updateOrCreate(['name' => 'Juices']);

        \App\Models\Product::updateOrCreate(
            ['name' => 'Orange Juice'],
            [
                'price' => 15.00,
                'category_id' => $category->id,
                'discount' => 10,
            ]
        );
    }
}

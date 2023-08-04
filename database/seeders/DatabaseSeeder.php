<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\CategoryProduct;
use App\Models\Favorite;
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
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        Favorite::factory()
            ->count(1)
            ->forUser([
                'name' => 'Jessica Archer',
            ])
            ->forProduct([
                'name' => 'Bow for user',
            ])
            ->create();

        CategoryProduct::factory()
            ->count(1)
            ->forCustomCategory([
                'name' => 'weapon'
            ])
            ->forProduct([
                'name' => 'Bow for category'
            ])
            ->create();

    }
}

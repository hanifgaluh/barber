<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Staff;
use App\Models\Booking;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        Booking::create([
            'name_customer' => 'hanif',
            'email' => 'hanif@gmail.com',
            'time' => '09:00:00',
            'date' => '2024-02-13',
            'name_hair_artis' => 'Hair Artist 1',
            'price' => 50,

        ]);
        Booking::create([
            'name_customer' => 'galuh',
            'email' => 'galuh@gmail.com',
            'time' => '09:00:00',
            'date' => '2024-02-13',
            'name_hair_artis' => 'Hair Artist 1',
            'price' => 50,

        ]);
        Staff::create([
            'name' => 'rohim',
            'photo' => 'img',
            'description' => 'about staff',
            'price' => '50.000',
            'loc_store' => 'Bandung',
            'email' => 'awok@gmail.com',

        ]);
        Staff::create([
            'name' => 'rohimuu',
            'photo' => 'img',
            'description' => 'about staff',
            'price' => '50000',
            'loc_store' => 'Jakarta',
            'email' => 'ok@gmail.com',

        ]);

        Staff::create([
            'name' => 'rohimuu',
            'photo' => 'img',
            'description' => 'about staff',
            'price' => '50000',
            'email' => 'awikwok@gmail.com',
            'loc_store' => 'Jakarta',
        ]);

        Staff::create([
            'name' => 'rohimuu',
            'photo' => 'img',
            'description' => 'about staff',
            'price' => '50000',
            'loc_store' => 'Jakarta',
            'email' => 'awikwok@gmail.com',
        ]);
    }
}

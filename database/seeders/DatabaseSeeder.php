<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Staff;
use App\Models\Booking;
use App\Models\User;
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

        User::create([
            'name' => 'jarwo',
            'email' => 'jarwo@gmail.com',
            'password' => 'password',

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
        
        Booking::create([
            'user_id' => auth()->id(),
            'time' => '09:00:00',
            'date' => '2024-02-13',
            'price' => 50,
        
        ]);
        Booking::create([
            'user_id' => auth()->id(),
            'time' => '09:00:00',
            'date' => '2024-02-13',
            'price' => 50,
        
        ]);
    }
}

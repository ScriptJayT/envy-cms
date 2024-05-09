<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\HistoryPoint;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        HistoryPoint::factory()->create([
            'user_id' => 1,
            'details' => 'Envy Setup',
        ]);

        User::factory()->create([
            'handle' => '@EnvySystem',
            'name' => 'System',
            'password' => Hash::make(Str::random(20)),
            'profile_picture' => 'system.svg',
            'email' => 'jt.scripter+envy@gmail.com',
        ]);
        HistoryPoint::factory()->create([
            'user_id' => 1,
            'details' => 'User Created: @EnvySystem',
        ]);

        User::factory()->create([
            'handle' => '@DevJace',
            'name' => 'Test Dev User',
            'email' => 'test@example.com',
        ]);
        HistoryPoint::factory()->create([
            'user_id' => 1,
            'details' => 'User Created: @DevJace',
        ]);

        User::factory()->create([
            'handle' => '@AdminJace',
            'name' => 'Test Admin User',
            'email' => 'test@example.com',
        ]);
        HistoryPoint::factory()->create([
            'user_id' => 1,
            'details' => 'User Created: @AdminJace',
        ]);
       
    }
}

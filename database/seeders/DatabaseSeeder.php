<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserSetting;
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
            'details' => 'Envy Init',
        ]);

        $setting_t = UserSetting::factory()->create(['name' => "prefered-theme"]);
        $setting_a = UserSetting::factory()->create(['name' => "accent-theme"]);
        UserSetting::factory()->create(['name' => "screen-reader"]);

        User::factory()->create([
            'handle' => '@EnvySystem',
            'name' => 'System',
            'password' => Hash::make(Str::random(20)),
            'profile_picture' => 'system.svg',
            'email' => 'jt.scripter+envy@gmail.com',
        ]);
        $dev = User::factory()->create([
            'handle' => '@DevJace',
            'name' => 'Test Dev User',
            'email' => 'test@example.com',
        ]);
        $dev->userSettings()->attach($setting_t->id, ['value' => 'dark', 'created_at' => now(), 'updated_at' => now()]);
        $dev->userSettings()->attach($setting_a->id, ['value' => 'pride', 'created_at' => now(), 'updated_at' => now()]);
        User::factory()->create([
            'handle' => '@AdminJace',
            'name' => 'Test Admin User',
            'email' => 'test@example.com',
        ]);
        HistoryPoint::factory()->create([
            'user_id' => 1,
            'details' => 'System Users Created: @EnvySystem, @DevJace, @AdminJace',
        ]);
    }
}

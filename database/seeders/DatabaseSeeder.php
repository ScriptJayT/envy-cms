<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserSetting;
use App\Models\HistoryPoint;
use App\Models\Team;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use PHPUnit\Event\Telemetry\System;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // System Init
        $system = User::factory()->create([
            'handle' => '@EnvySystem',
            'name' => 'System',
            'password' => Hash::make(Str::random(20)),
            'profile_picture' => 'system.svg',
            'email' => 'jt.scripter+envy@gmail.com',
        ]);
        HistoryPoint::factory()->create([
            'user_id' => $system->id,
            'details' => 'Envy Init',
        ]);

        // Teams Setup
        $team_d = Team::factory()->create(['name' => 'Dev']);
        $team_a = Team::factory()->create(['name' => 'Admin']);
        $team_b = Team::factory()->create(['name' => 'Blocks']);
        $team_s = Team::factory()->create(['name' => 'SEO']);

        // Settings Setup
        $setting_t = UserSetting::factory()->create(['name' => "prefered-theme"]);
        $setting_a = UserSetting::factory()->create(['name' => "accent-theme"]);
        UserSetting::factory()->create(['name' => "screen-reader"]);
        UserSetting::factory()->create(['name' => "animations"]);

        // Build Users
        $dev = User::factory()->create([
            'handle' => '@DevJace',
            'name' => 'Test Dev User',
            'email' => 'test@example.com',
        ]);
        $dev->settings()->attach($setting_t->id, ['value' => 'dark', 'created_at' => now(), 'updated_at' => now()]);
        $dev->settings()->attach($setting_a->id, ['value' => 'pride', 'created_at' => now(), 'updated_at' => now()]);
        $dev->teams()->attach($team_d->id, ['created_at' => now(), 'updated_at' => now()]);
        $dev->teams()->attach($team_a->id, ['created_at' => now(), 'updated_at' => now()]);
        $dev->teams()->attach($team_b->id, ['created_at' => now(), 'updated_at' => now()]);
        $dev->teams()->attach($team_s->id, ['created_at' => now(), 'updated_at' => now()]);

        HistoryPoint::factory()->create([
            'user_id' => $system->id,
            'details' => 'System Users Created: @EnvySystem, @DevJace',
        ]);

        // Dummy Data for Tests
        $admin = User::factory()->create([
            'handle' => '@AdminJace',
            'name' => 'Test Admin User',
            'email' => 'test@example.com',
        ]);
        $admin->settings()->attach($setting_t->id, ['value' => 'light', 'created_at' => now(), 'updated_at' => now()]);
        $admin->settings()->attach($setting_a->id, ['value' => 'wrath', 'created_at' => now(), 'updated_at' => now()]);
        $admin->teams()->attach($team_a->id, ['created_at' => now(), 'updated_at' => now()]);
        $admin->teams()->attach($team_b->id, ['created_at' => now(), 'updated_at' => now()]);
        $admin->teams()->attach($team_s->id, ['created_at' => now(), 'updated_at' => now()]);
    }
}

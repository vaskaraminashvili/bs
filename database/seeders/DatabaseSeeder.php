<?php

namespace Database\Seeders;

use App\Enums\UserRoles;
use App\Models\Category;
use App\Models\News;
use App\Models\Place;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{

    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => UserRoles::Admin,
            'password' => bcrypt('password'),
        ]);

        Place::factory()->create([
            'title' => 'Popular',
            'status' => 1,
        ]);
        Place::factory()->create([
            'title' => 'Slider',
            'status' => 0,
        ]);

    }

}

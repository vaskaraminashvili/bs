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

        Place::factory()->create([
            'title' => 'Popular',
            'status' => 1,
        ]);
        Place::factory()->create([
            'title' => 'Slider',
            'status' => 1,
        ]);

        //        insert categories from old project and repeat same id as it was there
        $categories = DB::table('categories_live')
            ->orderBy('sort', 'desc')
            ->get();
        foreach ($categories as $category) {
            $hidden = intval(!$category->main);
            $parent = Category::create([
                "id" => $category->id,
                "title" => [
                    "ka" => $category->title_ka,
                    "en" => $category->title_en
                ],
                "slug" => str()->slug($category->title_en),
                "description" => [
                    "ka" => $category->title_ka . " category description",
                    "en" => $category->title_en . " category description"
                ],
                "hidden" => $hidden,
                "status" => true,
                "sort" => $category->sort,
            ]);
        }


        //        insert user from old project
        $users = DB::table('admins')
            ->orderBy('id', 'asc')
            ->get();
        foreach ($users as $user) {
            User::factory()->create([
                'name' => $user->name,
                'email' => \Str::slug($user->name, '_') . '@bpi.ge',
                'role' => UserRoles::Admin,
                'password' => bcrypt('password'),
            ]);
        }

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@admin.com',
            'role' => UserRoles::Admin,
            'password' => bcrypt('password'),
        ]);

    }

}

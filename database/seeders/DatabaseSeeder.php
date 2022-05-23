<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        // User::truncate();
        // Category::truncate();
        // Blog::truncate();

        // User::factory(1)->create();

        $this->call(AdminSeeder::class);

        $mgmg = User::factory()->create(['name'=>"Mg Mg", 'username'=>"mgmg"]);
        $aungaung = User::factory()->create(['name'=>"Aung Aung", 'username'=>"aungaung"]);
        $frontend = Category::factory()->create([ 'name'=>"Frontend", 'slug'=>"frontend" ]);
        $backend = Category::factory()->create([ 'name'=>"Backend", 'slug'=>"backend" ]);

        Blog::factory(2)->create(['category_id'=>$frontend->id, 'user_id'=>$mgmg->id]);
        Blog::factory(2)->create(['category_id'=>$backend->id, 'user_id'=>$aungaung->id]);
    }
}

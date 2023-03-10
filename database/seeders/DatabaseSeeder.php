<?php

namespace Database\Seeders;

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
        \App\Models\Article::factory(20)->create();
        \App\Models\Comment::factory(20)->create();


        $catlist = ["General", "Technology", "Basic","Language","Programming"];
        foreach($catlist as $name){
            \App\Models\Category::create([
                "name" => $name
            ]);
        }

        \App\Models\User::factory()->create([
            "name" => "Alice",
            "email" => "alice@gmail.com"
        ]);

        \App\Models\User::factory()->create([
            "name" => "Bob",
            "email" => "bob@gmail.com"
        ]);

    }
}

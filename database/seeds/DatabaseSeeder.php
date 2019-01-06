<?php

use App\Tag;
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
        Tag::create([
            'name' => 'Laravel',
            'slug' => 'laravel'
        ]);

        Tag::create([
            'name' => 'Javascript',
            'slug' => 'javascript'
        ]);
    }
}

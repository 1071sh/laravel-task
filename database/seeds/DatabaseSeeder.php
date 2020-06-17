<?php

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
        // DatabaseSeeder.phpで使用するSeederファイルを指定する
        $this->call(AgesTableSeeder::class);
    }
}

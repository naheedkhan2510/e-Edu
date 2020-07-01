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
        // this'll seed QA table.
        $this->call(QATableSeeder::class);
        $this->call(VTableSeeder::class);
    }
}

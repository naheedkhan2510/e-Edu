<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('video_tables')->truncate();
        DB::table('video_tables')->insert([

            // Copy the below code to feed all questions in database.
            [
                'Type' => 'Java Basic',
                'url' => 'JavaTutorial1.mp4',
            ],
            [
                'Type' => 'Java Basic',
                'url' => 'JavaTutorial2.mp4',
            ],
            [
                'Type' => 'Java Basic',
                'url' => 'JavaTutorial3.mp4',
            ],
            [
                'Type' => 'Java Medium',
                'url' => 'JavaTutorial4.mp4',
            ],
            [
                'Type' => 'Java Medium',
                'url' => 'JavaTutorial5.mp4',
            ],
            [
                'Type' => 'Java Medium',
                'url' => 'JavaTutorial6.mp4',
            ],
            [
                'Type' => 'Java High',
                'url' => 'JavaTutorial7.mp4',
            ],
            [
                'Type' => 'Java High',
                'url' => 'JavaTutorial8.mp4',
            ],
            [
                'Type' => 'DSA Basic',
                'url' => 'DSA1.mp4',
            ],
            [
                'Type' => 'DSA Basic',
                'url' => 'DSA2.mp4',
            ],
            [
                'Type' => 'DSA Basic',
                'url' => 'DSA3.mp4',
            ],
            [
                'Type' => 'DSA Medium',
                'url' => 'DSA4.mp4',
            ],
            [
                'Type' => 'DSA Medium',
                'url' => 'DSA5.mp4',
            ],
            [
                'Type' => 'DSA Medium',
                'url' => 'DSA6.mp4',
            ],
            [
                'Type' => 'DSA High',
                'url' => 'DSA7.mp4',
            ],
            [
                'Type' => 'DSA High',
                'url' => 'DSA8.mp4',
            ],
            [
                'Type' => 'DSA High',
                'url' => 'DSA9.mp4',
            ],
            [
                'Type' => 'ML Basic',
                'url' => 'ML1.mp4',
            ],
            [
                'Type' => 'ML Basic',
                'url' => 'ML2.mp4',
            ],
            [
                'Type' => 'ML Basic',
                'url' => 'ML3.mp4',
            ],
            [
                'Type' => 'ML Medium',
                'url' => 'ML4.mp4',
            ],
            [
                'Type' => 'ML Medium',
                'url' => 'ML5.mp4',
            ],
            [
                'Type' => 'ML Medium',
                'url' => 'ML6.mp4',
            ],
            [
                'Type' => 'ML High',
                'url' => 'ML7.mp4',
            ],
            [
                'Type' => 'ML High',
                'url' => 'ML8-1.mp4',
            ],
            [
                'Type' => 'ML High',
                'url' => 'ML8-2.mp4',
            ],
            [
                'Type' => 'ML High',
                'url' => 'ML9.mp4',
            ],
        ]);
    }
}

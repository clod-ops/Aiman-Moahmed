<?php

use Illuminate\Database\Seeder;

class PlaygroundSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Playground::class, 5)->create();
    }
}

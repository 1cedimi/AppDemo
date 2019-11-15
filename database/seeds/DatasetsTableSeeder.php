<?php

use Illuminate\Database\Seeder;

class DatasetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      factory(\App\Dataset::class, 500)->create();
    }
}
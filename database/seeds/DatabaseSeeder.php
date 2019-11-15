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
      factory(App\User::class, 2)->create();
      factory(App\Chart::class, 15)->create()->each(function ($chart) {
        $chart->dataset()->createMany
        (factory(App\Dataset::class, 50)->make()->toArray());
      });
      
      /* factory(App\Dataset::class, 100)->create(); */

      /* $this->call([
        UsersTableSeeder::class,
        ChartsTableSeeder::class,
        DatasetsTableSeeder::class,
      ]) */
      
    }
}
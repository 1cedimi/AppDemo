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
      $this->call([RolesTableSeeder::class]);

      /* $this->call([UsersTableSeeder::class]);
      factory(\App\User::class, 4)->create()->each(function ($user) {
        $user->role()->attach(2); //2 is for 'user' role
      }); */

      factory(\App\Chart::class, 5)->create()->each(function ($chart) {
        $chart->dataset()->createMany
        (factory(\App\Dataset::class, 100)->make()->toArray());
      });

      factory(\App\Chart::class, 5)->create()->each(function ($chart) {
        $chart->dataset()->createMany
        (factory(\App\Dataset::class, 100)->states('warning')->make()->toArray());
      });
      
      factory(\App\Chart::class, 5)->create()->each(function ($chart) {
        $chart->dataset()->createMany
        (factory(\App\Dataset::class, 100)->states('safe')->make()->toArray());
      });
            
      /* $this->call([
        UsersTableSeeder::class,
        ChartsTableSeeder::class,
        DatasetsTableSeeder::class,
      ]); */
      
    }
}
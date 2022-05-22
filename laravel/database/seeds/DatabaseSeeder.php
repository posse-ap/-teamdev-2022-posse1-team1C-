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
    $this->call(ThreadsTableSeeder::class);
    $this->call(ChatsTableSeeder::class);
    $this->call(MentorsTableSeeder::class);
    $this->call(UsersTableSeeder::class);
  }
}

<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {
  public function run() {
    // $this->call(UsersTableSeeder::class);
    $this->call(ClientsSeederTable::class);
    $this->call(PlatformsSeederTable::class);
    $this->call(DevelopmentStatusesSeederTable::class);
    $this->call(PaymentMethodsSeederTable::class);
    $this->call(ProjectsSeederTable::class);
  }
}


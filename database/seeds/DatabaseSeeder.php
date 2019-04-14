<?php

use Illuminate\Database\Seeder;
use App\PaymentMethod;
use App\Platform;
use App\DevelopmentStatus;
use App\Client;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        PaymentMethod::create([
          'name' => 'Paypal',
          'url' => 'https://paypal.com',
          'logo' => 'null'
        ]);

        PaymentMethod::create([
          'name' => 'Uphold',
          'url' => 'https://uphold.com',
          'logo' => 'null'
        ]);

        PaymentMethod::create([
          'name' => 'Payoneer',
          'url' => 'https://payoneer.com',
          'logo' => 'null'
        ]);


        Platform::create([
          'name'=> 'Móvil',
          'icon'=> 'mobile',
          'description'=> 'Móvil'
        ]);

        Platform::create([
          'name'=> 'Web',
          'icon'=> 'globe',
          'description'=> 'Web'
        ]);

        Platform::create([
          'name'=> 'API',
          'icon'=> 'usb',
          'description'=> 'API'
        ]);

        DevelopmentStatus::create([
          'name' => 'idea'
        ]);

        DevelopmentStatus::create([
          'name' => 'boceto'
        ]);

        DevelopmentStatus::create([
          'name' => 'incompleto'
        ]);

        DevelopmentStatus::create([
          'name' => 'rediseño'
        ]);

        DevelopmentStatus::create([
          'name' => 'completo'
        ]);

        Client::create([
          'name' => 'Pablo Mayans',
          'email' => 'pmayans@gmail.com',
          'phone_number' => '0414678767',
          'country' => 'AR'
        ]);
    }
}

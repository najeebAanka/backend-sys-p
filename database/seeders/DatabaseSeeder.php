<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use DB;
use Illuminate\Support\Facades\Artisan;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
             // \App\Models\User::factory(10)->create();
        
    $client = new \Laravel\Passport\ClientRepository();

    $client->createPasswordGrantClient(null, 'Default password grant client', 'http://your.redirect.path');
    $client->createPersonalAccessClient(null, 'Default personal access client', 'http://your.redirect.path');
    
    
DB::update('ALTER TABLE users AUTO_INCREMENT='.(100000*\App\Models\Tenant::count()));
  Artisan::call('storage:link');
//   
        
        
    }
}

<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class TenantDatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        
    $client = new \Laravel\Passport\ClientRepository();

    $client->createPasswordGrantClient(null, 'Default password grant client', 'http://your.redirect.path');
    $client->createPersonalAccessClient(null, 'Default personal access client', 'http://your.redirect.path');
    
    
   $admin = new App\Models\User();
   $admin->email = 'admin';
   $admin->password = bcrypt('admin');
   $admin->save();
   
   
    }
}

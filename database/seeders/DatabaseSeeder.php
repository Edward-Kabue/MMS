<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Tasks;
use App\Models\Company;
use Illuminate\Database\Seeder;

use Database\Seeders\PostSeeder;
use Illuminate\Support\Facades\Hash;



class DatabaseSeeder extends Seeder
{



    /**
     * Seed the application's database.
     */
    public function run(): void
    {
    
        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
      Tasks::factory(10)->create();
      Company::factory(10)->create();
       //import post seeder
      $this->call(PostSeeder::class);
          //create organization seeder
          $this->call(OrganizationSeeder::class);
          //create contact seeder
          $this->call(ContactSeeder::class);
          //create quote seeder
      $this->call(QuoteSeeder::class);
          //create invoice seeder
      $this->call(InvoiceSeeder::class);
      
   //import roles and permissions seeder
      $this->call(RolesAndPermissionsSeeder::class);
    }
}

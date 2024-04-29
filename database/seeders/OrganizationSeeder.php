<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrganizationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create 3 organizations without using the factory 
        \DB::table('organizations')->insert([
            'name' => 'Organization 1',
            'industry' => 'Industry 1',
            'orgsize' => 'Size 1',
           
        ]);
        \DB::table('organizations')->insert([
            'name' => 'Organization 2',
            'industry' => 'Industry 2',
            'orgsize' => 'Size 2',
            
        ]);
        \DB::table('organizations')->insert([
            'name' => 'Organization 3',
            'industry' => 'Industry 3',
            'orgsize' => 'Size 3',
            
        ]);
    }
}

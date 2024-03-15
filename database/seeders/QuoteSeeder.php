<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        \DB::table('quotes')->insert([
            'quote_number' => 'Q-0001',
            'organization_id' => 1,
            'contact_id' => 1,
            'quote_date' => '2024-03-15',
            'expiry_date' => '2024-03-22',
            'total' => 1000.00,
            'status' => 'draft', 
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        //create another
        \DB::table('quotes')->insert([
            'quote_number' => 'Q-0002',
            'organization_id' => 2,
            'contact_id' => 2,
            'quote_date' => '2024-03-15',
            'expiry_date' => '2024-03-22',
            'total' => 2000.00,
            'status' => 'draft',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}

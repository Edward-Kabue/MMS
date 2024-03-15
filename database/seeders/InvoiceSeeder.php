<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InvoiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       
        \DB::table('invoices')->insert([
            'invoice_number' => 'INV-0001',
            'organization_id' => 1,
            'quote_id' => 1,
            'contact_id' => 1,
            'invoice_date' => '2024-03-15',
            'due_date' => '2024-03-22',
            'total' => 1000.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    
        \DB::table('invoices')->insert([
            'invoice_number' => 'INV-0002',
            'organization_id' => 2,
            'quote_id' => 2,
            'contact_id' => 2,
            'invoice_date' => '2024-03-15',
            'due_date' => '2024-03-22',
            'total' => 2000.00,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

    }
}

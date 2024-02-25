<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MigrationTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    //perform all migration
    public function test_all_migration(): void
    {
        
        $this->artisan('migrate');
        $this->assertDatabaseHas('migrations', ['migration' => '2014_10_12_000000_create_users_table']);
        
    }
}

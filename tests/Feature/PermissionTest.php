<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionTest extends TestCase
{
    use HandlesAuthorization;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    //test the permission policy using   
    //$salesPersonRole = Role::create(['name' => 'sales'])->syncPermissions([
 //  $adminPermission1,
//  ]);;
    public function test_sales_person_can_create_permission(): void
    {
        //first do a migration of the users table
        $this->artisan('migrate');
        $user = User::factory()->create();
        //seed the roles and permissions
        $this->artisan('db:seed');
        $user->assignRole('sales');
        //assert  that role exists
        $this->assertTrue($user->hasRole('sales'));

    }
   


}

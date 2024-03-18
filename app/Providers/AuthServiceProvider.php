<?php

namespace App\Providers;

// use Illuminate\Support\Facades\Gate;
use App\Models\Organization;
use App\Policies\InvoicePolicy;
use App\Policies\OrganizationPolicy;
use App\Policies\PermissionPolicy;
use App\Policies\QuotePolicy;
use App\Policies\RolePolicy;
use Spatie\Permission\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The model to policy mappings for the application.
     *
     * @var array<class-string, class-string>
     */
    protected $policies = [
        //
        Permission::class => PermissionPolicy::class,
        CompanyPolicy::class => CompanyPolicy::class,
        OrganizationPolicy::class => OrganizationPolicy::class,
        QuotePolicy::class => QuotePolicy::class,
        RolePolicy::class => RolePolicy::class,
        InvoicePolicy::class => InvoicePolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     */
    public function boot(): void
    {
        //
    }
}

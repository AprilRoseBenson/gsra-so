<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */

    public function boot(GateContract $gate)
    {
        $this->registerPolicies($gate);
        
        $gate->define('isHOF', function($role){
            return $role->role == 'Head of Finance';
        });

        $gate->define('isBM', function($role){
            return $role->role == 'Branch Manager';
        });

        $gate->define('isCEO', function($role){
            return $role->role == 'Chief Executive Officer';
        });
        
        $gate->define('isSA', function($role){
            return $role->role == 'System Admin';
        });
    }


}

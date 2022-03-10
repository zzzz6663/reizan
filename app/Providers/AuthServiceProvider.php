<?php

namespace App\Providers;

use Illuminate\Contracts\Auth\Access\Gate as AccessGate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot(AccessGate $gate)
    {
        $this->registerPolicies($gate);
        $gate->define('is_admin',function($user){

            return $user->level== 'admin';
        });
        $gate->define('is_operator',function($user){
            return $user->level== 'operator';
        });
        $gate->define('is_qc',function($user){
            return $user->level== 'qc';
        });
        $gate->define('is_accountant',function($user){
            return $user->level== 'accountant';
        });
        $gate->define('is_service',function($user){
            return $user->level== 'service';
        });
        //
    }
}

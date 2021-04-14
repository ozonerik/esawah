<?php

namespace App\Providers;

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
        // 'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

         Gate::define('isAdmin', function($user) {
            return $user->role == 'admin';
         });

         Gate::define('isPro', function($user) {
             return $user->role == 'pro';
         });

         Gate::define('isFree', function($user) {
             return $user->role == 'free';
         });
         
         Gate::define('isAdminOrPro', function($user) {
             $role=$user->role;
             if($role == 'admin' || $role == 'pro' ){
                return true;
             }      
         });
         
    }
}

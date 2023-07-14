<?php
namespace Modules\ACL\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Modules\ACL\Entities\Permission;
use Modules\ACL\Entities\ExtendedUser;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();

        foreach (Permission::all() as $permission) {
            Gate::define($permission->name , function(ExtendedUser $user) use ($permission){
                return $user->hasPermission($permission) && $user->customMethod1();
            });
        }
    }
}

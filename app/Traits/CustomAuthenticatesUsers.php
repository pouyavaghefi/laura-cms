<?php
namespace App\Traits;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

trait CustomAuthenticatesUsers
{
    use Authenticatable, AuthorizesRequests{
        AuthenticatesUsers::loginUsingId insteadof Authenticatable;
    }

    protected function loginUsingId(AuthenticatableContract $user, $remember = false)
    {
        // Custom logic here

        // Call the parent method to perform the default login
        return $this->guard()->login($user, $remember);
    }
}

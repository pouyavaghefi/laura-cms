<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use App\Models\SiteInfo;
use App\Models\User;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ToolsController;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $controllerTools;

    public function __construct(ToolsController $controllerTools)
    {
        $this->controllerTools = $controllerTools;
    }

    public function showLoginForm()
    {
        // Session::forget('failedAttempt');
        return view('admin.auth.login');
    }

    protected function credentials(Request $request)
    {
        $credentials = $request->only('username', 'password');
        $credentials['usr_name'] = $credentials['username'];
        unset($credentials['username']);
        $credentials['usr_is_admin'] = 1;

        return $credentials;
    }

    protected function authenticated(Request $request, $user)
    {
        if ($user->usr_is_admin == 1) {
            return redirect()->route('adm.dashboard');
        }

        return redirect()->intended($this->redirectPath());
    }

    public function login(Request $request)
    {
        $this->validateLogin($request);

        if ($this->attemptLogin($request)) {
            return $this->sendLoginResponse($request);
        }

        $this->controllerTools->failedAttemptRedirection();

        return $this->sendFailedLoginResponse($request);
    }

    public function username()
    {
        return 'usr_name';
    }
}

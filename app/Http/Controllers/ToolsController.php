<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ToolsController extends Controller
{
    public function failedAttemptRedirection()
    {
        if(Session::has('failedAttempt')) {
            if (Session::get('failedAttempt') == 1) {
                Session::put('failedAttempt', 2);
            } elseif (Session::get('failedAttempt') == 2) {
                Session::put('failedAttempt', 3);
            } else {
                abort(404);
            }
        }else{
            Session::put('failedAttempt',1);
        }
    }
}

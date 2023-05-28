<?php

namespace App\Http\Controllers\Admin\Dashboard;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends AdminController
{
    public function index()
    {
        return view('admin.index');
    }
}

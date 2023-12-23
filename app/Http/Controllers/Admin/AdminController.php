<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\View\View as ViewView;

class AdminController extends Controller
{
    public function login(): ViewView{
        return view('admin.auth.login');
    }

    public function passwordRequest(): ViewView{
        return view('admin.auth.forgot-password');

    }
}

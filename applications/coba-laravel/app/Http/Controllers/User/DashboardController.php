<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function home()
    {
        return view('home');
    }
    public function detaillbh()
    {
        return view('detaillbh');
    }
}
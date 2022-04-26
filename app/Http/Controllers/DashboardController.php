<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    function show(){
        return view('admin.dashboard');
    }
}

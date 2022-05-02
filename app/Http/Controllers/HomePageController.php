<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomePageController extends Controller
{
    function index(){
        return view('Ramen.index');
    }
    function news(){
        return view('Ramen.news');
    }
    function access(){
        return view('Ramen.access');
    }

}

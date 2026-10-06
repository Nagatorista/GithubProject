<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MainController extends Controller
{
    function about(){
        return view('<template.about');
    }
    function index(){
        return view('template.base');
    }
}

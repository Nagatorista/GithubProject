<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class MainController extends Controller
{
    function about(): View{
        return view('about');
    }
    function array(): View{
        $array=array();
        $array=[];
        $array[]='Juan';
        $array=['Juan', 'Pepe', 'María'];
    }
    function index(): View{
        return view('index');
    }
    function portfolio(): View{
        return view('portfolio');
    }
}

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
        $array1=array();
        $array2=[];
        $array2=['Juan'];
        $array2=['Pepe'];
        $array2[10]='Elizabeth';
        $array2[]='Paco';
        $array3=['Juan', 'Pepe', 'María'];
        $grupo = 'Segundo de desarrollo de aplicaciones web a';
        return view('array', 'grupo' -> $grupo, 'alumnos' -> $alumnos);
    }
    function index(): View{
        return view('index');
    }
    function portfolio(): View{
        return view('portfolio');
    }
}

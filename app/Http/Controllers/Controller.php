<?php

namespace App\Http\Controllers;

abstract class Controller
{
    protected function loadTheme($view, $data = [])
    {
        return view('themes/'. env('APP_THEME', 'default') . '/' . $view , $data); 
    }
}



<?php

namespace App\Http\Controllers;

class PageController extends Controller
{
    //

    public function index() {
        return view("inicio");
    }

    public function nosotros() {
        return view("nosotros");
    }

    public function carta() {
        return view("carta");
    }
}

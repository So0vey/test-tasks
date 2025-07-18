<?php

namespace App\Http\Controllers;

class MainPageController extends Controller
{
    public function getPage()
    {
        return view('pages.main.page');
    }
}

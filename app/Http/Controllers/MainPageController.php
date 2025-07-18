<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

class MainPageController extends Controller
{
    public function getPage()
    {
        return view('pages.main.page');
    }
}

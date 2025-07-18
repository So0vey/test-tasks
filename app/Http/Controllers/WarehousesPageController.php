<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Mail;

class WarehousesPageController extends Controller
{
    public function getPage()
    {
        return view('pages.warehouses.page');
    }
}

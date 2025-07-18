<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminController extends Controller
{
    public function test()
    {
        Mail::raw('Plain text message', function ($message) {
            $message->to('asapunov399@gmail.com')->subject('Test');
        });
        Mail::raw('Plain text message', function ($message) {
            $message->to('Sneyker18@gmail.com')->subject('Test');
        });
        return back();
    }
}

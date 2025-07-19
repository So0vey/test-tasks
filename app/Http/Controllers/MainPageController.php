<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;

class MainPageController extends Controller
{
    /**
     * Возвращает View главной страницы
     *
     * @return View
     */
    public function getPage(): View
    {
        return view('pages.main.page');
    }
}

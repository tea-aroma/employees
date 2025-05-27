<?php

namespace App\Http\Controllers;


use Illuminate\Contracts\View\View;


/**
 * Provides logic for home actions.
 */
class HomeController extends Controller
{
    /**
     * Shows the index page.
     *
     * @return View
     */
    public function index(): View
    {
        return view('admin.home.index');
    }

    /**
     * Shows the index page.
     *
     * @return View
     */
    public function schedule(): View
    {
        return view('admin.home.schedule');
    }
}

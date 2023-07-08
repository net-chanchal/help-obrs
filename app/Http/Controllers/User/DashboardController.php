<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class DashboardController extends Controller
{
    /**
     * @return View
     */
    public function index(): View
    {
        return view('user.index');
    }
}

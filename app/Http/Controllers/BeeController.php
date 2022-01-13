<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class BeeController extends Controller
{

    public function create(): \Illuminate\Contracts\View\View
    {
        return View::make('pages.register.bee');
    }

    public function store(Request $request)
    {
        //TO DO Changes
    }
}

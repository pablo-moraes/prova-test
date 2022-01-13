<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FlowerController extends Controller
{
    public function create(): \Illuminate\Contracts\View\View
    {
        $species = \App\Models\Bee::all();
        return View::make('pages.register.flower', compact('species', $species));
    }

    public function store(Request $request)
    {
        //TO DO Changes
    }
}

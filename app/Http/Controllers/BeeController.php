<?php

namespace App\Http\Controllers;

use App\Http\Requests\BeeRequest;
use App\Models\Bee;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Validator;

class BeeController extends Controller
{

    public function create(): \Illuminate\Contracts\View\View
    {
        return View::make('pages.register.bee');
    }

    public function store(BeeRequest $request)
    {
        Bee::query()->create($request->validated());
    }
}

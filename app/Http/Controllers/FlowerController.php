<?php

namespace App\Http\Controllers;

use App\Http\Requests\FlowerRequest;
use App\Models\Flower;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;

class FlowerController extends Controller
{
    public function create(): \Illuminate\Contracts\View\View
    {
        $species = \App\Models\Bee::all();
        return View::make('pages.register.flower', compact('species', $species));
    }

    public function store(FlowerRequest $request)
    {
        $isValid = $request->file('photo')->isValid();
        $validated = $request->validated();

        if ($isValid) {
            $fileName = Str::of(Str::lower(Str::snake($request->name)))->append('.png');
            $pathName = Str::of(Str::lower(Str::kebab($request->name)))->prepend('flowers/');
            $storagePath = $request->file('photo')->storeAs("$pathName", "$fileName");
        }

        Flower::query()->create([
            'name' => $request->name,
            'specie' => $request->specie,
            'description' => $request->description,
            'months' => $request->months,
            'bees' => $request->bees,
            'photo' => $storagePath
        ]);

        return redirect(route('home'));
    }
}

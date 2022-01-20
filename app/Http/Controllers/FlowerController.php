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
            $fileName = Str::of(Str::lower(Str::snake(Str::ascii($request->name))))->append('.png');
            $pathName = Str::of(Str::lower(Str::kebab(Str::ascii($request->name))))->prepend('flowers/');
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

    public function list(Request $request)
    {
        try {
            $flowers =  Flower::all();
            $hasRequest = count($request->all()) > 0;
            if($hasRequest) {
                $flowers = collect($flowers)->filter(function($flower, $key) use ($request) {
                    $months = $request->months;
                    $bees = $request->bees;

                    if ($months !== null && $bees !== null) {
                        return Str::containsAll($flower->months, $months) && Str::containsAll($flower->bees, $bees);
                    }

                    if (!is_null($months) && is_null($bees)) {
                        return Str::containsAll($flower->months, $months ?? '');
                    }

//                    dump($flower->bees);
                    return Str::containsAll($flower->bees, $bees ?? '');

                })->toBase();
            }

            return response()->json([
               'type' => 'success',
               'flowers' => $flowers
           ]);
        } catch (\Throwable $e) {
            return response()->json([
                'type' => $e->getMessage(),
                'erro' => $e->getMessage(),
                'message' => 'Não foi possível'
            ]);
        }
    }

    public function find($id)
    {
        $flower = Flower::query()->findOrFail($id);
        return response()->json(['flower' => $flower]);
    }
}

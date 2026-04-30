<?php

namespace App\Http\Controllers;

use App\Models\CategoriaPlato;
use App\Models\Plato;
use Illuminate\Http\Request;

class PlatoApiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function search (Request $request) {
        $buscar = $request->input('buscar');

        $platos = Plato::query()->when($buscar, function ($query, $buscar) {
            $query->where('nombre', 'like', "%{$buscar}%")->where('descripcion', 'like', "%{$buscar}%");
        })->get();
        $categoria = CategoriaPlato::all();

        return view("carta", compact('platos', 'categoria', 'buscar'));
    }
}

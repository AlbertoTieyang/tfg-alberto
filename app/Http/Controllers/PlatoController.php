<?php

namespace App\Http\Controllers;

use App\Models\Alergeno;
use App\Models\CategoriaPlato;
use App\Models\Plato;
use Illuminate\Http\Request;

class PlatoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $platos = Plato::all();
        $categoria = CategoriaPlato::all();
        return view("carta", compact('platos', 'categoria'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = CategoriaPlato::all();
        $alergenos = Alergeno::all();

        return view('plato.create', compact('categorias','alergenos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            
        ]);
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
        $plato = Plato::find($id);

        return view('plato.edit', compact('plato'));
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
        $plato = Plato::find($id);
        if($plato != null) {
            Plato::destroy($id);
        }
        return redirect()->route('plato.create');
    }
}

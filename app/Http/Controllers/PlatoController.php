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
public function index(Request $request)
{
    $categoria = CategoriaPlato::all();
    $alergenos = Alergeno::all();
    $nombre = $request->input('nombre');
    $categoriaId = $request->input('categoria_id');
    $alergenosId = $request->input('alergeno_id');

    $platos = Plato::query()
        ->when($nombre, function ($query, $nombre) {
            $query->where('nombre', 'like', "%{$nombre}%");
        })
        ->when($categoriaId, function ($query, $categoriaId) {
            $query->where('categoria_plato_id', $categoriaId);
        })
        ->when($alergenosId, function($query, $alergenosId) {
            $query->where('id', '=', $alergenosId);
        })
        ->get();

    return view("carta", compact('platos', 'categoria', 'alergenos', 'nombre', 'categoriaId', 'alergenosId'));
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

<?php

namespace App\Http\Controllers;

use App\Models\Allergen;
use App\Models\Dish;
use App\Models\DishCategory;
use Illuminate\Http\Request;

class DishController extends Controller
{
    /**
     * Display a listing of the resource.
     */
public function index(Request $request)
{
    $categoria = DishCategory::all();
    $alergenos = Allergen::all();
    $nombre = $request->input('name');
    $categoriaId = $request->input('category_id');
    $alergenosId = $request->input('allergen_id');

    $platos = Dish::query()
        ->when($nombre, function ($query, $nombre) {
            $query->where('name', 'like', "%{$nombre}%");
        })
        ->when($categoriaId, function ($query, $categoriaId) {
            $query->where('dish_category_id', $categoriaId);
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
        $categorias = DishCategory::all();
        $alergenos = Allergen::all();

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
        $plato = Dish::find($id);

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
        $plato = Dish::find($id);
        if($plato != null) {
            Dish::destroy($id);
        }
        return redirect()->route('plato.create');
    }
}

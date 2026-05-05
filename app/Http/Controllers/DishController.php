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
    $category = DishCategory::all();
    $allergens = Allergen::all();
    $name = $request->input('name');
    $categoryId = $request->input('category_id');
    $allergensId = $request->input('allergen_id');

    $dishes = Dish::query()
        ->when($name, function ($query, $name) {
            $query->where('name', 'like', "%{$name}%");
        })
        ->when($categoryId, function ($query, $categoryId) {
            $query->where('dish_category_id', $categoryId);
        })
        ->when($allergensId, function($query, $allergensId) {
            $query->where('id', '=', $allergensId);
        })
        ->get();

    return view("carta", compact('dishes', 'category', 'allergens', 'name', 'categoryId', 'allergensId'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = DishCategory::all();
        $allergens = Allergen::all();
        $dishes = Dish::all();

        return view('plato.create', compact('categories','allergens', 'dishes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate([
            "name"=>'required',
            "price" => 'required',
            "active" => 'required',
            "description"=>'required',
            "image" => 'required'
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
        $dishes = Dish::find($id);

        return view('plato.edit', compact('platos'));
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

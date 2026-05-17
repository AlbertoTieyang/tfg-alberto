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
    $allergenId = $request->input('allergen_id');

    $dishes = Dish::with(['dishCategory', 'allergens'])
        ->when($name, function ($query, $name) {
            $query->where('name', 'like', "%{$name}%");
        })
        ->when($categoryId, function ($query, $categoryId) {
            $query->where('dish_category_id', $categoryId);
        })
        ->when($allergenId, function ($query, $allergenId) {
            $query->whereDoesntHave('allergens', function ($query) use ($allergenId) {
                $query->where('allergens.id', $allergenId);
            });
        })
        ->get();

    return view("carta", compact('dishes', 'category', 'allergens', 'name', 'categoryId', 'allergenId'));
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
    $dish = Dish::create([
        'name' => $request->input('name'),
        'price' => $request->input('price'),
        'active' => $request->has('active'),
        'description' => $request->input('description'),
        'image' => $request->input('image'),
        'dish_category_id' => $request->input('dish_category_id'),
    ]);

    $dish->allergens()->attach($request->input('allergens', []));

    return redirect()->route('plato.create');
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
        $dish = Dish::find($id);
        $allergens = Allergen::all();
        $categories = DishCategory::all();

        return view('plato.edit', compact('dish', 'allergens', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $dish = Dish::find($id);

        $dish->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'active' => $request->has('active'),
            'description' => $request->input('description'),
            'image' => $request->input('image'),
            'dish_category_id' => $request->input('dish_category_id'),
        ]);

        //mira los alergenos que ya hay y los sincroniza con el formulario
        $dish->allergens()->sync($request->input('allergens', []));

        return redirect()->route('carta');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $dish = Dish::find($id);
        if($dish != null) {
            Dish::destroy($id);
        }
        return redirect()->route('plato.create');
    }

    public function active(Request $request, string $id) {
        $dish = Dish::find($id);
        
        $dish->update([
            'active' => $request->has('active')
        ]);

        return redirect()->route('carta');
    }
}

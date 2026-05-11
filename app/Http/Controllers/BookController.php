<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Mail\ReservationConfirmation;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class BookController extends Controller
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
        $reservas = Book::all();
        
        return view("reserva.reserva", compact("reservas"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            "email" => ["required", "email"],
            "date" => ["required", "date", "after_or_equal:today"],
            "type" => ["required", "in:table,event"],
            "people" => ["required", "integer", "min:1", "max:50"],
            "description" => ["nullable", "string", "max:1000"],   
        ]);

        $booking = Book::create([
            "date" => $validated["date"],
            "type" => $validated["type"],
            "people" => $validated["people"],
            "description" => $validated["description"] ?? "",
            "user_id" => $request->user()->id,
            "confirmation_token" => Str::random(64),
            "confirmation_expires_at" => now()->addHour(),
        ]);

        Mail::to($validated["email"])->send(
            new ReservationConfirmation($booking)
);

return redirect()
    ->route("reserva")
    ->with("success", "Te hemos enviado un correo para confirmar la reserva.");

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
}

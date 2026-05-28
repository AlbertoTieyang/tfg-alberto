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
    public function create(Request $request)
    {
        if (!$request->user()) {
            return redirect()->route("register")->with("no-user", "Para crear una reserva necesitas registrarte o iniciar sesión primero.");
        }
        
        //Get confirmed or non-expired bookings
        $bookings = Book::where(function ($query) {
            $query->whereNotNull("confirmed_at")
            ->orWhere("confirmation_expires_at", ">=", now());
        })->get();

        return view("reserva.reserva", compact("bookings"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!$request->user()) {
            return redirect()->route("register")->with("no-user", "Para crear una reserva necesitas registrarte o iniciar sesión primero.");
        }
        //
        $validated = $request->validate([
            "email" => ["required", "email"],
            "date" => ["required", "date", "after_or_equal:today"],
            "type" => ["required", "in:table,event"],
            "people" => ["required", "integer", "min:1", "max:50"],
            "description" => ["nullable", "string", "max:256"],   
        ]);

        $booking = Book::create([
            "date" => $validated["date"],
            "type" => $validated["type"],
            "people" => $validated["people"],
            "description" => $validated["description"] ?? "",
            "user_id" => $request->user()->id,
            "confirmation_token" => Str::random(64),
            "confirmation_expires_at" => now()->addMinutes(2),
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
        
        $book = Book::find($id);
        if($book != null) {
            Book::destroy($id);
        }
        return redirect()->route('cuenta')->with('cancelled', 'Se ha cancelado la reserva');
    }

    /**
     * Function to confirm bookings
     * @param string $token
     * @return \Illuminate\Contracts\View\View
     */
    public function confirm(string $token)
    {
    $booking = Book::where("confirmation_token", $token)->firstOrFail();
    
    if ($booking->confirmation_expires_at->isPast()) {
        $booking->delete();
        
    return view("reserva.expirada");
    }
        
    $booking->update([
        "confirmed_at" => now(),
        "confirmation_token" => null,
        "confirmation_expires_at" => null,
    ]);
            
        return view("reserva.confirmada");
    }
            
}
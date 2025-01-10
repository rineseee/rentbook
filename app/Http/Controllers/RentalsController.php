<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Rentals;
use Illuminate\Http\Request;

class RentalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(
            Rentals::query()
                ->with(['user', 'book'])
                ->get()
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


    }

    /**
     * Display the specified resource.
     */
    public function show(Rentals $rentals)
    {
        dd(Rentals::find($rentals->id)->first());
        return response()->json(
        );
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Rentals $rentals)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Rentals $rentals)
    {
        //
    }

    public function book(Request $request)
    {
        $book = Book::find($request->book_id);

        if ($book->rented) {
            return response()->json(
                [
                    'message' => 'BOOK its reted'
                ]
            );
        }

        $rentals = Rentals::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'rental_date' => $request->rental_date,
            'return_date' => $request->return_date
        ]);


        $book->status = 'rented';
        $book->save();

        return response()->json($rentals);
    }

    public function bookAvaible(Rentals $rentals)
    {
        $book = $rentals->book;
        $book->status = 'available';

        return $book;
    }
}

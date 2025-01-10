<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Book::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Book::create([
            'author' => $request->author,
            'published_year' => $request->published_year,
            'staus' => $request->status
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        return response()->json(Book::find($book->id)->first());
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $book->author = $request->author;
        $book->published_year = $request->published_year;
        $book->status = $request->published_year;

        $book->sate();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        Book::find($book->id)->delete();
    }
}

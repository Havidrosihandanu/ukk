<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  Categorie::all();
        $books = Book::all();
        return view('book', compact('books','categories'));
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
       $data =  Book::create([
        'title' => $request->title,
        'writer' => $request->writer,
        'publisher' => $request->publisher,
        'publication_year' => $request->publication_year,
        'category_id' => $request->category_id,
        'img' => $request->img
       ]);

        $this->validate($request, [
            'img' => 'mimes:pdf'
        ]);
        
        $filename = 'book-' . time();
        $extensi = $request->file('img')->getClientOriginalExtension();
        if ($request->hasFile('img')) {
            $file = $request->file('img')->move('storage/book/', $filename . '.' . $extensi);
            $data->img = $filename . '.' . $extensi;
        }
        $data->save();
        return redirect('book');
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

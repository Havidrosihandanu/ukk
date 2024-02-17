<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Favorite;
use App\Models\User;
use Illuminate\Http\Request;

class BorrowerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::paginate(10);
        $users = User::all();
        $books = Book::all();
        return view('borrower.index', compact('borrows', 'users', 'books'));
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
    public function store(Request $request, $id)
    {
        // return "successsssssssssss";
        Borrow::create([
            'user_id' => 8,
            'book_id' => $id,
            'borrow_date' => "2022-02-04",
            'date_of_return' => "2022-02-04",
            'status' => 'pending',
        ]);

        return redirect('borrower')->with('success', 'The book has been borrowed successfully');
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
    public function addFavorite(string $id)
    {
        Favorite::create([
            'user_id' => auth()->user()->id,
            'book_id' => $id
        ]);
        return redirect('borrower')->with('success','success add favorite');
    }

    public function favorite()
    {
       $favorites =  Favorite::all();
        return view('borrower.favorite',compact('favorites'));
    }
}

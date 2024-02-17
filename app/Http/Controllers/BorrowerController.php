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
        $userID = auth()->user()->id ;
        $no = Borrow::where('user_id',$userID)->count();
        Borrow::create([
            'borrow_code' => 'Borrow -'. $userID . $id . $no+1,
            'user_id' => $userID,
            'book_id' => $id,
            'borrow_date' => date('Y-m-d'),
            'date_of_return' => now()->addDays(14),
            'status' => 'pending',
        ]);

        return redirect('borrower')->with('success', 'The book has been borrowed successfully, You must Be Return 2 Week Ago ');
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
        return redirect('borrower')->with('success', 'success add favorite');
    }

    public function favorite()
    {
        $userID = auth()->user()->id;
        $favorites =  Favorite::where('user_id', $userID)->get();
        return view('borrower.favorite', compact('favorites'));
    }
    public function history()
    {
        // $books = Book::all()
        $userID = auth()->user()->id;
        $historis =  Borrow::where('user_id', $userID)->get();
        return view('borrower.history', compact('historis'));
    }
}

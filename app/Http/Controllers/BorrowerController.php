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
    public function index(Request $request)
    {
        $borrows = Borrow::all();
        $users = User::all();
        $search = $request->search;
        $search = $request->search;
        $status = 'borrowed';
        $newBooks = Book::latest()->paginate(10);
        if ($request->has('search')) {
            $bookAll = Book::where('title', 'like', "%" . $search . "%")
                ->where('status', '!=', 'borrowed')->get()
                ->where('status', '!=', 'pending')->get();
            return view('borrower.search', compact('bookAll', 'search'));
        } else {
            $bookAll = Book::where('status', '!=', 'borrowed')
            ->where('status', '!=', 'borrowed')
            ->where('status', '!=', 'pending')->get();
            return view('borrower.index', compact('borrows', 'users', 'bookAll', 'newBooks'));
        }
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
    public function store(Request $request, $bookCode,$id)
    {
        $userID = auth()->user()->id;
        $no = Borrow::where('user_id', $userID)->count();

        $book = Book::where('book_code',$bookCode)->first();
        $book->update([
            'status' => 'pending'
        ]);

        Borrow::create([
            'borrow_code' => 'Borrow -' . $userID . $no + 1,
            'user_id' => $userID,
            'book_id' => $id,
            'book_code' => $bookCode,
            'borrow_date' => date('Y-m-d'),
            'date_of_return' => now()->addDays(14),
            'status' => 'pending',
        ]);

        return redirect('borrowerr')->with('success', 'The book has been borrowed successfully, You must Be Return 2 Week Ago ');
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
        return redirect('borrowerr')->with('success', 'success add favorite');
    }

    public function favorite()
    {
        $userID = auth()->user()->id;
        $favorites =  Favorite::where('user_id', $userID)->get();
        return view('borrower.favorite', compact('favorites'));
    }
    public function history()
    {
        $userID = auth()->user()->id;
        $historis =  Borrow::where('user_id', $userID)->get();
        return view('borrower.history', compact('historis'));
    }
    public function borrowerCategory($id)
    {
        $books = Book::where('category_id', $id)->get();
        return view('borrower.category', compact('books'));
    }
}

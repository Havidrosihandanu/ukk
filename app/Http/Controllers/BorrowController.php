<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\Report;
use App\Models\User;
use Illuminate\Http\Request;

class   BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $borrows = Borrow::where('status', '!=', 'returned')->latest()->paginate();
        $users = User::all();
        $books = Book::all();

        if (auth()->user()->role_id != 3) {
            return view('admin&operator.borrow', compact('borrows', 'users', 'books'));
        } else {
            return abort(403);
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
    public function store(Request $request)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'book_id' => 'required',
            'borrow_date' => 'required',
            'date_of_return' => 'required',
        ]);

        Borrow::create([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'borrow_date' => $request->borrow_date,
            'date_of_return' => $request->date_of_return,
            'status' => $request->status,
        ]);

        return redirect('borrow')->with('success', 'Data created successfully');
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
        $borrow = Borrow::where('id', $id)->first();
        $book = Book::where('book_code', $borrow->book_code)->first();
        $book->update([
            'status' => $request->status
        ]);
        $borrow->update([
            'borrow_date' => $request->borrow_date,
            'date_of_return' => $request->date_of_return,
            'status' => $request->status,
        ]);

        return redirect('borrow')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book =  Borrow::where('id', $id)->first();
        $book->delete();
        return redirect('borrow')->with('success', 'Data Deleted successfully');
    }

    public function report(Request $request)
    {
        $users = User::all();
        $books = Book::all();
        if ($request->has('borrow_date')) {
            $reports = Borrow::whereBetween('borrow_date', [$request->borrow_date, $request->end_date])->latest()->paginate();
        } else {
            $reports = Borrow::where('status','Returned')->latest()->paginate();
        }
        if (auth()->user()->role_id != 3) {
            return view('admin&operator.report', compact('reports', 'users', 'books'));
        } else {
            return abort(403);
        }
    }

    public function borrowConfirm($id)
    {
        $borrow = Borrow::where('id', $id)->first();
        $book = Book::where('id', $borrow->book_id)->first();
        $borrow->update([
            'status' => 'Borrowed'
        ]);
        $book->update([
            'status' => 'Borrowed'
        ]);
        return redirect('borrow')->with('success', 'Status Successfuly change');
    }
    public function returnConfirm($id)
    {
        $borrow = Borrow::where('id', $id)->first();
        $book = Book::where('id', $borrow->book_id)->first();
        $borrow->update([
            'status' => 'Returned'
        ]);
        $book->update([
            'status' => 'Returned'
        ]);

        return redirect('borrow')->with('success', 'Status Successfuly change');
    }
}

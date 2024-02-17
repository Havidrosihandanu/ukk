<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;

class   BorrowController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $borrows = Borrow::paginate();
        $users = User::all();
        $books = Book::all();
        return view('borrow', compact('borrows', 'users', 'books'));
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
        $this->validate($request, [
            'user_id' => 'required',
            'book_id' => 'required',
            // 'borrow_data' => 'required',
            // 'data_of_return' => 'required',
            'status' => 'required',
        ]);
        $borrow = Borrow::where('id', $id)->first();
        $borrow->update([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
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
        return redirect('borrow')->with('success', 'Data Berhasil Dihapus');
    }

    public function report(){
        $borrows = Borrow::paginate(10);
        $users = User::all();
        $books = Book::all();
        return view('report', compact('borrows', 'users', 'books'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $books = Book::all();
        $users = User::all();
        $reviews = Review::paginate();


    return view('admin&operator.review',compact('books','users','reviews'));
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
            // 'user_id' => 'required',
            // 'book_id' => 'required',
            'review' => 'required'
        ]);

        Review::create([
            'user_id' => auth()->user()->id,
            'book_id' => $request->book_id,
            'review' => $request->review
        ]);

        return redirect('borrowerr')->with('success', 'Data created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'user_id' => 'required',
            'book_id' => 'required',
            'review' => 'required'
        ]);
        $borrow = Review::where('id', $id)->first();
        $borrow->update([
            'user_id' => $request->user_id,
            'book_id' => $request->book_id,
            'review' => $request->review
        ]);

        return redirect('review')->with('success', 'Data updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review, $id)
    {
        $book =  Review::where('id', $id)->first();
        $book->delete();
        return redirect('review')->with('success', 'Data Deleted Succesfully');
    }
    public function review(Request $request, $id)
    {
        $books = Book::where('id',$id)->get();
        return view('borrower.review',compact('books'));
    }
    public function reviewPost(Request $request, $id)
    {
        $books = Book::where('id',$id)->get();
        $this->validate($request, [
            // 'user_id' => 'required',
            // 'book_id' => 'required',
            'review' => 'required'
        ]);

        Review::create([
            'user_id' => auth()->user()->id,
            'book_id' => $id,
            'review' => $request->review
        ]);
        return redirect('review',compact('books'))->with('success', 'Success add favorite');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categorie;
use App\Models\Rak;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories =  Categorie::all();
        $books = Book::paginate(10);
        $raks = Rak::all();

        if (auth()->user()->role_id != 3) {
        return view('admin&operator.book', compact('books', 'categories', 'raks'));
        }else{
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
            'title' => 'required',
            'publication_year' => 'required',
            'category_id' => 'required',
            'rak_id' => 'required',
            'img' => 'required|mimes:jpg,jpeg,png'
        ]);
        $bookId = Book::where('title', $request->title)->count();
        $data =  Book::create([
            'title' => $request->title,
            'book_code' => $request->title . '-' . $request->publication_year . '-' . $bookId + 1,
            'publication_year' => $request->publication_year,
            'category_id' => $request->category_id,
            'rak_id' => $request->rak_id,
            'status' => 'ready',
            'img' => $request->img
        ]);

        $filename = 'sampul-' . time();
        $extensi = $request->file('img')->getClientOriginalExtension();
        if ($request->hasFile('img')) {
            $file = $request->file('img')->move('storage/book/', $filename . '.' . $extensi);
            $data->img = $filename . '.' . $extensi;
        }
        $data->save();
        return redirect('book')->with('success', 'Data created successfully');
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
        $filename = 'sampul-' . time();
        $extensi = $request->file('img')->getClientOriginalExtension();
        if ($request->hasFile('img')) {
            $file = $request->file('img')->move('storage/book/', $filename . '.' . $extensi);
        }
        $book =  Book::where('id', $id)->first();
        $file = public_path('/storage/book/' . $book->img);
        unlink($file);
        $book->update([
            'title' => $request->title,
            'publication_year' => $request->publication_year,
            'category_id' => $request->category_id,
            'rak_id' => $request->rak_id,
            'img' => $filename . "." . $extensi
        ]);
        return redirect('book')->with('success', 'Data Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $book =  Book::where('id', $id)->first();
        $file = public_path('/storage/book/' . $book->img);
        unlink($file);
        $book->delete();
        return redirect('book')->with('success', 'Data Deleted successfully');
    }
    public function categoryStore(Request $request)
    {
        Categorie::create([
            'category_name' => $request->category_name
        ]);
        return redirect('book')->with('success', 'Category successfully Added');
    }
}

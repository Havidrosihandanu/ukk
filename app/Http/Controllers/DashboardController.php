<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Borrow;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $user = User::where('role_id', 3)->count();
        $book = Book::count();
        $report = Borrow::count();
        $bookBorrowed = Borrow::where('status', 'Borrowed')->count();

        if (auth()->user()->role_id != 3) {
            return view('admin&operator.dashboard', compact('user', 'book', 'report', 'bookBorrowed'));
        } else {
           return abort(403);
        }
    }
}

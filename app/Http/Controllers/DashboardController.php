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
        $user = User::count();
        $book = Book::count();
        $totalBorrowing = Borrow::count();
        $bookBorrowed = Borrow::where('status', 'borrowed')->count();
        return view('admin&operator.dashboard',compact('user','book','totalBorrowing','bookBorrowed'));
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

use function Symfony\Component\String\b;

class userController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::all();
        $users = User::paginate(10);
        return view('admin&operator.user',compact('users','role'));
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
        $this->validate($request,[
        'full_name' => 'required',
        'address' => 'required',
        'email' => 'required|email|unique:users',
        'role_id' => 'required',
        'password' => 'required',
         ]);

        User::create($request->all())->with('success', 'Data Berhasil Dibuat');
        return redirect('user');
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
        User::where('id',$id)
        ->update([
            'full_name' => $request->full_name,
            'email' => $request->email,
            'address' => $request->address,
            'role_id' => $request->role_id
        ]);
        return redirect('user')->with('success','data berhasil diperbarui');;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::where('id',$id)->first();
        $user->delete();
        return redirect('user')->with('success', 'Data Berhasil Dihapus');

    }
}

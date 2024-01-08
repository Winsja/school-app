<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('backend.users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email'     => 'required|email',
            'name'     => 'required|string|max:30',
            'role'     => 'required',
            'password' => 'required'
        ]);

        $input = $request->all();
        User::create($input);
        return redirect('users')->with('flash_msg', 'Konto zostało utworzone!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $users = User::find($id);
        return view('backend.users.show')->with('users', $users);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $users = DB::table('users')->find($id);
        return view('backend.users.edit')->with('users', $users);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'email'     => 'required|email',
            'name'     => 'required|string|max:30'
        ]);

        $users = User::find($id);
        $input = $request->all();
        $users->update($input);
        return redirect('users')->with('flash_msg', 'Zaktualizowano pomyślnie!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $users = User::destroy($id);
        return redirect('users')->with('flash_msg', 'Konto zostało usunięte!');
    }
}

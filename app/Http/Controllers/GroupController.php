<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $groups = Group::all();
        return view('backend.groups.index')->with('groups', $groups);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'group_name'     => 'required|string|max:30'
        ]);

        $input = $request->all();
        Group::create($input);
        return redirect('groups')->with('flash_msg', 'Grupa została dodana!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $groups = Group::find($id);
        return view('backend.groups.show')->with('groups', $groups);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $groups = DB::table('groups')->find($id);
        return view('backend.groups.edit')->with('groups', $groups);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'group_name'     => 'required|string|max:30'
        ]);

        $groups = Group::find($id);
        $input = $request->all();
        $groups->update($input);
        return redirect('groups')->with('flash_msg', 'Zaktualizowano pomyślnie!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Group::destroy($id);
        return redirect('groups')->with('flash_msg', 'Grupa została usunięta!');
    }

    // DODAJ STUDENTA DO ISTNIEJACEJ GRUPY
    // public function addToGroup($id)
    // {
    //     $groups = Group::find($id);
    //     return view('backend.groups.addToGroup')->with('groups', $groups);
    // }

    // public function addToGroupStore(Request $request)
    // {
    //     // XD
    //     $input = $request->all();
    //     Group::create($input);
    //     return redirect('groups')->with('flash_msg', 'Student został dodany do grupy!');
    // }
}

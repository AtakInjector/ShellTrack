<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Owner;

class OwnerController extends Controller
{
    //
     public function index()
    {
        $owners = Owner::all();
        return view('owners.index', compact('owners'));
    }

    public function create()
    {
        return view('owners.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Owner::create($request->all());

        return redirect()->route('owners.index')->with('success', 'Owner added!');
    }

    public function show($id)
    {
        $owner = Owner::findOrFail($id);
        return view('owners.show', compact('owner'));
    }

    public function edit($id)
    {
        $owner = Owner::findOrFail($id);
        return view('owners.edit', compact('owner'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        $owner = Owner::findOrFail($id);
        $owner->update($request->all());

        return redirect()->route('owners.index')->with('success', 'Owner updated!');
    }

    public function destroy($id)
    {
        Owner::destroy($id);
        return redirect()->route('owners.index')->with('success', 'Owner deleted!');
    }
}

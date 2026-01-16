<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Owner;
use App\Models\Category;
use App\Models\User;

class PropertyController extends Controller
{
    //
     public function index()
    {
        $properties = Property::all();
        return view('properties.index', compact('properties'));
    }

     public function create()
    {
        $owners = Owner::all();
        $categories = Category::all();
        $agents = User::where('role', 'agent')->get();
        
        return view('properties.create', compact('owners', 'categories', 'agents'));
    }

      public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'owner_id' => 'required',
            'category_id' => 'required',
            'agent_id' => 'required',
        ]);

        Property::create($request->all());

        return redirect()->route('properties.index')->with('success', 'Property added!');
    }

    public function show($id)
    {
        $property = Property::findOrFail($id);
        return view('properties.show', compact('property'));
    }

     public function edit($id)
    {
        $property = Property::findOrFail($id);
        $owners = Owner::all();
        $categories = Category::all();
        $agents = User::where('role', 'agent')->get();
        
        return view('properties.edit', compact('property', 'owners', 'categories', 'agents'));
    }


     public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'price' => 'required|numeric',
            'owner_id' => 'required',
            'category_id' => 'required',
            'agent_id' => 'required',
        ]);

        $property = Property::findOrFail($id);
        $property->update($request->all());

        return redirect()->route('properties.index')->with('success', 'Property updated!');
    }

     public function destroy($id)
    {
        Property::destroy($id);
        return redirect()->route('properties.index')->with('success', 'Property deleted!');
    }
}

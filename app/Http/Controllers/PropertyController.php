<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\Owner;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class PropertyController extends Controller
{
    public function index()
    {
        $properties = Property::with('images')->get();
        
        return view('properties.index', compact('properties'));
    }

    public function create()
    {
        $owners = Owner::all();
        $categories = Category::all();
        $agents = User::all(); 
        
        return view('properties.create', compact('owners', 'categories', 'agents'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'price' => 'required|integer',
            'owner_id' => 'required|exists:owners,id',
            'category_id' => 'required|exists:categories,id',
            'agent_id' => 'required|exists:users,id',
            'property_type' => 'required',
            'listing_date' => 'required|date'
        ]);

        Property::create([
            'title' => $request->title,
            'description' => $request->description,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'property_type' => $request->property_type,
            'listing_date' => $request->listing_date,
            'owner_id' => $request->owner_id,
            'category_id' => $request->category_id,
            'agent_id' => $request->agent_id,
        ]);

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
        $agents = User::all();
        
        return view('properties.edit', compact('property', 'owners', 'categories', 'agents'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'description' => 'required',
            'price' => 'required|integer',
            'owner_id' => 'required|exists:owners,id',
            'category_id' => 'required|exists:categories,id',
            'agent_id' => 'required|exists:users,id',
            'property_type' => 'required',
            'listing_date' => 'required|date'
        ]);

        $property = Property::findOrFail($id);
        
        $property->update([
            'description' => $request->description,
            'address' => $request->address,
            'city' => $request->city,
            'country' => $request->country,
            'price' => $request->price,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'property_type' => $request->property_type,
            'listing_date' => $request->listing_date,
            'owner_id' => $request->owner_id,
            'category_id' => $request->category_id,
            'agent_id' => $request->agent_id,
        ]);

        return redirect()->route('properties.index')->with('success', 'Property updated!');
    }

    public function destroy($id)
    {
        Property::destroy($id);
        return redirect()->route('properties.index')->with('success', 'Property deleted!');
    }
}
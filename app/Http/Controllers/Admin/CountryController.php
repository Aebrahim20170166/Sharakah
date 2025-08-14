<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    // index page
    public function index()
    {
        $countries = Country::all();
        return view('dashboard.countries.index', compact('countries'));
    }

    // add country page
    public function create()
    {
        return view('dashboard.countries.add');
    }

    // edit country page
    public function edit($id)
    {
        return view('dashboard.countries.edit', compact('id'));
    }

    // store logic
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "code" => "required|string|max:255",
            "image" => "required|image"
        ]);

        // store image first
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('countries', 'public');
        }

        // create country
        Country::create([
            "name" => $request->name,
            "code" => $request->code,
            "image" => $imagePath
        ]);

        return redirect()->route('countries.index')->with('success', 'Country created successfully.');
    }
}

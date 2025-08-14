<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    // index page
    public function index()
    {
        $cities = City::with('country')->get();
        return view('dashboard.cities.index', compact('cities'));
    }

    // add city page
    public function create()
    {
        $countries = Country::all();
        return view('dashboard.cities.add', compact('countries'));
    }

    // edit city page
    public function edit($id)
    {
        return view('dashboard.cities.edit', compact('id'));
    }

    // store logic
    public function store(Request $request)
    {
        $request->validate([
            "name_ar" => "required|string|max:255",
            "name_en" => "required|string|max:255",
            "country_id" => "required|exists:countries,id",
            
        ]);

        // create city
        City::create([
            "name" => $request->name_ar,
            "name_en" => $request->name_en,
            "country_id" => $request->country_id,
        ]);

        return redirect()->route('cities.index')->with('success', 'City created successfully.');
    }
}

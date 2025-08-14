<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;

class SectorController extends Controller
{
    // index page
    public function index()
    {
        $sectors = Sector::all();
        return view('dashboard.sectors.index', compact('sectors'));
    }

    // add sector page
    public function create()
    {
        return view('dashboard.sectors.add');
    }

    // edit sector page
    public function edit($id)
    {
        return view('dashboard.sectors.edit', compact('id'));
    }

    // store logic
    public function store(Request $request)
    {
        $request->validate([
            "name_ar" => "required|string|max:255",
            "name_en" => "required|string|max:255",
            "image" => "required|image"
        ]);

        // store image first
        $imagePath = $request->file('image')->store('sectors', 'public');

        // create sector
        Sector::create([
            "name" => $request->name_ar,
            "name_en" => $request->name_en,
            "image" => $imagePath
        ]);

        return redirect()->route('sectors.index')->with('success', 'Sector created successfully.');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    // index page
    public function index()
    {
        return view('dashboard.branches.index');
    }

    // add branch page
    public function create()
    {
        return view('dashboard.branches.add');
    }

    // edit branch page
    public function edit($id)
    {
        return view('dashboard.branches.edit', compact('id'));
    }

    // store logic
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "city_id" => "required|exists:cities,id",
        ]);

        // create branch
        Branch::create([
            "name" => $request->name,
            "city_id" => $request->city_id,
        ]);

        return redirect()->route('branches.index')->with('success', 'Branch created successfully.');
    }
}

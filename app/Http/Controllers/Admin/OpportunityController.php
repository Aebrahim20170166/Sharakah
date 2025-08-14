<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Opportunity;
use App\Models\Sector;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    // index page
    public function index()
    {
        $opportunities = Opportunity::with(['city', 'sector'])->get();
        return view('dashboard.opportunities.index', compact('opportunities'));
    }

    // add opportunity page
    public function create()
    {
        $cities = City::all();
        $sectors = Sector::all();
        return view('dashboard.opportunities.add', compact('cities', 'sectors'));
    }

    // edit opportunity page
    public function edit($id)
    {
        return view('dashboard.opportunities.edit', compact('id'));
    }

    // store logic
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'tenant_id' => 'required|numeric',
            'city' => 'required|exists:cities,id',
            'sector' => 'required|exists:sectors,id',
            'min_investment' => 'required|numeric',
            'status' => 'required|string',
            'target_amount' => 'required|numeric',
            'raised_amount' => 'required|numeric',
            'expected_roi' => 'required|numeric',
            'payback_months' => 'required|string',
            'summary' => 'required|string',
            'assumptions' => 'required|array',
        ]);

        Opportunity::create([
            'title' => $request->title,
            'tenant_id' => $request->tenant_id,
            'city' => $request->city,
            'sector' => $request->sector,
            'min_investment' => $request->min_investment,
            'status' => $request->status,
            'target_amount' => $request->target_amount,
            'raised_amount' => $request->raised_amount,
            'expected_roi' => $request->expected_roi,
            'payback_months' => $request->payback_months,
            'summary' => $request->summary,
            'assumptions' => $request->assumptions,
        ]);

        return redirect()->route('opportunities.index')->with('success', 'Opportunity created successfully.');
    }
}

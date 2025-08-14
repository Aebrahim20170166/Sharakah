<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityCostsController extends Controller
{
    public function index()
    {
        $costs = Cost::all();
        return view('dashboard.opportunity_costs.index', compact('costs'));
    }

    public function create()
    {
        $opportunities = Opportunity::all();
        return view('dashboard.opportunity_costs.add', compact('opportunities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'price' => 'required|numeric',
            'opportunity_id' => 'required|exists:opportunities,id',
        ]);

        Cost::create([
            'item' => $request->item,
            'price' => $request->price,
            'opportunity_id' => $request->opportunity_id,
        ]);

        return redirect()->route('dashboard.opportunity_costs.index')->with('success', 'تم إضافة تكلفة الفرصه بنجاح.');
    }

    // edit page
    public function edit($cost_id)
    {
        $cost = Cost::findOrFail($cost_id);
        $opportunities = Opportunity::all();
        return view('dashboard.opportunity_costs.edit', compact('cost', 'opportunities'));
    }

    // update logic
    public function update(Request $request, $cost_id)
    {
        $cost = Cost::findOrFail($cost_id);

        $request->validate([
            'item' => 'required|string|max:255',
            'price' => 'required|numeric',
            'opportunity_id' => 'required|exists:opportunities,id',
        ]);

        $cost->update([
            'item' => $request->item ?? $cost->item,
            'price' => $request->price ?? $cost->price,
            'opportunity_id' => $request->opportunity_id ?? $cost->opportunity_id,
        ]);

        return redirect()->route('dashboard.opportunity_costs.index')->with('success', 'تم تحديث تكلفة الفرصه بنجاح.');
    }

    // delete logic
    public function destroy($cost_id)
    {
        $cost = Cost::findOrFail($cost_id);
        $cost->delete();

        return redirect()->route('dashboard.opportunity_costs.index')->with('success', 'تم حذف تكلفة الفرصه بنجاح.');
    }
}

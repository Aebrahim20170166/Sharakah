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
        $opportunity = Opportunity::findOrFail($id);
        $cities = City::all();
        $sectors = Sector::all();
        return view('dashboard.opportunities.edit', compact('id', 'opportunity', 'cities', 'sectors'));
    }

    // store logic
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'sector_id' => 'required|exists:sectors,id',
            'min_investment' => 'required|numeric',
            'target_amount' => 'required|numeric',
            'expected_roi' => 'required|numeric',
            'payback_months' => 'required|string',
            'summary' => 'required|string',
            'assumptions' => 'required',
        ]);
        
        $opportunity = Opportunity::create($request->all());
        
        return redirect()->route('opportunities.index')
            ->with('success', 'تم إضافة الفرصة الاستثمارية "' . $opportunity->title . '" بنجاح! 🎉');
    }

    // update logic
    public function update(Request $request, $id)
    {
        $opportunity = Opportunity::findOrFail($id);
        
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'sector_id' => 'required|exists:sectors,id',
            'min_investment' => 'required|numeric',
            'target_amount' => 'required|numeric',
            'expected_roi' => 'required|numeric',
            'payback_months' => 'required|string',
            'summary' => 'required|string',
            'assumptions' => 'required|array',
            'assumptions.*' => 'required|string|max:500',
        ]);
        
        $opportunity->update($request->all());
        
        return redirect()->route('opportunities.index')
            ->with('success', 'تم تحديث الفرصة الاستثمارية "' . $opportunity->title . '" بنجاح! ✨');
    }

    // destroy logic
    public function destroy($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        $title = $opportunity->title; // حفظ العنوان قبل الحذف
        $opportunity->delete();
        
        return redirect()->route('opportunities.index')
            ->with('success', 'تم حذف الفرصة الاستثمارية "' . $title . '" بنجاح! ��️');
    }
    
}

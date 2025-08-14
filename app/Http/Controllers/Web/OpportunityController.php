<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Web\OpportunityResource;
use App\Models\City;
use App\Models\Opportunity;
use App\Models\Sector;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function home()
    {
        // هنا يمكنك إضافة منطق عرض الفرص
        $opportunities = Opportunity::with(['city', 'sector'])->get();

        //$opportunities = OpportunityResource::collection($opportunities);
        return view('index', compact('opportunities'));
    }

    public function all(Request $request)
    {
        $opportunities = Opportunity::with(['city', 'sector']);
        if ($request->filled('city_id')) {
            $opportunities = $opportunities->where('city_id', $request->input('city_id'));
        }
        if ($request->filled('sector_id')) {
            $opportunities = $opportunities->where('sector_id', $request->input('sector_id'));
        }
        if ($request->filled('min_investment')) {
            $opportunities = $opportunities->where('min_investment', '<=', $request->input('min_investment'));
        }
        if ($request->filled('status')) {
            $opportunities = $opportunities->where('status', $request->input('status'));
        }

        $opportunities = $opportunities->get();

        $sectors = Sector::all();
        $cities = City::all();
        //dd($opportunities, $sectors, $cities);
        //$opportunities = OpportunityResource::collection($opportunities);
        return view('opportunities', compact('opportunities', 'sectors', 'cities'));
    }

    public function filter(Request $request)
    {
        $opportunities = Opportunity::with(['city', 'sector']);
        if ($request->filled('city_id')) {
            $opportunities = $opportunities->where('city_id', $request->input('city_id'));
        }
        if ($request->filled('sector_id')) {
            $opportunities = $opportunities->where('sector_id', $request->input('sector_id'));
        }
        if ($request->filled('min_investment')) {
            $opportunities = $opportunities->where('min_investment', '<=', $request->input('min_investment'));
        }
        if ($request->filled('status')) {
            $opportunities = $opportunities->where('status', $request->input('status'));
        }

        $opportunities = $opportunities->get();

        //return OpportunityResource::collection($opportunities);
        return response()->json($opportunities);
    }

    // get opportunity details
    public function show($opportunity)
    {
        $opportunity = Opportunity::with(['city', 'sector'])->findOrFail($opportunity);
        $percentage = ($opportunity->raised_amount / $opportunity->target_amount) * 100;
        return view('opportunity', compact('opportunity', 'percentage'));
    }

    // الفرص قيد التمويل
    public function inFunding()
    {
        $cities = City::all();
        $sectors = Sector::all();
        $opportunities = Opportunity::with(['city', 'sector'])
            ->whereHas('investments', function ($query) {
                // فقط لجلب الفرص التي عليها استثمارات
            })
            ->get()
            ->filter(function ($opportunity) {
                // اجمالي المبلغ المستثمر أقل من المبلغ المستهدف
                return $opportunity->investments->sum('amount') < $opportunity->target_amount;
            });

        return view('in_funding_opportunities', compact('opportunities', 'cities', 'sectors'));
    }
}

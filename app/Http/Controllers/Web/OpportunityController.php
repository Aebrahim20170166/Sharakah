<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Resources\Web\OpportunityResource;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    public function index()
    {
        // هنا يمكنك إضافة منطق عرض الفرص
        $opportunities = Opportunity::with(['city', 'sector'])->get();

        //$opportunities = OpportunityResource::collection($opportunities);
        return view('index', compact('opportunities'));
    }

    // get opportunity details
    public function show($opportunity)
    {
        $opportunity = Opportunity::with(['city', 'sector'])->findOrFail($opportunity);
        return view('opportunity', compact('opportunity'));
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    // apply for investment on some opportunity
    public function store(Request $request, $opportunity_id)
    {
        $investment = Investment::create([
            'user_id' => $request->user()->id,
            'opportunity_id' => $opportunity_id,
            'amount' => $request->input('amount'),
            //'received_amount' => $request->input('received_amount'),

        ]);

        return redirect()->route('opportunity', $investment->opportunity_id);
    }
}

<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    // apply for investment on some opportunity
    public function create(Request $request)
    {
        $investment = Investment::create([
            'user_id' => $request->user()->id,
            'opportunity_id' => $request->input('opportunity_id'),
            'amount' => $request->input('amount'),
            'received_amount' => $request->input('received_amount'),

        ]);

        return redirect()->route('opportunities.show', $investment->opportunity_id);
    }
}

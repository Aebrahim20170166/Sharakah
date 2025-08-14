<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    public function index()
    {
        return view('support');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'details' => 'required|string|max:1000',
        ]);

        $support = Support::create([
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'details' => $request->details,
        ]);

        return redirect()->back()->with('success', 'تم إرسال طلب الدعم بنجاح.');

        // هنا يمكنك إضافة منطق تخزين الدعم
    }

}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Support;
use Illuminate\Http\Request;

class SupportController extends Controller
{
    // index page
    public function index()
    {
        $supports = Support::all();

        return view('dashboard.support.index', compact('supports'));
    }

    // destroy some message
    public function destroy($id)
    {
        $support = Support::findOrFail($id);
        $support->delete();

        return redirect()->route('dashboard.support.index');
    }
}

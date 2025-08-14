<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    // index page
    public function index()
    {
        $countries = Country::all();
        return view('dashboard.countries.index', compact('countries'));
    }

    // add country page
    public function create()
    {
        return view('dashboard.countries.add');
    }

    // edit country page
    public function edit($id)
    {
        $country = Country::findOrFail($id);
        return view('dashboard.countries.edit', compact('id', 'country'));
    }

    // store logic
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "name_en" => "required|string|max:255",
            "code" => "required|string|max:255",
        ]);

        // create country
        $country = Country::create([
            "name" => $request->name,
            "name_en" => $request->name_en,
            "code" => $request->code,
        ]);

        return redirect()->route('countries.index')
            ->with('success', 'تم إضافة الدولة "' . $country->name . '" بنجاح! 🎉');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "name_en" => "required|string|max:255",
            "code" => "required|string|max:255",
        ]);

        $country = Country::findOrFail($id);
        $country->update([
            "name" => $request->name,
            "name_en" => $request->name_en,
            "code" => $request->code,
        ]);

        return redirect()->route('countries.index')
            ->with('success', 'تم تحديث الدولة "' . $country->name . '" بنجاح! ✨');
    }

    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $name = $country->name; // حفظ الاسم قبل الحذف
        $country->delete();

        return redirect()->route('countries.index')
            ->with('success', 'تم حذف الدولة "' . $name . '" بنجاح! 🗑️');
    }
}

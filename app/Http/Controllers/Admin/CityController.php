<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Country;
use Illuminate\Http\Request;

class CityController extends Controller
{
    // index page
    public function index()
    {
        $cities = City::with('country')->get();
        return view('dashboard.cities.index', compact('cities'));
    }

    // add city page
    public function create()
    {
        $countries = Country::all();
        return view('dashboard.cities.add', compact('countries'));
    }

    // edit city page
    public function edit($id)
    {
        $city = City::findOrFail($id);
        $countries = Country::all();
        return view('dashboard.cities.edit', compact('id', 'city', 'countries'));
    }

    // store logic
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "name_en" => "required|string|max:255",
            "country_id" => "required|exists:countries,id",
        ]);

        // create city
        $city = City::create([
            "name" => $request->name,
            "name_en" => $request->name_en,
            "country_id" => $request->country_id,
        ]);

        return redirect()->route('cities.index')
            ->with('success', 'تم إضافة المدينة "' . $city->name . '" بنجاح! 🎉');
    }

    public function update($id, Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "name_en" => "required|string|max:255",
            "country_id" => "required|exists:countries,id",
        ]);

        $city = City::findOrFail($id);
        $city->update([
            "name" => $request->name,
            "name_en" => $request->name_en,
            "country_id" => $request->country_id,
        ]);

        return redirect()->route('cities.index')
            ->with('success', 'تم تحديث المدينة "' . $city->name . '" بنجاح! ✨');
    }

    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $name = $city->name; // حفظ الاسم قبل الحذف
        $city->delete();

        return redirect()->route('cities.index')
            ->with('success', 'تم حذف المدينة "' . $name . '" بنجاح! 🗑️');
    }
}

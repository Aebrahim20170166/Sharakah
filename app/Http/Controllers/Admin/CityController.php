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
        return view('dashboard.cities.edit', compact('city', 'countries'));
    }

    // store logic
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "name_en" => "required|string|max:255",
            "country_id" => "required|exists:countries,id",
        ], [
            'name.required' => 'اسم المدينة مطلوب',
            'name.string' => 'اسم المدينة يجب أن يكون نص',
            'name.max' => 'اسم المدينة لا يمكن أن يتجاوز 255 حرف',
            'name_en.required' => 'اسم المدينة بالإنجليزية مطلوب',
            'name_en.string' => 'اسم المدينة بالإنجليزية يجب أن يكون نص',
            'name_en.max' => 'اسم المدينة بالإنجليزية لا يمكن أن يتجاوز 255 حرف',
            'country_id.required' => 'الدولة مطلوبة',
            'country_id.exists' => 'الدولة المحددة غير موجودة'
        ]);

        try {
            // create city
            $city = City::create([
                "name" => $request->name,
                "name_en" => $request->name_en,
                "country_id" => $request->country_id,
            ]);

            return redirect()->route('dashboard.cities.index')
                ->with('success', 'تم إضافة المدينة "' . $city->name . '" بنجاح! 🎉');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة المدينة. يرجى المحاولة مرة أخرى.');
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "name_en" => "required|string|max:255",
            "country_id" => "required|exists:countries,id",
        ], [
            'name.required' => 'اسم المدينة مطلوب',
            'name.string' => 'اسم المدينة يجب أن يكون نص',
            'name.max' => 'اسم المدينة لا يمكن أن يتجاوز 255 حرف',
            'name_en.required' => 'اسم المدينة بالإنجليزية مطلوب',
            'name_en.string' => 'اسم المدينة بالإنجليزية يجب أن يكون نص',
            'name_en.max' => 'اسم المدينة بالإنجليزية لا يمكن أن يتجاوز 255 حرف',
            'country_id.required' => 'الدولة مطلوبة',
            'country_id.exists' => 'الدولة المحددة غير موجودة'
        ]);

        try {
            $city = City::findOrFail($id);
            
            $city->update([
                "name" => $request->name,
                "name_en" => $request->name_en,
                "country_id" => $request->country_id,
            ]);

            return redirect()->route('dashboard.cities.index')
                ->with('success', 'تم تحديث المدينة "' . $city->name . '" بنجاح! ✨');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث المدينة. يرجى المحاولة مرة أخرى.');
        }
    }

    public function destroy($id)
    {
        try {
            $city = City::findOrFail($id);
            $cityName = $city->name;
            
            $city->delete();

            return redirect()->route('dashboard.cities.index')
                ->with('success', 'تم حذف المدينة "' . $cityName . '" بنجاح! 🗑️');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء حذف المدينة. يرجى المحاولة مرة أخرى.');
        }
    }
}

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
        return view('dashboard.countries.edit', compact('country'));
    }

    // store logic
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "name_en" => "required|string|max:255",
            "code" => "required|string|max:10|unique:countries,code",
        ], [
            'name.required' => 'اسم الدولة مطلوب',
            'name.string' => 'اسم الدولة يجب أن يكون نص',
            'name.max' => 'اسم الدولة لا يمكن أن يتجاوز 255 حرف',
            'name_en.required' => 'اسم الدولة بالإنجليزية مطلوب',
            'name_en.string' => 'اسم الدولة بالإنجليزية يجب أن يكون نص',
            'name_en.max' => 'اسم الدولة بالإنجليزية لا يمكن أن يتجاوز 255 حرف',
            'code.required' => 'رمز الدولة مطلوب',
            'code.string' => 'رمز الدولة يجب أن يكون نص',
            'code.max' => 'رمز الدولة لا يمكن أن يتجاوز 10 أحرف',
            'code.unique' => 'رمز الدولة مستخدم بالفعل'
        ]);

        try {
            // create country
            $country = Country::create([
                "name" => $request->name,
                "name_en" => $request->name_en,
                "code" => strtoupper($request->code),
            ]);

            return redirect()->route('dashboard.countries.index')
                ->with('success', 'تم إضافة الدولة "' . $country->name . '" بنجاح! 🎉');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة الدولة. يرجى المحاولة مرة أخرى.');
        }
    }

    public function update($id, Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "name_en" => "required|string|max:255",
            "code" => "required|string|max:10|unique:countries,code," . $id,
        ], [
            'name.required' => 'اسم الدولة مطلوب',
            'name.string' => 'اسم الدولة يجب أن يكون نص',
            'name.max' => 'اسم الدولة لا يمكن أن يتجاوز 255 حرف',
            'name_en.required' => 'اسم الدولة بالإنجليزية مطلوب',
            'name_en.string' => 'اسم الدولة بالإنجليزية يجب أن يكون نص',
            'name_en.max' => 'اسم الدولة بالإنجليزية لا يمكن أن يتجاوز 255 حرف',
            'code.required' => 'رمز الدولة مطلوب',
            'code.string' => 'رمز الدولة يجب أن يكون نص',
            'code.max' => 'رمز الدولة لا يمكن أن يتجاوز 10 أحرف',
            'code.unique' => 'رمز الدولة مستخدم بالفعل'
        ]);

        try {
            $country = Country::findOrFail($id);
            
            $country->update([
                "name" => $request->name,
                "name_en" => $request->name_en,
                "code" => strtoupper($request->code),
            ]);

            return redirect()->route('dashboard.countries.index')
                ->with('success', 'تم تحديث الدولة "' . $country->name . '" بنجاح! ✨');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث الدولة. يرجى المحاولة مرة أخرى.');
        }
    }

    public function destroy($id)
    {
        try {
            $country = Country::findOrFail($id);
            $countryName = $country->name;
            
            $country->delete();

            return redirect()->route('dashboard.countries.index')
                ->with('success', 'تم حذف الدولة "' . $countryName . '" بنجاح! 🗑️');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء حذف الدولة. يرجى المحاولة مرة أخرى.');
        }
    }
}

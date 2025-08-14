<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\City;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    // index page
    public function index()
    {
        $branches = Branch::with('city')->get();
        return view('dashboard.branches.index', compact('branches'));
    }

    // add branch page
    public function create()
    {
        $cities = City::all();
        return view('dashboard.branches.add', compact('cities'));
    }

    // edit branch page
    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        $cities = City::all();
        return view('dashboard.branches.edit', compact('branch', 'cities'));
    }

    // store logic
    public function store(Request $request)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "city_id" => "required|exists:cities,id",
        ], [
            'name.required' => 'اسم الفرع مطلوب',
            'name.string' => 'اسم الفرع يجب أن يكون نص',
            'name.max' => 'اسم الفرع لا يمكن أن يتجاوز 255 حرف',
            'city_id.required' => 'المدينة مطلوبة',
            'city_id.exists' => 'المدينة المحددة غير موجودة'
        ]);

        try {
            // create branch
            $branch = Branch::create([
                "name" => $request->name,
                "city_id" => $request->city_id,
            ]);

            return redirect()->route('dashboard.branches.index')
                ->with('success', 'تم إضافة الفرع "' . $branch->name . '" بنجاح! 🏢');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة الفرع. يرجى المحاولة مرة أخرى.');
        }
    }

    // update logic
    public function update(Request $request, $id)
    {
        $request->validate([
            "name" => "required|string|max:255",
            "city_id" => "required|exists:cities,id",
        ], [
            'name.required' => 'اسم الفرع مطلوب',
            'name.string' => 'اسم الفرع يجب أن يكون نص',
            'name.max' => 'اسم الفرع لا يمكن أن يتجاوز 255 حرف',
            'city_id.required' => 'المدينة مطلوبة',
            'city_id.exists' => 'المدينة المحددة غير موجودة'
        ]);

        try {
            $branch = Branch::findOrFail($id);
            
            $branch->update([
                "name" => $request->name,
                "city_id" => $request->city_id,
            ]);

            return redirect()->route('dashboard.branches.index')
                ->with('success', 'تم تحديث الفرع "' . $branch->name . '" بنجاح! ✨');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث الفرع. يرجى المحاولة مرة أخرى.');
        }
    }

    // destroy logic
    public function destroy($id)
    {
        try {
            $branch = Branch::findOrFail($id);
            $branchName = $branch->name;
            
            $branch->delete();

            return redirect()->route('dashboard.branches.index')
                ->with('success', 'تم حذف الفرع "' . $branchName . '" بنجاح! 🗑️');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء حذف الفرع. يرجى المحاولة مرة أخرى.');
        }
    }
}

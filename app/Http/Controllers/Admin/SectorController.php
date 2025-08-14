<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SectorController extends Controller
{
    // index page
    public function index()
    {
        $sectors = Sector::all();
        return view('dashboard.sectors.index', compact('sectors'));
    }

    // add sector page
    public function create()
    {
        return view('dashboard.sectors.add');
    }

    // edit sector page
    public function edit($id)
    {
        $sector = Sector::findOrFail($id);
        return view('dashboard.sectors.edit', compact('sector'));
    }

    // store logic
    public function store(Request $request)
    {
        $request->validate([
            "name_ar" => "required|string|max:255",
            "name_en" => "required|string|max:255",
            "image" => "required|image|mimes:jpeg,png,jpg,gif|max:2048"
        ], [
            'name_ar.required' => 'اسم القطاع بالعربية مطلوب',
            'name_ar.string' => 'اسم القطاع بالعربية يجب أن يكون نص',
            'name_ar.max' => 'اسم القطاع بالعربية لا يمكن أن يتجاوز 255 حرف',
            'name_en.required' => 'اسم القطاع بالإنجليزية مطلوب',
            'name_en.string' => 'اسم القطاع بالإنجليزية يجب أن يكون نص',
            'name_en.max' => 'اسم القطاع بالإنجليزية لا يمكن أن يتجاوز 255 حرف',
            'image.required' => 'صورة القطاع مطلوبة',
            'image.image' => 'الملف يجب أن يكون صورة',
            'image.mimes' => 'صيغة الصورة يجب أن تكون: jpeg, png, jpg, gif',
            'image.max' => 'حجم الصورة لا يمكن أن يتجاوز 2 ميجابايت'
        ]);

        try {
            // store image first
            $imagePath = $request->file('image')->store('sectors', 'public');

            // create sector
            $sector = Sector::create([
                "name" => $request->name_ar,
                "name_en" => $request->name_en,
                "image" => $imagePath
            ]);

            return redirect()->route('dashboard.sectors.index')
                ->with('success', 'تم إضافة القطاع "' . $sector->name . '" بنجاح! 🎉');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة القطاع. يرجى المحاولة مرة أخرى.');
        }
    }

    // update logic
    public function update(Request $request, $id)
    {
        $request->validate([
            "name_ar" => "required|string|max:255",
            "name_en" => "required|string|max:255",
            "image" => "nullable|image|mimes:jpeg,png,jpg,gif|max:2048"
        ], [
            'name_ar.required' => 'اسم القطاع بالعربية مطلوب',
            'name_ar.string' => 'اسم القطاع بالعربية يجب أن يكون نص',
            'name_ar.max' => 'اسم القطاع بالعربية لا يمكن أن يتجاوز 255 حرف',
            'name_en.required' => 'اسم القطاع بالإنجليزية مطلوب',
            'name_en.string' => 'اسم القطاع بالإنجليزية يجب أن يكون نص',
            'name_en.max' => 'اسم القطاع بالإنجليزية لا يمكن أن يتجاوز 255 حرف',
            'image.image' => 'الملف يجب أن يكون صورة',
            'image.mimes' => 'صيغة الصورة يجب أن تكون: jpeg, png, jpg, gif',
            'image.max' => 'حجم الصورة لا يمكن أن يتجاوز 2 ميجابايت'
        ]);

        try {
            $sector = Sector::findOrFail($id);
            $oldImage = $sector->image;
            
            $updateData = [
                "name" => $request->name_ar,
                "name_en" => $request->name_en,
            ];

            // Handle image update
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('sectors', 'public');
                $updateData['image'] = $imagePath;
                
                // Delete old image if exists
                if ($oldImage && Storage::disk('public')->exists($oldImage)) {
                    Storage::disk('public')->delete($oldImage);
                }
            }

            $sector->update($updateData);

            return redirect()->route('dashboard.sectors.index')
                ->with('success', 'تم تحديث القطاع "' . $sector->name . '" بنجاح! ✨');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث القطاع. يرجى المحاولة مرة أخرى.');
        }
    }

    // destroy logic
    public function destroy($id)
    {
        try {
            $sector = Sector::findOrFail($id);
            $sectorName = $sector->name;
            
            // Delete image if exists
            if ($sector->image && Storage::disk('public')->exists($sector->image)) {
                Storage::disk('public')->delete($sector->image);
            }
            
            $sector->delete();

            return redirect()->route('dashboard.sectors.index')
                ->with('success', 'تم حذف القطاع "' . $sectorName . '" بنجاح! 🗑️');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء حذف القطاع. يرجى المحاولة مرة أخرى.');
        }
    }
}

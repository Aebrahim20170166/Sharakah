<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Opportunity;
use App\Models\Sector;
use Illuminate\Http\Request;

class OpportunityController extends Controller
{
    // index page
    public function index()
    {
        $opportunities = Opportunity::with(['city', 'sector'])->get();
        return view('dashboard.opportunities.index', compact('opportunities'));
    }

    // add opportunity page
    public function create()
    {
        $cities = City::all();
        $sectors = Sector::all();
        return view('dashboard.opportunities.add', compact('cities', 'sectors'));
    }

    // edit opportunity page
    public function edit($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        $cities = City::all();
        $sectors = Sector::all();
        return view('dashboard.opportunities.edit', compact('opportunity', 'cities', 'sectors'));
    }

    // store logic
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'sector_id' => 'required|exists:sectors,id',
            'min_investment' => 'required|numeric|min:0',
            'target_amount' => 'required|numeric|min:0',
            'expected_roi' => 'required|numeric|min:0',
            'payback_months' => 'required|string|max:255',
            'summary' => 'required|string|max:1000',
            'assumptions' => 'required|array|min:1',
            'assumptions.*' => 'required|string|max:500',
        ], [
            'title.required' => 'عنوان الفرصة الاستثمارية مطلوب',
            'title.string' => 'عنوان الفرصة الاستثمارية يجب أن يكون نص',
            'title.max' => 'عنوان الفرصة الاستثمارية لا يمكن أن يتجاوز 255 حرف',
            'city_id.required' => 'المدينة مطلوبة',
            'city_id.exists' => 'المدينة المحددة غير موجودة',
            'sector_id.required' => 'القطاع مطلوب',
            'sector_id.exists' => 'القطاع المحدد غير موجود',
            'min_investment.required' => 'الحد الأدنى للاستثمار مطلوب',
            'min_investment.numeric' => 'الحد الأدنى للاستثمار يجب أن يكون رقم',
            'min_investment.min' => 'الحد الأدنى للاستثمار يجب أن يكون أكبر من أو يساوي صفر',
            'target_amount.required' => 'المبلغ المستهدف مطلوب',
            'target_amount.numeric' => 'المبلغ المستهدف يجب أن يكون رقم',
            'target_amount.min' => 'المبلغ المستهدف يجب أن يكون أكبر من أو يساوي صفر',
            'expected_roi.required' => 'العائد المتوقع مطلوب',
            'expected_roi.numeric' => 'العائد المتوقع يجب أن يكون رقم',
            'expected_roi.min' => 'العائد المتوقع يجب أن يكون أكبر من أو يساوي صفر',
            'payback_months.required' => 'فترة الاسترداد مطلوبة',
            'payback_months.string' => 'فترة الاسترداد يجب أن تكون نص',
            'payback_months.max' => 'فترة الاسترداد لا يمكن أن تتجاوز 255 حرف',
            'summary.required' => 'ملخص الفرصة مطلوب',
            'summary.string' => 'ملخص الفرصة يجب أن يكون نص',
            'summary.max' => 'ملخص الفرصة لا يمكن أن يتجاوز 1000 حرف',
            'assumptions.required' => 'الافتراضات مطلوبة',
            'assumptions.array' => 'الافتراضات يجب أن تكون قائمة',
            'assumptions.min' => 'يجب إدخال افتراض واحد على الأقل',
            'assumptions.*.required' => 'الافتراض مطلوب',
            'assumptions.*.string' => 'الافتراض يجب أن يكون نص',
            'assumptions.*.max' => 'الافتراض لا يمكن أن يتجاوز 500 حرف'
        ]);
        
        try {
            $opportunity = Opportunity::create($request->all());
            
            return redirect()->route('dashboard.opportunities.index')
                ->with('success', 'تم إضافة الفرصة الاستثمارية "' . $opportunity->title . '" بنجاح! 🎉');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة الفرصة الاستثمارية. يرجى المحاولة مرة أخرى.');
        }
    }

    // update logic
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'city_id' => 'required|exists:cities,id',
            'sector_id' => 'required|exists:sectors,id',
            'min_investment' => 'required|numeric|min:0',
            'target_amount' => 'required|numeric|min:0',
            'expected_roi' => 'required|numeric|min:0',
            'payback_months' => 'required|string|max:255',
            'summary' => 'required|string|max:1000',
            'assumptions' => 'required|array|min:1',
            'assumptions.*' => 'required|string|max:500',
        ], [
            'title.required' => 'عنوان الفرصة الاستثمارية مطلوب',
            'title.string' => 'عنوان الفرصة الاستثمارية يجب أن يكون نص',
            'title.max' => 'عنوان الفرصة الاستثمارية لا يمكن أن يتجاوز 255 حرف',
            'city_id.required' => 'المدينة مطلوبة',
            'city_id.exists' => 'المدينة المحددة غير موجودة',
            'sector_id.required' => 'القطاع مطلوب',
            'sector_id.exists' => 'القطاع المحدد غير موجود',
            'min_investment.required' => 'الحد الأدنى للاستثمار مطلوب',
            'min_investment.numeric' => 'الحد الأدنى للاستثمار يجب أن يكون رقم',
            'min_investment.min' => 'الحد الأدنى للاستثمار يجب أن يكون أكبر من أو يساوي صفر',
            'target_amount.required' => 'المبلغ المستهدف مطلوب',
            'target_amount.numeric' => 'المبلغ المستهدف يجب أن يكون رقم',
            'target_amount.min' => 'المبلغ المستهدف يجب أن يكون أكبر من أو يساوي صفر',
            'expected_roi.required' => 'العائد المتوقع مطلوب',
            'expected_roi.numeric' => 'العائد المتوقع يجب أن يكون رقم',
            'expected_roi.min' => 'العائد المتوقع يجب أن يكون أكبر من أو يساوي صفر',
            'payback_months.required' => 'فترة الاسترداد مطلوبة',
            'payback_months.string' => 'فترة الاسترداد يجب أن تكون نص',
            'payback_months.max' => 'فترة الاسترداد لا يمكن أن تتجاوز 255 حرف',
            'summary.required' => 'ملخص الفرصة مطلوب',
            'summary.string' => 'ملخص الفرصة يجب أن يكون نص',
            'summary.max' => 'ملخص الفرصة لا يمكن أن يتجاوز 1000 حرف',
            'assumptions.required' => 'الافتراضات مطلوبة',
            'assumptions.array' => 'الافتراضات يجب أن تكون قائمة',
            'assumptions.min' => 'يجب إدخال افتراض واحد على الأقل',
            'assumptions.*.required' => 'الافتراض مطلوب',
            'assumptions.*.string' => 'الافتراض يجب أن يكون نص',
            'assumptions.*.max' => 'الافتراض لا يمكن أن يتجاوز 500 حرف'
        ]);
        
        try {
            $opportunity = Opportunity::findOrFail($id);
            
            $opportunity->update($request->all());
            
            return redirect()->route('dashboard.opportunities.index')
                ->with('success', 'تم تحديث الفرصة الاستثمارية "' . $opportunity->title . '" بنجاح! ✨');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث الفرصة الاستثمارية. يرجى المحاولة مرة أخرى.');
        }
    }

    // destroy logic
    public function destroy($id)
    {
        try {
            $opportunity = Opportunity::findOrFail($id);
            $opportunityTitle = $opportunity->title;
            
            $opportunity->delete();
            
            return redirect()->route('dashboard.opportunities.index')
                ->with('success', 'تم حذف الفرصة الاستثمارية "' . $opportunityTitle . '" بنجاح! 🗑️');
                
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء حذف الفرصة الاستثمارية. يرجى المحاولة مرة أخرى.');
        }
    }
}

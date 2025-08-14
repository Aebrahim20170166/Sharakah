<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cost;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class OpportunityCostsController extends Controller
{
    public function index()
    {
        $costs = Cost::with('opportunity')->get();
        return view('dashboard.opportunity_costs.index', compact('costs'));
    }

    public function create()
    {
        $opportunities = Opportunity::all();
        return view('dashboard.opportunity_costs.add', compact('opportunities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'opportunity_id' => 'required|exists:opportunities,id',
        ], [
            'item.required' => 'اسم البند مطلوب',
            'item.string' => 'اسم البند يجب أن يكون نص',
            'item.max' => 'اسم البند لا يمكن أن يتجاوز 255 حرف',
            'price.required' => 'السعر مطلوب',
            'price.numeric' => 'السعر يجب أن يكون رقم',
            'price.min' => 'السعر يجب أن يكون أكبر من أو يساوي صفر',
            'opportunity_id.required' => 'الفرصة الاستثمارية مطلوبة',
            'opportunity_id.exists' => 'الفرصة الاستثمارية المحددة غير موجودة'
        ]);

        try {
            $cost = Cost::create([
                'item' => $request->item,
                'price' => $request->price,
                'opportunity_id' => $request->opportunity_id,
            ]);

            return redirect()->route('dashboard.opportunity_costs.index')
                ->with('success', 'تم إضافة تكلفة "' . $cost->item . '" بنجاح! 💰');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء إضافة التكلفة. يرجى المحاولة مرة أخرى.');
        }
    }

    // edit page
    public function edit($cost_id)
    {
        $cost = Cost::findOrFail($cost_id);
        $opportunities = Opportunity::all();
        return view('dashboard.opportunity_costs.edit', compact('cost', 'opportunities'));
    }

    // update logic
    public function update(Request $request, $cost_id)
    {
        $request->validate([
            'item' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'opportunity_id' => 'required|exists:opportunities,id',
        ], [
            'item.required' => 'اسم البند مطلوب',
            'item.string' => 'اسم البند يجب أن يكون نص',
            'item.max' => 'اسم البند لا يمكن أن يتجاوز 255 حرف',
            'price.required' => 'السعر مطلوب',
            'price.numeric' => 'السعر يجب أن يكون رقم',
            'price.min' => 'السعر يجب أن يكون أكبر من أو يساوي صفر',
            'opportunity_id.required' => 'الفرصة الاستثمارية مطلوبة',
            'opportunity_id.exists' => 'الفرصة الاستثمارية المحددة غير موجودة'
        ]);

        try {
            $cost = Cost::findOrFail($cost_id);
            
            $cost->update([
                'item' => $request->item,
                'price' => $request->price,
                'opportunity_id' => $request->opportunity_id,
            ]);

            return redirect()->route('dashboard.opportunity_costs.index')
                ->with('success', 'تم تحديث تكلفة "' . $cost->item . '" بنجاح! ✨');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تحديث التكلفة. يرجى المحاولة مرة أخرى.');
        }
    }

    // delete logic
    public function destroy($cost_id)
    {
        try {
            $cost = Cost::findOrFail($cost_id);
            $costName = $cost->item;
            
            $cost->delete();

            return redirect()->route('dashboard.opportunity_costs.index')
                ->with('success', 'تم حذف تكلفة "' . $costName . '" بنجاح! 🗑️');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء حذف التكلفة. يرجى المحاولة مرة أخرى.');
        }
    }
}

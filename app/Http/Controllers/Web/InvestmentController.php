<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Investment;
use App\Models\Opportunity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    // apply for investment on some opportunity
    public function store(Request $request, $opportunity_id)
    {
        // التحقق من وجود الفرصة
        $opportunity = Opportunity::findOrFail($opportunity_id);
        
        // التحقق من صحة البيانات
        $request->validate([
            'amount' => 'required|numeric|min:0',
        ], [
            'amount.required' => 'مبلغ الاستثمار مطلوب',
            'amount.numeric' => 'مبلغ الاستثمار يجب أن يكون رقم',
            'amount.min' => 'مبلغ الاستثمار يجب أن يكون أكبر من أو يساوي صفر'
        ]);

        try {
            // التحقق من أن المستخدم لم يستثمر في هذه الفرصة من قبل
            $existingInvestment = Investment::where('user_id', Auth::id())
                ->where('opportunity_id', $opportunity_id)
                ->first();

            if ($existingInvestment) {
                return redirect()->back()
                    ->with('error', 'لقد قمت بالتقديم على هذه الفرصة الاستثمارية من قبل! ⚠️');
            }

            // التحقق من أن مبلغ الاستثمار لا يتجاوز المبلغ المستهدف
            if ($request->amount > $opportunity->target_amount) {
                return redirect()->back()
                    ->with('error', 'مبلغ الاستثمار يتجاوز المبلغ المستهدف للفرصة! ⚠️');
            }

            // التحقق من أن مبلغ الاستثمار لا يقل عن الحد الأدنى
            if ($request->amount < $opportunity->min_investment) {
                return redirect()->back()
                    ->with('error', 'مبلغ الاستثمار أقل من الحد الأدنى المطلوب! ⚠️');
            }

            $investment = Investment::create([
                'user_id' => Auth::id(),
                'opportunity_id' => $opportunity_id,
                'amount' => $request->amount,
            ]);

            return redirect()->route('opportunity', $opportunity_id)
                ->with('success', 'تم تقديم طلب الاستثمار بنجاح! مبلغ الاستثمار: ' . number_format($request->amount, 2) . ' ريال 🎉');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'حدث خطأ أثناء تقديم طلب الاستثمار. يرجى المحاولة مرة أخرى.');
        }
    }

    // عرض استثمارات المستخدم
    public function myInvestments()
    {
        try {
            
            return view('dashboard');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء تحميل استثماراتك. يرجى المحاولة مرة أخرى.');
        }
    }

    // عرض تفاصيل استثمار معين
    public function show($id)
    {
        try {
            $investment = Investment::with(['opportunity', 'opportunity.city', 'opportunity.sector'])
                ->where('id', $id)
                ->where('user_id', Auth::id())
                ->firstOrFail();

            return view('investment-details', compact('investment'));
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'لم يتم العثور على الاستثمار المطلوب.');
        }
    }

    // إلغاء طلب الاستثمار
    public function cancel($id)
    {
        try {
            $investment = Investment::where('id', $id)
                ->where('user_id', Auth::id())
                ->where('status', 'pending')
                ->firstOrFail();

            $investment->update([
                'status' => 'cancelled',
                'cancelled_at' => now()
            ]);

            return redirect()->route('my-investments')
                ->with('success', 'تم إلغاء طلب الاستثمار بنجاح! 🗑️');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء إلغاء طلب الاستثمار. يرجى المحاولة مرة أخرى.');
        }
    }

    // تحديث مبلغ الاستثمار
    public function update(Request $request, $id)
    {
        try {
            $investment = Investment::where('id', $id)
                ->where('user_id', Auth::id())
                ->where('status', 'pending')
                ->firstOrFail();

            $request->validate([
                'amount' => 'required|numeric|min:0',
            ], [
                'amount.required' => 'مبلغ الاستثمار مطلوب',
                'amount.numeric' => 'مبلغ الاستثمار يجب أن يكون رقم',
                'amount.min' => 'مبلغ الاستثمار يجب أن يكون أكبر من أو يساوي صفر'
            ]);

            // التحقق من أن مبلغ الاستثمار لا يتجاوز المبلغ المستهدف
            if ($request->amount > $investment->opportunity->target_amount) {
                return redirect()->back()
                    ->with('error', 'مبلغ الاستثمار يتجاوز المبلغ المستهدف للفرصة! ⚠️');
            }

            // التحقق من أن مبلغ الاستثمار لا يقل عن الحد الأدنى
            if ($request->amount < $investment->opportunity->min_investment) {
                return redirect()->back()
                    ->with('error', 'مبلغ الاستثمار أقل من الحد الأدنى المطلوب! ⚠️');
            }

            $investment->update([
                'amount' => $request->amount,
                'updated_at' => now()
            ]);

            return redirect()->back()
                ->with('success', 'تم تحديث مبلغ الاستثمار بنجاح! ✨');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء تحديث مبلغ الاستثمار. يرجى المحاولة مرة أخرى.');
        }
    }
}

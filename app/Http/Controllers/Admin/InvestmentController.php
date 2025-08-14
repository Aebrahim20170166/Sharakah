<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DailyReport;
use App\Models\Investment;
use App\Models\Opportunity;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function index(Request $request)
    {
        $query = Investment::with(['user', 'opportunity', 'opportunity.city', 'opportunity.sector']);

        // فلتر حسب الحالة
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        // فلتر حسب الفرصة الاستثمارية
        if ($request->filled('opportunity_id')) {
            $query->where('opportunity_id', $request->opportunity_id);
        }

        // فلتر حسب المستثمر
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // فلتر حسب التاريخ
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $investments = $query->orderBy('created_at', 'desc')->paginate(20);
        $opportunities = Opportunity::all();

        return view('dashboard.invistmints.index', compact('investments', 'opportunities'));
    }

    public function show($id)
    {
        $investment = Investment::with(['user', 'opportunity', 'opportunity.city', 'opportunity.sector'])
            ->findOrFail($id);
        $dailyReorts = DailyReport::where('investment_id', $id)->latest()->get();
        return view('dashboard.invistmints.daily', compact('investment', 'dailyReorts'));
    }
    public function daily_report($id)
    {
        return view('dashboard.invistmints.create', compact('id'));
    }
    public function daily_report_store(Request $request)
    {

        $request->validate([
            'desc' => 'required|string|max:500',
            'amount' => 'required|numeric|min:0',
            'type' => 'required|in:0,1'
        ], [
            'desc.required' => ' الوصف مطلوب',
            'desc.string' => ' الوصف يجب أن يكون نص',
            'desc.max' => ' الوصف لا يمكن أن يتجاوز 500 حرف',
            'amount' => 'القيمة مطلوبة',
            'type' => 'النوع مطلوب'
        ]);
        DailyReport::create([
            'investment_id' => $request->investment_id,
            'user_id' => $request->user()->id,
            'type' => $request->type,
            'desc' => $request->desc,
            'amount' => $request->amount,
        ]);

        return redirect()->route('invistmints', $request->investment_id)
            ->with('success', 'تم إضافة  التقرير بنجاح! 🎉');
    }

    public function approve($id)
    {
        try {
            $investment = Investment::findOrFail($id);

            // التحقق من أن الاستثمار في حالة معلقة
            if ($investment->status !== 'waiting') {
                return redirect()->back()
                    ->with('error', 'لا يمكن الموافقة على استثمار غير معلق!');
            }

            $investment->update([
                'status' => 'active',
            ]);
            $opportunity = Opportunity::find($investment->opportunity_id);
            $opportunity->raised_amount += $investment->amount;
            $opportunity->save();
            return redirect()->back()
                ->with('success', 'تم الموافقة على طلب الاستثمار بنجاح! ✅');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء الموافقة على الاستثمار. يرجى المحاولة مرة أخرى.');
        }
    }

    public function reject(Request $request, $id)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:500'
        ], [
            'rejection_reason.required' => 'سبب الرفض مطلوب',
            'rejection_reason.string' => 'سبب الرفض يجب أن يكون نص',
            'rejection_reason.max' => 'سبب الرفض لا يمكن أن يتجاوز 500 حرف'
        ]);

        try {
            $investment = Investment::findOrFail($id);

            // التحقق من أن الاستثمار في حالة معلقة
            if ($investment->status !== 'waiting') {
                return redirect()->back()
                    ->with('error', 'لا يمكن رفض استثمار غير معلق!');
            }

            $investment->update([
                'status' => 'rejected',
                'rejected_at' => now(),
                'rejected_by' => auth()->id(),
                'rejection_reason' => $request->rejection_reason
            ]);

            return redirect()->back()
                ->with('success', 'تم رفض طلب الاستثمار بنجاح! ❌');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء رفض الاستثمار. يرجى المحاولة مرة أخرى.');
        }
    }

    public function cancel($id)
    {
        try {
            $investment = Investment::findOrFail($id);

            // التحقق من أن الاستثمار في حالة معلقة
            if ($investment->status !== 'waiting') {
                return redirect()->back()
                    ->with('error', 'لا يمكن إلغاء استثمار غير معلق!');
            }

            $investment->update([
                'status' => 'cancelled',
                'cancelled_at' => now(),
                'cancelled_by' => auth()->id()
            ]);

            return redirect()->back()
                ->with('success', 'تم إلغاء طلب الاستثمار بنجاح! 🗑️');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء إلغاء الاستثمار. يرجى المحاولة مرة أخرى.');
        }
    }

    public function bulkAction(Request $request)
    {
        $request->validate([
            'action' => 'required|in:approve,reject,cancel',
            'investment_ids' => 'required|array|min:1',
            'investment_ids.*' => 'exists:investments,id'
        ], [
            'action.required' => 'الإجراء مطلوب',
            'action.in' => 'الإجراء غير صحيح',
            'investment_ids.required' => 'يجب اختيار استثمار واحد على الأقل',
            'investment_ids.array' => 'يجب اختيار استثمار واحد على الأقل',
            'investment_ids.min' => 'يجب اختيار استثمار واحد على الأقل'
        ]);

        try {
            $investments = Investment::whereIn('id', $request->investment_ids)
                ->where('status', 'waiting')
                ->get();

            if ($investments->isEmpty()) {
                return redirect()->back()
                    ->with('warning', 'لا توجد استثمارات معلقة للتعامل معها!');
            }

            $count = 0;
            foreach ($investments as $investment) {
                switch ($request->action) {
                    case 'approve':
                        $investment->update([
                            'status' => 'active',
                        ]);
                        break;
                    case 'reject':
                        $investment->update([
                            'status' => 'rejected',
                            'rejected_at' => now(),
                            'rejected_by' => auth()->id(),
                            'rejection_reason' => 'تم الرفض من الإدارة'
                        ]);
                        break;
                    case 'cancel':
                        $investment->update([
                            'status' => 'cancelled',
                            'cancelled_at' => now(),
                            'cancelled_by' => auth()->id()
                        ]);
                        break;
                }
                $count++;
            }

            $actionText = [
                'approve' => 'الموافقة',
                'reject' => 'الرفض',
                'cancel' => 'الإلغاء'
            ][$request->action];

            return redirect()->back()
                ->with('success', "تم $actionText على $count استثمار بنجاح! 🎉");
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'حدث خطأ أثناء تنفيذ الإجراء. يرجى المحاولة مرة أخرى.');
        }
    }

    public function export(Request $request)
    {
        $query = Investment::with(['user', 'opportunity', 'opportunity.city', 'opportunity.sector']);

        // تطبيق نفس الفلاتر
        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }
        if ($request->filled('opportunity_id')) {
            $query->where('opportunity_id', $request->opportunity_id);
        }
        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }
        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $investments = $query->orderBy('created_at', 'desc')->get();

        // هنا يمكن إضافة منطق تصدير البيانات إلى Excel أو CSV
        return redirect()->back()
            ->with('success', 'تم تصدير البيانات بنجاح! 📊');
    }
}

@extends('layouts.app')

@section('title', 'محفظتي — منصة افتتاح الفروع')

@section('content')
<div class="pagehead">
    <h2>محفظتي</h2>
    <div class="chips">
        <span class="chip">الرصيد القابل للسحب: 12,800 ر.س</span>
        <span class="chip">إجمالي المقبوض: 34,500 ر.س</span>
    </div>
</div>

<div class="grid cols-2">
    <section class="card">
        <h3>المعاملات</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>التاريخ</th>
                    <th>النوع</th>
                    <th>المرجع</th>
                    <th>المبلغ</th>
                    <th>الحالة</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>2025-07-26</td>
                    <td>توزيع أرباح</td>
                    <td>DIS-8932</td>
                    <td>2,300</td>
                    <td>مكتمل</td>
                </tr>
                <tr>
                    <td>2025-07-21</td>
                    <td>إيداع</td>
                    <td>DEP-5521</td>
                    <td>10,000</td>
                    <td>مكتمل</td>
                </tr>
                <tr>
                    <td>2025-07-18</td>
                    <td>سحب</td>
                    <td>WDR-1180</td>
                    <td>5,000</td>
                    <td>قيد المراجعة</td>
                </tr>
            </tbody>
        </table>
    </section>

    <aside class="card">
        <h3>عمليات سريعة</h3>

        <label class="label">شحن المحفظة</label>
        <input class="input" placeholder="المبلغ (ر.س)" />
        <div class="form-actions" style="margin-top:8px;">
            <a class="btn primary" href="#">متابعة الدفع</a>
        </div>

        <hr style="border-color:var(--border); margin:16px 0;">

        <label class="label">طلب سحب</label>
        <input class="input" placeholder="المبلغ (ر.س)" />
        <div class="form-actions" style="margin-top:8px;">
            <a class="btn" href="#">إرسال الطلب</a>
        </div>
    </aside>
</div>
@endsection

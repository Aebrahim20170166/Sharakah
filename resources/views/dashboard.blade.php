@extends('layouts.app')

@section('title', 'لوحة المستثمر — منصة افتتاح الفروع')

@section('content')
<div class="pagehead">
    <h2>لوحة المستثمر</h2>
    <div class="chips">
        <span class="chip">إجمالي مدفوع: {{ number_format($totalAmount, 2) }} ر.س</span>
        <span class="chip">إجمالي مقبوض: {{ number_format($totalRecieved, 2) }} ر.س</span>
        <span class="chip">نسبة الاسترداد: {{ $refundRate }}%</span>
    </div>
</div>

<div class="grid cols-3">
    <div class="card">
        <h3>حالة المحفظة</h3>
        <div class="kpi"><span class="muted">الرصيد القابل للسحب</span><b>12,800 ر.س</b></div>
        <div class="kpi"><span class="muted">آخر توزيع</span><b>2025-07-25</b></div>
    </div>
    <div class="card">
        <h3>تنبيهات</h3>
        <ul>
            <li>تقرير فرع جدة متأخر يومًا واحدًا.</li>
            <li>طلب سحب قيد المراجعة.</li>
        </ul>
    </div>
    <div class="card">
        <h3>فرص قيد التمويل</h3>
        <p class="muted">{{ $fundingOpportunitiesCount }} فرص قريبة من الإكتمال.</p>
        <a class="btn" href="{{ route('in_funding_opportunities') }}">استعرض</a>
    </div>
</div>
<section class="section card">
    <h3>استثماراتي</h3>
    <table class="table">
        <thead>
            <tr>
                <th>اسم الفرصه</th>
                <th>المدينة</th>
                <th>مدفوع</th>
                <th>مقبوض</th>
                <th>نسبة الاسترداد</th>
                <th>إجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($investments as $investment)
            <tr>
                <td>{{ $investment->opportunity->title }}</td>
                <td>{{ $investment->opportunity->city->name }}</td>
                <td>{{ number_format($investment->amount, 2) }}</td>
                <td>{{ number_format($investment->received_amount, 2) }}</td>
                <td>{{ number_format($investment->received_amount / $investment->amount * 100, 2) }}%</td>
                <td><a class="btn" href="{{ route('daily', 1) }}">تقرير يومي</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection
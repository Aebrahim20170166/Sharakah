@extends('layouts.app')

@section('title', 'لوحة المستثمر — منصة افتتاح الفروع')

@section('content')
<div class="pagehead">
    <h2>لوحة المستثمر</h2>
    <div class="chips">
        <span class="chip">إجمالي مدفوع: 120,000 ر.س</span>
        <span class="chip">إجمالي مقبوض: 34,500 ر.س</span>
        <span class="chip">نسبة الاسترداد: 28.7%</span>
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
        <p class="muted">3 فرص قريبة من الإكتمال.</p>
        <a class="btn" href="{{ url('/opportunities') }}">استعرض</a>
    </div>
</div>

<section class="section card">
    <h3>استثماراتي

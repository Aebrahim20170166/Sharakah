@extends('layouts.app')

@section('title', 'تفاصيل الفرصة — منصة افتتاح الفروع')

@section('content')
<div class="pagehead">
    <h2>تفاصيل الفرصة — {{$opportunity->title}} — {{$opportunity->city->name}}</h2>
    <a class="btn primary" href="#invest">استثمر الآن</a>
</div>

<div class="grid cols-2">
    <section class="card">
        <h3>نبذة</h3>
        <p>{{$opportunity->summary}}</p>
        <div class="grid cols-2">
            <div class="kpi"><span class="muted">تكلفة الفرع</span><b>{{$opportunity->target_amount}} ر.س</b></div>
            <div class="kpi"><span class="muted">الحد الأدنى للفرد</span><b>{{$opportunity->min_investment}} ر.س</b></div>
            <div class="kpi"><span class="muted">مدة الاسترداد</span><b>{{$opportunity->payback_months}} شهر</b></div>
            <div class="kpi"><span class="muted">العائد المتوقع</span><b>{{$opportunity->expected_roi}}%</b></div>
        </div>
        <h4>المخاطر والافتراضات</h4>
        <ul>
            @foreach ($opportunity->assumptions as $assumption)
            <li>{{$assumption}}</li>
            @endforeach
        </ul>
    </section>

    <aside class="card" id="invest">
        <h3>الاستثمار</h3>
        <label class="label" for="amount">المبلغ</label>
        <input class="input" id="amount" placeholder="مثال: 20000" />
        <div class="kpi"><span class="muted">نسبة التمويل الحالية</span><b>73%</b></div>
        <div class="progress"><span style="--value:73%"></span></div>
        <div class="form-actions" style="margin-top:10px;">
            <a class="btn primary" href="{{ url('/auth') }}">متابعة</a>
            <a class="btn" href="{{ url('/opportunities') }}">رجوع</a>
        </div>
    </aside>
</div>

<section class="card">
    <h3>خطة التكاليف</h3>
    <table class="table">
        <thead>
            <tr>
                <th>البند</th>
                <th>المبلغ (ر.س)</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>تجهيزات ومعدات</td><td>220,000</td></tr>
            <tr><td>ديكور وإنشاءات</td><td>120,000</td></tr>
            <tr><td>رخص وتأسيس</td><td>30,000</td></tr>
            <tr><td>تشغيل أول 3 أشهر</td><td>80,000</td></tr>
        </tbody>
    </table>
</section>
@endsection

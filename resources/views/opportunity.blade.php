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
        <form action="{{ route('opportunity.invest', $opportunity->id) }}" method="POST">
            @csrf
            <h3>الاستثمار</h3>
            <label class="label" for="amount">المبلغ</label>
            <input class="input" id="amount" name="amount" placeholder="مثال: 20000" />
            <!-- <input class="input" type="hidden" name="opportunity_id" id="opportunity_id" value="{{$opportunity->id}}" /> -->
            <div class="kpi"><span class="muted">نسبة التمويل الحالية</span><b>73%</b></div>
            <div class="progress"><span style="--value:73%"></span></div>
            <div class="form-actions" style="margin-top:10px;">
                <button class="btn primary" type="submit">متابعة</button>
                <a class="btn" href="{{ url('/opportunities') }}">رجوع</a>
            </div>
        </form>
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
            @foreach($opportunity->costs as $cost)
            <tr><td>{{$cost->item}}</td><td>{{$cost->price}}</td></tr>
            @endforeach
        </tbody>
    </table>
</section>
@endsection

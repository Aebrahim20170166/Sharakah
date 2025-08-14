@extends('layouts.app')

@section('title', 'عنوان الصفحة')

@section('content')

<section class="hero">
  <div class="wrap">
    <div>
      <span class="badge">نموذج شفاف • تقارير يومية • محفظة آمنة</span>
      <h1>استثمر في افتتاح فروع بنظام الشراكة<br> مع شفافية كاملة وتقارير لحظية</h1>
      <p>نموذج استثماري يتيح فتح فروع جديدة بتمويل مشترك، مع ربط محاسبي مباشر (API) يطلعك على المبيعات والمصروفات وتوزيعات الأرباح.</p>
      <div class="chips">
        <a class="btn primary" href="{{ route('opportunities.index')}}">استكشف الفرص</a>
        <a class="btn" href="{{ url('/faq')  }}">كيف يعمل النموذج؟</a>
      </div>
      <div class="stats">
        <div class="stat"><b>+50</b> فروع نشطة</div>
        <div class="stat"><b>+320</b> شريك ممول</div>
        <div class="stat"><b>96%</b> استرداد رأس مال خلال 12 شهر (متوسط)</div>
      </div>
    </div>
    <div class="card">
      <h3>نموذج العوائد</h3>
      <div class="kpi"><span class="muted">متوسط العائد السنوي</span><b>18–24%</b></div>
      <div class="kpi"><span class="muted">مدة الاسترداد المتوقعة</span><b>8–14 شهر</b></div>
      <div class="kpi"><span class="muted">التقارير</span><b>يوميًا + شهريًا</b></div>
      <p class="muted">*الأرقام تقديرية وتختلف حسب الفرصة والمدينة.</p>
    </div>
  </div>
</section>

<section class="section">
  <div class="pagehead">
    <h2>فرص مختارة</h2>
    <a class="btn" href="{{ route('opportunities')}}">عرض جميع الفرص</a>
  </div>
  <div class="grid cols-3">
    @forelse ($opportunities as $opportunity)
    <article class="card">
      <h3>{{$opportunity->sector->name}} — {{$opportunity->city->name}}</h3>
      <p class="muted">الحد الأدنى: {{$opportunity->min_investment}} ر.س • العائد المتوقع: {{$opportunity->expected_roi}}% سنويًا</p>
      <div class="progress" aria-label="نسبة التمويل"><span style="--value:{{ number_format(($opportunity->raised_amount / $opportunity->target_amount) * 100, 2) }}%"></span></div>
      <div class="form-actions" style="margin-top:10px;">
        <a class="btn" href="{{ route('opportunity', $opportunity->id)}}">التفاصيل</a>
        <a class="btn primary" href="">استثمر</a>
      </div>
    </article>
    @empty
    <p>لا توجد فرص متاحة في الوقت الحالي.</p>
    @endforelse

  </div>
</section>

@endsection
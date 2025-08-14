@extends('layouts.app')

@section('title', 'عنوان الصفحة')

@section('content')

<div class="pagehead">
  <h2>حالة الربط المحاسبي (API)</h2>
  <a class="btn" href="#">إعادة المزامنة</a>
</div>
<div class="grid cols-3">
  <div class="card">
    <div class="kpi"><span class="muted">الحالة</span><b>متصل</b></div>
  </div>
  <div class="card">
    <div class="kpi"><span class="muted">آخر مزامنة</span><b>2025-07-26 22:05</b></div>
  </div>
  <div class="card">
    <div class="kpi"><span class="muted">قيود اليوم</span><b>124</b></div>
  </div>
</div>
<section class="section card">
  <h3>سجل الأعطال</h3>
  <ul class="muted">
    <li>2025-07-24 09:12 — انقطاع لمدة 4 دقائق، تمت المعالجة.</li>
  </ul>
</section>
@endsection
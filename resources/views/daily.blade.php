@extends('layouts.app')

@section('title', 'التقرير اليومي — منصة افتتاح الفروع')

@section('content')
<div class="pagehead">
  <h2>التقرير اليومي — عيادة أسنان الرياض</h2>
  <div class="chips">
    <span class="chip">آخر تحديث: 2025-07-26 22:10</span>
    <span class="chip">المصدر: API محاسبي</span>
  </div>
</div>

<div class="grid cols-3">
  <div class="card">
    <div class="kpi"><span class="muted">مبيعات اليوم</span><b>8,900 ر.س</b></div>
  </div>
  <div class="card">
    <div class="kpi"><span class="muted">مصروفات اليوم</span><b>2,100 ر.س</b></div>
  </div>
  <div class="card">
    <div class="kpi"><span class="muted">صافي اليوم</span><b>6,800 ر.س</b></div>
  </div>
</div>

<section class="section card">
  <h3>تفصيل العمليات</h3>
  <table class="table">
    <thead>
      <tr>
        <th>الوقت</th>
        <th>النوع</th>
        <th>الوصف</th>
        <th>المبلغ</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>10:12</td>
        <td>بيع</td>
        <td>جلسة كشف</td>
        <td>300</td>
      </tr>
      <tr>
        <td>12:40</td>
        <td>شراء</td>
        <td>مواد مستهلكة</td>
        <td>-180</td>
      </tr>
      <tr>
        <td>16:05</td>
        <td>بيع</td>
        <td>تركيبات</td>
        <td>2,500</td>
      </tr>
    </tbody>
  </table>
</section>
@endsection
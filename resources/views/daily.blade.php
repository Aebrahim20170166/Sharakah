@extends('layouts.app')

@section('title', 'التقرير اليومي — منصة افتتاح الفروع')

@section('content')
<div class="pagehead">
  <h2>التقرير اليومي — عيادة أسنان الرياض</h2>
  <div class="chips">
    <span class="chip">آخر تحديث: {{ $date }}</span>
    <span class="chip">المصدر: API محاسبي</span>
  </div>
</div>

<div class="grid cols-3">
  <div class="card">
    <div class="kpi"><span class="muted">مبيعات اليوم</span><b>{{ $totalBuy }} ر.س</b></div>
  </div>
  <div class="card">
    <div class="kpi"><span class="muted">مصروفات اليوم</span><b>{{ $totalSell }} ر.س</b></div>
  </div>
  <div class="card">
    <div class="kpi"><span class="muted">صافي اليوم</span><b>{{ $totalBuy - $totalSell }} ر.س</b></div>
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
      @foreach($dailyReorts as $report)
      <tr>
        <td>{{ $report->created_at->format('Y-m-d h:i a') }}</td>
        <td>{{ $report->type == 0 ? 'بيع' : 'شراء' }}</td>
        <td>{{ $report->desc }}</td>
        <td>{{ $report->amount }} ر.س</td>
      </tr>
      @endforeach
    </tbody>
  </table>
</section>
@endsection
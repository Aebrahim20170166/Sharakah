@extends('layouts.app')

@section('title', 'عنوان الصفحة')

@section('content')

  <div class="pagehead">
    <h2>استثماراتي</h2>
    <p class="muted">تفاصيل الاستثمارات حسب الفرع.</p>
  </div>
  <table class="table">
    <thead>
      <tr>
        <th>الفرع</th>
        <th>المبلغ المستثمر</th>
        <th>صافي المتحصلات</th>
        <th>الباقي لاسترداد رأس المال</th>
        <th>آخر تقرير</th>
        <th>إجراءات</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>عيادة أسنان — الرياض</td>
        <td>60,000</td>
        <td>18,200</td>
        <td>41,800</td>
        <td>2025-07-26</td>
        <td><a class="btn" href="daily.html">التقرير اليومي</a></td>
      </tr>
      <tr>
        <td>مغسلة سيارات — الدمام</td>
        <td>35,000</td>
        <td>8,500</td>
        <td>26,500</td>
        <td>2025-07-26</td>
        <td><a class="btn" href="daily.html">التقرير اليومي</a></td>
      </tr>
      <tr>
        <td>مخبز — جدة</td>
        <td>25,000</td>
        <td>7,800</td>
        <td>17,200</td>
        <td>2025-07-25</td>
        <td><a class="btn" href="daily.html">التقرير اليومي</a></td>
      </tr>
    </tbody>
  </table>

@endsection

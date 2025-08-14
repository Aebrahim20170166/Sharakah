@extends('layouts.app')

@section('title', 'حركة العمليات — منصة افتتاح الفروع')

@section('content')
<div class="pagehead">
    <h2>حركة المشتريات/المبيعات/المصروفات</h2>
    <div class="chips">
        <span class="chip">بحث</span>
        <span class="chip">فلاتر</span>
        <span class="chip">تصدير</span>
    </div>
</div>

<table class="table">
    <thead>
        <tr>
            <th>التاريخ</th>
            <th>النوع</th>
            <th>المرجع</th>
            <th>الوصف</th>
            <th>المبلغ</th>
            <th>الحالة</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>2025-07-26</td>
            <td>بيع</td>
            <td>INV-1012</td>
            <td>جلسات</td>
            <td>1,200</td>
            <td>مقفل</td>
        </tr>
        <tr>
            <td>2025-07-26</td>
            <td>مشتريات</td>
            <td>PO-441</td>
            <td>مواد</td>
            <td>-600</td>
            <td>مسدد</td>
        </tr>
        <tr>
            <td>2025-07-25</td>
            <td>مصروف</td>
            <td>EXP-220</td>
            <td>صيانة</td>
            <td>-350</td>
            <td>مسدد</td>
        </tr>
    </tbody>
</table>
@endsection

@extends('layouts.app')

@section('title', 'الدعم — منصة افتتاح الفروع')

@section('content')
<div class="pagehead">
    <h2>الدعم</h2>
    <p class="muted">نخدمك عبر التذاكر والبريد والهاتف.</p>
</div>

<div class="grid cols-2">
    <section class="card">
        <h3>إرسال تذكرة</h3>
        <div class="form-row">
            <div>
                <label class="label">الاسم</label>
                <input class="input" placeholder="اسمك الكامل">
            </div>
            <div>
                <label class="label">البريد</label>
                <input class="input" placeholder="example@email.com">
            </div>
        </div>

        <label class="label">الموضوع</label>
        <input class="input" placeholder="موضوع الطلب">

        <label class="label" style="margin-top:8px;">التفاصيل</label>
        <textarea class="input" rows="6" placeholder="اشرح مشكلتك أو سؤالك..."></textarea>

        <div class="form-actions" style="margin-top:10px;">
            <a class="btn primary" href="#">إرسال</a>
        </div>
    </section>

    <aside class="card">
        <h3>قنوات التواصل</h3>
        <p>الهاتف: 9200 00000</p>
        <p>البريد: support@example.com</p>
        <p>واتساب: 05xxxxxxxx</p>
    </aside>
</div>
@endsection

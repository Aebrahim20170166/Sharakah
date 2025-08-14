@extends('layouts.app')

@section('title', 'الدعم — منصة افتتاح الفروع')

@section('content')
<div class="pagehead">
    <h2>الدعم</h2>
    <p class="muted">نخدمك عبر التذاكر والبريد والهاتف.</p>
</div>
@if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
<div class="grid cols-2">
    
    <section class="card">
        <form method="POST" action="{{ route('support.store') }}">
            @csrf
            <h3>إرسال تذكرة</h3>
            <div class="form-row">
                <div>
                    <label class="label">الاسم</label>
                    <input class="input" name="name" placeholder="اسمك الكامل" required>
                </div>
                <div>
                    <label class="label">البريد</label>
                    <input class="input" name="email" placeholder="example@email.com">
                </div>
            </div>

            <label class="label">الموضوع</label>
            <input class="input" name="subject" placeholder="موضوع الطلب">

            <label class="label" style="margin-top:8px;">التفاصيل</label>
            <textarea class="input" name="details" rows="6" placeholder="اشرح مشكلتك أو سؤالك..." required></textarea>

            <div class="form-actions" style="margin-top:10px;">
                <button type="submit" class="btn primary">إرسال</button>
            </div>
        </form>
    </section>

    <aside class="card">
        <h3>قنوات التواصل</h3>
        <p>الهاتف: 9200 00000</p>
        <p>البريد: support@example.com</p>
        <p>واتساب: 05xxxxxxxx</p>
    </aside>
</div>
@endsection
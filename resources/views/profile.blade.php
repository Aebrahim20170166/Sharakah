@extends('layouts.app')

@section('title', 'ملفي الشخصي — منصة افتتاح الفروع')

@section('content')
<div class="pagehead">
    <h2>ملفي الشخصي</h2>
</div>

<div class="grid cols-2">
    <section class="card">
        <h3>البيانات الأساسية</h3>
        <div class="form-row">
            <div>
                <label class="label">الاسم</label>
                <input class="input" value="مستثمر"/>
            </div>
            <div>
                <label class="label">الجوال</label>
                <input class="input" value="05xxxxxxxx"/>
            </div>
        </div>
        <label class="label">البريد</label>
        <input class="input" value="user@example.com"/>
        <div class="form-actions" style="margin-top:10px;">
            <a class="btn primary" href="#">حفظ</a>
        </div>
    </section>

    <section class="card">
        <h3>الإشعارات وطرق السحب</h3>
        <label class="label">إشعارات البريد</label>
        <select class="input">
            <option>مفعلة</option>
            <option>غير مفعلة</option>
        </select>

        <label class="label" style="margin-top:8px;">حساب بنكي للسحب</label>
        <input class="input" placeholder="IBAN / رقم الحساب"/>
        
        <div class="form-actions" style="margin-top:10px;">
            <a class="btn" href="#">تحديث</a>
        </div>
    </section>
</div>
@endsection

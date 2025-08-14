@extends('layouts.app')
@section('content')

<div class="pagehead">
  <h2>تسجيل الدخول / إنشاء حساب</h2>
</div>
<div class="grid cols-2">
  <section class="card">
    <form action="{{route('login')}}" method="POST">
      @csrf
      <h3>تسجيل الدخول</h3>
      <label class="label">البريد أو الجوال</label>
      <input class="input" placeholder="" type="email" name="email">
      <label class="label" style="margin-top:8px;">كلمة المرور</label>
      <input class="input" placeholder="" type="password" name="password">

      <div class="form-actions" style="margin-top:10px;">
        <button class="btn primary" type="submit">تسجيل دخول </button>
      </div>
    </form>
  </section>
  <section class="card">
    <h3>إنشاء حساب</h3>
    <form action="{{route('register')}}" method="POST">
      @csrf
      <div class="form-row">
        <div>
          <label class="label">الاسم</label>
          <input class="input" placeholder="اسمك الكامل" name="name">
        </div>
        <div>
          <label class="label">الجوال</label>
          <input class="input" placeholder="05xxxxxxxx" name="phone">
        </div>
      </div>
      <label class="label">البريد</label>
      <input class="input" placeholder="example@email.com" name="email">
      <label class="label" style="margin-top:8px;">كلمة المرور</label>
      <input class="input" placeholder="" type="password" name="password">
      <div class="form-actions" style="margin-top:10px;">
        <button class="btn primary" type="submit">إنشاء الحساب</button>
      </div>
    </form>
  </section>
</div>
@endsection
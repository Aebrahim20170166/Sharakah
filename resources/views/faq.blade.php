@extends('layouts.app')

@section('title', 'الأسئلة الشائعة — منصة افتتاح الفروع')

@section('content')
<section class="section">
    <div class="container">
      <h2 class="mb-4">الأسئلة الشائعة</h2>
      <div class="accordion" id="faqAccordion">
        <div class="accordion-item">
          <h2 class="accordion-header"><button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#q1">كيف أسجل حساب جديد؟</button></h2>
          <div id="q1" class="accordion-collapse collapse show"><div class="accordion-body">يمكنك التسجيل بسهولة عبر صفحة التسجيل.</div></div>
        </div>
        <div class="accordion-item">
          <h2 class="accordion-header"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#q2">هل الخدمة مجانية؟</button></h2>
          <div id="q2" class="accordion-collapse collapse"><div class="accordion-body">نعم، الخدمة مجانية تماماً.</div></div>
        </div>
      </div>
    </div>
  </section>
@endsection

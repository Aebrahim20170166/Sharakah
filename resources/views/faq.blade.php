@extends('layouts.app')

@section('title', 'الأسئلة الشائعة — منصة افتتاح الفروع')

@section('content')
<div class="pagehead">
    <h2>الأسئلة الشائعة</h2>
</div>

<div class="grid cols-2">
    <section class="card">
        <h3>كيف يعمل نموذج الشراكة؟</h3>
        <p class="muted">نموّل افتتاح فرع عبر عدة شركاء، وتديره المنصة وتشرف على التوزيعات والربط المحاسبي.</p>
    </section>
    <section class="card">
        <h3>كيف يتم استرداد رأس المال؟</h3>
        <p class="muted">يتم عبر صافي المتحصلات حسب أداء الفرع حتى اكتمال الاسترداد ثم أرباح.</p>
    </section>
    <section class="card">
        <h3>هل أملك أصول الفرع؟</h3>
        <p class="muted">الأصول مملوكة للشركة المشغلة وفقًا للعقد، والشريك يملك حقًا ماليًا بالعوائد.</p>
    </section>
    <section class="card">
        <h3>كيف تصل التقارير اليومية؟</h3>
        <p class="muted">تعرض داخل لوحة المستثمر ويمكن تفعيل الإرسال بالبريد.</p>
    </section>
</div>
@endsection

@extends('layouts.app')

@section('title', 'عنوان الصفحة')

@section('content')

    <div class="pagehead">
      <h2>الفرص الاستثمارية</h2>
      <div class="chips">
        <span class="chip">المدينة</span>
        <span class="chip">القطاع</span>
        <span class="chip">الحد الأدنى</span>
        <span class="chip">الحالة</span>
      </div>
    </div>

    <section class="card" id="filters">
      <div class="form-row">
        <div>
          <label class="label">المدينة</label>
          <select class="input" id="cityFilter">
            <option value="">الكل</option>
            <option>الرياض</option>
            <option>جدة</option>
            <option>الدمام</option>
          </select>
        </div>
        <div>
          <label class="label">القطاع</label>
          <select class="input" id="sectorFilter">
            <option value="">الكل</option>
            <option>المأكولات</option>
            <option>الرعاية الصحية</option>
            <option>الخدمات</option>
          </select>
        </div>
      </div>
      <div class="form-row" style="margin-top:8px;">
        <div>
          <label class="label">الحد الأدنى للاستثمار</label>
          <select class="input" id="minFilter">
            <option value="">الكل</option>
            <option value="5000">≤ 5,000</option>
            <option value="8000">≤ 8,000</option>
            <option value="15000">≤ 15,000</option>
          </select>
        </div>
        <div>
          <label class="label">الحالة</label>
          <select class="input" id="statusFilter">
            <option value="">الكل</option>
            <option>مفتوحة</option>
            <option>قيد الاكتمال</option>
            <option>مكتملة</option>
          </select>
        </div>
      </div>
      <div class="form-actions" style="margin-top:8px;">
        <a class="btn primary" href="#" id="applyFilters">تطبيق</a>
        <a class="btn" href="#" id="resetFilters">إعادة ضبط</a>
      </div>
    </section>

    <div class="grid cols-3">
      <article class="card" data-city="جدة" data-sector="المأكولات" data-min="5000" data-status="قيد الاكتمال">
        <h3>مخبز — جدة</h3>
        <p class="muted">الحد الأدنى: 5,000 ر.س • العائد: 18%</p>
        <div class="progress"><span style="--value:48%"></span></div>
        <div class="form-actions" style="margin-top:10px;">
          <a class="btn" href="{{ route('opportunity')}}">التفاصيل</a>
          <a class="btn primary" href="{{ route('opportunity')}}">استثمر</a>
        </div>
      </article>
      <article class="card" data-city="الرياض" data-sector="الرعاية الصحية" data-min="15000" data-status="قيد الاكتمال">
        <h3>عيادة أسنان — الرياض</h3>
        <p class="muted">الحد الأدنى: 15,000 ر.س • العائد: 22%</p>
        <div class="progress"><span style="--value:73%"></span></div>
        <div class="form-actions" style="margin-top:10px;">
          <a class="btn" href="opportunity.html">التفاصيل</a>
          <a class="btn primary" href="opportunity.html">استثمر</a>
        </div>
      </article>
      <article class="card" data-city="الدمام" data-sector="الخدمات" data-min="8000" data-status="مفتوحة">
        <h3>مغسلة سيارات — الدمام</h3>
        <p class="muted">الحد الأدنى: 8,000 ر.س • العائد: 20%</p>
        <div class="progress"><span style="--value:15%"></span></div>
        <div class="form-actions" style="margin-top:10px;">
          <a class="btn" href="{{ route('opportunity')}}">التفاصيل</a>
          <a class="btn primary" href="{{ route('opportunity')}}">استثمر</a>
        </div>
      </article>
    </div>
@endsection
  
@extends('layouts.app')

@section('title', 'الفرص الاستثمارية')

@section('content')

<div class="pagehead">
    <h2>الفرص الاستثمارية</h2>
</div>

<section class="card" id="filters">
    <div class="form-row">
        <div>
            <label class="label">المدينة</label>
            <select class="input" id="cityFilter" name="city_id">
                <option value="">الكل</option>
                @foreach ($cities as $city)
                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
            </select>
        </div>
        <div>
            <label class="label">القطاع</label>
            <select class="input" id="sectorFilter" name="sector_id">
                <option value="">الكل</option>
                @foreach ($sectors as $sector)
                    <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                @endforeach
            </select>
        </div>
    </div>

    <div class="form-row" style="margin-top:8px;">
        <div>
            <label class="label">الحد الأدنى للاستثمار</label>
            <select class="input" id="minFilter" name="min_investment">
                <option value="">الكل</option>
                <option value="5000">≤ 5,000</option>
                <option value="8000">≤ 8,000</option>
                <option value="15000">≤ 15,000</option>
            </select>
        </div>
        <div>
            <label class="label">الحالة</label>
            <select class="input" id="statusFilter" name="status">
                <option value="">الكل</option>
                <option value="open">مفتوحة</option>
                <option value="filling">قيد الاكتمال</option>
                <option value="closed">مكتملة</option>
            </select>
        </div>
    </div>
</section>

{{-- هنا هيتحط الفرص --}}
<div class="grid cols-3" id="opportunitiesContainer">
    @foreach($opportunities as $opportunity)
        <article class="card">
            <h3>{{ $opportunity->title }} — {{ $opportunity->city->name }}</h3>
            <p class="muted">
                الحد الأدنى: {{ $opportunity->min_investment }} ر.س • 
                العائد: {{ $opportunity->expected_roi }}
            </p>
            <div class="form-actions" style="margin-top:10px;">
                <a class="btn" href="{{ route('opportunity', $opportunity->id) }}">التفاصيل</a>
                <a class="btn primary" href="#">استثمر</a>
            </div>
        </article>
    @endforeach
</div>

@endsection

@section('scripts')
<script>
document.addEventListener('DOMContentLoaded', function () {
    console.log('Filters initialized');
    const filters = ['#cityFilter', '#sectorFilter', '#minFilter', '#statusFilter'];

    filters.forEach(filterId => {
        document.querySelector(filterId).addEventListener('change', applyFilters);
    });

    function applyFilters() {
        const city = document.querySelector('#cityFilter').value;
        const sector = document.querySelector('#sectorFilter').value;
        const min = document.querySelector('#minFilter').value;
        const status = document.querySelector('#statusFilter').value;

        fetch(`{{ route('opportunities.filter') }}?city_id=${city}&sector_id=${sector}&min_investment=${min}&status=${status}`)
            .then(response => response.json())
            .then(data => {
                const container = document.querySelector('#opportunitiesContainer');
                container.innerHTML = '';
                console.log('Filtered data:', data);
                if (data.length > 0) {
                    data.forEach(opportunity => {
                        container.innerHTML += `
                        <article class="card">
                            <h3>${opportunity.title} — ${opportunity.city.name}</h3>
                            <p class="muted">
                                الحد الأدنى: ${opportunity.min_investment} ر.س • 
                                العائد: ${opportunity.expected_roi}
                            </p>
                            <div class="form-actions" style="margin-top:10px;">
                                <a class="btn" href="/opportunity/${opportunity.id}">التفاصيل</a>
                                <a class="btn primary" href="#">استثمر</a>
                            </div>
                        </article>
                        `;
                    });
                } else {
                    container.innerHTML = `<p>لا توجد فرص متاحة في الوقت الحالي.</p>`;
                }
            })
            .catch(error => console.error('Error:', error));
    }
});
</script>
@endsection

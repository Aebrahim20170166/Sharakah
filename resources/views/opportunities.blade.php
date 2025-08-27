@extends('layouts.app')

@section('title', 'الفرص الاستثمارية')


@section('content')
@section('headerStyle')
style="height:300px !important;"
@endsection
<div class="sub_content">
  <h1>الفرص الاستثمارية</h1>
</div>
<div class="overlay"></div>
</header>

<div class="sub_content">
  <h1>الفرص الإستثمارية</h1>
  <p>عرض كل الفرص الإستثمارية على منصة شارك</p>
</div>
<div class="overlay"></div>

</header>

<!-- ✅ About Section -->
<section class="about-section py-5" style="background-color: #fafbfc;">

  <div class="container">
    <div class="row align-items-start">
      <div class="col-md-4">
        <div class="select-container">
          <div class="input-group flex-nowrap align-items-start rounded-3 ">
            <span class="input-group-text" id="addon-wrapping"><img src="/images/SVG/search.svg" /></span>
            <input type="text" class="form-control" placeholder="بحث عن فرصة..." aria-label="Username"
              aria-describedby="addon-wrapping" style="padding-right: 60px; border-radius: inherit;">
          </div>


          <div class="sub-container mt-4 w-100 p-0">
            <label for="city-select" class="form-label fw-bold">المدينة</label>
            <div class="position-relative rounded-3 ">
              <select id="city-select" class="form-select select2 select-multi h-100" data-list="selected-list"
                style="border-radius: inherit;">
                @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
                @endforeach
              </select>
            </div>

            <div id="selected-list" class="mt-3 p-2  rounded" style="line-height: 40px;">

            </div>
          </div>
          <div class="sub-container mt-4 w-100 p-0">
            <label for="sector-select" class="form-label fw-bold  ">القطاع</label>
            <div class="position-relative rounded-3 ">
              <select id="sector-select" class="form-select select-multi" data-list="sector-list">
                <option value="all">الكل</option>
                @foreach ($sectors as $sector)
                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                @endforeach
              </select>
            </div>
            <div id="sector-list" class="mt-3 p-2  rounded " style="line-height: 40px;">

            </div>
          </div>
          <div class="sub-container mt-4 w-100 p-0">
            <label for="investment-select" class="form-label fw-bold">الحد الأدنى للاستثمار</label>
            <div class="position-relative rounded-3 ">
              <select id="investment-select" class="form-select select-multi" data-list="investment-list">
                <option value="all">الكل</option>
                <option value="5000">اقل من 5000 ريال</option>
                <option value="10000">اقل من 10,000 ريال</option>
                <option value="35000">اقل من 35,000 ريال</option>
              </select>
            </div>
            <div id="investment-list" class="mt-3 p-2  rounded " style="line-height: 40px;">

            </div>
          </div>

          <div class="sub-container mt-4 w-100 p-0">
            <label for="status-select" class="form-label fw-bold">الحالة</label>
            <div class="position-relative rounded-3 ">
              <select id="status-select" class="form-select select-multi" data-list="status-list">
                <option value="open">مفتوحة</option>
                <option value="ready">قيد الاكتمال</option>
                <option value="completed">مكتملة</option>
              </select>
            </div>
            <div id="status-list" class="mt-3 p-2  rounded" style="line-height: 40px;">

            </div>
          </div>



        </div>
      </div>
      <div class="col-md-8">

        <div class="container cards">
          <div class="content-divs">
            <div class="tab-content">
              <div class="row" id="opportunitiesContainer">
                @foreach($opportunities as $opportunity)
                <div class="col-md-6 col-xs-12">
                  <div class="card" style="width: 100%;">
                    <a href="{{ route('opportunity', $opportunity->id) }}">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <img src="{{ asset('images/SVG/card1_image.svg') }}" class="card-img" />
                          <div class="small-box-info">
                            <img src="{{ asset('images/SVG/location.svg') }}" class="card-icon" />
                            {{ $opportunity->city->name }}
                          </div>
                        </div>
                        <div class="title">
                          <h5 class="fw-bold">{{ $opportunity->title }}</h5>
                          <div class="small-box-info"> <img src="{{ asset('images/SVG/burger.svg') }}" class="card-icon" /> مطاعم</div>
                        </div>
                        <div class="card-list">
                          <ul class="list-unstyled">
                            <li><span>الحد الأدنى للمشاركة</span><span>{{ $opportunity->min_investment }} <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.90979 14.1741C8.65433 14.7405 8.48547 15.3553 8.42078 15.9999L13.8268 14.8507C14.0823 14.2844 14.251 13.6695 14.3158 13.0249L8.90979 14.1741Z" fill="black" />
                                  <path d="M13.8266 11.4079C14.0821 10.8416 14.2509 10.2268 14.3156 9.58212L10.1045 10.4778V8.75601L13.8265 7.96505C14.082 7.39872 14.2508 6.78388 14.3155 6.13924L10.1044 7.03412V0.842159C9.45912 1.20447 8.88605 1.68674 8.42021 2.25561V7.39223L6.73604 7.75021V0C6.09077 0.362181 5.51771 0.844579 5.05187 1.41345V8.10806L1.28354 8.90883C1.02808 9.47515 0.859086 10.09 0.794266 10.7346L5.05187 9.82982V11.9981L0.489014 12.9677C0.233555 13.534 0.0646925 14.1489 0 14.7935L4.77604 13.7785C5.16483 13.6977 5.49899 13.4678 5.71625 13.1515L6.59214 11.8529V11.8526C6.68307 11.7183 6.73604 11.5563 6.73604 11.3818V9.47184L8.42021 9.11386V12.5574L13.8265 11.4077L13.8266 11.4079Z" fill="black" />
                                </svg></span></li>
                            <li><span>العائد المتوقع</span><span>{{ $opportunity->expected_return }} <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.90979 14.1741C8.65433 14.7405 8.48547 15.3553 8.42078 15.9999L13.8268 14.8507C14.0823 14.2844 14.251 13.6695 14.3158 13.0249L8.90979 14.1741Z" fill="black" />
                                  <path d="M13.8266 11.4079C14.0821 10.8416 14.2509 10.2268 14.3156 9.58212L10.1045 10.4778V8.75601L13.8265 7.96505C14.082 7.39872 14.2508 6.78388 14.3155 6.13924L10.1044 7.03412V0.842159C9.45912 1.20447 8.88605 1.68674 8.42021 2.25561V7.39223L6.73604 7.75021V0C6.09077 0.362181 5.51771 0.844579 5.05187 1.41345V8.10806L1.28354 8.90883C1.02808 9.47515 0.859086 10.09 0.794266 10.7346L5.05187 9.82982V11.9981L0.489014 12.9677C0.233555 13.534 0.0646925 14.1489 0 14.7935L4.77604 13.7785C5.16483 13.6977 5.49899 13.4678 5.71625 13.1515L6.59214 11.8529V11.8526C6.68307 11.7183 6.73604 11.5563 6.73604 11.3818V9.47184L8.42021 9.11386V12.5574L13.8265 11.4077L13.8266 11.4079Z" fill="black" />
                                </svg></span></li>
                            <li><span>عمر البراند</span><span>12 سنه</span></li>
                          </ul>
                        </div>

                        <button type="button" class="btn card-btn btn-lg fs-6"><img
                            src="{{ asset('images/SVG/arrow.svg') }}" class="card-icon-small" />
                          سجل حصتك الآن</button>
                      </div>
                    </a>
                  </div>
                </div>

                @endforeach
              </div>
            </div>


          </div>

        </div>
        <nav aria-label="Page navigation">
          {{ $opportunities->links('pagination::bootstrap-5') }}
        </nav>

      </div>
    </div>
</section>
@endsection

@section('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function() {
    console.log('Filters initialized');
    const filters = ['#city-select', '#sector-select', '#investment-select', '#status-select'];

    filters.forEach(filterId => {
      document.querySelector(filterId).addEventListener('change', applyFilters);
    });

    function applyFilters() {
      const city = document.querySelector('#city-select').value;
      const sector = document.querySelector('#sector-select').value;
      const min = document.querySelector('#investment-select').value;
      const status = document.querySelector('#status-select').value;

      fetch(`{{ route('opportunities.filter') }}?city_id=${city}&sector_id=${sector}&min_investment=${min}&status=${status}`)
        .then(response => response.json())
        .then(data => {
          const container = document.querySelector('#opportunitiesContainer');
          container.innerHTML = '';
          console.log('Filtered data:', data);
          if (data.length > 0) {
            data.forEach(opportunity => {
              container.innerHTML += `
                       
                        <div class="col-md-6 col-xs-12">
                  <div class="card" style="width: 100%;">
                    <a href="/opportunity/${opportunity.id}">
                      <div class="card-body">
                        <div class="d-flex justify-content-between">
                          <img src="{{ asset('images/SVG/card1_image.svg') }}" class="card-img" />
                          <div class="small-box-info">
                            <img src="{{ asset('images/SVG/location.svg') }}" class="card-icon" />
                            ${opportunity.city.name}
                          </div>
                        </div>
                        <div class="title">
                          <h5 class="fw-bold">{opportunity.title}</h5>
                          <div class="small-box-info"> <img src="{{ asset('images/SVG/burger.svg') }}" class="card-icon" /> مطاعم</div>
                        </div>
                        <div class="card-list">
                          <ul class="list-unstyled">
                            <li><span>الحد الأدنى للمشاركة</span><span>${opportunity.min_investment} <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.90979 14.1741C8.65433 14.7405 8.48547 15.3553 8.42078 15.9999L13.8268 14.8507C14.0823 14.2844 14.251 13.6695 14.3158 13.0249L8.90979 14.1741Z" fill="black" />
                                  <path d="M13.8266 11.4079C14.0821 10.8416 14.2509 10.2268 14.3156 9.58212L10.1045 10.4778V8.75601L13.8265 7.96505C14.082 7.39872 14.2508 6.78388 14.3155 6.13924L10.1044 7.03412V0.842159C9.45912 1.20447 8.88605 1.68674 8.42021 2.25561V7.39223L6.73604 7.75021V0C6.09077 0.362181 5.51771 0.844579 5.05187 1.41345V8.10806L1.28354 8.90883C1.02808 9.47515 0.859086 10.09 0.794266 10.7346L5.05187 9.82982V11.9981L0.489014 12.9677C0.233555 13.534 0.0646925 14.1489 0 14.7935L4.77604 13.7785C5.16483 13.6977 5.49899 13.4678 5.71625 13.1515L6.59214 11.8529V11.8526C6.68307 11.7183 6.73604 11.5563 6.73604 11.3818V9.47184L8.42021 9.11386V12.5574L13.8265 11.4077L13.8266 11.4079Z" fill="black" />
                                </svg></span></li>
                            <li><span>العائد المتوقع</span><span>${opportunity.expected_roi} <svg width="15" height="16" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M8.90979 14.1741C8.65433 14.7405 8.48547 15.3553 8.42078 15.9999L13.8268 14.8507C14.0823 14.2844 14.251 13.6695 14.3158 13.0249L8.90979 14.1741Z" fill="black" />
                                  <path d="M13.8266 11.4079C14.0821 10.8416 14.2509 10.2268 14.3156 9.58212L10.1045 10.4778V8.75601L13.8265 7.96505C14.082 7.39872 14.2508 6.78388 14.3155 6.13924L10.1044 7.03412V0.842159C9.45912 1.20447 8.88605 1.68674 8.42021 2.25561V7.39223L6.73604 7.75021V0C6.09077 0.362181 5.51771 0.844579 5.05187 1.41345V8.10806L1.28354 8.90883C1.02808 9.47515 0.859086 10.09 0.794266 10.7346L5.05187 9.82982V11.9981L0.489014 12.9677C0.233555 13.534 0.0646925 14.1489 0 14.7935L4.77604 13.7785C5.16483 13.6977 5.49899 13.4678 5.71625 13.1515L6.59214 11.8529V11.8526C6.68307 11.7183 6.73604 11.5563 6.73604 11.3818V9.47184L8.42021 9.11386V12.5574L13.8265 11.4077L13.8266 11.4079Z" fill="black" />
                                </svg></span></li>
                            <li><span>عمر البراند</span><span>12 سنه</span></li>
                          </ul>
                        </div>

                        <button type="button" class="btn card-btn btn-lg fs-6"><img
                            src="{{ asset('images/SVG/arrow.svg') }}" class="card-icon-small" />
                          سجل حصتك الآن</button>
                      </div>
                    </a>
                  </div>
                </div>
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
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
  $(document).ready(function() {
    function renderSelected($select, $list) {
      $list.empty();
      let values = $select.val() || [];
      if (values.length > 0) {
        values.forEach(v => {
          let text = $select.find('option[value="' + v + '"]').text();
          $list.append(`
          <span class="badge me-1 fw-normal" style="background-color:#f6f6f6; color:#716f6f; padding:10px; display:inline-block; width:fit-content; font-size:15px">
            ${text} 
            <span class="ms-1 clear-badge" style="cursor:pointer; font-size:15px" data-value="${v}">&times;</span>
          </span>
        `);
        });
      }
    }

    $('.select-multi').each(function() {
      let $select = $(this);
      let $list = $('#' + $select.data('list'));

      $select.select2({
        theme: 'bootstrap-5',
        placeholder: "تخصيص الخيارات",
        allowClear: false
      });

      $select.on('change', function() {
        renderSelected($select, $list);
      });


      $list.off('click', '.clear-badge').on('click', '.clear-badge', function() {
        let value = $(this).data('value');
        let selected = $select.val() || [];
        selected = selected.filter(v => v !== value);
        $select.val(selected).trigger('change');
      });

      renderSelected($select, $list);
    });
  });



  const divs = [
    document.getElementById("div1"),
    document.getElementById("div2"),
    document.getElementById("div3")
  ];
  divs.forEach((d, index) => {
    d.style.display = index === 0 ? "block" : "none";
  });

  const paginationItems = document.querySelectorAll("#pagination .page-item");

  paginationItems.forEach((item, index) => {
    item.addEventListener("click", (e) => {
      e.preventDefault();


      paginationItems.forEach(i => i.classList.remove("active"));

      item.classList.add("active");


      divs.forEach(d => d.style.display = "none");

      divs[index].style.display = "block";
    });
  });
</script>
@endsection
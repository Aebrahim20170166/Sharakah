@extends('layouts.app')

@section('title', 'الفرص الاستثمارية')

@section('content')


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
                        <span class="input-group-text" id="addon-wrapping"><img src="./assets/images/SVG/search.svg" /></span>
                        <input type="text" class="form-control" placeholder="بحث عن فرصة..." aria-label="Username"
                            aria-describedby="addon-wrapping" style="padding-right: 60px; border-radius: inherit;">
                    </div>

                    <div class="sub-container mt-4 w-100 p-0">
                        <label for="cityFilter" class="form-label fw-bold">المدينة</label>
                        <div class="position-relative rounded-3 ">
                            <select class="input" id="cityFilter" name="city_id" class="form-select select-multi h-100" multiple data-list="selected-list"
                                style="border-radius: inherit;">
                                <option value="">الكل</option>
                                @foreach ($cities as $city)
                                <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach
                            </select>
                            <img src="{{ asset('images/SVG/down_arrow.svg') }}" class="position-absolute" style=" left: 12px; top: 36%;" />
                        </div>

                        <div id="selected-list" class="mt-3 p-2  rounded" style="line-height: 40px;">

                        </div>
                    </div>

                    <div class="sub-container mt-4 w-100 p-0">
                        <label for="sectorFilter" class="form-label fw-bold  ">القطاع</label>
                        <div class="position-relative rounded-3 ">
                            <select class="input" id="sectorFilter" name="sector_id" class="form-select select-multi" multiple data-list="sector-list">
                                <option value="all">الكل</option>
                                @foreach ($sectors as $sector)
                                <option value="{{ $sector->id }}">{{ $sector->name }}</option>
                                @endforeach
                            </select>
                            <img src="{{ asset('images/SVG/down_arrow.svg') }}" class="position-absolute" style=" left: 12px; top: 36%;" />
                        </div>
                        <div id="sector-list" class="mt-3 p-2  rounded " style="line-height: 40px;">

                        </div>
                    </div>


                    <div class="sub-container mt-4 w-100 p-0">
                        <label for="investment-select" class="form-label fw-bold">الحد الأدنى للاستثمار</label>
                        <div class="position-relative rounded-3 ">
                            <select id="investment-select" class="form-select select-multi" multiple data-list="investment-list">
                                <option value="all">الكل</option>
                                <option value="5000">اقل من 5000 ريال</option>
                                <option value="10000">اقل من 10,000 ريال</option>
                                <option value="35000">اقل من 35,000 ريال</option>
                            </select>
                            <img src="{{ asset('images/SVG/down_arrow.svg') }}" class="position-absolute" style=" left: 12px; top: 36%;" />
                        </div>
                        <div id="investment-list" class="mt-3 p-2  rounded " style="line-height: 40px;">

                        </div>
                    </div>

                    <div class="sub-container mt-4 w-100 p-0">
                        <label for="status-select" class="form-label fw-bold">الحالة</label>
                        <div class="position-relative rounded-3 ">
                            <select id="status-select" class="form-select select-multi" multiple data-list="status-list">
                                <option value="open">مفتوحة</option>
                                <option value="ready">قيد الاكتمال</option>
                                <option value="completed">مكتملة</option>
                            </select>
                            <img src="{{ asset('images/SVG/down_arrow.svg') }}" class="position-absolute" style=" left: 12px; top: 36%;" />
                        </div>
                        <div id="status-list" class="mt-3 p-2  rounded" style="line-height: 40px;">

                        </div>
                    </div>

                </div>
            </div>
            <div class="col-md-8">

                <div class="container cards">
                    <div class="content-divs">
                        <div class="tab-content" id="div1">
                            @foreach($opportunities as $opportunity)
                            <div class="row">
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
                                                        <li><span>الحد الأدنى للمشاركة</span><span>{{ $opportunity->min_investment }} <img src="{{ asset('images/SVG/sar.svg') }}" /></span></li>
                                                        <li><span>العائد المتوقع</span><span>{{ $opportunity->expected_return }} <img src="{{ asset('images/SVG/sar.svg') }}" /></span></li>
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



                            </div>
                            @endforeach

                        </div>

                        <!-- <div class="tab-content " id="div2">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="card" style="width: 100%;">
                      <a href="./opportunitiesDetails.html">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <img src="./assets/images/SVG/card3_image.svg" class="card-img"/>

                          </div>
                          <div class="title">
                            <h5 class="fw-bold">مرسول | تطبيق جوال</h5>
                            <div class="small-box-info app_classification"> <img src="./assets/images/SVG/phone.svg"  class="card-icon" /> تطبيقات جوال</div>
                          </div>
                          <div class="card-list">
                            <ul class="list-unstyled">
                              <li><span>الحد الأدنى للمشاركة</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>العائد المتوقع</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>عمر البراند</span><span>12 سنه</span></li>
                            </ul>
                          </div>

                          <button type="button" class="btn card-btn btn-lg fs-6"><img
                              src="./assets/images/SVG/arrow.svg"   class="card-icon-small"/>
                            سجل حصتك الآن</button>
                        </div>
                      </a>
                    </div>
                  </div>


                  <div class="col">
                    <div class="card" style="width: 100%;">
                      <a href="./opportunitiesDetails.html">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <img src="./assets/images/SVG/card4_image.svg"  class="card-img"/>

                          </div>
                          <div class="title">
                            <h5 class="fw-bold"> سايكو للتأمين التعاوني </h5>
                            <div class="small-box-info company_classification"> <img src="./assets/images/SVG/companyIcon.svg"  class="card-icon"/>شركات تأمين
                            </div>
                          </div>
                          <div class="card-list">
                            <ul class="list-unstyled">
                              <li><span>الحد الأدنى للمشاركة</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>العائد المتوقع</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>عمر البراند</span><span>12 سنه</span></li>
                            </ul>
                          </div>

                          <button type="button" class="btn card-btn btn-lg fs-6"><img
                              src="./assets/images/SVG/arrow.svg"  class="card-icon-small"/>
                            سجل حصتك الآن</button>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <div class="card" style="width: 100%;">
                      <a href="./opportunitiesDetails.html">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <img src="./assets/images/SVG/card1_image.svg" class="card-img" />
                            <div class="small-box-info">
                              <img src="./assets/images/SVG/location.svg" class="card-icon" />
                              الرياض
                            </div>
                          </div>
                          <div class="title">
                            <h5 class="fw-bold">الطازج | فرايد تشيكن</h5>
                            <div class="small-box-info"> <img src="./assets/images/SVG/burger.svg"  class="card-icon"/> مطاعم</div>
                          </div>
                          <div class="card-list">
                            <ul class="list-unstyled">
                              <li><span>الحد الأدنى للمشاركة</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>العائد المتوقع</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>عمر البراند</span><span>12 سنه</span></li>
                            </ul>
                          </div>

                          <button type="button" class="btn card-btn btn-lg fs-6"><img
                              src="./assets/images/SVG/arrow.svg"   class="card-icon-small"/>
                            سجل حصتك الآن</button>
                        </div>
                      </a>
                    </div>
                  </div>



                  <div class="col">
                    <div class="card" style="width: 100%;">
                      <a href="./opportunitiesDetails.html">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <img src="./assets/images/SVG/card2_image.svg"  class="card-img"/>
                            <div class="small-box-info">
                              <img src="./assets/images/SVG/location.svg" class="card-icon" />
                              جدة
                            </div>
                          </div>
                          <div class="title">
                            <h5 class="fw-bold">بيلسان فندق ومارينا</h5>
                            <div class="small-box-info hotel_classification"> <img src="./assets/images/SVG/hotel.svg" class="card-icon" />فنادق</div>
                          </div>
                          <div class="card-list">
                            <ul class="list-unstyled">
                              <li><span>الحد الأدنى للمشاركة</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>العائد المتوقع</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>عمر البراند</span><span>12 سنه</span></li>
                            </ul>
                          </div>

                          <button type="button" class="btn card-btn btn-lg fs-6"><img
                              src="./assets/images/SVG/arrow.svg"  class="card-icon-small"/>
                            سجل حصتك الآن</button>
                        </div>
                      </a>
                    </div>
                  </div>



                </div>
              </div>

              <div class="tab-content" id="div3">
                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="card" style="width: 100%;">
                      <a href="./opportunitiesDetails.html">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <img src="./assets/images/SVG/card1_image.svg" class="card-img" />
                            <div class="small-box-info">
                              <img src="./assets/images/SVG/location.svg" class="card-icon"/>
                              الرياض
                            </div>
                          </div>
                          <div class="title">
                            <h5 class="fw-bold">الطازج | فرايد تشيكن</h5>
                            <div class="small-box-info"> <img src="./assets/images/SVG/burger.svg" class="card-icon"/> مطاعم</div>
                          </div>
                          <div class="card-list">
                            <ul class="list-unstyled">
                              <li><span>الحد الأدنى للمشاركة</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>العائد المتوقع</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>عمر البراند</span><span>12 سنه</span></li>
                            </ul>
                          </div>

                          <button type="button" class="btn card-btn btn-lg fs-6"><img
                              src="./assets/images/SVG/arrow.svg"  class="card-icon-small" />
                            سجل حصتك الآن</button>
                        </div>
                      </a>
                    </div>
                  </div>



                  <div class="col-md-6 col-xs-12">
                    <div class="card" style="width: 100%;">
                      <a href="./opportunitiesDetails.html">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <img src="./assets/images/SVG/card2_image.svg"  class="card-img"/>
                            <div class="small-box-info">
                              <img src="./assets/images/SVG/location.svg" class="card-icon" />
                              جدة
                            </div>
                          </div>
                          <div class="title">
                            <h5 class="fw-bold">بيلسان فندق ومارينا</h5>
                            <div class="small-box-info hotel_classification"> <img src="./assets/images/SVG/hotel.svg"  class="card-icon"/>فنادق</div>
                          </div>
                          <div class="card-list">
                            <ul class="list-unstyled">
                              <li><span>الحد الأدنى للمشاركة</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>العائد المتوقع</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>عمر البراند</span><span>12 سنه</span></li>
                            </ul>
                          </div>

                          <button type="button" class="btn card-btn btn-lg fs-6"><img
                              src="./assets/images/SVG/arrow.svg"   class="card-icon-small"/>
                            سجل حصتك الآن</button>
                        </div>
                      </a>
                    </div>
                  </div>



                </div>

                <div class="row">
                  <div class="col-md-6 col-xs-12">
                    <div class="card" style="width: 100%;">
                      <a href="./opportunitiesDetails.html">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <img src="./assets/images/SVG/card3_image.svg"  class="card-img"/>

                          </div>
                          <div class="title">
                            <h5 class="fw-bold">مرسول | تطبيق جوال</h5>
                            <div class="small-box-info app_classification"> <img src="./assets/images/SVG/phone.svg"  class="card-icon"/> تطبيقات جوال</div>
                          </div>
                          <div class="card-list">
                            <ul class="list-unstyled">
                              <li><span>الحد الأدنى للمشاركة</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>العائد المتوقع</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>عمر البراند</span><span>12 سنه</span></li>
                            </ul>
                          </div>

                          <button type="button" class="btn card-btn btn-lg fs-6"><img
                              src="./assets/images/SVG/arrow.svg"   class="card-icon-small"/>
                            سجل حصتك الآن</button>
                        </div>
                      </a>
                    </div>
                  </div>


                  <div class="col-md-6 col-xs-12">
                    <div class="card" style="width: 100%;">
                      <a href="./opportunitiesDetails.html">
                        <div class="card-body">
                          <div class="d-flex justify-content-between">
                            <img src="./assets/images/SVG/card4_image.svg" class="card-img" />

                          </div>
                          <div class="title">
                            <h5 class="fw-bold"> سايكو للتأمين التعاوني </h5>
                            <div class="small-box-info company_classification"> <img src="./assets/images/SVG/companyIcon.svg" class="card-icon" />شركات تأمين
                            </div>
                          </div>
                          <div class="card-list">
                            <ul class="list-unstyled">
                              <li><span>الحد الأدنى للمشاركة</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>العائد المتوقع</span><span>25,500 <img src="./assets/images/SVG/sar.svg" /></span></li>
                              <li><span>عمر البراند</span><span>12 سنه</span></li>
                            </ul>
                          </div>

                          <button type="button" class="btn card-btn btn-lg fs-6"><img
                              src="./assets/images/SVG/arrow.svg"   class="card-icon-small"/>
                            سجل حصتك الآن</button>
                        </div>
                      </a>
                    </div>
                  </div>
                </div>
              </div> -->
                    </div>

                </div>
                <nav aria-label="Page navigation">
                    <ul class="pagination pagination-md" id="pagination">
                        <li class="page-item active" aria-current="page">
                            <a class="page-link" href="#">1</a>
                        </li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                    </ul>
                </nav>

            </div>
        </div>
</section>
@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function() {
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
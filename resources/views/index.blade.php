@extends('layouts.app')

@section('title', 'عنوان الصفحة')

@section('content')

<div class="content">
    <span class=" mb-4 badge-modal-header">نموذج شفاف 👌</span>
    <h1 class="fw-bold mb-4 header-title">
        كن شريكًا مؤسسًا في افتتاح فروع لأكبر الشركات
    </h1>
    <p class="lead mb-4">
        نموذج استثماري يتيح فتح فروع جديدة بتمويل مشترك، مع ربط محاسبي مباشر
        (API) يطلعك على المبيعات والمصروفات وتوزيعات الأرباح.
    </p>
    <div class="d-flex gap-3 align-items-center">
        <a href="#" class="btn btn-primary btn-lg">استكشف الفرص <svg width="25" height="24" viewBox="0 0 25 24"
                fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M24.5 0V24H0.5V0H24.5Z" fill="white" fill-opacity="0.01" />
                <path d="M6.84302 6.34326L18.1569 17.6571M14.5 6L6.5 6L6.5 14" stroke="white" stroke-width="1.5"
                    stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
        <a href="#" class="btn btn-dark btn-lg"><svg width="25" height="24" viewBox="0 0 25 24" fill="none"
                xmlns="http://www.w3.org/2000/svg">
                <path d="M24.5 0V24H0.5V0H24.5Z" fill="white" fill-opacity="0.01" />
                <circle opacity="0.3" cx="12.5" cy="12" r="9" fill="white" />
                <path
                    d="M12.5 17H12.502M9.875 10.125C9.875 8.67525 11.0503 7.5 12.5 7.5C13.9497 7.5 15.125 8.67525 15.125 10.125C15.125 11.2297 14.4426 12.1751 13.4763 12.5625C12.9636 12.768 12.5 13.1977 12.5 13.75V14M21.5 12C21.5 16.9706 17.4706 21 12.5 21C7.52944 21 3.5 16.9706 3.5 12C3.5 7.02944 7.52944 3 12.5 3C17.4706 3 21.5 7.02944 21.5 12Z"
                    stroke="white" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
            آلية العمل</a>
    </div>
</div>
<div class="overlay"></div>
<div class="img-fixed"></div>
<div class="scroll-down">
    <span>نزول للأسفل</span>
    <svg width="13" height="12" viewBox="0 0 13 12" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path
            d="M6.50003 11.2654L12.4258 6.04485L12.2698 0.769831L6.50003 5.80014L0.73025 0.769829L0.57425 6.04483L6.50003 11.2654Z"
            fill="#299FDA" />
    </svg>

</div>
</header>

<!-- ✅ About Section -->
<section class="about-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="mb-2 d-flex align-items-start justify-content-between">
                    <h2 style="font-size: 48px; font-weight: 900;">
                        عن شارك
                    </h2>
                    <a href="#" class="about-link fw-bold text-primary mb-2 d-inline-block">
                        المزيد عن المنصة
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M24 0V24H0V0H24Z" fill="white" fill-opacity="0.01" />
                            <path d="M6.34302 6.34326L17.6569 17.6571M14 6L6 6L6 14" stroke="#1E4262"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </a>
                </div>
                <p class="mb-4" style="font-size: 1.1rem; color: #5B5B5B;">
                    تعرف على منصة شارك | استثمر وأنت مطمئن 👋
                </p>
                <p class="mb-5" style="font-size: 1rem; color: #000000;line-height: 24px;">
                    منصة شارك تمثل نموذجًا استثماريًا مبتكرًا يهدف إلى تمكين الأفراد
                    والشركات من المشاركة في فتح وتشغيل فروع جديدة للمشاريع بنظام
                    القبول المشترك. هذا النموذج يوفر للمستثمرين فرصة الحصول على حصة من
                    المشاريع التجارية مقابل مساهمة مالية، مما يعزز من قدرة المنصة على
                    تمويل المشروعات الناشئة والنمو بسرعة أكبر.
                </p>
                <div class="model-card-wrapper text-white rounded p-4 mb-3 position-relative overflow-hidden">
                    <div class="pattern-bg"></div>
                    <h5 class="fw-bold mb-3 d-flex align-items-start flex-column gap-2" style="font-size: 1.3rem">
                        <svg width="64" height="64" viewBox="0 0 64 64" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M64 0V64H0V0H64Z" fill="white" fill-opacity="0.01" />
                            <g opacity="0.3">
                                <path
                                    d="M8 35.6666C8 35.1143 8.44772 34.6666 9 34.6666H24V53.3333H9C8.44772 53.3333 8 52.8856 8 52.3333V35.6666Z"
                                    fill="white" />
                                <path d="M24 25C24 24.4477 24.4477 24 25 24H40V53.3333H24V25Z" fill="white" />
                                <path
                                    d="M40 11.6666C40 11.1143 40.4477 10.6666 41 10.6666H55C55.5523 10.6666 56 11.1143 56 11.6666V52.3333C56 52.8856 55.5523 53.3333 55 53.3333H40V11.6666Z"
                                    fill="white" />
                            </g>
                            <path
                                d="M24 53.3333V34.6666H9C8.44772 34.6666 8 35.1143 8 35.6666V52.3333C8 52.8856 8.44772 53.3333 9 53.3333H24ZM24 53.3333H40M24 53.3333V25C24 24.4477 24.4477 24 25 24H40V53.3333M40 53.3333H55C55.5523 53.3333 56 52.8856 56 52.3333V11.6666C56 11.1143 55.5523 10.6666 55 10.6666H41C40.4477 10.6666 40 11.1143 40 11.6666V53.3333Z"
                                stroke="white" stroke-width="2" stroke-linejoin="round" />
                        </svg>
                        <span>نموذج العوائد</span>
                    </h5>
                    <div class="row g-2 text-center about-stats">
                        <div class="col-4">
                            <div class="m-1">
                                <p class="mb-2 p-3">متوسط العائد السنوي</p>
                                <h4>18% - 24%</h4>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="m-1">
                                <p class="mb-2 p-3">مـدة إصـدار التـقـاريـر </p>
                                <h4>يومي - شهرياً</h4>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="m-1">
                                <p class="mb-2 p-3">مدة الاسترداد المتوقعة</p>
                                <h4>8-14 شهر</h4>
                            </div>
                        </div>
                        <p class="mt-3 text-white text-center" style="font-size: 0.9em">
                            الأرقام تقديرية وتختلف حسب الفرصة والمدنية
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 about-features">
                <div
                    class="feature-box feature-box-primary mb-4 p-4 rounded d-flex flex-column align-items-center text-center">
                    <svg width="65" height="64" viewBox="0 0 65 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M64.5 0V64H0.5V0H64.5Z" fill="white" fill-opacity="0.01" />
                        <path opacity="0.3"
                            d="M43.1665 41.9876C48.0026 38.6145 51.1667 33.0101 51.1667 26.6667C51.1667 16.3574 42.8093 8 32.5 8C22.1907 8 13.8333 16.3574 13.8333 26.6667C13.8333 33.0101 16.9975 38.6145 21.8335 41.9876L21.8333 56.0001L31.5637 52.3513C32.1674 52.1249 32.8326 52.1249 33.4363 52.3513L43.1667 56.0001L43.1665 41.9876Z"
                            fill="#299FDA" />
                        <path
                            d="M21.8333 41.9875V56L32.1489 52.1317C32.3753 52.0468 32.6247 52.0468 32.8511 52.1317L43.1667 56V41.9875M40.5 26.6667C40.5 31.0849 36.9183 34.6667 32.5 34.6667C28.0817 34.6667 24.5 31.0849 24.5 26.6667C24.5 22.2484 28.0817 18.6667 32.5 18.6667C36.9183 18.6667 40.5 22.2484 40.5 26.6667ZM51.1667 26.6667C51.1667 36.976 42.8093 45.3333 32.5 45.3333C22.1907 45.3333 13.8333 36.976 13.8333 26.6667C13.8333 16.3574 22.1907 8 32.5 8C42.8093 8 51.1667 16.3574 51.1667 26.6667Z"
                            stroke="#299FDA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <svg class="svg-btn" width="165" height="256" viewBox="0 0 165 256" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M-7.33333 199.396V280.625L54.1489 257.569C54.3753 257.484 54.6247 257.484 54.8511 257.569L116.333 280.625V199.396M100.875 110.583C100.875 136.196 80.1122 156.958 54.5 156.958C28.8878 156.958 8.125 136.196 8.125 110.583C8.125 84.9711 28.8878 64.2083 54.5 64.2083C80.1122 64.2083 100.875 84.9711 100.875 110.583ZM162.708 110.583C162.708 170.345 114.262 218.792 54.5 218.792C-5.26181 218.792 -53.7083 170.345 -53.7083 110.583C-53.7083 50.8215 -5.26181 2.375 54.5 2.375C114.262 2.375 162.708 50.8215 162.708 110.583Z"
                            stroke="lightgray" stroke-width="3" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>

                    <h5 class="fw-bold mb-2 mt-4">شفافية كاملة</h5>
                    <p class="text-muted mb-0">
                        توفر منصة شارك تقارير مالية دقيقة في الوقت الفعلي، مما يساعد
                        المستثمرين على متابعة سير العمل في المشاريع واتخاذ قرارات مدروسة
                        بناءً على بيانات موثوقة.
                    </p>
                </div>
                <div class="feature-box mb-4 p-4 rounded d-flex flex-column align-items-center text-center">
                    <svg width="65" height="64" viewBox="0 0 65 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M64.5 0V64H0.5V0H64.5Z" fill="white" fill-opacity="0.01" />
                        <path opacity="0.3"
                            d="M59.1667 32.0002C59.1667 46.7278 47.2276 58.6668 32.5 58.6668C17.7724 58.6668 5.83334 46.7278 5.83334 32.0002C5.83334 17.2726 17.7724 5.3335 32.5 5.3335C47.2276 5.3335 59.1667 17.2726 59.1667 32.0002Z"
                            fill="#299FDA" />
                        <path
                            d="M23.5559 10.8036C24.0646 10.5887 24.3028 10.002 24.0878 9.49329C23.8729 8.98455 23.2862 8.74639 22.7775 8.96133L23.1667 9.88249L23.5559 10.8036ZM55.5387 41.7227C55.7536 41.2139 55.5155 40.6273 55.0067 40.4123C54.498 40.1974 53.9113 40.4355 53.6964 40.9443L54.6175 41.3335L55.5387 41.7227ZM32.5 8V7C31.9477 7 31.5 7.44772 31.5 8H32.5ZM56.5 32V33C57.0523 33 57.5 32.5523 57.5 32H56.5ZM32.5 32H31.5C31.5 32.5523 31.9477 33 32.5 33V32ZM32.5 56.0001V55.0001C19.7975 55.0001 9.5 44.7026 9.5 32.0001H8.5H7.5C7.5 45.8072 18.6929 57.0001 32.5 57.0001V56.0001ZM8.5 32.0001H9.5C9.5 22.4716 15.2945 14.2941 23.5559 10.8036L23.1667 9.88249L22.7775 8.96133C13.8018 12.7536 7.5 21.6397 7.5 32.0001H8.5ZM54.6175 41.3335L53.6964 40.9443C50.2059 49.2056 42.0285 55.0001 32.5 55.0001V56.0001V57.0001C42.8603 57.0001 51.7464 50.6983 55.5387 41.7227L54.6175 41.3335ZM56.5 32V31H32.5V32V33H56.5V32ZM32.5 32H33.5V8H32.5H31.5V32H32.5ZM32.5 8V9C45.2025 9 55.5 19.2975 55.5 32H56.5H57.5C57.5 18.1929 46.3071 7 32.5 7V8Z"
                            fill="#299FDA" />
                    </svg>
                    <h5 class="fw-bold mb-2 mt-4">فرص استثمارية متنوعة</h5>
                </div>
                <div class="feature-box mb-4 p-4 rounded d-flex flex-column align-items-center text-center">
                    <svg width="65" height="64" viewBox="0 0 65 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M64.5 0V64H0.5V0H64.5Z" fill="white" fill-opacity="0.01" />
                        <g opacity="0.3">
                            <path
                                d="M8.5 16.6934C8.5 16.3521 8.82892 16.1036 9.15794 16.1942C11.8221 16.9282 22.161 19.2613 32.5 14.6664C42.8057 10.0861 53.1114 12.3896 55.8161 13.1313C56.2312 13.2452 56.5 13.6233 56.5 14.0538V47.306C56.5 47.6473 56.1711 47.8958 55.8421 47.8051C53.1779 47.0712 42.839 44.7381 32.5 49.333C22.1943 53.9132 11.8887 51.6098 9.18391 50.868C8.7688 50.7542 8.5 50.376 8.5 49.9456V16.6934Z"
                                fill="#299FDA" />
                            <path
                                d="M40.5 31.9998C40.5 36.4181 36.9183 39.9998 32.5 39.9998C28.0817 39.9998 24.5 36.4181 24.5 31.9998C24.5 27.5816 28.0817 23.9998 32.5 23.9998C36.9183 23.9998 40.5 27.5816 40.5 31.9998Z"
                                fill="#299FDA" />
                        </g>
                        <path
                            d="M8.5 16.6934C8.5 16.3521 8.82892 16.1036 9.15794 16.1942C11.8221 16.9282 22.161 19.2613 32.5 14.6664C42.8057 10.0861 53.1114 12.3896 55.8161 13.1313C56.2312 13.2452 56.5 13.6233 56.5 14.0538V47.306C56.5 47.6473 56.1711 47.8958 55.8421 47.8051C53.1779 47.0712 42.839 44.7381 32.5 49.333C22.1943 53.9132 11.8887 51.6098 9.18391 50.868C8.7688 50.7542 8.5 50.376 8.5 49.9456V16.6934Z"
                            stroke="#299FDA" stroke-width="2" />
                        <path
                            d="M40.5 31.9998C40.5 36.4181 36.9183 39.9998 32.5 39.9998C28.0817 39.9998 24.5 36.4181 24.5 31.9998C24.5 27.5816 28.0817 23.9998 32.5 23.9998C36.9183 23.9998 40.5 27.5816 40.5 31.9998Z"
                            stroke="#299FDA" stroke-width="2" />
                    </svg>

                    <h5 class="fw-bold mb-2 mt-4">إدارة مالية متكاملة</h5>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- ✅ فرص مميزة Slider Section -->
<section class="py-5 bg-light main-carousel">
    <div class="container">
        <h2 class=" text-center mb-3" style="font-size: 2.2rem; font-weight: 900;">
            فرص مميزة
        </h2>
        <div class="text-center text-muted mb-5" style="font-size: 1.1rem">
            فرص مميزة لاستثمارك لك بعناية قد تناسبك، تصفحها واستثمر بثقة 🚀
        </div>
        <div id="opportunitiesCarousel" class="owl-carousel owl-theme mt-5" data-bs-ride="carousel" dir="rtl">
            @foreach ($opportunities as $opportunity)
            <div class="item">
                <div class="card" style="width: 100%;">
                    <a href="{{ route('opportunity', $opportunity->id) }}">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <img class="card-img" src="images/SVG/card1_image.svg" />
                                <div class="small-box-info d-flex align-items-center gap-1 p-1"
                                    style="font-size: 14px; background-color: #F6F6F6;">
                                    <img class="card-icon" src="images/SVG/location.svg" />
                                    {{ $opportunity->city->name}}
                                </div>
                            </div>
                            <div class="title">
                                <h5 class="fw-bold"> {{$opportunity->title}} </h5>
                                <div class="small-box-info d-flex align-items-center gap-2"> <img class="card-icon"
                                        src="/images/SVG/burger.svg" /> {{ $opportunity->sector->name }}</div>
                            </div>
                            <div class="card-list">
                                <ul class="list-unstyled">
                                    <li><span>الحد الأدنى للمشاركة</span><span>{{ $opportunity->min_investment}} ريال</span></li>
                                    <li><span>العائد المتوقع</span><span>{{ $opportunity->expected_roi}} %</span></li>
                                    <li><span>عمر البراند</span><span>12 سنه</span></li>
                                </ul>
                            </div>

                            <button type="button" class="btn card-btn d-flex align-items-center"><img
                                    class="card-icon-small" src="/images/SVG/arrow.svg" />
                                سجل حصتك الآن</button>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach

        </div>
        <a href="{{ route('opportunities')}}"
            class="text-center mt-4 d-flex justify-content-center align-items-center gap-2 more-opportunities">
            <h4>شاهد كل الفرص</h4>
            <svg width="29" height="28" viewBox="0 0 29 28" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.5 0V28H0.5V0H28.5Z" fill="white" fill-opacity="0.01" />
                <path d="M7.90019 7.40047L21.0997 20.6M16.8333 7L7.5 7L7.5 16.3333" stroke="#1E4262"
                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </a>
    </div>
</section>
<!-- ✅ فرص مميزة Slider Section -->
<section class="py-5 main-carousel riyadh-section">
    <div class="container">
        <!-- <div>
                <h2 class="fw-bold text-center mb-2" style="font-size: 2.2rem">
                    الرياض (72)
                </h2>
                <div class="text-center mb-5" style="font-size: 1.1rem">
                    تصفح الفرص الاستثمارية حسب المدينة المختارة 📌 </div>
            </div> -->
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h2 class="fw-bold mb-1" style="font-size:3rem;">
                    الرياض <span style="color:#299FDA;">(72)</span>
                </h2>
                <div class="text-white" style="font-size:1.1rem;">
                    تصفح الفرص الاستثمارية حسب المدينة المختارة 📌
                </div>
            </div>
            <div class="carousel-arrows d-flex gap-2">
                <button id="riyadhPrev" class="btn  rounded-2 shadow-sm" style="width:40px;height:40px;">
                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M44 14.608C44 2.57831 41.4217 0 29.392 0H14.608C2.57831 0 0 2.57831 0 14.608V29.392C0 41.4217 2.57831 44 14.608 44H29.392C41.4217 44 44 41.4217 44 29.392V14.608Z"
                            fill="white" fill-opacity="0.24" />
                        <path
                            d="M27.7206 22.4386L22.5 28.3644L17.225 28.2084L22.2553 22.4386L17.225 16.6689L22.5 16.5129L27.7206 22.4386Z"
                            fill="white" />
                    </svg>

                </button>
                <button id="riyadhNext" class="btn rounded-2 shadow-sm" style="width:40px;height:40px;">
                    <svg width="44" height="44" viewBox="0 0 44 44" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0 14.608C0 2.57831 2.57831 0 14.608 0H29.392C41.4217 0 44 2.57831 44 14.608V29.392C44 41.4217 41.4217 44 29.392 44H14.608C2.57831 44 0 41.4217 0 29.392V14.608Z"
                            fill="white" fill-opacity="0.24" />
                        <path
                            d="M16.2794 22.4386L21.5 28.3644L26.775 28.2084L21.7447 22.4386L26.775 16.6689L21.5 16.5129L16.2794 22.4386Z"
                            fill="white" />
                    </svg>

                </button>
            </div>
        </div>

        <div id="opportunitiesCarousel1" class="owl-carousel owl-theme mt-5" data-bs-ride="carousel" dir="rtl">
            @foreach ($opportunities as $opportunity)
            <div class="item">
                <div class="card" style="width: 100%;">
                    <a href="{{ route('opportunity', $opportunity->id) }}">
                        <div class="card-body">
                            <div class="d-flex align-items-center justify-content-between">
                                <img class="card-img" src="/images/SVG/card1_image.svg" />
                                <div class="small-box-info d-flex align-items-center gap-1 p-1"
                                    style="font-size: 14px; background-color: #F6F6F6;">
                                    <img class="card-icon" src="/images/SVG/location.svg" />
                                    {{ $opportunity->city->name}}
                                </div>
                            </div>
                            <div class="title">
                                <h5 class="fw-bold"> {{$opportunity->title}} </h5>
                                <div class="small-box-info d-flex align-items-center gap-2"> <img class="card-icon"
                                        src="/images/SVG/burger.svg" /> {{ $opportunity->sector->name }}</div>
                            </div>
                            <div class="card-list">
                                <ul class="list-unstyled">
                                    <li><span>الحد الأدنى للمشاركة</span><span>{{ $opportunity->min_investment}} ريال</span></li>
                                    <li><span>العائد المتوقع</span><span>{{ $opportunity->expected_roi}} %</span></li>
                                    <li><span>عمر البراند</span><span>12 سنه</span></li>
                                </ul>
                            </div>

                            <button type="button" class="btn card-btn d-flex align-items-center"><img
                                    class="card-icon-small" src="/images/SVG/arrow.svg" />
                                سجل حصتك الآن</button>
                        </div>
                    </a>
                </div>
            </div>
            @endforeach


        </div>
    </div>
</section>
<section class="py-5">
    <div class="container">
        <div class="browse-sections p-5">
            <h2 class="fw-bold text-center mb-3" style="font-size:3rem;">تصفح بالأقسام</h2>
            <div class="text-center text-muted mb-5" style="font-size:1.1rem;">
                استعرض الفرص الاستثمارية حسب تصنيفات الأقسام المختلفة 💠
            </div>
            <div class="owl-carousel owl-theme" id="sections-carousel" dir="rtl">
                <!-- Card 1 -->
                @foreach ($sectors as $sector)
                <div class="item">
                    <div class="section-card text-center p-4 rounded-3 bg-light">
                        <div class="d-flex align-items-start justify-content-between">
                            <img src="{{ asset('images/SVG/hotel.svg') }}" style="width:60px; height: 60px;">
                            <svg width="29" height="28" viewBox="0 0 29 28" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path d="M28.7999 0V28H0.799927V0H28.7999Z" fill="white" fill-opacity="0.01" />
                                <path d="M8.20011 7.40047L21.3996 20.6M17.1333 7L7.79993 7L7.79993 16.3333"
                                    stroke="#1E4262" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" />
                            </svg>

                        </div>

                        <h5 class="fw-bold mt-3 mb-2" style="color:#3c6e57;">{{ $sector->name }}</h5>
                        <div class="bg-white rounded-2 py-2 mt-2 text-muted" style="font-size:1rem;">{{ $sector->opportunities()->count() }} فرص</div>
                    </div>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>
<!-- ✅ Stats -->
<section class="py-5 bg-light text-center">
    <div class="container">
        <h2 class="fw-bold mb-2">حقائق وأرقام</h2>
        <p class="mb-4 ">احصائيات رقمية تعبر عن مدى فعالية شارك 💡</p>
        <div class="row g-4">
            <div class="col-md-4 p-5">
                <svg width="65" height="64" viewBox="0 0 65 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M64.5 0V64H0.5V0H64.5Z" fill="white" fill-opacity="0.01" />
                    <path opacity="0.3"
                        d="M13.8333 53.3332V13.3332C13.8333 11.8604 15.0272 10.6665 16.5 10.6665H35.1667C36.6394 10.6665 37.8333 11.8604 37.8333 13.3332V26.6665H48.5C49.9728 26.6665 51.1667 27.8604 51.1667 29.3332V53.3332H37.8333H13.8333Z"
                        fill="#299FDA" />
                    <path
                        d="M23.1667 20.3332C22.6144 20.3332 22.1667 20.7809 22.1667 21.3332C22.1667 21.8855 22.6144 22.3332 23.1667 22.3332V21.3332V20.3332ZM28.5 22.3332C29.0523 22.3332 29.5 21.8855 29.5 21.3332C29.5 20.7809 29.0523 20.3332 28.5 20.3332V21.3332V22.3332ZM23.1667 30.9998C22.6144 30.9998 22.1667 31.4476 22.1667 31.9998C22.1667 32.5521 22.6144 32.9998 23.1667 32.9998V31.9998V30.9998ZM28.5 32.9998C29.0523 32.9998 29.5 32.5521 29.5 31.9998C29.5 31.4476 29.0523 30.9998 28.5 30.9998V31.9998V32.9998ZM23.1667 41.6665C22.6144 41.6665 22.1667 42.1142 22.1667 42.6665C22.1667 43.2188 22.6144 43.6665 23.1667 43.6665V42.6665V41.6665ZM28.5 43.6665C29.0523 43.6665 29.5 43.2188 29.5 42.6665C29.5 42.1142 29.0523 41.6665 28.5 41.6665V42.6665V43.6665ZM8.5 52.3332C7.94772 52.3332 7.5 52.7809 7.5 53.3332C7.5 53.8855 7.94772 54.3332 8.5 54.3332V53.3332V52.3332ZM56.5 54.3332C57.0523 54.3332 57.5 53.8855 57.5 53.3332C57.5 52.7809 57.0523 52.3332 56.5 52.3332V53.3332V54.3332ZM13.8333 53.3332H14.8333V11.6665H13.8333H12.8333V53.3332H13.8333ZM14.8333 10.6665V11.6665H36.8333V10.6665V9.6665H14.8333V10.6665ZM37.8333 11.6665H36.8333V53.3332H37.8333H38.8333V11.6665H37.8333ZM37.8333 26.6665V27.6665H50.1667V26.6665V25.6665H37.8333V26.6665ZM51.1667 27.6665H50.1667V53.3332H51.1667H52.1667V27.6665H51.1667ZM23.1667 21.3332V22.3332H28.5V21.3332V20.3332H23.1667V21.3332ZM23.1667 31.9998V32.9998H28.5V31.9998V30.9998H23.1667V31.9998ZM23.1667 42.6665V43.6665H28.5V42.6665V41.6665H23.1667V42.6665ZM8.5 53.3332V54.3332H56.5V53.3332V52.3332H8.5V53.3332ZM50.1667 26.6665V27.6665V27.6665H51.1667H52.1667C52.1667 26.5619 51.2712 25.6665 50.1667 25.6665V26.6665ZM36.8333 10.6665V11.6665H37.8333H38.8333C38.8333 10.5619 37.9379 9.6665 36.8333 9.6665V10.6665ZM13.8333 11.6665H14.8333V11.6665V10.6665V9.6665C13.7288 9.6665 12.8333 10.5619 12.8333 11.6665H13.8333Z"
                        fill="#299FDA" />
                </svg>

                <h2 class="fw-bold mb-2 mt-2">{{ $sectors->count() }}</h2>
                <p style="color: #5B5B5B;">فروع نشطة</p>
            </div>

            <div class="col-md-4 p-5 rounded-3" style=" background-color: #299FDA14;">
                <svg width="65" height="64" viewBox="0 0 65 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M64.5 0V64H0.5V0H64.5Z" fill="white" fill-opacity="0.01" />
                    <g opacity="0.3">
                        <path
                            d="M53.8333 25.3332C53.8333 27.5423 52.0425 29.3332 49.8333 29.3332C47.6242 29.3332 45.8333 27.5423 45.8333 25.3332C45.8333 23.124 47.6242 21.3332 49.8333 21.3332C52.0425 21.3332 53.8333 23.124 53.8333 25.3332Z"
                            fill="#299FDA" />
                        <path
                            d="M19.1666 25.3332C19.1666 27.5423 17.3758 29.3332 15.1666 29.3332C12.9575 29.3332 11.1666 27.5423 11.1666 25.3332C11.1666 23.124 12.9575 21.3332 15.1666 21.3332C17.3758 21.3332 19.1666 23.124 19.1666 25.3332Z"
                            fill="#299FDA" />
                        <path
                            d="M48.5 44.9522C48.5 49.3705 41.3365 50.6665 32.5 50.6665C23.6634 50.6665 16.5 49.3705 16.5 44.9522C16.5 40.5339 23.6634 34.6665 32.5 34.6665C41.3365 34.6665 48.5 40.5339 48.5 44.9522Z"
                            fill="#299FDA" />
                        <path
                            d="M40.5 18.6665C40.5 23.0848 36.9183 26.6665 32.5 26.6665C28.0817 26.6665 24.5 23.0848 24.5 18.6665C24.5 14.2482 28.0817 10.6665 32.5 10.6665C36.9183 10.6665 40.5 14.2482 40.5 18.6665Z"
                            fill="#299FDA" />
                    </g>
                    <path
                        d="M11.5277 37.601C8.23339 38.3737 5.83331 40.6676 5.83331 42.476C5.83331 43.8144 7.1479 44.5798 9.16667 44.9752M53.4722 37.601C56.7666 38.3737 59.1666 40.6676 59.1666 42.476C59.1666 43.8144 57.8521 44.5798 55.8333 44.9752M53.8333 25.3332C53.8333 27.5423 52.0425 29.3332 49.8333 29.3332C47.6242 29.3332 45.8333 27.5423 45.8333 25.3332C45.8333 23.124 47.6242 21.3332 49.8333 21.3332C52.0425 21.3332 53.8333 23.124 53.8333 25.3332ZM19.1666 25.3332C19.1666 27.5423 17.3758 29.3332 15.1666 29.3332C12.9575 29.3332 11.1666 27.5423 11.1666 25.3332C11.1666 23.124 12.9575 21.3332 15.1666 21.3332C17.3758 21.3332 19.1666 23.124 19.1666 25.3332ZM48.5 44.9522C48.5 49.3705 41.3365 50.6665 32.5 50.6665C23.6634 50.6665 16.5 49.3705 16.5 44.9522C16.5 40.5339 23.6634 34.6665 32.5 34.6665C41.3365 34.6665 48.5 40.5339 48.5 44.9522ZM40.5 18.6665C40.5 23.0848 36.9183 26.6665 32.5 26.6665C28.0817 26.6665 24.5 23.0848 24.5 18.6665C24.5 14.2482 28.0817 10.6665 32.5 10.6665C36.9183 10.6665 40.5 14.2482 40.5 18.6665Z"
                        stroke="#299FDA" stroke-width="2" stroke-linecap="round" />
                </svg>
                <h2 class="fw-bold mb-2 mt-2">+320</h2>
                <p style="color: #5B5B5B;">شريك ممول</p>
            </div>
            <div class="col-md-4 p-5">
                <svg width="65" height="64" viewBox="0 0 65 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M64.5 0V64H0.5V0H64.5Z" fill="white" fill-opacity="0.01" />
                    <path opacity="0.3"
                        d="M8.5 19.3335C8.5 16.0198 11.1863 13.3335 14.5 13.3335H48.5C52.9183 13.3335 56.5 16.9152 56.5 21.3335V44.6668C56.5 47.9805 53.8137 50.6668 50.5 50.6668H16.5C12.0817 50.6668 8.5 47.0851 8.5 42.6668V19.3335Z"
                        fill="#299FDA" />
                    <path
                        d="M20.5 16.0002H46.8333C50.6993 16.0002 53.8333 19.1342 53.8333 23.0002V37.3335M25.8333 9.3335L19.1667 16.0002L25.8333 22.6668M44.5 48.0002L18.1667 48.0002C14.3007 48.0002 11.1667 44.8662 11.1667 41.0002L11.1667 26.6668M39.1667 54.6668L45.8333 48.0002L39.1667 41.3335"
                        stroke="#299FDA" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>

                <h2 class="fw-bold mb-2 mt-2">96%</h2>
                <p style="color: #5B5B5B;">استرداد رأس المال خلال 12 شهر</p>
            </div>
        </div>
    </div>
</section>

@endsection
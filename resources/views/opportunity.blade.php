@extends('layouts.app')

@section('title', 'تفاصيل الفرصة — منصة افتتاح الفروع')

@section('content')
<div class="pagehead">
    <h2>تفاصيل الفرصة — {{$opportunity->title}} — {{$opportunity->city->name}}</h2>
    <a class="btn primary" href="#invest">استثمر الآن</a>
</div>

<div class="grid cols-2">
    <section class="card">
        <h3>نبذة</h3>
        <p>{{$opportunity->summary}}</p>
        <div class="grid cols-2">
            <div class="kpi"><span class="muted">تكلفة الفرع</span><b>{{$opportunity->target_amount}} ر.س</b></div>
            <div class="kpi"><span class="muted">الحد الأدنى للفرد</span><b>{{$opportunity->min_investment}} ر.س</b></div>
            <div class="kpi"><span class="muted">مدة الاسترداد</span><b>{{$opportunity->payback_months}} شهر</b></div>
            <div class="kpi"><span class="muted">العائد المتوقع</span><b>{{$opportunity->expected_roi}}%</b></div>
        </div>
        <h4>المخاطر والافتراضات</h4>
        <ul>
            @foreach ($opportunity->assumptions as $assumption)
            <li>{{$assumption}}</li>
            @endforeach
        </ul>
    </section>

    <aside class="card" id="invest">
        <form action="{{ route('opportunity.invest', $opportunity->id) }}" method="POST">
            @csrf
            <h3>الاستثمار</h3>
            <label class="label" for="amount">المبلغ</label>
            <input class="input" id="amount" name="amount" placeholder="مثال: 20000" />
            <!-- <input class="input" type="hidden" name="opportunity_id" id="opportunity_id" value="{{$opportunity->id}}" /> -->
            <div class="kpi"><span class="muted">نسبة التمويل الحالية</span><b>{{ $percentage }} %</b></div>
            <div class="progress"><span style="--value:{{ $percentage }}%"></span></div>
            <div class="form-actions" style="margin-top:10px;">
                <button class="btn primary" type="submit">متابعة</button>
                <a class="btn" href="{{ url('/opportunities') }}">رجوع</a>
            </div>
        </form>
    </aside>
</div>

<div class="sub_content">
    <h1> {{$opportunity->title}} </h1>
    <p>الرئيسية <img src="{{ asset('images/SVG/arrow.svg') }}" style="margin: 0 5px; width: 7px;" /> الفرص الإستثمارية
        <img src="{{ asset('images/SVG/arrow.svg') }}" style="margin: 0 5px; width: 7px;" />  {{$opportunity->title}}
    </p>
</div>
<div class="overlay"></div>

</header>

<!-- ✅ About Section -->
<section class="about-section py-5 bg-light">
    <div class="container">
        <div class="row align-items-start">
            <div class="col-md-7">
                <!---->
                <div class="card" style="width: 100%;">
                    <div class="card-body m-3">
                        <div class="d-flex justify-content-between">
                            <img src="{{ asset('images/SVG/card1_image.svg') }}" class="card-img" />
                            <div style="color:#1e4262 ; text-decoration: underline; " class="fw-medium">
                                <a href="#">
                                    <img src="{{ asset('images/SVG/share.svg') }}" class="card-icon" />
                                    مشاركة
                                </a>
                            </div>
                        </div>
                        <div class="title">
                            <h5 class="fw-bold">{{$opportunity->title}}</h5>
                            <div class="d-flex gap-3">
                                <div class="small-box-info">
                                    <img src="{{ asset('images/SVG/location.svg') }}" class="card-icon" />
                                    {{$opportunity->city->name}}
                                </div>
                                <div class="small-box-info "> <img src="{{ asset('images/SVG/burger.svg') }}" class="card-icon" /> مطاعم
                                </div>

                            </div>
                        </div>
                        <div class="d-flex w-100 gap-2 opportunities-data">
                            <div class="card-list w-100 align-items-start">
                                <ul class="list-unstyled">
                                    <li><span>تكلفة الفرع</span><span>{{$opportunity->target_amount}} ر.س <img
                                                src="{{ asset('images/SVG/sar.svg') }}" /></span></li>
                                    <li><span>الحد الأدنى للمشاركة</span><span>{{$opportunity->min_investment}} ر.س <img
                                                src="{{ asset('images/SVG/sar.svg') }}" /></span></li>
                                    <li><span>عمر البراند</span><span>12 سنه</span></li>
                                </ul>
                            </div>
                            <div class="card-list  w-100  align-items-start">
                                <ul class="list-unstyled">
                                    <li><span>مدة الإسترداد النقدية</span><span>{{$opportunity->payback_months}} شهر</span></li>
                                    <li><span>العائد المتوقع</span><span>{{$opportunity->expected_return}}%</span></li>
                                </ul>
                            </div>
                        </div>


                    </div>

                </div>

                <!---->
                <div class="mt-2 bg-white " style="padding:20px;">
                    <div class="d-flex align-items-start gap-2 mb-4 ">
                        <img src="{{ asset('images/SVG/info_icon.svg') }}" />
                        <div>
                            <h5 class="fw-bold">نبذة عن الفرصة</h5>
                            <p style="color:#939393;">اعرف تفاصيل أكثر عن هذه الفرصة الاستثمارية</p>
                        </div>
                    </div>


                    <div class="d-flex flex-column gap-2">

                        <span>🌟 الموقع: {{$opportunity->city->name}} </span>
                        <span>{{$opportunity->summary}}</span>

                        <h6 class="fw-bold my-4"> 💸 لماذا الاستثمار هنا؟</h6>

                        <ul>
                            <li>علامة تجارية موثوقة ولها سمعة قوية 🙌</li>
                            <li> النمو المستدام في السوق السعودي 📊</li>
                            <li> ربحية عالية وتحقيق عوائد ممتازة للمستثمرين 💰</li>
                        </ul>



                        <h6 class="fw-bold  my-4"> 🚀 الفرص المستقبلية:</h6>

                        <ul>
                            <li>تقديم خيارات صحية مع طابع محلي لتوسيع قاعدة العملاء 🌱</li>
                            <li> تعزيز العلامة التجارية بتسويق ذكي عبر منصات التواصل الاجتماعي 📱</li>
                        </ul>


                    </div>
                </div>


                <!---->
                <div class="mt-2 bg-white " style="padding:20px;">
                    <div class="d-flex align-items-start gap-2 mb-4 ">
                        <img src="{{ asset('images/SVG/alert.svg') }}" />
                        <div>
                            <h5 class="fw-bold">المخاطر والافتراضات</h5>
                            <p style="color:#939393;">المخاطر التي قد تواجه تلك الفرصة والافتراضات لها</p>
                        </div>
                    </div>


                    <div>

                        🌟 الموقع: {{$opportunity->city->name}}<br />
                        {{$opportunity->summary}}
                        
                        <h6 class="fw-bold my-4"> 💸 لماذا الاستثمار هنا؟</h6>

                        <ul>
                            @foreach ($opportunity->assumptions as $assumption)
                            <li>{{$assumption}}</li>
                            @endforeach
                        </ul>



                        <h6 class="fw-bold  my-4"> 🚀 الفرص المستقبلية:</h6>

                        <ul>
                            <li>تقديم خيارات صحية مع طابع محلي لتوسيع قاعدة العملاء 🌱</li>
                            <li> تعزيز العلامة التجارية بتسويق ذكي عبر منصات التواصل الاجتماعي 📱</li>
                        </ul>


                    </div>
                </div>

                <!---->
                <div class="mt-2 bg-white " style="padding:20px;">
                    <div class="d-flex align-items-start gap-2 mb-4 ">
                        <img src="{{ asset('images/SVG/mony.svg') }}" />
                        <div>
                            <h5 class="fw-bold">خطة التكاليف</h5>
                            <p style="color:#939393;">الخطة المالية الكاملة لتكاليف التشغيل</p>
                        </div>


                    </div>
                    <div>
                        <table class="table table-striped">
                            <tr>
                                <th>البند</th>
                                <th>المبلغ</th>
                            </tr>
                            @foreach($opportunity->costs as $cost)
                            <tr>
                                <td>{{$cost->item}}</td>
                                <td>{{$cost->price}}</td>
                            </tr>
                            @endforeach

                        </table>
                    </div>


                </div>
            </div>
            <div class="col-md-5">
                <div class="mt-2 bg-white " style="padding:20px;">
                    <div class="d-flex align-items-start gap-2 mb-4 ">
                        <div>
                            <h5 class="fw-bold">سجل حصتك لتكون شريك مؤسس</h5>
                            <p>شارك من خلال النموذج التالي 🚀</p>
                        </div>
                    </div>


                    <!--amount input -->


                    <div class="mb-4">
                        <form action="{{ route('opportunity.invest', $opportunity->id) }}" method="POST">
                            @csrf
                            <label class="form-label fw-bold">مبلغ المشاركة</label>
                            <div class="input-group mb-3 details-amount-input">

                            <span class="input-group-text" id="basic-addon1">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path d="M24 0V24H0V0H24Z" fill="white" fill-opacity="0.01" />
                                    <g opacity="0.3">
                                        <path
                                            d="M3 6.69365C3 6.35237 3.33501 6.10205 3.66749 6.17903C5.08322 6.50681 8.54161 7.03697 12 5.49994C15.4371 3.97236 18.8743 4.48664 20.3062 4.81479C20.7257 4.91094 21 5.29027 21 5.72071V17.3062C21 17.6475 20.665 17.8978 20.3325 17.8209C18.9168 17.4931 15.4584 16.9629 12 18.4999C8.56286 20.0275 5.12571 19.5132 3.69382 19.1851C3.27426 19.0889 3 18.7096 3 18.2792V6.69365Z"
                                            fill="#1E4262" />
                                        <path
                                            d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                            fill="#1E4262" />
                                    </g>
                                    <path
                                        d="M3 6.69365C3 6.35237 3.33501 6.10205 3.66749 6.17903C5.08322 6.50681 8.54161 7.03697 12 5.49994C15.4371 3.97236 18.8743 4.48664 20.3062 4.81479C20.7257 4.91094 21 5.29027 21 5.72071V17.3062C21 17.6475 20.665 17.8978 20.3325 17.8209C18.9168 17.4931 15.4584 16.9629 12 18.4999C8.56286 20.0275 5.12571 19.5132 3.69382 19.1851C3.27426 19.0889 3 18.7096 3 18.2792V6.69365Z"
                                        stroke="#1E4262" stroke-width="1.5" />
                                    <path
                                        d="M15 12C15 13.6569 13.6569 15 12 15C10.3431 15 9 13.6569 9 12C9 10.3431 10.3431 9 12 9C13.6569 9 15 10.3431 15 12Z"
                                        stroke="#1E4262" stroke-width="1.5" />
                                </svg>

                            </span>


                            <input type="text" name="amount" class="form-control" placeholder="1000..." aria-label="Search"
                                aria-describedby="basic-addon1">


                            <span class="input-group-text" id="basic-addon2">
                                <svg width="15" height="16" viewBox="0 0 15 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M8.90967 14.1741C8.65421 14.7405 8.48535 15.3553 8.42065 15.9999L13.8267 14.8507C14.0821 14.2844 14.2509 13.6695 14.3157 13.0249L8.90967 14.1741Z"
                                        fill="#1E4262" />
                                    <path
                                        d="M13.8266 11.4079C14.0821 10.8416 14.2509 10.2268 14.3156 9.58212L10.1045 10.4778V8.75601L13.8265 7.96505C14.082 7.39872 14.2508 6.78388 14.3155 6.13924L10.1044 7.03412V0.842159C9.45912 1.20447 8.88605 1.68674 8.42021 2.25561V7.39223L6.73604 7.75021V0C6.09077 0.362181 5.51771 0.844579 5.05187 1.41345V8.10806L1.28354 8.90883C1.02808 9.47515 0.859086 10.09 0.794266 10.7346L5.05187 9.82982V11.9981L0.489014 12.9677C0.233555 13.534 0.0646925 14.1489 0 14.7935L4.77604 13.7785C5.16483 13.6977 5.49899 13.4678 5.71625 13.1515L6.59214 11.8529V11.8526C6.68307 11.7183 6.73604 11.5563 6.73604 11.3818V9.47184L8.42021 9.11386V12.5574L13.8265 11.4077L13.8266 11.4079Z"
                                        fill="#1E4262" />
                                </svg>

                            </span>
                        </div>
                    </div>


                    <button type="submit" class="btn card-btn btn-lg fs-6"><img
                            src="{{ asset('/images/SVG/arrow.svg') }}" />
                        سجل حصتك الآن</button>
                    </form>
                </div>


            </div>
        </div>
</section>
@endsection
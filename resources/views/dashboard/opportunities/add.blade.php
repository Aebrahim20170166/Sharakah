@extends('layouts.dashboard-app')

@section('title', 'اضافة فرصه استثمارية')
@section('pageTitle', 'اضافة فرصه استثمارية')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="card">

                    <div class="card-body">
                        <div class="new-user-info">
                            <!-- Error Messages Section -->
                            @if ($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <h6 class="alert-heading mb-2">يرجى تصحيح الأخطاء التالية:</h6>
                                    <ul class="mb-0">
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('opportunities.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="title">العنوان</label>
                                        <input value="{{ old('title') }}" type="text" name="title" class="form-control @error('title') is-invalid @enderror" id="title" placeholder="العنوان">
                                        @error('title')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label class="form-label">المدينة</label>
                                        <select name="city_id" class="selectpicker form-control @error('city_id') is-invalid @enderror" data-style="py-0">
                                            <option value="">اختر المدينة</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}" {{ old('city_id') == $city->id ? 'selected' : '' }}>
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('city_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">القطاع</label>
                                        <select name="sector_id" class="selectpicker form-control @error('sector_id') is-invalid @enderror" data-style="py-0">
                                            <option value="">اختر القطاع</option>
                                            @foreach($sectors as $sector)
                                                <option value="{{ $sector->id }}" {{ old('sector_id') == $sector->id ? 'selected' : '' }}>
                                                    {{ $sector->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sector_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="min_investment">الحد الأدنى للاستثمار</label>
                                        <input value="{{ old('min_investment') }}" type="number" min="0" name="min_investment" class="form-control @error('min_investment') is-invalid @enderror" id="min_investment" placeholder="الحد الأدنى للاستثمار">
                                        @error('min_investment')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="target_amount">المبلغ المستهدف</label>
                                        <input value="{{ old('target_amount') }}" type="number" min="0" name="target_amount" class="form-control @error('target_amount') is-invalid @enderror" id="target_amount" placeholder="المبلغ المستهدف">
                                        @error('target_amount')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="expected_roi">العائد المتوقع على الاستثمار</label>
                                        <input value="{{ old('expected_roi') }}" type="number" min="0" name="expected_roi" class="form-control @error('expected_roi') is-invalid @enderror" id="expected_roi" placeholder="العائد المتوقع على الاستثمار">
                                        @error('expected_roi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="payback_months">مدة استرداد رأس المال (بالأشهر)</label>
                                        <input value="{{ old('payback_months') }}" type="number" min="0" name="payback_months" class="form-control @error('payback_months') is-invalid @enderror" id="payback_months" placeholder="مدة استرداد رأس المال (بالأشهر)">
                                        @error('payback_months')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="summary">الملخص</label>
                                        <input value="{{ old('summary') }}" type="text" name="summary" class="form-control @error('summary') is-invalid @enderror" id="summary" placeholder="الملخص">
                                        @error('summary')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="assumptions">الافتراضات</label>
                                        <div id="assumptions-container">
                                            <div class="assumption-item mb-3">
                                                <div class="input-group">
                                                    <input type="text" name="assumptions[]" class="form-control @error('assumptions.*') is-invalid @enderror" placeholder="أدخل الافتراض" value="{{ old('assumptions.0') }}">
                                                    <button type="button" class="btn btn-outline-danger remove-assumption ms-2" style="display: none; min-width: 45px;">
                                                        <i class="fas fa-trash text-danger"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-assumption">
                                            <i class="fas fa-plus"></i> إضافة افتراض جديد
                                        </button>
                                        @error('assumptions')
                                            <div class="text-danger mt-1">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <script>
                                        document.addEventListener('DOMContentLoaded', function() {
                                            const container = document.getElementById('assumptions-container');
                                            const addButton = document.getElementById('add-assumption');
                                            
                                            // Show remove button for first item if it has value
                                            const firstInput = container.querySelector('input');
                                            if (firstInput && firstInput.value) {
                                                firstInput.closest('.assumption-item').querySelector('.remove-assumption').style.display = 'inline-block';
                                            }
                                            
                                            addButton.addEventListener('click', function() {
                                                const newItem = document.createElement('div');
                                                newItem.className = 'assumption-item mb-3';
                                                newItem.innerHTML = `
                                                    <div class="input-group">
                                                        <input type="text" name="assumptions[]" class="form-control" placeholder="أدخل الافتراض">
                                                        <button type="button" class="btn btn-outline-danger remove-assumption ms-2" style="min-width: 45px;">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </button>
                                                    </div>
                                                `;
                                                container.appendChild(newItem);
                                                
                                                // Show remove buttons for all items
                                                document.querySelectorAll('.remove-assumption').forEach(btn => {
                                                    btn.style.display = 'inline-block';
                                                });
                                            });
                                            
                                            // Event delegation for remove buttons
                                            container.addEventListener('click', function(e) {
                                                if (e.target.closest('.remove-assumption')) {
                                                    const item = e.target.closest('.assumption-item');
                                                    item.remove();
                                                    
                                                    // Hide remove button for first item if it's the only one
                                                    const items = container.querySelectorAll('.assumption-item');
                                                    if (items.length === 1) {
                                                        items[0].querySelector('.remove-assumption').style.display = 'none';
                                                    }
                                                }
                                            });
                                        });
                                    </script>
                                </div>

                                <button type="submit" class="btn btn-primary">اضافة</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="btn-download">
    <a class="btn btn-danger px-3 py-2" href="https://iqonic.design/product/admin-templates/hope-ui-admin-free-open-source-bootstrap-admin-template/" target="_blank">
        <svg width="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path opacity="0.4" fill-rule="evenodd" clip-rule="evenodd" d="M5.91064 20.5886C5.91064 19.7486 6.59064 19.0686 7.43064 19.0686C8.26064 19.0686 8.94064 19.7486 8.94064 20.5886C8.94064 21.4186 8.26064 22.0986 7.43064 22.0986C6.59064 22.0986 5.91064 21.4186 5.91064 20.5886ZM17.1606 20.5886C17.1606 19.7486 17.8406 19.0686 18.6806 19.0686C19.5106 19.0686 20.1906 19.7486 20.1906 20.5886C20.1906 21.4186 19.5106 22.0986 18.6806 22.0986C17.8406 22.0986 17.1606 21.4186 17.1606 20.5886Z" fill="currentColor"></path>
            <path fill-rule="evenodd" clip-rule="evenodd" d="M20.1907 6.34909C20.8007 6.34909 21.2007 6.55909 21.6007 7.01909C22.0007 7.47909 22.0707 8.13909 21.9807 8.73809L21.0307 15.2981C20.8507 16.5591 19.7707 17.4881 18.5007 17.4881H7.59074C6.26074 17.4881 5.16074 16.4681 5.05074 15.1491L4.13074 4.24809L2.62074 3.98809C2.22074 3.91809 1.94074 3.52809 2.01074 3.12809C2.08074 2.71809 2.47074 2.44809 2.88074 2.50809L5.26574 2.86809C5.60574 2.92909 5.85574 3.20809 5.88574 3.54809L6.07574 5.78809C6.10574 6.10909 6.36574 6.34909 6.68574 6.34909H20.1907ZM14.1307 11.5481H16.9007C17.3207 11.5481 17.6507 11.2081 17.6507 10.7981C17.6507 10.3781 17.3207 10.0481 16.9007 10.0481H14.1307C13.7107 10.0481 13.3807 10.3781 13.3807 10.7981C13.3807 11.2081 13.7107 11.5481 14.1307 11.5481Z" fill="currentColor"></path>
        </svg>
    </a>
</div>
@endsection
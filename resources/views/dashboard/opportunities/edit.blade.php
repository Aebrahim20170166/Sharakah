@extends('layouts.dashboard-app')

@section('title', 'تعديل فرصة استثمارية')
@section('pageTitle', 'تعديل فرصة استثمارية')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="card">

                    <div class="card-body">
                        <div class="new-user-info">
                            <form action="{{ route('opportunities.update', $opportunity->id) }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="title">العنوان</label>
                                        <input value="{{ old('title', $opportunity->title) }}" type="text" name="title" class="form-control" id="title" placeholder="العنوان">
                                        @error('title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-sm-6">
                                        <label class="form-label">المدينة</label>
                                        <select name="city_id" class="selectpicker form-control" data-style="py-0">
                                            <option value="">اختر المدينة</option>
                                            @foreach($cities as $city)
                                                <option value="{{ $city->id }}" {{ old('city_id', $opportunity->city_id) == $city->id ? 'selected' : '' }}>
                                                    {{ $city->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('city_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-sm-6">
                                        <label class="form-label">القطاع</label>
                                        <select name="sector_id" class="selectpicker form-control" data-style="py-0">
                                            <option value="">اختر القطاع</option>
                                            @foreach($sectors as $sector)
                                                <option value="{{ $sector->id }}" {{ old('sector_id', $opportunity->sector_id) == $sector->id ? 'selected' : '' }}>
                                                    {{ $sector->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('sector_id')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="min_investment">الحد الأدنى للاستثمار</label>
                                        <input value="{{ old('min_investment', $opportunity->min_investment) }}" type="number" min="0" name="min_investment" class="form-control" id="min_investment" placeholder="الحد الأدنى للاستثمار">
                                        @error('min_investment')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="target_amount">المبلغ المستهدف</label>
                                        <input value="{{ old('target_amount', $opportunity->target_amount) }}" type="number" min="0" name="target_amount" class="form-control" id="target_amount" placeholder="المبلغ المستهدف">
                                        @error('target_amount')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="expected_roi">العائد المتوقع على الاستثمار</label>
                                        <input value="{{ old('expected_roi', $opportunity->expected_roi) }}" type="number" min="0" name="expected_roi" class="form-control" id="expected_roi" placeholder="العائد المتوقع على الاستثمار">
                                        @error('expected_roi')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="payback_months">مدة استرداد رأس المال (بالأشهر)</label>
                                        <input value="{{ old('payback_months', $opportunity->payback_months) }}" type="number" min="0" name="payback_months" class="form-control" id="payback_months" placeholder="مدة استرداد رأس المال (بالأشهر)">
                                        @error('payback_months')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="summary">الملخص</label>
                                        <input value="{{ old('summary', $opportunity->summary) }}" type="text" name="summary" class="form-control" id="summary" placeholder="الملخص">
                                        @error('summary')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="assumptions">الافتراضات</label>
                                        <div id="assumptions-container">
                                            @if($opportunity->assumptions && count($opportunity->assumptions) > 0)
                                                @foreach($opportunity->assumptions as $index => $assumption)
                                                    <div class="assumption-item mb-3">
                                                        <div class="input-group">
                                                            <input type="text" name="assumptions[]" class="form-control" placeholder="أدخل الافتراض" value="{{ old('assumptions.' . $index, $assumption) }}">
                                                            <button type="button" class="btn btn-outline-danger remove-assumption ms-2" style="min-width: 45px;">
                                                                <i class="fas fa-trash text-danger"></i>
                                                            </button>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            @else
                                                <div class="assumption-item mb-3">
                                                    <div class="input-group">
                                                        <input type="text" name="assumptions[]" class="form-control" placeholder="أدخل الافتراض" value="{{ old('assumptions.0') }}">
                                                        <button type="button" class="btn btn-outline-danger remove-assumption ms-2" style="display: none; min-width: 45px;">
                                                            <i class="fas fa-trash text-danger"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add-assumption">
                                            <i class="fas fa-plus"></i> إضافة افتراض جديد
                                        </button>
                                        @error('assumptions')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">تحديث الفرصة</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
@endsection
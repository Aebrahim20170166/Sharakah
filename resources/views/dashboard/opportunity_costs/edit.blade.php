@extends('layouts.dashboard-app')

@section('title', 'تعديل تكلفة')
@section('pageTitle', 'تعديل تكلفة')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">تعديل تكلفة: {{ $cost->item }}</h4>
                    </div>
                    
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

                            @if(session('error'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <i class="fas fa-exclamation-circle me-2"></i>
                                    {{ session('error') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="fas fa-check-circle me-2"></i>
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            @endif

                            <form action="{{ route('dashboard.opportunity_costs.update', $cost->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="item">البند</label>
                                        <input type="text" name="item" value="{{ old('item', $cost->item) }}" class="form-control @error('item') is-invalid @enderror" id="item" placeholder="أدخل اسم البند">
                                        @error('item')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="price">السعر</label>
                                        <input type="number" name="price" value="{{ old('price', $cost->price) }}" class="form-control @error('price') is-invalid @enderror" id="price" placeholder="أدخل السعر" min="0" step="0.01">
                                        @error('price')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="opportunity_id">الفرصة الاستثمارية</label>
                                        <select name="opportunity_id" class="selectpicker form-control @error('opportunity_id') is-invalid @enderror" data-style="py-0">
                                            <option value="">اختر الفرصة الاستثمارية</option>
                                            @foreach($opportunities as $opportunity)
                                                <option value="{{ $opportunity->id }}" {{ old('opportunity_id', $cost->opportunity_id) == $opportunity->id ? 'selected' : '' }}>
                                                    {{ $opportunity->title }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('opportunity_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-2"></i>تحديث التكلفة
                                    </button>
                                    <a href="{{ route('dashboard.opportunity_costs.index') }}" class="btn btn-secondary ms-2">
                                        <i class="fas fa-arrow-right me-2"></i>إلغاء
                                    </a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
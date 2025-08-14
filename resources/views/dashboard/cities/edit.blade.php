@extends('layouts.dashboard-app')

@section('title', 'تعديل مدينه')
@section('pageTitle', 'تعديل مدينه')

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

                            <form method="post" action="{{ route('cities.update', $city->id) }}">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="name">الاسم بالعربي</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="الاسم بالعربي" value="{{ old('name', $city->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="name_en">الاسم بالانجليزي</label>
                                        <input type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror" id="name_en" placeholder="الاسم بالانجليزي" value="{{ old('name_en', $city->name_en) }}">
                                        @error('name_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-sm-12">
                                        <label class="form-label">الدولة</label>
                                        <select name="country_id" class="selectpicker form-control @error('country_id') is-invalid @enderror" data-style="py-0">
                                            <option value="">اختر الدولة</option>
                                            @foreach($countries as $country)
                                                <option value="{{ $country->id }}" {{ old('country_id', $city->country_id) == $country->id ? 'selected' : '' }}>
                                                    {{ $country->name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('country_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">تحديث المدينة</button>
                                    <a href="{{ route('cities.index') }}" class="btn btn-secondary ms-2">إلغاء</a>
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
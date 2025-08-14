@extends('layouts.dashboard-app')

@section('title', 'تعديل دولة')
@section('pageTitle', 'تعديل دولة')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="col">
            <div class="col-xl-12 col-lg-12">
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

                            <form action="{{ route('countries.update', $country->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="name">الاسم بالعربي</label>
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="الاسم بالعربي" value="{{ old('name', $country->name) }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="name_en">الاسم بالانجليزي</label>
                                        <input type="text" name="name_en" class="form-control @error('name_en') is-invalid @enderror" id="name_en" placeholder="الاسم بالانجليزي" value="{{ old('name_en', $country->name_en) }}">
                                        @error('name_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="code">كود الدولة</label>
                                        <input type="text" name="code" class="form-control @error('code') is-invalid @enderror" id="code" placeholder="كود الدولة" value="{{ old('code', $country->code) }}">
                                        @error('code')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">تحديث الدولة</button>
                                    <a href="{{ route('countries.index') }}" class="btn btn-secondary ms-2">إلغاء</a>
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
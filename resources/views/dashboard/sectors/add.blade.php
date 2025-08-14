@extends('layouts.dashboard-app')

@section('title', 'إضافة قطاع')
@section('pageTitle', 'إضافة قطاع')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">إضافة قطاع جديد</h4>
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

                            <form action="{{ route('dashboard.sectors.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="name_ar">اسم القطاع بالعربية</label>
                                        <input type="text" name="name_ar" value="{{ old('name_ar') }}" class="form-control @error('name_ar') is-invalid @enderror" id="name_ar" placeholder="أدخل اسم القطاع بالعربية">
                                        @error('name_ar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="name_en">اسم القطاع بالإنجليزية</label>
                                        <input type="text" name="name_en" value="{{ old('name_en') }}" class="form-control @error('name_en') is-invalid @enderror" id="name_en" placeholder="أدخل اسم القطاع بالإنجليزية">
                                        @error('name_en')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="image">صورة القطاع</label>
                                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="image" accept="image/*" required>
                                        <small class="form-text text-muted">يجب أن تكون الصورة بصيغة JPG, PNG, أو GIF</small>
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                
                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>إضافة القطاع
                                    </button>
                                    <a href="{{ route('dashboard.sectors.index') }}" class="btn btn-secondary ms-2">
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
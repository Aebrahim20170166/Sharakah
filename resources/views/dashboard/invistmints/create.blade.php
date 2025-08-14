@extends('layouts.dashboard-app')

@section('title', 'إضافة التقرير')
@section('pageTitle', 'إضافة التقرير')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-xl-12 col-lg-8">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">إضافة التقرير جديد</h4>
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

                            <form action="{{ route('dashboard.invistmints.daily_report_store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="investment_id" value="{{ $id }}"/>
                                <div class="row">

                                    <div class="form-group col-md-12">
                                        <label class="form-label" for="desc">الوصف</label>
                                        <input type="text" name="desc" value="{{ old('desc') }}" class="form-control @error('desc') is-invalid @enderror" id="desc" placeholder="الوصف">
                                        @error('desc')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label class="form-label" for="amount">القيمة</label>
                                        <input type="text" name="amount" value="{{ old('amount') }}" class="form-control @error('amount') is-invalid @enderror" id="amount" placeholder="القيمة">
                                        @error('amount')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group col-6">
                                        <label class="form-label">النوع</label>
                                        <select name="type" class="selectpicker form-control @error('type') is-invalid @enderror" data-style="py-0">
                                            <option value="">اختر النوع</option>
                                            <option value="0" {{ old('type') == 0 ? 'selected' : '' }}>
                                                بيع
                                            </option>
                                            <option value="1" {{ old('type') == 1 ? 'selected' : '' }}>
                                                شراء
                                            </option>
                                        </select>
                                        @error('type')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-plus me-2"></i>إضافة
                                    </button>
                                    <a href="{{ route('dashboard.invistmints.daily_report', $id) }}" class="btn btn-secondary ms-2">
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
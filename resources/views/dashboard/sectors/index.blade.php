@extends('layouts.dashboard-app')

@section('title', 'قائمة القطاعات')
@section('pageTitle', 'قائمة القطاعات')

@section('content')
<div class="conatiner-fluid content-inner mt-n5 py-0">
    <div>
        <div class="row">
            <div class="col-sm-12">
                <!-- Success Messages Section -->
                @if(session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        {{ session('success') }}
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

                @if(session('warning'))
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        {{ session('warning') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                @if(session('info'))
                    <div class="alert alert-info alert-dismissible fade show" role="alert">
                        <i class="fas fa-info-circle me-2"></i>
                        {{ session('info') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">قائمة القطاعات</h4>
                        <a href="{{ route('dashboard.sectors.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>إضافة قطاع جديد
                        </a>
                    </div>
                    
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                                <thead>
                                    <tr class="ligth">
                                        <th>#</th>
                                        <th>الاسم بالعربي</th>
                                        <th>صورة القطاع</th>
                                        <th>تاريخ الإضافة</th>
                                        <th style="min-width: 120px">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($sectors as $sector)
                                    <tr>
                                        <td>{{ $sector->id }}</td>
                                        <td>{{ $sector->name }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div style="width: 50px; height: 50px; overflow: hidden; border-radius: 8px; border: 1px solid #ddd; background: #f8f9fa;">
                                                    @if($sector->image && file_exists(public_path($sector->image)))
                                                        <img src="{{ asset($sector->image) }}"
                                                            alt="صورة القطاع {{ $sector->name }}"
                                                            style="width: 100%; height: 100%; object-fit: cover;">
                                                    @else
                                                        <div class="d-flex align-items-center justify-content-center h-100 text-muted">
                                                            <i class="fas fa-image"></i>
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                        <td>{{ $sector->created_at }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <!-- زر تعديل -->
                                                <a href="{{ route('dashboard.sectors.edit', $sector->id) }}"
                                                    class="btn btn-sm btn-warning text-white d-flex align-items-center"
                                                    title="تعديل">
                                                    <i class="fas fa-edit me-1"></i> تعديل
                                                </a>

                                                <!-- زر حذف -->
                                                <form action="{{ route('dashboard.sectors.destroy', $sector->id) }}" method="POST"
                                                    onsubmit="return confirm('هل أنت متأكد من حذف القطاع \'{{ $sector->name }}\'؟');"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-sm btn-danger text-white d-flex align-items-center"
                                                        title="حذف">
                                                        <i class="fas fa-trash-alt me-1"></i> حذف
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="5" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="fas fa-inbox fa-2x mb-3"></i>
                                                <p>لا توجد قطاعات مضافة حالياً</p>
                                                <a href="{{ route('dashboard.sectors.create') }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-plus me-1"></i>إضافة أول قطاع
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
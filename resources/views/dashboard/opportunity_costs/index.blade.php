@extends('layouts.dashboard-app')

@section('title', 'قائمة التكاليف')
@section('pageTitle', 'قائمة التكاليف')

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
                        <h4 class="card-title mb-0">قائمة تكاليف الفرص الاستثمارية</h4>
                        <a href="{{ route('dashboard.opportunity_costs.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>إضافة تكلفة جديدة
                        </a>
                    </div>
                    
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                                <thead>
                                    <tr class="ligth">
                                        <th>#</th>
                                        <th>البند</th>
                                        <th>السعر</th>
                                        <th>الفرصة الاستثمارية</th>
                                        <th>تاريخ الإضافة</th>
                                        <th style="min-width: 120px">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($costs as $cost)
                                    <tr>
                                        <td>{{ $cost->id }}</td>
                                        <td>{{ $cost->item }}</td>
                                        <td>
                                            <span class="badge bg-success">
                                                {{ number_format($cost->price, 2) }} ريال
                                            </span>
                                        </td>
                                        <td>
                                            <span class="text-primary fw-bold">
                                                {{ $cost->opportunity->title ?? 'غير محدد' }}
                                            </span>
                                        </td>
                                        <td>{{ $cost->created_at->format('Y-m-d') }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <!-- زر تعديل -->
                                                <a href="{{ route('dashboard.opportunity_costs.edit', $cost->id) }}"
                                                    class="btn btn-sm btn-warning text-white d-flex align-items-center"
                                                    title="تعديل">
                                                    <i class="fas fa-edit me-1"></i> تعديل
                                                </a>

                                                <!-- زر حذف -->
                                                <form action="{{ route('dashboard.opportunity_costs.destroy', $cost->id) }}" method="POST"
                                                    onsubmit="return confirm('هل أنت متأكد من حذف التكلفة \'{{ $cost->item }}\'؟');"
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
                                        <td colspan="6" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="fas fa-inbox fa-2x mb-3"></i>
                                                <p>لا توجد تكاليف مضافة حالياً</p>
                                                <a href="{{ route('dashboard.opportunity_costs.create') }}" class="btn btn-primary btn-sm">
                                                    <i class="fas fa-plus me-1"></i>إضافة أول تكلفة
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
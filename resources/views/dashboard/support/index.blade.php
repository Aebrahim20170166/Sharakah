@extends('layouts.dashboard-app')

@section('title', 'طلبات الدعم')
@section('pageTitle', 'طلبات الدعم')

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
                        <h4 class="card-title mb-0">طلبات الدعم</h4>
                    </div>
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الاسم</th>
                                        <th>الإيميل</th>
                                        <th>الموضوع</th>
                                        <th>التفاصيل</th>
                                        <th>تاريخ الإضافة</th>
                                        <th>حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($supports as $support)
                                    <tr>
                                        <td>{{ $support->id }}</td>
                                        <td>{{ $support->name }}</td>
                                        <td>{{ $support->email }}</td>
                                        <td>{{ $support->subject }}</td>
                                        <td>{{ $support->details }}</td>
                                        <td>{{ $support->created_at }}</td>
                                        <td>
                                            <form action="{{ route('dashboard.support.destroy', $support->id) }}" method="POST" onsubmit="return confirm('هل أنت متأكد من حذف هذا الطلب؟');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">حذف</button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
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
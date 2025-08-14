@extends('layouts.dashboard-app')

@section('title', 'التقرير اليومي للفرصه')
@section('pageTitle', "تقرير الفرصه ")

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
                        <a href="{{ route('dashboard.invistmints.daily_report', $investment->id) }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>إضافة
                        </a>
                    </div>
                    
                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                                <thead>
                                    <tr class="ligth">
                                        <th>#</th>
                                        <th>الوقت</th>
                                        <th>النوع</th>
                                        <th>الوصف</th>
                                        <th>المبلغ</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dailyReorts as $sector)
                                    <tr>
                                        <td>{{ $sector->id }}</td>
                                        <td>{{ $sector->created_at->format('Y-m-d h:i a')  }}</td>
                                        <td>{{ $sector->type == 0 ? 'بيع' : 'شراء' }}</td>
                                        <td>{{ $sector->desc }}</td>
                                        <td>{{ $sector->amount }} ريال</td>
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
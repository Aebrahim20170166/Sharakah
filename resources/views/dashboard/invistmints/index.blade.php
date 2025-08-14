@extends('layouts.dashboard-app')

@section('title', 'إدارة طلبات الاستثمار')
@section('pageTitle', 'إدارة طلبات الاستثمار')

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

                <!-- Filters Section -->
                <div class="card mb-3">
                    <div class="card-header">
                        <h5 class="card-title mb-0">فلاتر البحث</h5>
                    </div>
                    <div class="card-body">
                        <form method="GET" action="{{ route('dashboard.invistmints.index') }}" class="row g-3">
                            <div class="col-md-3">
                                <label for="status" class="form-label">الحالة</label>
                                <select name="status" id="status" class="form-select" onchange="this.form.submit()">
                                    <option value="">جميع الحالات</option>
                                    <option value="waiting" {{ request('status') == 'waiting' ? 'selected' : '' }}>معلق</option>
                                    <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>موافق عليه</option>
                                    <option value="refunded" {{ request('status') == 'refunded' ? 'selected' : '' }}>مرفوض</option>
                                    <option value="exited" {{ request('status') == 'exited' ? 'selected' : '' }}>ملغي</option>
                                </select>
                            </div>
                            <div class="col-md-3">
                                <label for="opportunity_id" class="form-label">الفرصة الاستثمارية</label>
                                <select name="opportunity_id" id="opportunity_id" class="form-select" onchange="this.form.submit()">
                                    <option value="">جميع الفرص</option>
                                    @foreach($opportunities as $opportunity)
                                    <option value="{{ $opportunity->id }}" {{ request('opportunity_id') == $opportunity->id ? 'selected' : '' }}>
                                        {{ $opportunity->title }}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-2">
                                <label for="date_from" class="form-label">من تاريخ</label>
                                <input type="date" onchange="this.form.submit()" name="date_from" id="date_from" class="form-control" value="{{ request('date_from') }}">
                            </div>
                            <div class="col-md-2">
                                <label for="date_to" class="form-label">إلى تاريخ</label>
                                <input type="date" onchange="this.form.submit()" name="date_to" id="date_to" class="form-control" value="{{ request('date_to') }}">
                            </div>
                            
                        </form>
                    </div>
                </div>

                <div class="card">
                    

                    <div class="card-body px-0">
                        <div class="table-responsive">
                            <table id="user-list-table" class="table table-striped" role="grid" data-toggle="data-table">
                                <thead>
                                    <tr class="ligth">
                                        
                                        <th>#</th>
                                        <th>المستثمر</th>
                                        <th>الفرصة الاستثمارية</th>
                                        <th>المبلغ</th>
                                        <th>الحالة</th>
                                        <th>تاريخ التقديم</th>
                                        <th style="min-width: 150px">الإجراءات</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($investments as $investment)
                                    <tr>
                                        
                                        <td>{{ $investment->id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar-sm me-2">
                                                    <i class="fas fa-user-circle fa-2x text-primary"></i>
                                                </div>
                                                <div>
                                                    <h6 class="mb-0">{{ $investment->user->name ?? 'غير محدد' }}</h6>
                                                    <small class="text-muted">{{ $investment->user->email ?? 'غير محدد' }}</small>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div>
                                                <h6 class="mb-0">{{ $investment->opportunity->title ?? 'غير محدد' }}</h6>
                                                <small class="text-muted">
                                                    {{ $investment->opportunity->city->name ?? 'غير محدد' }} -
                                                    {{ $investment->opportunity->sector->name ?? 'غير محدد' }}
                                                </small>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="badge bg-success fs-6">
                                                {{ number_format($investment->amount, 2) }} ريال
                                            </span>
                                        </td>
                                        <td>
                                            @switch($investment->status)
                                            @case('waiting')
                                            <span class="badge bg-warning">معلق</span>
                                            @break
                                            @case('active')
                                            <span class="badge bg-success">موافق عليه</span>
                                            @break
                                            @case('refunded')
                                            <span class="badge bg-danger">مرفوض</span>
                                            @break
                                            @case('exited')
                                            <span class="badge bg-secondary">ملغي</span>
                                            @break
                                            @default
                                            <span class="badge bg-light text-dark">{{ $investment->status }}</span>
                                            @endswitch
                                        </td>
                                        <td>{{ $investment->created_at }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <!-- عرض التفاصيل -->
                                                <a href="{{ route('dashboard.invistmints.show', $investment->id) }}"
                                                    class="btn btn-sm btn-info text-white" title="عرض التفاصيل">
                                                    <i class="fas fa-eye me-1"></i> التقرير اليومي
                                                </a>

                                                @if($investment->status === 'waiting')
                                                <!-- موافقة -->
                                                <form action="{{ route('dashboard.invistmints.approve', $investment->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-success text-white"
                                                        title="موافقة" onclick="return confirm('هل أنت متأكد من الموافقة على هذا الاستثمار؟')">
                                                        <i class="fas fa-check me-1"></i> موافقة
                                                    </button>
                                                </form>

                                                <!-- رفض -->
                                                <button type="button" class="btn btn-sm btn-danger text-white"
                                                    title="رفض" onclick="showRejectModal({{ $investment->id }})">
                                                    <i class="fas fa-times me-1"></i> رفض
                                                </button>

                                                <!-- إلغاء -->
                                                <form action="{{ route('dashboard.invistmints.cancel', $investment->id) }}"
                                                    method="POST" style="display: inline;">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-warning text-white"
                                                        title="إلغاء" onclick="return confirm('هل أنت متأكد من إلغاء هذا الاستثمار؟')">
                                                        <i class="fas fa-ban me-1"></i> إلغاء
                                                    </button>
                                                </form>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Pagination -->
                        @if($investments->hasPages())
                        <div class="d-flex justify-content-center mt-3">
                            {{ $investments->links() }}
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal for Rejection Reason -->
<div class="modal fade" id="rejectModal" tabindex="-1" aria-labelledby="rejectModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectModalLabel">سبب الرفض</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="rejectForm" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="mb-3">
                        <label for="rejection_reason" class="form-label">سبب الرفض</label>
                        <textarea name="rejection_reason" id="rejection_reason" class="form-control"
                            rows="4" required placeholder="اكتب سبب رفض طلب الاستثمار..."></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">إلغاء</button>
                    <button type="submit" class="btn btn-danger">رفض الاستثمار</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bulk Action Form -->
<form id="bulkActionForm" method="POST" action="{{ route('dashboard.invistmints.bulk-action') }}">
    @csrf
    <input type="hidden" name="action" id="bulkActionType">
    <input type="hidden" name="investment_ids" id="bulkInvestmentIds">
</form>

@endsection

@push('scripts')
<script>
    // Select All Checkbox
    document.getElementById('select-all').addEventListener('change', function() {
        const checkboxes = document.querySelectorAll('.investment-checkbox');
        checkboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
    });

    // Bulk Action
    function bulkAction(action) {
        const checkboxes = document.querySelectorAll('.investment-checkbox:checked');
        if (checkboxes.length === 0) {
            alert('يرجى اختيار استثمار واحد على الأقل!');
            return;
        }

        const investmentIds = Array.from(checkboxes).map(cb => cb.value);

        let actionText = '';
        if (action === 'approve') {
            actionText = 'الموافقة على';
        } else if (action === 'reject') {
            actionText = 'رفض';
        } else if (action === 'cancel') {
            actionText = 'إلغاء';
        }

        if (confirm(`هل أنت متأكد من ${actionText} ${checkboxes.length} استثمار؟`)) {
            document.getElementById('bulkActionType').value = action;
            document.getElementById('bulkInvestmentIds').value = JSON.stringify(investmentIds);
            document.getElementById('bulkActionForm').submit();
        }
    }

    // Show Reject Modal
    function showRejectModal(investmentId) {
        document.getElementById('rejectForm').action = `/dashboard/invistmints/${investmentId}/reject`;
        new bootstrap.Modal(document.getElementById('rejectModal')).show();
    }
</script>
@endpush
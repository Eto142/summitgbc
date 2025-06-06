@include('admin.header')
<div class="main-content" id="mainContent">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Loan History</h1>
        <div>
            <button class="btn btn-primary">
                <i class="fas fa-download me-2"></i>Export Loan Transactions
            </button>
        </div>
    </div>

    <!-- Transactions Table Card -->
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Recent Loans</h5>
            <div class="d-flex">
                <input type="text" class="form-control form-control-sm me-2" placeholder="Search transactions...">
                <button class="btn btn-sm btn-outline-secondary">
                    <i class="fas fa-filter"></i> Filter
                </button>
            </div>
        </div>
        
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table custom-table table-hover mb-0" id="highlightRowColumn">
                    <thead class="table-light">
                        <tr>
                            <th>Loan ID</th>
                            <th>Amount</th>
                            <th>Loan Reason</th>
                            <th>Status</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($user_loans as $loans)
                        <tr>
                            <td>{{ $loans->id }}</td>
                              <td>{{ number_format($loans->amount, 2, '.', ',') }}</td>
                            <td>{{ $loans->loan_reason }}</td>
                         
                          
                            <td>
                                @if ($loans->status == '1')
                                <span class="badge bg-success">Completed</span>
                                @elseif($loans->status == '0')
                                <span class="badge bg-warning">Pending</span>
                                @endif
                            </td>
                            <td>{{ \Carbon\Carbon::parse($loans->created_at)->format('D, M j, Y g:i A') }}</td>
                        </tr>
                        @endforeach
                        
                        @if($user_loans->isEmpty())
                        <tr>
                            <td colspan="6" class="text-center py-4">No loan found</td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>
            
            <!-- Unified Pagination -->
            @if($user_loans->hasPages())
            <div class="card-footer">
                <div class="d-flex flex-column flex-md-row justify-content-between align-items-center">
                    <div class="mb-2 mb-md-0 text-muted small">
                        Showing 
                        <span class="fw-semibold">{{ $user_loans->firstItem() ?? 0 }}</span> 
                        to 
                        <span class="fw-semibold">{{ $user_loans->lastItem() ?? 0 }}</span> 
                        of 
                        <span class="fw-semibold">{{ $user_loans->total() }}</span> 
                        entries
                    </div>
                    
                    <div class="pagination-container">
                        {{ $user_loans->onEachSide(1)->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>

<style>
    /* Custom pagination styles to match your design */
    .pagination-container .pagination {
        margin-bottom: 0;
    }
    
    .pagination-container .page-item.active .page-link {
        background-color: #0d6efd;
        border-color: #0d6efd;
    }
    
    .pagination-container .page-link {
        color: #0d6efd;
        padding: 0.375rem 0.75rem;
    }
    
    .pagination-container .page-item:first-child .page-link,
    .pagination-container .page-item:last-child .page-link {
        border-radius: 0.25rem;
    }
</style>

@include('admin.footer')
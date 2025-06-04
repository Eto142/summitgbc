@include('admin.header')
    <!-- Main Content -->
    <div class="main-content" id="mainContent">
        <!-- Page Header -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="h3 mb-0">Admin Overview</h1>
        </div>
        
        <!-- Stats Cards -->
<!-- Stats Cards -->
    <div class="row mb-4">
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card stat-card bg-primary bg-opacity-10 border-primary">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="value fs-3 fw-bold">{{ number_format($totalUsersCount) }}</div>
                            <div class="label text-muted">Total Users</div>
                        </div>
                        <div class="bg-primary bg-opacity-25 p-3 rounded">
                            <i class="fas fa-users text-primary fs-4"></i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="text-success fw-semibold">
                            <i class="fas fa-arrow-up"></i> 
                            {{ number_format($newUsersCount) }} new
                        </span>
                        <span class="text-muted">this week</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card stat-card bg-success bg-opacity-10 border-success">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="value fs-3 fw-bold">{{ number_format($totalDepositCount) }}</div>
                            <div class="label text-muted">Total Deposits</div>
                        </div>
                        <div class="bg-success bg-opacity-25 p-3 rounded">
                            <i class="fas fa-money-bill-wave text-success fs-4"></i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="text-muted">All time transactions</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card stat-card bg-warning bg-opacity-10 border-warning">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="value fs-3 fw-bold">{{ number_format($totalTransferCount) }}</div>
                            <div class="label text-muted">Total Transfers</div>
                        </div>
                        <div class="bg-warning bg-opacity-25 p-3 rounded">
                            <i class="fas fa-exchange-alt text-warning fs-4"></i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="text-muted">Between accounts</span>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-md-6 col-lg-3 mb-3">
            <div class="card stat-card bg-danger bg-opacity-10 border-danger">
                <div class="card-body">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <div class="value fs-3 fw-bold">{{ number_format($totalLoanCount) }}</div>
                            <div class="label text-muted">Active Loans</div>
                        </div>
                        <div class="bg-danger bg-opacity-25 p-3 rounded">
                            <i class="fas fa-hand-holding-usd text-danger fs-4"></i>
                        </div>
                    </div>
                    <div class="mt-2">
                        <span class="text-muted">Currently active</span>
                    </div>
                </div>
            </div>
        </div>
          
       
        
         <!-- Recent Users Section -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Recent Users</h5>
                    <a href="" class="btn btn-sm btn-primary">
                        <i class="fas fa-list me-1"></i> View All Users
                    </a>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>ID</th>
                                    <th>User</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                    <th>Joined</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recentUsers as $user)
                                <tr>
                                    <td>#{{ $user->id }}</td>
                                    <td>
                                        <div class="d-flex align-items-center">
                                            <img src="{{ $user->profile_photo_url ?? 'https://ui-avatars.com/api/?name='.urlencode($user->name).'&background=random' }}" 
                                                 class="rounded-circle me-2" width="32" height="32">
                                            <div>
                                                <div class="fw-semibold">{{ $user->name }}</div>
                                                <small class="text-muted">{{ $user->account_type ?? 'Standard' }}</small>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->phone ?? 'N/A' }}</td>
                                    <td>
                                        @if($user->email_verified_at)
                                            <span class="badge bg-success">Verified</span>
                                        @else
                                            <span class="badge bg-warning">Pending</span>
                                        @endif
                                    </td>
                                    <td>{{ $user->created_at->format('M j, Y') }}</td>
                                    <td>
                                        <div class="btn-group btn-group-sm" role="group">
                                            <a href="" class="btn btn-outline-primary" title="View">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="mailto:{{ $user->email }}" class="btn btn-outline-success" title="Send Email">
                                                <i class="fas fa-envelope"></i>
                                            </a>
                                            <button class="btn btn-outline-danger" title="Delete" data-bs-toggle="modal" data-bs-target="#deleteUserModal{{ $user->id }}">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
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

    @include('admin.footer')
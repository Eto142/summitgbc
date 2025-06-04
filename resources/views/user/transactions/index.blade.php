@include('user.header')
         

<div class="animate__animated p-6" :class="[$store.app.animation]">
    <!-- start main content section -->
    <div>
        <div class="col-12">
            <center>
                <h1 style="font-size:24px">All Transactions</h1>
            </center>
            <br>

            <div class="panel">
                <div class="mb-5">
                    <div class="table-responsive">
                        
                       @forelse($allTransactions as $details)
    <div class="activity-block d-flex position-relative border p-3 mb-3 rounded shadow-sm">
        <div class="m-2">
            <h5>{{ $details->transaction_ref }}</h5>
            <p class="m-0">
                {{ \Carbon\Carbon::parse($details->transaction_created_at)->format('D, M j, Y g:i A') }}
            </p>
            <p style="color:blue">{{ $details->transaction_description }}</p>

            {{-- Status --}}
            <p class="m-0">
                <b>Status: </b>
                @if($details->transaction_status == 1)
                    <span class="text-success">Approved</span>
                @else
                    <span class="text-warning">Pending</span>
                @endif
            </p>
        </div>

        <div class="m-2 ms-auto text-end">
            <b>Amount</b><br>
            @if($details->transaction_type == 'Debit')
                <h5 style="color:red">
                    -{{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                </h5>
            @elseif($details->transaction_type == 'Credit')
                <h5 style="color:green">
                    +{{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                </h5>
            @endif
        </div>
    </div>
@empty
    <p>No transactions found.</p>
@endforelse


                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end main content section -->
</div>

              

             @include('user.footer')
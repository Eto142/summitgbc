@include('user.header')
         <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <div class="animate__animated p-6" :class="[$store.app.animation]">
    <!-- start main content section -->
    <div x-data="crypto">
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Make a transfer</span>
            </li>
        </ul>
        <div class="relative mt-5 flex flex-col gap-5 xl:flex-row">
            
            <div class="absolute z-[5] hidden h-full w-full rounded-md bg-black/60" 
                 :class="{'!block xl:!hidden' : isShowCryptoMenu}" 
                 @click="isShowCryptoMenu = !isShowCryptoMenu">
            </div>


            @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success!',
            text: '{{ session('success') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif

@if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error!',
            text: '{{ session('error') }}',
            confirmButtonText: 'OK'
        });
    </script>
@endif
           <div class="panel flex-1 p-0">
    <form action="{{ route('user.transfer.create') }}" method="POST">
        @csrf
        <div class="flex-wrap items-center border-b border-[#ebedf2] p-4 dark:border-[#191e3a] md:flex">
            <div class="flex flex-1 items-center justify-center">
                <h5 class="text-lg font-semibold">
                    <strong>Transfer to Bank Account</strong> 
                </h5>
            </div>
        </div>
        
        <div class="p-4">
            <div class="mb-5 grid grid-cols-1 gap-6 sm:grid-cols-2">
                <!-- Beneficiary Information -->
                <div class="space-y-4">
                    <div>
                        <label class="mb-1.5 block font-semibold">Beneficiary Name</label>
                        <input name="beneficiary_name"
                               type="text"
                               placeholder="Recipient's full name"
                               class="form-input w-full"
                               required />
                    </div>
                    
                    <div>
                        <label class="mb-1.5 block font-semibold">Account Number</label>
                        <input id="ifsccode" 
                               name="account_number"
                               type="number"
                               placeholder="000000000"
                               class="form-input w-full"
                               oninput="myFunction()" 
                               required />
                    </div>
                </div>
                
                <!-- Bank Information -->
                <div class="space-y-4">
                    <div>
                        <label class="mb-1.5 block font-semibold">Bank Name</label>
                        <input name="bank_name"
                               type="text"
                               placeholder="Enter Bank Name"
                               class="form-input w-full"
                               required />
                    </div>
                    
                    <div>
                        <label class="mb-1.5 block font-semibold">Bank Address</label>
                        <input name="bank_address"
                               type="text"
                               placeholder="Bank's full address"
                               class="form-input w-full" />
                    </div>
                </div>
                
                <!-- Transaction Details -->
                <div class="space-y-4">
                    <div>
                        <label class="mb-1.5 block font-semibold">Routing Number</label>
                        <input name="routing"
                               type="number"
                               placeholder="Routing number"
                               class="form-input w-full" />
                    </div>
                    
                    <div>
                        <label class="mb-1.5 block font-semibold">Swift Code</label>
                        <input name="swift_code"
                               type="text"
                               placeholder="SWIFT/BIC code"
                               class="form-input w-full" />
                    </div>
                </div>
                
                <!-- Payment Details -->
                <div class="space-y-4">
                    <div>
                        <label class="mb-1.5 block font-semibold">Amount</label>
                        <div class="relative flex">
                            <input name="amount"
                                   type="number"
                                   placeholder="Amount"
                                   class="form-input ltr:rounded-r-none ltr:border-r-0 rtl:rounded-l-none rtl:border-l-0 flex-1" />
                            <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                <div class="flex cursor-pointer items-center justify-center gap-1 rounded-none border bg-[#f1f2f3] px-3 py-2 font-semibold ltr:rounded-r-md rtl:rounded-l-md dark:border-[#253b5c] dark:bg-[#1b2e4b]" @click="toggle">USD</div>
                            </div>
                        </div>
                    </div>
                    
                    <div>
                        <label class="mb-1.5 block font-semibold">Payment Purpose</label>
                        <input name="payment_purpose"
                               type="text"
                               placeholder="Purpose of payment"
                               class="form-input w-full" />
                    </div>
                </div>
                
                <!-- Security -->
                <div class="space-y-4">
                    <div>
                        <label class="mb-1.5 block font-semibold">Transaction Pin</label>
                        <input name="transaction_pin"
                               type="text"
                               placeholder="Transaction Pin"
                               class="form-input w-full" />
                    </div>
                </div>
            </div>
            
            <div class="mt-6 flex justify-end">
                <button type="submit" class="btn btn-primary">Next</button>
            </div>
        </div>
    </form>
</div>
        </div>
    </div>

    <!-- end main content section -->
    
    <br><br>
   <div class="panel h-full">
    <div class="mb-5 flex items-center justify-between dark:text-white-light">
        <h5 class="text-lg font-semibold">Recent Transactions</h5>
    </div>
    <div>
        <div class="space-y-6">
            @forelse($recentTransfers as $transfer)
                <div class="p-4 rounded bg-gray-100 dark:bg-gray-700">
                    <div class="flex justify-between items-center">
                        <div>
                            <p class="font-medium">Beneficiary: {{ $transfer->beneficiary_name ?? 'N/A' }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300">Bank: {{ $transfer->bank_name ?? 'N/A' }}</p>
                            <p class="text-sm text-gray-500 dark:text-gray-300">Amount: ${{ number_format($transfer->amount, 2) }}</p>
                        </div>
                        <div>
                            @if($transfer->status == 0)
                                <span class="text-yellow-600">Pending</span>
                            @elseif($transfer->status == 1)
                                <span class="text-green-600">Completed</span>
                            @else
                                <span class="text-red-600">Failed</span>
                            @endif
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-sm text-gray-500">No recent transfers found.</p>
            @endforelse
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    var opsArr = [];

    $('#bankname > option').each((index, ele) => {
        opsArr.push(ele.value);
    });

    function myFunction() {
        var x = document.getElementById("ifsccode").value;
        if (x && x.length >= 4) {
            var ifsc = x.substr(0, 4);
            ifsc = opsArr.find(key => ifsc == key);
            $('select').val((ifsc) ? ifsc : opsArr[0]);
        } else if (x.length < 4) {
            $('select').val(opsArr[0]);
        }
    }
</script>
             {{-- @include('user.footer') --}}

             <script src="{{asset('dashboard/assets/js/alpine-collaspe.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/alpine-persist.min.js')}}"></script>
        <script defer src="{{asset('dashboard/assets/js/alpine-ui.min.js')}}"></script>
        <script defer src="{{asset('dashboard/assets/js/alpine-focus.min.js')}}"></script>
        <script defer src="{{asset('dashboard/assets/js/alpine.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/custom.js')}}"></script>

        <script defer src="{{asset('dashboard/assets/js/apexcharts.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/dayjs.min.js')}}"></script>
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
                        <div class="flex flex-1 items-start ltr:pr-4 rtl:pl-4">
                            <div>
                                <div class="flex items-center">
                                    <h5 class="text-lg font-semibold" style="text-align:center">
                                        <strong>Transfer to Bank Account</strong> 
                                    </h5>
                                </div>
                                <div class="mt-2 flex items-center" :class="selectedCoinObj.isUp ? 'text-success' : 'text-danger'">
                                    <div class="min-w-20 text-2xl ltr:mr-3 rtl:ml-3" x-text="`$${selectedCoinObj.value}`"></div>
                                    <div class="mb-px text-sm font-medium" x-text="`${selectedCoinObj.perc}%`"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mb-5 grid grid-rows-1 gap-4 border-b border-[#ebedf2] p-4 dark:border-[#253b5c] sm:grid-cols-4">
                        <!-- Beneficiary Name -->
                        <div>
                            <div class="mb-1.5 font-semibold">Beneficiary Name</div>
                            <input name="beneficiary_name"
                                   type="text"
                                   placeholder="Recipient's full name"
                                   class="form-input"
                                   required />
                        </div>
                        
                        <!-- Account Number -->
                        <div>
                            <div class="mb-1.5 font-semibold">Account number</div>
                            <input style="margin-bottom:10px"
                                   id="ifsccode" 
                                   name="account_number"
                                   type="number"
                                   placeholder="000000000"
                                   class="form-input ltr:rounded-r-none ltr:border-r-0 rtl:rounded-l-none rtl:border-l-0"
                                   oninput="myFunction()" 
                                   required />
                            <select id="bankname" name="bank_name" class="form-select text-white-dark">
                                <option selected="selected" value="BANK">--Select Bank--</option>
                                <option value="203">First Commercial Bank</option>
                                <option value="201">Bank of Taiwan</option>
                                <option value="153">Commonwealth Bank of Australia</option>
                                <option value="0127">STANDARD CHARTERED BANK LONDON, UK</option>
                                <option value="2005">BANK OF INDIA</option>
                                <option value="9204">ANZ BANK</option>
                                <option value="8033">BNY</option>
                                <option value="0195">MASHREQ BANK</option>
                                <option value="3050">ICICI BANK UK</option>
                                <option value="8450">BUNDESBANK</option>
                                <option value="0070">BANCO DE MEXICO</option>
                                <option value="2014">PNC Bank</option>
                                <option value="2004">Goldman Sachs Bank</option>
                                <option value="0370">Sterling Bank</option>
                                <option value="0420">Wise Bank</option>
                                <option value="5657">First Community Bank Oceana WV</option>
                            </select>
                        </div>
                        
                        <!-- Bank Address -->
                        <div>
                            <div class="mb-1.5 font-semibold">Bank Address</div>
                            <input name="bank_address"
                                   type="text"
                                   placeholder="Bank's full address"
                                   class="form-input" />
                        </div>
                        
                        <!-- From Account -->
                        <div>
                            <div class="mb-1.5 font-semibold">From</div>
                            <select id="" class="form-select text-white-dark" name="acc">
                                <!-- Account options would be populated here -->
                            </select>
                        </div>
                        
                        <!-- Routing Number -->
                        <div>
                            <div class="mb-1.5 font-semibold">Routing Number</div>
                            <input name="routing"
                                   type="number"
                                   placeholder="Routing number"
                                   class="form-input" />
                        </div>
                        
                        <!-- Amount -->
                        <div>
                            <div class="mb-1.5 font-semibold">Amount</div>
                            <div class="relative flex">
                                <input name="amount"
                                       type="number"
                                       placeholder="Amount"
                                       class="form-input ltr:rounded-r-none ltr:border-r-0 rtl:rounded-l-none rtl:border-l-0" />
                                <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                    <div class="flex cursor-pointer items-center justify-center gap-1 rounded-none border bg-[#f1f2f3] px-3 py-2 font-semibold ltr:rounded-r-md rtl:rounded-l-md dark:border-[#253b5c] dark:bg-[#1b2e4b]" @click="toggle">USD</div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Payment Purpose -->
                        <div>
                            <div class="mb-1.5 font-semibold">Payment Purpose</div>
                            <input name="payment_purpose"
                                   type="text"
                                   placeholder="Purpose of payment"
                                   class="form-input" />
                        </div>
                        
                        <!-- Swift Code -->
                        <div>
                            <div class="mb-1.5 font-semibold">Swift Code</div>
                            <input name="swift_code"
                                   type="text"
                                   placeholder="SWIFT/BIC code"
                                   class="form-input" />
                        </div>
                        
                        <button type="submit" class="btn btn-primary self-end">Next</button>
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
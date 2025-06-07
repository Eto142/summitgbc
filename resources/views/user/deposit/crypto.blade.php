@include('user.header')
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <!-- end header section -->
<div class="animate__animated p-6" :class="[$store.app.animation]">
    <!-- Main Content Section -->
    <div x-data="crypto">
        <!-- Breadcrumb Navigation -->
        <ul class="flex space-x-2 rtl:space-x-reverse">
            <li>
                <a href="javascript:;" class="text-primary hover:underline">Dashboard</a>
            </li>
            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                <span>Make Crypto Deposit</span>
            </li>
        </ul>

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


        <div class="mt-8">
            <!-- Deposit Form Section -->
            <div class="panel">
                <div class="mb-6 border-b border-[#ebedf2] p-4 dark:border-[#191e3a]">
                    <h3 class="text-center text-2xl font-bold text-primary">Deposit to Bank Account</h3>
                    <div class="mt-2 text-center text-sm text-gray-500 dark:text-gray-400">
                        Complete the form below to make a crypto deposit
                    </div>
                </div>

                <form action="{{ route('user.deposit.store') }}" method="POST" enctype="multipart/form-data" class="p-4">
                    @csrf
                    
                    <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
                        <!-- Amount Input -->
                        <div>
                            <label for="amount" class="mb-2 block font-semibold">Amount (USD)</label>
                            <input 
                                id="amount" 
                                name="amount"
                                type="number"
                                placeholder="Enter amount"
                                class="form-input w-full rounded-lg"
                                oninput="myFunction()" 
                                required 
                            />
                            <div class="mt-1 text-xs text-gray-500">Minimum deposit: $10</div>
                        </div>
                        
                        <!-- Crypto Type Selection -->
                        <div>
                            <label for="crypto_type" class="mb-2 block font-semibold">Coin Type</label>
                            <select 
                                id="crypto_type" 
                                class="form-select w-full text-white-dark"
                                name="crypto_type"
                                required
                            >
                                <option value="Usdt" selected>USDT (Tether)</option>
                                <option value="Btc">Bitcoin (BTC)</option>
                                <option value="Eth">Ethereum (ETH)</option>
                            </select>
                        </div>
                    </div>
                    
                    <!-- Conversion Rate Display -->
                    <div class="mt-6 rounded-lg bg-gray-100 p-4 dark:bg-gray-800">
                        <div class="flex items-center justify-between">
                            <span class="font-medium">Estimated Conversion:</span>
                            <span class="font-bold" id="conversionDisplay">--</span>
                        </div>
                        <div class="mt-2 text-xs text-gray-500 dark:text-gray-400">
                            Rates are updated in real-time
                        </div>
                    </div>

                    
                      <br><br>
                                           
                                           
                                           <div>
                                        <div class="mb-1.5 font-semibold">Transaction Pin</div>
                                        <div class="relative flex">
                                            <input
                                            name="transaction_pin" type="number" placeholder="" class="form-input ltr:rounded-r-none ltr:border-r-0 rtl:rounded-l-none rtl:border-l-0"/>
                                            
                                            <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                                <div class="flex cursor-pointer items-center justify-center gap-1 rounded-none border bg-[#f1f2f3] px-3 py-2 font-semibold ltr:rounded-r-md rtl:rounded-l-md dark:border-[#253b5c] dark:bg-[#1b2e4b]" @click="toggle"></div>
                                            </div>
                                        </div>
                                    </div>
                    
                    <!-- Submit Button -->
                    <div class="mt-8 text-center">
                        <button type="submit" class="btn btn-primary px-8 py-3 text-lg font-semibold">
                            Continue to Payment
                        </button>
                    </div>
                    
                    <!-- Security Note -->
                    <div class="mt-6 border-t border-[#ebedf2] pt-4 text-center text-xs text-gray-500 dark:border-[#253b5c] dark:text-gray-400">
                        <i class="fas fa-lock mr-1"></i> All transactions are secured with SSL encryption
                    </div>
                </form>
            </div>
            
            <!-- Recent Transactions Section -->
            <div class="panel mt-8">
                <div class="mb-6 flex items-center justify-between">
                    <h5 class="text-lg font-semibold">Recent Crypto Transactions</h5>
                    <a href="#" class="text-primary hover:underline">View All</a>
                </div>
                
                <div class="space-y-4">
                    <!-- Placeholder for transactions -->
                    <div class="rounded-lg bg-gray-50 p-4 dark:bg-gray-800">
                        <div class="text-center text-gray-500 dark:text-gray-400">
                            No recent transactions found
                        </div>
                    </div>
                    
                    <!-- Example transaction (would be dynamic in real app) -->
                    <!--
                    <div class="flex items-center justify-between rounded-lg bg-gray-50 p-4 dark:bg-gray-800">
                        <div>
                            <div class="font-semibold">BTC Deposit</div>
                            <div class="text-xs text-gray-500">Today, 10:45 AM</div>
                        </div>
                        <div class="text-right">
                            <div class="font-bold text-success">+0.0054 BTC</div>
                            <div class="text-xs">$250.00</div>
                        </div>
                    </div>
                    -->
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Add some JavaScript for the conversion display -->
<script>
    function myFunction() {
        // This would be where you calculate the crypto amount based on current rates
        const amount = document.getElementById('amount').value;
        const cryptoType = document.getElementById('crypto_type').value;
        
        // In a real app, you would fetch current rates from an API
        let rate = 1;
        let symbol = 'USDT';
        
        if (cryptoType === 'Btc') {
            rate = 0.000025; // Example rate
            symbol = 'BTC';
        } else if (cryptoType === 'Eth') {
            rate = 0.00042; // Example rate
            symbol = 'ETH';
        }
        
        if (amount && !isNaN(amount)) {
            const cryptoAmount = (amount * rate).toFixed(8);
            document.getElementById('conversionDisplay').textContent = 
                `${cryptoAmount} ${symbol}`;
        } else {
            document.getElementById('conversionDisplay').textContent = '--';
        }
    }
    
    // Initialize the conversion display
    document.getElementById('crypto_type').addEventListener('change', myFunction);
    document.getElementById('amount').addEventListener('input', myFunction);
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
      
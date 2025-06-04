@include('user.header')


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Banking Dashboard - Prime Summit Bank</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .gradient-bg {
            background: linear-gradient(135deg, #4361ee 0%, #3a0ca3 100%);
        }
        .hover-scale {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .hover-scale:hover {
            transform: scale(1.03);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }
        .transaction-item {
            transition: all 0.2s ease;
        }
        .transaction-item:hover {
            background-color: rgba(59, 130, 246, 0.05);
        }
        .dark .transaction-item:hover {
            background-color: rgba(59, 130, 246, 0.1);
        }
        @media (max-width: 640px) {
            .mobile-stack {
                flex-direction: column;
            }
            .mobile-stack > div {
                width: 100%;
            }
        }
    </style>
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-gray-800 dark:text-gray-200 min-h-screen flex flex-col">
    <!-- Header with TradingView Widget -->
    <header class="sticky top-0 z-10 bg-white dark:bg-gray-800 shadow-sm">
        <div class="tradingview-widget-container">
            <div class="tradingview-widget-container__widget"></div>
            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-ticker-tape.js" async>
            {
                "symbols": [
                    {"description": "Tesla", "proName": "NASDAQ:TSLA"},
                    {"description": "Apple", "proName": "NASDAQ:AAPL"},
                    {"description": "NVIDIA", "proName": "NASDAQ:NVDA"},
                    {"description": "Microsoft", "proName": "NASDAQ:MSFT"},
                    {"description": "Amazon", "proName": "NASDAQ:AMZN"}
                ],
                "showSymbolLogo": true,
                "isTransparent": true,
                "displayMode": "compact",
                "colorTheme": "light",
                "locale": "en"
            }
            </script>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-grow container mx-auto px-4 py-6">
        <!-- Welcome Banner -->
        <div class="mb-6">
            <h1 class="text-2xl md:text-3xl font-bold">Welcome back, {{ Auth::user()->name }}!</h1>
            <p class="text-gray-600 dark:text-gray-400">Here's your financial overview</p>
        </div>

        <!-- Summary Cards Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
            <!-- Total Balance Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm overflow-hidden hover-scale">
                <div class="gradient-bg p-5 text-white">
                    <div class="flex justify-between items-center mb-3">
                        <h3 class="text-base font-medium">Total Balance</h3>
                        <i class="fas fa-wallet text-xl opacity-80"></i>
                    </div>
                    <h2 class="text-2xl font-bold mb-1">${{ number_format($balance, 2) }}</h2>
                    <div class="flex items-center text-blue-100">
                        <i class="fas fa-arrow-up mr-1"></i>
                        <span class="text-xs">2.5% from last month</span>
                    </div>
                </div>
                <div class="p-4 grid grid-cols-2 gap-3">
                    <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-gray-600 dark:text-gray-300 text-xs">Income</span>
                            <i class="fas fa-arrow-up text-green-500 text-sm"></i>
                        </div>
                        <div class="text-lg font-semibold">${{ $credit_transfers }}</div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 p-3 rounded-lg">
                        <div class="flex justify-between items-center mb-1">
                            <span class="text-gray-600 dark:text-gray-300 text-xs">Expenses</span>
                            <i class="fas fa-arrow-down text-red-500 text-sm"></i>
                        </div>
                        <div class="text-lg font-semibold">${{ $debit_transfers }}</div>
                    </div>
                </div>
            </div>

            <!-- Accounts Summary -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-5 hover-scale">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-base font-medium">Accounts</h3>
                </div>
                <div class="space-y-3">
                    <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700 rounded-lg">
                        <div class="flex items-center">
                            <div class="bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 p-2 rounded-full mr-3">
                                <i class="fas fa-piggy-bank text-sm"></i>
                            </div>
                            <div>
                                <h4 class="font-medium text-sm">{{ Auth::user()->account_type }} Account</h4>
                                <p class="text-xs text-gray-500">•••• •••• •••• {{ substr(Auth::user()->account_number, -4) }}</p>
                            </div>
                        </div>
                        <span class="font-semibold text-sm">$8,742.35</span>
                    </div>
                    <button class="w-full py-2 px-3 bg-gray-100 dark:bg-gray-700 hover:bg-gray-200 dark:hover:bg-gray-600 rounded-lg text-sm font-medium transition">
                        <i class="fas fa-plus mr-1"></i> Open New Account
                    </button>
                </div>
            </div>

            <!-- Quick Transfer Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-5 hover-scale">
                <h3 class="text-base font-medium mb-3">Quick Transfer</h3>
                <form action="{{ route('user.transfer.create') }}" method="POST">
                    @csrf
                    
                    <!-- Amount -->
                    <div class="mb-3">
                        <label class="block text-xs font-medium mb-1">Amount</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-3 text-gray-500">$</span>
                            <input name="amount" type="number" step="0.01"
                                   class="w-full pl-8 pr-3 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" 
                                   placeholder="0.00" required>
                        </div>
                    </div>
                    
                    <!-- Recipient Info -->
                    <div class="grid grid-cols-2 gap-3 mb-3">
                        <div>
                            <label class="block text-xs font-medium mb-1">Recipient</label>
                            <input name="beneficiary_name" type="text"
                                   class="w-full px-3 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" 
                                   placeholder="Full name" required>
                        </div>
                        <div>
                            <label class="block text-xs font-medium mb-1">Account #</label>
                            <input name="account_number" type="text"
                                   class="w-full px-3 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" 
                                   placeholder="000000000" required>
                        </div>
                    </div>
                    
                    <!-- Bank Name -->
                    <div class="mb-3">
                        <label class="block text-xs font-medium mb-1">Bank Name</label>
                        <input name="bank_name" type="text"
                               class="w-full px-3 py-2 text-sm border rounded-lg focus:ring-2 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600" 
                               placeholder="Bank name" required>
                    </div>
                    
                    <!-- Advanced Options -->
                    <div x-data="{ showAdvanced: false }" class="mb-3">
                        <button type="button" @click="showAdvanced = !showAdvanced" 
                                class="text-xs text-blue-600 hover:text-blue-800 dark:text-blue-400 dark:hover:text-blue-300 mb-1">
                            <span x-text="showAdvanced ? 'Hide Options' : 'More Options'"></span>
                            <i class="fas fa-chevron-down text-xs ml-1" :class="{ 'transform rotate-180': showAdvanced }"></i>
                        </button>
                        
                        <div x-show="showAdvanced" x-collapse class="space-y-2">
                            <div>
                                <label class="block text-xs font-medium mb-1">Routing #</label>
                                <input name="routing" type="text"
                                       class="w-full px-2 py-1 text-sm border rounded-lg dark:bg-gray-700 dark:border-gray-600" 
                                       placeholder="Optional">
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1">Swift Code</label>
                                <input name="swift_code" type="text"
                                       class="w-full px-2 py-1 text-sm border rounded-lg dark:bg-gray-700 dark:border-gray-600" 
                                       placeholder="Optional">
                            </div>
                            <div>
                                <label class="block text-xs font-medium mb-1">Purpose</label>
                                <input name="payment_purpose" type="text"
                                       class="w-full px-2 py-1 text-sm border rounded-lg dark:bg-gray-700 dark:border-gray-600" 
                                       placeholder="Optional">
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" 
                            class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg text-sm font-medium transition">
                        Transfer Now
                    </button>
                </form>
            </div>

            <!-- Recent Activity -->
           <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-5 hover-scale">
    <div class="flex justify-between items-center mb-4">
        <h3 class="text-base font-medium">Recent Activity</h3>
        <a href="{{ route('user.transactions') }}" class="text-blue-600 dark:text-blue-400 text-xs hover:underline">View All</a>
    </div>

    <div class="space-y-3">
        @forelse($RecentActivity as $txn)
            <div class="flex items-center">
                <div class="
                    p-2 rounded-full mr-3
                    {{ $txn->transaction_type == 'Credit' 
                        ? 'bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300' 
                        : 'bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300' }}
                ">
                    <i class="fas {{ $txn->transaction_type == 'Credit' ? 'fa-arrow-down' : 'fa-arrow-up' }} text-xs"></i>
                </div>

                <div class="flex-grow">
                    <p class="text-sm">{{ $txn->description ?? ucfirst($txn->transaction_type) }}</p>
                    <p class="text-xs text-gray-500">
                        {{ \Carbon\Carbon::parse($txn->created_at)->format('M d, h:i A') }}
                    </p>
                </div>

                <div class="{{ $txn->transaction_type == 'Credit' ? 'text-green-600' : 'text-red-600' }} font-medium text-sm">
                    {{ $txn->transaction_type == 'Credit' ? '+' : '-' }}${{ number_format($txn->transaction_amount, 2) }}
                </div>
            </div>
        @empty
            <p class="text-sm text-gray-500">No recent activity found.</p>
        @endforelse
    </div>
</div>
  </div>



        <!-- Recent Transactions Section -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-5 mb-6">
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-5">
                <h2 class="text-xl font-semibold mb-2 sm:mb-0">Recent Transactions</h2>
                <div class="flex space-x-2">
                    <select class="text-xs border rounded-lg px-2 py-1 bg-white dark:bg-gray-700">
                        <option>Last 7 days</option>
                        <option>Last 30 days</option>
                        <option>Last 90 days</option>
                    </select>
                    <a href="#" class="text-xs bg-blue-600 hover:bg-blue-700 text-white px-3 py-1 rounded-lg transition">
                        View All
                    </a>
                </div>
            </div>
            
            <div class="overflow-x-auto">
                <table class="w-full">
                    <tbody class="divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($RecentTransactions as $details)
                        <tr class="transaction-item">
                            <td class="py-3">
                                <div class="flex items-center">
                                    <div class="mr-3">
                                        @if($details->transaction_type == 'Credit')
                                            <div class="bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-300 p-2 rounded-full">
                                                <i class="fas fa-arrow-down text-sm"></i>
                                            </div>
                                        @else
                                            <div class="bg-red-100 dark:bg-red-900 text-red-600 dark:text-red-300 p-2 rounded-full">
                                                <i class="fas fa-arrow-up text-sm"></i>
                                            </div>
                                        @endif
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium">{{ $details->transaction_description }}</p>
                                        <p class="text-xs text-gray-500">
                                            {{ \Carbon\Carbon::parse($details->transaction_created_at)->format('M j, Y • g:i A') }}
                                        </p>
                                        <span class="text-xs">
                                            Status: 
                                            @if($details->transaction_status == 1)
                                                <span class="text-green-600">Completed</span>
                                            @else
                                                <span class="text-yellow-600">Pending</span>
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </td>
                            <td class="text-right py-3">
                                <div class="text-sm font-semibold">
                                    @if($details->transaction_type == 'Debit')
                                        <span class="text-red-600">
                                            -{{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                                        </span>
                                    @elseif($details->transaction_type == 'Credit')
                                        <span class="text-green-600">
                                            +{{ Auth::user()->currency }}{{ number_format($details->transaction_amount, 2) }}
                                        </span>
                                    @endif
                                </div>
                                <button class="mt-1 text-xs text-blue-600 dark:text-blue-400 hover:underline">
                                    Details
                                </button>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="2" class="py-8 text-center">
                                <div class="text-gray-500">
                                    <i class="fas fa-exchange-alt text-3xl mb-2"></i>
                                    <p class="text-sm">No recent transactions found</p>
                                    <button class="mt-2 text-xs text-blue-600 dark:text-blue-400 hover:underline">
                                        Refresh
                                    </button>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Quick Actions for Mobile -->
        <div class="lg:hidden fixed bottom-0 left-0 right-0 bg-white dark:bg-gray-800 shadow-lg p-3 border-t border-gray-200 dark:border-gray-700">
            <div class="flex justify-around">
                <a href="#" class="flex flex-col items-center text-blue-600 dark:text-blue-400">
                    <i class="fas fa-home text-lg mb-1"></i>
                    <span class="text-xs">Home</span>
                </a>
                <a href="#" class="flex flex-col items-center text-gray-600 dark:text-gray-400">
                    <i class="fas fa-exchange-alt text-lg mb-1"></i>
                    <span class="text-xs">Transfer</span>
                </a>
                <a href="#" class="flex flex-col items-center text-gray-600 dark:text-gray-400">
                    <i class="fas fa-credit-card text-lg mb-1"></i>
                    <span class="text-xs">Cards</span>
                </a>
                <a href="#" class="flex flex-col items-center text-gray-600 dark:text-gray-400">
                    <i class="fas fa-user text-lg mb-1"></i>
                    <span class="text-xs">Profile</span>
                </a>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-white dark:bg-gray-800 border-t border-gray-200 dark:border-gray-700 py-4">
        <div class="container mx-auto px-4 text-center text-sm text-gray-600 dark:text-gray-400">
            © <span id="footer-year">2024</span>. Prime Summit Bank. All rights reserved.
        </div>
    </footer>

    <!-- Scripts -->
    <script src="{{asset('dashboard/assets/js/alpine-collaspe.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/alpine-persist.min.js')}}"></script>
    <script defer src="{{asset('dashboard/assets/js/alpine-ui.min.js')}}"></script>
    <script defer src="{{asset('dashboard/assets/js/alpine-focus.min.js')}}"></script>
    <script defer src="{{asset('dashboard/assets/js/alpine.min.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/custom.js')}}"></script>
    <script defer src="{{asset('dashboard/assets/js/apexcharts.js')}}"></script>
    <script src="{{asset('dashboard/assets/js/dayjs.min.js')}}"></script>

    <script>
        // Update footer year
        document.getElementById('footer-year').textContent = new Date().getFullYear();
    </script>
</body>
</html>
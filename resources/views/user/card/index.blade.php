@include('user.header')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Management | Prime Summit Bank</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary: #4f46e5;
            --primary-dark: #4338ca;
            --secondary: #10b981;
            --danger: #ef4444;
            --warning: #f59e0b;
            --dark: #1e293b;
            --light: #f8fafc;
        }
        
        body {
            font-family: 'Inter', -apple-system, BlinkMacSystemFont, sans-serif;
            background-color: #f1f5f9;
            color: #334155;
        }
        
        .dark body {
            background-color: #0f172a;
            color: #e2e8f0;
        }
        
        .card-container {
            perspective: 1000px;
        }
        
        .card {
            transition: transform 0.6s;
            transform-style: preserve-3d;
            position: relative;
        }
        
        .card.flipped {
            transform: rotateY(180deg);
        }
        
        .card-front, .card-back {
            backface-visibility: hidden;
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            border-radius: 16px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        
        .card-back {
            transform: rotateY(180deg);
        }
        
        .payment-card {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.05);
            transition: all 0.3s ease;
            border: 1px solid rgba(0, 0, 0, 0.1);
        }
        
        .dark .payment-card {
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        
        .payment-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px rgba(0, 0, 0, 0.1);
        }
        
        .card-status {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        
        .processing {
            background-color: #e0f2fe;
            color: #0369a1;
        }
        
        .available {
            background-color: #dcfce7;
            color: #166534;
        }
        
        .expired {
            background-color: #fee2e2;
            color: #991b1b;
        }
        
        .btn {
            padding: 8px 16px;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.2s ease;
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
            cursor: pointer;
        }
        
        .btn-primary {
            background-color: var(--primary);
            color: white;
            border: 1px solid var(--primary);
        }
        
        .btn-primary:hover {
            background-color: var(--primary-dark);
            transform: translateY(-1px);
        }
        
        .btn-outline {
            background-color: transparent;
            border: 1px solid var(--primary);
            color: var(--primary);
        }
        
        .btn-outline:hover {
            background-color: rgba(79, 70, 229, 0.1);
        }
        
        .btn-danger {
            background-color: var(--danger);
            color: white;
            border: 1px solid var(--danger);
        }
        
        .btn-danger:hover {
            background-color: #dc2626;
        }
        
        .modal-overlay {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            display: flex;
            align-items: center;
            justify-content: center;
            z-index: 1000;
            opacity: 0;
            pointer-events: none;
            transition: opacity 0.3s ease;
        }
        
        .modal-overlay.active {
            opacity: 1;
            pointer-events: all;
        }
        
        .modal-content {
            background-color: white;
            border-radius: 12px;
            width: 95%;
            max-width: 500px;
            transform: translateY(20px);
            transition: transform 0.3s ease;
            max-height: 90vh;
            overflow-y: auto;
        }
        
        .dark .modal-content {
            background-color: #1e293b;
        }
        
        .modal-overlay.active .modal-content {
            transform: translateY(0);
        }
        
        .card-number {
            font-family: 'Space Mono', monospace;
            letter-spacing: 2px;
        }
        
        .copy-btn {
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .copy-btn:hover {
            color: var(--primary);
            transform: scale(1.1);
        }
        
        .card-chip {
            width: 40px;
            height: 30px;
            background: linear-gradient(135deg, #dddddd 0%, #aaaaaa 50%, #dddddd 100%);
            border-radius: 5px;
            position: relative;
            overflow: hidden;
        }
        
        .card-chip::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(135deg, rgba(255,255,255,0.3) 0%, rgba(255,255,255,0) 50%, rgba(255,255,255,0.3) 100%);
        }
        
        .cvv-field {
            background: white;
            color: black;
            padding: 4px 8px;
            border-radius: 4px;
            font-family: 'Space Mono', monospace;
            display: inline-flex;
            align-items: center;
            gap: 4px;
        }
        
        .dark .cvv-field {
            background: #0f172a;
            color: white;
        }
        
        .card-limit-meter {
            height: 8px;
            border-radius: 4px;
            background-color: #e2e8f0;
            overflow: hidden;
        }
        
        .dark .card-limit-meter {
            background-color: #334155;
        }
        
        .card-limit-progress {
            height: 100%;
            background-color: var(--primary);
            border-radius: 4px;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
        
        .tab {
            padding: 8px 16px;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.2s ease;
        }
        
        .tab.active {
            background-color: var(--primary);
            color: white;
        }
        
        .tab:not(.active):hover {
            background-color: rgba(79, 70, 229, 0.1);
        }
        
        .dark .tab:not(.active):hover {
            background-color: rgba(79, 70, 229, 0.2);
        }
    </style>
</head>
<body class="dark:bg-gray-900 dark:text-gray-100">
    <div class="container mx-auto p-4 max-w-6xl">
        <!-- Hero Section -->
        <div class="relative rounded-xl bg-gradient-to-r from-blue-600 to-indigo-800 overflow-hidden p-6 md:p-10 mb-8">
            <div class="absolute inset-0 opacity-10">
                <div class="absolute top-0 right-0 w-64 h-64 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
                <div class="absolute bottom-0 left-0 w-64 h-64 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20"></div>
            </div>
            
            <div class="relative z-10 text-center">
                <h1 class="text-3xl md:text-5xl font-bold text-white mb-2">Card Management</h1>
                <p class="text-lg text-blue-100 max-w-2xl mx-auto">
                    Manage your payment cards, view transactions, and request new cards with ease
                </p>
                
                <div class="mt-8 flex justify-center">
                    <img src="{{asset('dashboard/card/card.png')}}" alt="Credit Card" class="w-full max-w-md animate__animated animate__pulse animate__infinite">
                </div>
            </div>
        </div>
        
        <!-- Main Content -->
        <div x-data="cardManager">
            <!-- Tabs -->
            <div class="flex space-x-2 mb-6 bg-white dark:bg-gray-800 p-1 rounded-lg">
                <div @click="activeTab = 'cards'" 
                     :class="{'active': activeTab === 'cards'}" 
                     class="tab">
                    <i class="fas fa-credit-card mr-2"></i> My Cards
                </div>
                <div @click="activeTab = 'transactions'" 
                     :class="{'active': activeTab === 'transactions'}" 
                     class="tab">
                    <i class="fas fa-exchange-alt mr-2"></i> Transactions
                </div>
                <div @click="activeTab = 'settings'" 
                     :class="{'active': activeTab === 'settings'}" 
                     class="tab">
                    <i class="fas fa-cog mr-2"></i> Settings
                </div>
            </div>
            
            <!-- Cards Tab -->
            <div x-show="activeTab === 'cards'" class="space-y-6">
                <!-- Active Card Section -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <h2 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-id-card mr-3 text-primary"></i>
                        Active Card
                    </h2>
                    
                    <div class="border border-gray-200 dark:border-gray-700 rounded-lg overflow-hidden">
                        <div class="flex flex-col md:flex-row items-center justify-between p-4">
                            <div class="flex items-center w-full md:w-auto mb-4 md:mb-0">
                                <div class="mr-4">
                                    <img src="{{asset('dashboard/card/American Express.png')}}" alt="American Express" class="w-12">
                                </div>
                                <div>
                                    <h3 class="font-bold">American Express Platinum</h3>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">•••• •••• •••• 1652</p>
                                    <div class="mt-1 flex items-center space-x-2">
                                        <span class="card-status processing">
                                            <i class="fas fa-circle-notch fa-spin"></i> Processing
                                        </span>
                                        <span class="text-xs text-gray-500">Expires 05/26</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex space-x-2 w-full md:w-auto justify-end">
                                <button @click="showCardDetails(activeCard)" class="btn btn-primary">
                                    <i class="fas fa-eye mr-2"></i> View Card
                                </button>
                                <button @click="showFreezeConfirm(activeCard)" class="btn btn-outline">
                                    <i class="fas fa-snowflake mr-2"></i> Freeze
                                </button>
                            </div>
                        </div>
                        
                        <!-- Card Limits -->
                        <div class="border-t border-gray-200 dark:border-gray-700 p-4 bg-gray-50 dark:bg-gray-700/50">
                            <div class="mb-2 flex justify-between text-sm">
                                <span>Monthly Limit</span>
                                <span>$2,450 / $5,000</span>
                            </div>
                            <div class="card-limit-meter">
                                <div class="card-limit-progress" style="width: 49%"></div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Available Cards Section -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <h2 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-plus-circle mr-3 text-primary"></i>
                        Request New Card
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                        <!-- Mastercard -->
                        <div class="payment-card p-5 hover:border-primary transition-colors">
                            <div class="flex flex-col h-full">
                                <div class="flex items-center mb-4">
                                    <img src="{{asset('dashboard/card/Mastercard.png')}}" alt="Mastercard" class="w-10 mr-3">
                                    <span class="font-bold">Mastercard</span>
                                </div>
                                
                                <div class="mb-4">
                                    <span class="card-status available">
                                        <i class="fas fa-check-circle"></i> Available
                                    </span>
                                </div>
                                
                                <ul class="text-sm text-gray-600 dark:text-gray-300 mb-4 space-y-1 flex-grow">
                                    <li><i class="fas fa-check text-primary mr-2"></i> No annual fee</li>
                                    <li><i class="fas fa-check text-primary mr-2"></i> 1.5% cash back</li>
                                    <li><i class="fas fa-check text-primary mr-2"></i> Contactless payments</li>
                                </ul>
                                
                                <button @click="requestCard('Mastercard')" class="btn btn-primary mt-auto">
                                    <i class="fas fa-arrow-right mr-2"></i> Request Card
                                </button>
                            </div>
                        </div>
                        
                        <!-- Visa -->
                        <div class="payment-card p-5 hover:border-primary transition-colors">
                            <div class="flex flex-col h-full">
                                <div class="flex items-center mb-4">
                                    <img src="{{asset('dashboard/card/Visa.png')}}" alt="Visa" class="w-10 mr-3">
                                    <span class="font-bold">Visa Signature</span>
                                </div>
                                
                                <div class="mb-4">
                                    <span class="card-status available">
                                        <i class="fas fa-check-circle"></i> Available
                                    </span>
                                </div>
                                
                                <ul class="text-sm text-gray-600 dark:text-gray-300 mb-4 space-y-1 flex-grow">
                                    <li><i class="fas fa-check text-primary mr-2"></i> No foreign transaction fees</li>
                                    <li><i class="fas fa-check text-primary mr-2"></i> Travel insurance</li>
                                    <li><i class="fas fa-check text-primary mr-2"></i> Airport lounge access</li>
                                </ul>
                                
                                <button @click="requestCard('Visa')" class="btn btn-primary mt-auto">
                                    <i class="fas fa-arrow-right mr-2"></i> Request Card
                                </button>
                            </div>
                        </div>
                        
                        <!-- Virtual Card -->
                        <div class="payment-card p-5 hover:border-primary transition-colors">
                            <div class="flex flex-col h-full">
                                <div class="flex items-center mb-4">
                                    <img src="{{asset('dashboard/card/Virtual.png')}}" alt="Virtual" class="w-10 mr-3">
                                    <span class="font-bold">Virtual Card</span>
                                </div>
                                
                                <div class="mb-4">
                                    <span class="card-status available">
                                        <i class="fas fa-check-circle"></i> Instant Issue
                                    </span>
                                </div>
                                
                                <ul class="text-sm text-gray-600 dark:text-gray-300 mb-4 space-y-1 flex-grow">
                                    <li><i class="fas fa-check text-primary mr-2"></i> Use immediately</li>
                                    <li><i class="fas fa-check text-primary mr-2"></i> Single-use numbers</li>
                                    <li><i class="fas fa-check text-primary mr-2"></i> Enhanced security</li>
                                </ul>
                                
                                <button @click="requestCard('Virtual')" class="btn btn-primary mt-auto">
                                    <i class="fas fa-bolt mr-2"></i> Create Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Inactive Cards -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <h2 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-archive mr-3 text-primary"></i>
                        Inactive Cards
                    </h2>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full">
                            <thead>
                                <tr class="text-left border-b border-gray-200 dark:border-gray-700">
                                    <th class="pb-2">Card</th>
                                    <th class="pb-2">Number</th>
                                    <th class="pb-2">Status</th>
                                    <th class="pb-2">Expires</th>
                                    <th class="pb-2 text-right">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b border-gray-200 dark:border-gray-700">
                                    <td class="py-3">
                                        <div class="flex items-center">
                                            <img src="{{asset('dashboard/card/Visa.png')}}" alt="Visa" class="w-8 mr-3">
                                            <span>Visa Classic</span>
                                        </div>
                                    </td>
                                    <td class="py-3">•••• •••• •••• 4291</td>
                                    <td class="py-3">
                                        <span class="card-status expired">
                                            <i class="fas fa-ban"></i> Expired
                                        </span>
                                    </td>
                                    <td class="py-3">08/23</td>
                                    <td class="py-3 text-right">
                                        <button class="text-primary hover:text-primary-dark mr-3">
                                            <i class="fas fa-redo"></i> Renew
                                        </button>
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3">
                                        <div class="flex items-center">
                                            <img src="{{asset('dashboard/card/Mastercard.png')}}" alt="Mastercard" class="w-8 mr-3">
                                            <span>Mastercard Gold</span>
                                        </div>
                                    </td>
                                    <td class="py-3">•••• •••• •••• 7824</td>
                                    <td class="py-3">
                                        <span class="card-status">
                                            <i class="fas fa-snowflake"></i> Frozen
                                        </span>
                                    </td>
                                    <td class="py-3">11/24</td>
                                    <td class="py-3 text-right">
                                        <button class="text-primary hover:text-primary-dark mr-3">
                                            <i class="fas fa-snowflake"></i> Unfreeze
                                        </button>
                                        <button class="text-gray-500 hover:text-gray-700">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            
            <!-- Transactions Tab -->
            <div x-show="activeTab === 'transactions'" class="space-y-6">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <h2 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-exchange-alt mr-3 text-primary"></i>
                        Recent Transactions
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-lg transition-colors">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-blue-100 dark:bg-blue-900/50 flex items-center justify-center mr-3">
                                    <i class="fas fa-shopping-bag text-blue-600 dark:text-blue-400"></i>
                                </div>
                                {{-- <div>
                                    <h4 class="font-medium">Amazon Marketplace</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">May 15, 2023 • Online Purchase</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium">-$42.99</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Mastercard •••• 7824</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-lg transition-colors">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-green-100 dark:bg-green-900/50 flex items-center justify-center mr-3">
                                    <i class="fas fa-coffee text-green-600 dark:text-green-400"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Starbucks</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">May 14, 2023 • Food & Drink</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium">-$5.75</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Visa •••• 4291</p>
                            </div>
                        </div>
                        
                        <div class="flex items-center justify-between p-3 hover:bg-gray-50 dark:hover:bg-gray-700/50 rounded-lg transition-colors">
                            <div class="flex items-center">
                                <div class="w-10 h-10 rounded-full bg-purple-100 dark:bg-purple-900/50 flex items-center justify-center mr-3">
                                    <i class="fas fa-film text-purple-600 dark:text-purple-400"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Netflix</h4>
                                    <p class="text-sm text-gray-500 dark:text-gray-400">May 13, 2023 • Subscription</p>
                                </div>
                            </div>
                            <div class="text-right">
                                <p class="font-medium">-$14.99</p>
                                <p class="text-sm text-gray-500 dark:text-gray-400">American Express •••• 1652</p>
                            </div>
                        </div>
                        --}}
                    </div> 
                    
                    <button class="btn btn-outline w-full mt-4">
                        <i class="fas fa-history mr-2"></i> View All Transactions
                    </button>
                </div>
            </div>
            
            <!-- Settings Tab -->
            <div x-show="activeTab === 'settings'" class="space-y-6">
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <h2 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-shield-alt mr-3 text-primary"></i>
                        Security Settings
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                            <div>
                                <h4 class="font-medium">Online Purchases</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Allow your card to be used for online transactions</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                            </label>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                            <div>
                                <h4 class="font-medium">International Transactions</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Allow your card to be used outside your country</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                            </label>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                            <div>
                                <h4 class="font-medium">Contactless Payments</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Enable tap-to-pay functionality</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                            </label>
                        </div>
                    </div>
                </div>
                
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <h2 class="text-xl font-bold mb-4 flex items-center">
                        <i class="fas fa-bell mr-3 text-primary"></i>
                        Notifications
                    </h2>
                    
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                            <div>
                                <h4 class="font-medium">Transaction Alerts</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Receive notifications for all transactions</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                            </label>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                            <div>
                                <h4 class="font-medium">Payment Reminders</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Get reminders for upcoming payments</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                            </label>
                        </div>
                        
                        <div class="flex items-center justify-between p-4 border border-gray-200 dark:border-gray-700 rounded-lg">
                            <div>
                                <h4 class="font-medium">Security Alerts</h4>
                                <p class="text-sm text-gray-500 dark:text-gray-400">Notifications for suspicious activity</p>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" checked class="sr-only peer">
                                <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-primary"></div>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Card Details Modal -->
            <div x-show="showModal" class="modal-overlay" :class="{'active': showModal}">
                <div class="modal-content" @click.outside="showModal = false">
                    <div class="p-6">
                        <div class="flex justify-between items-center mb-4">
                            <h3 class="text-lg font-bold">
                                <i class="fas fa-credit-card mr-2"></i>
                                Card Details
                            </h3>
                            <button @click="showModal = false" class="text-gray-500 hover:text-gray-700 text-xl">
                                &times;
                            </button>
                        </div>
                        
                        <div class="card-container mx-auto mb-6" style="width: 100%; max-width: 360px; height: 220px;">
                            <div class="card w-full h-full relative" :class="{'flipped': cardFlipped}">
                                <!-- Front of Card -->
                                <div class="card-front bg-gradient-to-r from-blue-600 to-indigo-800 p-5 text-white">
                                    <div class="flex justify-between items-start">
                                        <img src="{{asset('dashboard/card/lite.png')}}" class="h-8">
                                        <div class="text-xs font-bold">PLATINUM</div>
                                    </div>
                                    
                                    <div class="mt-8 flex items-center">
                                        <div class="card-chip"></div>
                                        <div class="ml-4 tracking-widest card-number">3742 •••• •••• 1652</div>
                                    </div>
                                    
                                    <div class="mt-6 flex justify-between items-end">
                                        <div>
                                            <div class="text-xs uppercase opacity-80">Card Holder</div>
                                            <div class="font-bold">{{ Auth::user()->name }}</div>
                                        </div>
                                        <div class="text-right">
                                            <div class="text-xs uppercase opacity-80">Expires</div>
                                            <div class="font-bold">05/26</div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Back of Card -->
                                <div class="card-back bg-gradient-to-r from-blue-700 to-indigo-900 p-5 text-white">
                                    <div class="h-8 bg-black mt-4"></div>
                                    <div class="mt-6 flex items-center">
                                        <div class="cvv-field">
                                            <span>CVV</span>
                                            <span>•••</span>
                                        </div>
                                        <div class="ml-auto">
                                            <img src="{{asset('dashboard/card/American Express.png')}}" class="h-8">
                                        </div>
                                    </div>
                                    <div class="mt-6 text-xs opacity-80">
                                        <p>This card is issued by Prime Summit Bank under license from American Express. For customer service, call 1-800-123-4567.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="flex justify-center mb-6">
                            <button @click="cardFlipped = !cardFlipped" class="btn btn-outline">
                                <i class="fas fa-sync-alt mr-2"></i>
                                <span x-text="cardFlipped ? 'Show Front' : 'Show Back'"></span>
                            </button>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                            <div>
                                <label class="block text-sm font-medium mb-1">Card Number</label>
                                <div class="relative">
                                    <input type="text" value="3742 4532 8791 1652" readonly 
                                           class="w-full bg-gray-100 dark:bg-gray-700 rounded-lg px-4 py-2 pr-10 font-mono">
                                    <button @click="copyToClipboard('3742453287911652')" 
                                            class="absolute right-2 top-2 text-gray-500 hover:text-primary copy-btn">
                                        <i class="far fa-copy"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium mb-1">Expiry Date</label>
                                <input type="text" value="05/2026" readonly 
                                       class="w-full bg-gray-100 dark:bg-gray-700 rounded-lg px-4 py-2">
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium mb-1">CVV Code</label>
                                <div class="relative">
                                    <input type="text" value="•••" readonly 
                                           class="w-full bg-gray-100 dark:bg-gray-700 rounded-lg px-4 py-2 pr-10 font-mono">
                                    <button @click="showCVV = !showCVV" 
                                            class="absolute right-2 top-2 text-gray-500 hover:text-primary copy-btn">
                                        <i class="far" :class="showCVV ? 'fa-eye-slash' : 'fa-eye'"></i>
                                    </button>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium mb-1">Cardholder Name</label>
                                <input type="text" value="TAYLOR SMITH" readonly 
                                       class="w-full bg-gray-100 dark:bg-gray-700 rounded-lg px-4 py-2 uppercase">
                            </div>
                        </div>
                        
                        <div class="flex justify-between">
                            <button @click="showModal = false" class="btn btn-outline">
                                <i class="fas fa-times mr-2"></i> Close
                            </button>
                            <div class="space-x-2">
                                <button class="btn btn-outline">
                                    <i class="fas fa-snowflake mr-2"></i> Freeze Card
                                </button>
                                <button class="btn btn-primary">
                                    <i class="fas fa-download mr-2"></i> Download Details
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Confirmation Modal -->
            <div x-show="showConfirmModal" class="modal-overlay" :class="{'active': showConfirmModal}">
                <div class="modal-content max-w-md" @click.outside="showConfirmModal = false">
                    <div class="p-6 text-center">
                        <div class="mx-auto flex items-center justify-center h-12 w-12 rounded-full bg-red-100 mb-4">
                            <i class="fas fa-exclamation-triangle text-red-600 text-xl"></i>
                        </div>
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">
                            <span x-text="confirmAction === 'freeze' ? 'Freeze Card?' : 'Request New Card?'"></span>
                        </h3>
                        <div class="mt-2 text-sm text-gray-500 dark:text-gray-400">
                            <p x-show="confirmAction === 'freeze'">
                                This will temporarily disable your card for all transactions until you unfreeze it.
                            </p>
                            <p x-show="confirmAction === 'request'">
                                You're about to request a new <span x-text="confirmCardType" class="font-bold"></span> card.
                                A $10 fee may apply.
                            </p>
                        </div>
                        <div class="mt-4 flex justify-center space-x-3">
                            <button @click="showConfirmModal = false" class="btn btn-outline px-8">
                                Cancel
                            </button>
                            <button @click="processConfirmAction" 
                                    :class="{'btn-danger': confirmAction === 'freeze', 'btn-primary': confirmAction === 'request'}" 
                                    class="px-8">
                                <span x-text="confirmAction === 'freeze' ? 'Freeze' : 'Confirm'"></span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('cardManager', () => ({
                activeTab: 'cards',
                showModal: false,
                showConfirmModal: false,
                cardFlipped: false,
                showCVV: false,
                confirmAction: '',
                confirmCardType: '',
                activeCard: {
                    type: 'American Express',
                    number: '3742 4532 8791 1652',
                    expiry: '05/26',
                    cvv: '384',
                    holder: 'TAYLOR SMITH',
                    status: 'Processing'
                },
                
                showCardDetails(card) {
                    this.showModal = true;
                    this.cardFlipped = false;
                },
                
                showFreezeConfirm(card) {
                    this.confirmAction = 'freeze';
                    this.showConfirmModal = true;
                },
                
                requestCard(cardType) {
                    this.confirmAction = 'request';
                    this.confirmCardType = cardType;
                    this.showConfirmModal = true;
                },
                
                processConfirmAction() {
                    if (this.confirmAction === 'freeze') {
                        // Handle freeze logic
                        console.log('Card frozen');
                        this.showToast('Card has been frozen', 'success');
                    } else if (this.confirmAction === 'request') {
                        // Handle card request logic
                        console.log('Requested new card: ' + this.confirmCardType);
                        this.showToast('New card requested successfully', 'success');
                    }
                    
                    this.showConfirmModal = false;
                },
                
                copyToClipboard(text) {
                    navigator.clipboard.writeText(text);
                    this.showToast('Copied to clipboard!', 'info');
                },
                
                showToast(message, type) {
                    // In a real app, you would implement a toast notification here
                    alert(message);
                }
            }));
        });
    </script>
</body>
</html>


             <script src="{{asset('dashboard/assets/js/alpine-collaspe.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/alpine-persist.min.js')}}"></script>
        <script defer src="{{asset('dashboard/assets/js/alpine-ui.min.js')}}"></script>
        <script defer src="{{asset('dashboard/assets/js/alpine-focus.min.js')}}"></script>
        <script defer src="{{asset('dashboard/assets/js/alpine.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/custom.js')}}"></script>

        <script defer src="{{asset('dashboard/assets/js/apexcharts.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/dayjs.min.js')}}"></script>



@include('user.footer')
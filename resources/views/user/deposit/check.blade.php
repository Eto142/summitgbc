@include('user.header')

 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

                <!-- end header section -->

                <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <!-- start main content section -->
                    <div x-data="knowledge">
                      
                        
                        <h3 class="mb-8 text-center text-xl font-semibold md:text-2xl">Cheque <span class="text-primary">Deposit</span></h3>
                        
                        
                        
                        <div class="mb-10 grid grid-cols-1 gap-10 md:grid-cols-2">
                            <div class="rounded-md bg-white dark:bg-black" x-data="{ active: 1 }">
                                <div class="border-b border-white-light p-6 text-[22px] font-bold dark:border-dark dark:text-white">Cheque Deposit?</div>
                                <div class="divide-y divide-white-light px-6 py-4.5 dark:divide-dark">
                                    <div>
                                        <div
                                            class="flex cursor-pointer items-center justify-between gap-10 px-2.5 py-2 text-base font-semibold hover:bg-primary-light hover:text-primary dark:text-white dark:hover:bg-[#1B2E4B] dark:hover:text-primary"
                                            :class="{'bg-primary-light dark:bg-[#1B2E4B] !text-primary' : active === 1}"
                                            x-on:click="active === 1 ? active = null : active = 1"
                                        >
                                            <span>How to deposit your Cheque.</span>
                                            <template x-if="active !== 1">
                                                <span class="shrink-0">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M12.75 9C12.75 8.58579 12.4142 8.25 12 8.25C11.5858 8.25 11.25 8.58579 11.25 9L11.25 11.25H9C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75H11.25V15C11.25 15.4142 11.5858 15.75 12 15.75C12.4142 15.75 12.75 15.4142 12.75 15L12.75 12.75H15C15.4142 12.75 15.75 12.4142 15.75 12C15.75 11.5858 15.4142 11.25 15 11.25H12.75V9Z"
                                                            fill="currentColor"
                                                        />
                                                        <path
                                                            fill-rule="evenodd"
                                                            clip-rule="evenodd"
                                                            d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 17.1086 17.1086 21.25 12 21.25C6.89137 21.25 2.75 17.1086 2.75 12Z"
                                                            fill="currentColor"
                                                        />
                                                    </svg>
                                                </span>
                                            </template>
                                            <template x-if="active === 1">
                                                <span class="shrink-0">
                                                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            opacity="0.5"
                                                            d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z"
                                                            fill="currentColor"
                                                        />
                                                        <path
                                                            d="M15.75 12C15.75 12.4142 15.4142 12.75 15 12.75H9C8.58579 12.75 8.25 12.4142 8.25 12C8.25 11.5858 8.58579 11.25 9 11.25H15C15.4142 11.25 15.75 11.5858 15.75 12Z"
                                                            fill="currentColor"
                                                        />
                                                    </svg>
                                                </span>
                                            </template>
                                        </div>
                                        <div x-cloak x-show="active === 1" x-collapse>
                                            <div class="px-1 py-3 font-semibold text-white-dark">
                                                <p>
                                                    To deposit a Cheque, select the account you want to deposit the Cheque into and enter the amount. Then, take a photo of the front and back of the Cheque and submit it. Your Cheque will be deposited and the funds will be available in your account.
                                                </p>
                                            </div>
                                        </div>
                                        <br>
                                        <div>
                                            
                                          
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

                                                <form action="{{ route('user.deposit.store') }}" method="POST" enctype="multipart/form-data">
                                                  @csrf
                                        {{-- <div class="mb-1.5 font-semibold">Deposit to</div>
                                        <select id="" class="form-select text-white-dark" name="acc">
                                                                                        </select> --}}
                                           
                                           
                                           <br><br>
                                           
                                           
                                           <div>
                                        <div class="mb-1.5 font-semibold">Amount</div>
                                        <div class="relative flex">
                                            <input
                                            name="amount" type="number" placeholder="" class="form-input ltr:rounded-r-none ltr:border-r-0 rtl:rounded-l-none rtl:border-l-0"/>
                                            
                                            <div x-data="dropdown" @click.outside="open = false" class="dropdown">
                                                <div class="flex cursor-pointer items-center justify-center gap-1 rounded-none border bg-[#f1f2f3] px-3 py-2 font-semibold ltr:rounded-r-md rtl:rounded-l-md dark:border-[#253b5c] dark:bg-[#1b2e4b]" @click="toggle"></div>
                                            </div>
                                        </div>
                                    </div>
                                           
                                           
                                           
                                           
                                    </div>
                                    
                                    <br><br>
                                    
                                     <div>
            

        
        <p>Front copy</p>
        <img id="front" src="https://png.pngtree.com/png-vector/20221104/ourmid/pngtree-bank-check-blank-money-cheque-png-image_6413449.png" alt="your image" class="img-fluid" />
        <br>
        <input type="file" name="front_check"  onchange="readfront(this);" />
        
        {{-- <input type="hidden" name="m"> --}}
        
        
        <br><br>
            <p>Back copy</p>
        <img id="back" src="https://png.pngtree.com/png-vector/20221104/ourmid/pngtree-bank-check-blank-money-cheque-png-image_6413449.png" alt="your image" class="img-fluid" />
        <br>
        <input type="file" name="back_check" onchange="readback(this);" />
                                           
                                           
                                           <br><br>
                                           <input type="submit" class="btn btn-primary btn-block" name="" value="Send check">
                                           
                                           
                                         </form>  
                                    </div>
                                        
                                        
                                        
                                        
                                        
                                        
                                        
                                    </div>
                                    <div>
                                        
                                        
                                    </div>
                                    
                                   
                                </div>
                            </div>
                            <div class="rounded-md bg-white dark:bg-black" x-data="{ active: 1 }">
                                <div class="rounded-md bg-white dark:bg-black" x-data="{ active: 1 }">
    <div class="border-b border-white-light p-6 text-[22px] font-bold dark:border-dark dark:text-white">
        My Bank Cheque's
    </div>
    <div class="divide-y divide-white-light px-6 py-4.5 dark:divide-dark">

        @forelse($checks as $index => $check)
            <div>
                <div
                    class="flex cursor-pointer items-center justify-between gap-10 px-2.5 py-2 text-base font-semibold hover:bg-primary-light hover:text-primary dark:text-white dark:hover:bg-[#1B2E4B] dark:hover:text-primary"
                    :class="{'bg-primary-light dark:bg-[#1B2E4B] !text-primary' : active === {{ $index + 1 }}}"
                    x-on:click="active === {{ $index + 1 }} ? active = null : active = {{ $index + 1 }}"
                >
                    <span>Amount: ${{ number_format($check->amount, 2) }} - Deposit #{{ $index + 1 }}</span>
                    <template x-if="active !== {{ $index + 1 }}">
                        <span class="shrink-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12.75 9C12.75 8.58579 12.4142 8.25 12 8.25C11.5858 8.25 11.25 8.58579 11.25 9L11.25 11.25H9C8.58579 11.25 8.25 11.5858 8.25 12C8.25 12.4142 8.58579 12.75 9 12.75H11.25V15C11.25 15.4142 11.5858 15.75 12 15.75C12.4142 15.75 12.75 15.4142 12.75 15L12.75 12.75H15C15.4142 12.75 15.75 12.4142 15.75 12C15.75 11.5858 15.4142 11.25 15 11.25H12.75V9Z" fill="currentColor"/>
                                <path fill-rule="evenodd" clip-rule="evenodd" d="M12 1.25C6.06294 1.25 1.25 6.06294 1.25 12C1.25 17.9371 6.06294 22.75 12 22.75C17.9371 22.75 22.75 17.9371 22.75 12C22.75 6.06294 17.9371 1.25 12 1.25ZM2.75 12C2.75 6.89137 6.89137 2.75 12 2.75C17.1086 2.75 21.25 6.89137 21.25 12C21.25 17.1086 17.1086 21.25 12 21.25C6.89137 21.25 2.75 17.1086 2.75 12Z" fill="currentColor"/>
                            </svg>
                        </span>
                    </template>
                    <template x-if="active === {{ $index + 1 }}">
                        <span class="shrink-0">
                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.5" d="M22 12C22 17.5228 17.5228 22 12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12Z" fill="currentColor"/>
                                <path d="M15.75 12C15.75 12.4142 15.4142 12.75 15 12.75H9C8.58579 12.75 8.25 12.4142 8.25 12C8.25 11.5858 8.58579 11.25 9 11.25H15C15.4142 11.25 15.75 11.5858 15.75 12Z" fill="currentColor"/>
                            </svg>
                        </span>
                    </template>
                </div>
                <div x-cloak x-show="active === {{ $index + 1 }}" x-collapse>
                    <div class="px-1 py-3 font-semibold text-white-dark">
                        <p>Front Check:</p>
                        <img src="{{ asset('storage/' . $check->front_check) }}" alt="Front Check Image" class="max-w-xs" />
                        <br><br>
                        <p>Back Check:</p>
                        <img src="{{ asset('storage/' . $check->back_check) }}" alt="Back Check Image" class="max-w-xs" />
                    </div>
                </div>
            </div>
        @empty
            <p class="px-6 py-4 text-gray-600 dark:text-gray-400">No check deposits found.</p>
        @endforelse

    </div>
</div>

                                <div class="divide-y divide-white-light px-6 py-4.5 dark:divide-dark">
                                  
                                      
                                    
                                </div>
                            </div>
                        </div>
                       
                       

                        
                    </div>
                    <!-- end main content section -->
                </div>




                                                    
                                         <style>
        img{
  max-width:180px;
}

        </style>
        
        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        
        
        <script>
             function readfront(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#front')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
            }
        }
        </script>
        
        <script>
             function readback(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#back')
                        .attr('src', e.target.result);
                };

                reader.readAsDataURL(input.files[0]);
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
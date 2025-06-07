@include('user.header' )



               <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <!-- start main content section -->
                    <div>
                        <ul class="flex space-x-2 rtl:space-x-reverse">
                            <li>
                                <a href="javascript:;" class="text-primary hover:underline">Users</a>
                            </li>
                            <li class="before:content-['/'] ltr:before:mr-1 rtl:before:ml-1">
                                <span>Account Settings</span>
                            </li>
                        </ul>
                        <div class="pt-5">
                            <div class="mb-5 flex items-center justify-between">
                                <h5 class="text-lg font-semibold dark:text-white-light">Settings</h5>
                            </div>
                            <div x-data="{tab: 'home'}">
                                <ul class="mb-5 overflow-y-auto whitespace-nowrap border-b border-[#ebedf2] font-semibold dark:border-[#191e3a] sm:flex">
                                    <li class="inline-block">
                                        <a
                                            href="javascript:;"
                                            class="flex gap-2 border-b border-transparent p-4 hover:border-primary hover:text-primary"
                                            :class="{'!border-primary text-primary' : tab == 'home'}"
                                            @click="tab='home'"
                                        >
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5">
                                                <path
                                                    opacity="0.5"
                                                    d="M2 12.2039C2 9.91549 2 8.77128 2.5192 7.82274C3.0384 6.87421 3.98695 6.28551 5.88403 5.10813L7.88403 3.86687C9.88939 2.62229 10.8921 2 12 2C13.1079 2 14.1106 2.62229 16.116 3.86687L18.116 5.10812C20.0131 6.28551 20.9616 6.87421 21.4808 7.82274C22 8.77128 22 9.91549 22 12.2039V13.725C22 17.6258 22 19.5763 20.8284 20.7881C19.6569 22 17.7712 22 14 22H10C6.22876 22 4.34315 22 3.17157 20.7881C2 19.5763 2 17.6258 2 13.725V12.2039Z"
                                                    stroke="currentColor"
                                                    stroke-width="1.5"
                                                />
                                                <path d="M12 15L12 18" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" />
                                            </svg>
                                            Home
                                        </a>
                                   
                                    
                                    
                                </ul>
                                <template x-if="tab === 'home'">

                                    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

                                    <div>
                                        <form  action="{{ route('user.settings') }}" method="POST" class="mb-5 rounded-md border border-[#ebedf2] bg-white p-4 dark:border-[#191e3a] dark:bg-[#0e1726]">
                                                @csrf
                                            <h6 class="mb-5 text-lg font-bold">General Information</h6>
                                            <div class="flex flex-col sm:flex-row">
                                                <div class="mb-5 w-full sm:w-2/12 ltr:sm:mr-4 rtl:sm:ml-4">
                                                    <img
                                                        src="default-avatar.png"
                                                        alt="image"
                                                        class="mx-auto h-20 w-20 rounded-full object-cover md:h-32 md:w-32"
                                                    />
                                                </div>



                                                 
                                                
                                                <div class="grid flex-1 grid-cols-1 gap-5 sm:grid-cols-2">

                                                    <div>
                                                        <label for="name">Full Name</label>
                                                        <input  name="name" id="name" value=" {{ old('name', auth()->user()->name) }}"  type="text" placeholder="" class="form-input" />
                                                    </div>
                                                    
                                                    <div>
                                                        <label for="name">Next of Kin</label>
                                                        <input id="name" value="none" name="kin" type="text" placeholder="" class="form-input" />
                                                    </div>
                                                    
                                                    <div>
                                                        <label for="address">Country</label>
                                                        <input id="address" type="text" value=" {{ old('country', auth()->user()->country) }}"  class="form-input" />
                                                    </div>
                                                    <div>
                                                        <label for="address">Address</label>
                                                        <input id="address" name="address" type="text" placeholder="your address" class="form-input" />
                                                    </div>
                                                   
                                                    <div>
                                                        <label for="phone">Phone</label>
                                                        <input id="phone" name="phone" value="{{ old('phone', auth()->user()->phone) }}" type="text"  class="form-input" />
                                                    </div>
                                                    <div>
                                                        <label for="email">Email</label>
                                                        <input id="email" value=" {{ old('email', auth()->user()->email) }}" readonly type="email" class="form-input" />
                                                    </div>
                                                    
                                                    <div class="mt-3 sm:col-span-2">
                                                        <button type="button" class="btn btn-primary">Save</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                        
                                    </div>
                                </template>
                                

                                
                            </div>
                        </div>
                    </div>
                    <!-- end main content section -->

                            <script src="{{asset('dashboard/assets/js/alpine-collaspe.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/alpine-persist.min.js')}}"></script>
        <script defer src="{{asset('dashboard/assets/js/alpine-ui.min.js')}}"></script>
        <script defer src="{{asset('dashboard/assets/js/alpine-focus.min.js')}}"></script>
        <script defer src="{{asset('dashboard/assets/js/alpine.min.js')}}"></script>
        <script src="{{asset('dashboard/assets/js/custom.js')}}"></script>
                    @include('user.footer' )
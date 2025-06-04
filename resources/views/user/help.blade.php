 @include('user.header')

                <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <!-- start main content section -->
                    <div x-data="knowledge">
                        
                       
                        <div class="panel mt-10 text-center md:mt-20">
                            <h3 class="mb-2 text-xl font-bold dark:text-white md:text-2xl">Need help?</h3>
                            <div class="text-lg font-medium text-white-dark">
                                Our specialists are always happy to help. Contact us during standard business hours or email us24/7 and we'll get back to you.
                            </div>
                            <div class="mt-8 flex flex-col sm:flex-row items-center justify-center gap-6">
                                <button type="button" class="btn btn-primary">Contact Us</button>
                                <button type="button" class="btn btn-primary">Visit our community</button>
                            </div>
                        </div>
                        
                        
                        
                    </div>
                    <!-- end main content section -->
                </div>

                @include('user.footer')
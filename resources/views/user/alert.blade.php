@include('user.header')
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
                                <h5 class="text-lg font-semibold dark:text-white-light">Alert / Notification</h5>
                            </div>
                            <div x-data="{tab: 'home'}">
                               
                               
                               
                                <template x-if="tab === 'home'">
                                    <div class="switch">
                                        
                                        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                                            <div class="panel space-y-5">
                                                <h5 class="mb-4 text-lg font-semibold">Login Notification</h5>
                                                <p>Your <span class="text-primary">Profile</span> will be visible to anyone on the network.</p>
                                                <label class="relative h-6 w-12">
                                                    <input
                                                        type="checkbox"
                                                        class="custom_switch peer absolute z-10 h-full w-full cursor-pointer opacity-0"
                                                        id="custom_switch_checkbox1"
                                                    />
                                                    <span
                                                        for="custom_switch_checkbox1"
                                                        class="block h-full rounded-full bg-[#ebedf2] before:absolute before:left-1 before:bottom-1 before:h-4 before:w-4 before:rounded-full before:bg-white before:transition-all before:duration-300 peer-checked:bg-primary peer-checked:before:left-7 dark:bg-dark dark:before:bg-white-dark dark:peer-checked:before:bg-white"
                                                    ></span>
                                                </label>
                                            </div>
                                            <div class="panel space-y-5">
                                                <h5 class="mb-4 text-lg font-semibold">Credit/Debit Notification</h5>
                                                <p>Your <span class="text-primary">Email</span> will be visible to anyone on the network.</p>
                                                <label class="relative h-6 w-12">
                                                    <input
                                                        type="checkbox"
                                                        class="custom_switch peer absolute z-10 h-full w-full cursor-pointer opacity-0"
                                                        id="custom_switch_checkbox2"
                                                    />
                                                    <span
                                                        for="custom_switch_checkbox2"
                                                        class="block h-full rounded-full bg-[#ebedf2] before:absolute before:left-1 before:bottom-1 before:h-4 before:w-4 before:rounded-full before:bg-white before:transition-all before:duration-300 peer-checked:bg-primary peer-checked:before:left-7 dark:bg-dark dark:before:bg-white-dark dark:peer-checked:before:bg-white"
                                                    ></span>
                                                </label>
                                            </div>
                                            <div class="panel space-y-5">
                                                <h5 class="mb-4 text-lg font-semibold">Enable keyboard shortcuts</h5>
                                                <p>When enabled, press <span class="text-primary">ctrl</span> for help</p>
                                                <label class="relative h-6 w-12">
                                                    <input
                                                        type="checkbox"
                                                        class="custom_switch peer absolute z-10 h-full w-full cursor-pointer opacity-0"
                                                        id="custom_switch_checkbox3"
                                                    />
                                                    <span
                                                        for="custom_switch_checkbox3"
                                                        class="block h-full rounded-full bg-[#ebedf2] before:absolute before:left-1 before:bottom-1 before:h-4 before:w-4 before:rounded-full before:bg-white before:transition-all before:duration-300 peer-checked:bg-primary peer-checked:before:left-7 dark:bg-dark dark:before:bg-white-dark dark:peer-checked:before:bg-white"
                                                    ></span>
                                                </label>
                                            </div>
                                            
                                            
                                          
                                        </div>
                                    </div>
                                </template>
                                <template x-if="tab === 'danger-zone'">
                                    <div class="switch">
                                        <div class="grid grid-cols-1 gap-5 md:grid-cols-3">
                                            <div class="panel space-y-5">
                                                <h5 class="mb-4 text-lg font-semibold">Purge Cache</h5>
                                                <p>Remove the active resource from the cache without waiting for the predetermined cache expiry time.</p>
                                                <button class="btn btn-secondary">Clear</button>
                                            </div>
                                            <div class="panel space-y-5">
                                                <h5 class="mb-4 text-lg font-semibold">Deactivate Account</h5>
                                                <p>You will not be able to receive messages, notifications for up to 24 hours.</p>
                                                <label class="relative h-6 w-12">
                                                    <input
                                                        type="checkbox"
                                                        class="custom_switch peer absolute z-10 h-full w-full cursor-pointer opacity-0"
                                                        id="custom_switch_checkbox7"
                                                    />
                                                    <span
                                                        for="custom_switch_checkbox7"
                                                        class="block h-full rounded-full bg-[#ebedf2] before:absolute before:left-1 before:bottom-1 before:h-4 before:w-4 before:rounded-full before:bg-white before:transition-all before:duration-300 peer-checked:bg-primary peer-checked:before:left-7 dark:bg-dark dark:before:bg-white-dark dark:peer-checked:before:bg-white"
                                                    ></span>
                                                </label>
                                            </div>
                                            <div class="panel space-y-5">
                                                <h5 class="mb-4 text-lg font-semibold">Delete Account</h5>
                                                <p>Once you delete the account, there is no going back. Please be certain.</p>
                                                <button class="btn btn-danger btn-delete-account">Delete my account</button>
                                            </div>
                                        </div>
                                    </div>
                                </template>
                            </div>
                        </div>
                    </div>
                    <!-- end main content section -->

                </div>
@include('user.footer')
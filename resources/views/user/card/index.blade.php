@include('user.header')


              <!-- end header section -->

                <div class="animate__animated p-6" :class="[$store.app.animation]">
                    <!-- start main content section -->
                    <div x-data="knowledge">
                        <div
                            class="relative rounded-t-md bg-primary-light bg-[url('images/knowledge/pattern.html')] bg-contain bg-left-top bg-no-repeat px-5 py-10 dark:bg-black md:px-10"
                        >
                            <div class="absolute bottom-20 end-5 hidden text-[#DBE7FF] rtl:rotate-y-180 dark:text-[#1B2E4B] md:block xl:bottom-14 xl:end-10">
                                <svg
                                    width="375"
                                    height="185"
                                    viewBox="0 0 375 185"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-72 max-w-xs xl:w-full"
                                >
                                    <g clip-path="url(#clip0_1109_89938)">
                                        <path
                                            d="M215.023 181.044C212.702 181.042 210.477 180.122 208.836 178.487C207.196 176.851 206.274 174.633 206.274 172.321C206.274 170.008 207.196 167.79 208.836 166.155C210.477 164.519 212.702 163.599 215.023 163.598H345.07C344.415 162.401 343.45 161.403 342.275 160.707C341.099 160.01 339.757 159.643 338.39 159.642H79.8922C76.5197 159.645 73.2866 160.983 70.9034 163.36C68.5202 165.738 67.1817 168.961 67.1821 172.321C67.1838 175.68 68.523 178.902 70.9058 181.279C73.2885 183.656 76.5204 184.994 79.8922 185H338.39C339.757 184.999 341.099 184.631 342.275 183.935C343.45 183.239 344.415 182.24 345.069 181.044L215.023 181.044Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M345.242 168.405H221.598C221.409 168.404 221.228 168.329 221.094 168.195C220.96 168.062 220.885 167.881 220.885 167.693C220.885 167.504 220.96 167.323 221.094 167.19C221.228 167.056 221.409 166.981 221.598 166.98H345.242C345.431 166.981 345.613 167.056 345.746 167.19C345.88 167.323 345.955 167.504 345.955 167.693C345.955 167.881 345.88 168.062 345.746 168.195C345.613 168.329 345.431 168.404 345.242 168.405Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M345.242 173.033H221.598C221.409 173.033 221.227 172.958 221.093 172.824C220.959 172.691 220.884 172.51 220.884 172.321C220.884 172.132 220.959 171.951 221.093 171.817C221.227 171.684 221.409 171.609 221.598 171.609H345.242C345.432 171.609 345.614 171.684 345.748 171.817C345.882 171.951 345.957 172.132 345.957 172.321C345.957 172.51 345.882 172.691 345.748 172.824C345.614 172.958 345.432 173.033 345.242 173.033Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M345.242 177.661H221.598C221.409 177.661 221.228 177.586 221.094 177.452C220.96 177.319 220.885 177.138 220.885 176.949C220.885 176.761 220.96 176.58 221.094 176.446C221.228 176.313 221.409 176.238 221.598 176.237H345.242C345.431 176.238 345.613 176.313 345.746 176.446C345.88 176.58 345.955 176.761 345.955 176.949C345.955 177.138 345.88 177.319 345.746 177.452C345.613 177.586 345.431 177.661 345.242 177.661Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M181.432 156.477C179.111 156.476 176.885 155.556 175.245 153.92C173.604 152.285 172.683 150.067 172.683 147.754C172.683 145.442 173.604 143.224 175.245 141.588C176.885 139.953 179.111 139.033 181.432 139.031H311.478C310.824 137.835 309.859 136.836 308.683 136.14C307.508 135.444 306.166 135.076 304.799 135.075H46.3011C42.9286 135.079 39.6955 136.417 37.3123 138.794C34.929 141.171 33.5905 144.394 33.5908 147.754C33.5926 151.114 34.9318 154.335 37.3146 156.712C39.6974 159.089 42.9293 160.428 46.3011 160.433H304.799C306.166 160.432 307.508 160.065 308.683 159.368C309.859 158.672 310.824 157.674 311.478 156.477L181.432 156.477Z"
                                            fill="#4361EE"
                                        />
                                        <path
                                            d="M311.651 143.838H188.007C187.818 143.837 187.637 143.762 187.503 143.629C187.37 143.495 187.294 143.314 187.294 143.126C187.294 142.937 187.37 142.756 187.503 142.623C187.637 142.489 187.818 142.414 188.007 142.414H311.651C311.841 142.414 312.023 142.489 312.157 142.622C312.291 142.756 312.366 142.937 312.366 143.126C312.366 143.314 312.291 143.496 312.157 143.629C312.023 143.763 311.841 143.838 311.651 143.838Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M311.651 148.466H188.007C187.818 148.466 187.636 148.391 187.502 148.258C187.368 148.124 187.292 147.943 187.292 147.754C187.292 147.565 187.368 147.384 187.502 147.251C187.636 147.117 187.818 147.042 188.007 147.042H311.651C311.841 147.042 312.022 147.117 312.156 147.251C312.291 147.384 312.366 147.565 312.366 147.754C312.366 147.943 312.291 148.124 312.156 148.258C312.022 148.391 311.841 148.466 311.651 148.466Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M311.651 153.095H188.007C187.818 153.095 187.637 153.019 187.503 152.886C187.37 152.752 187.294 152.572 187.294 152.383C187.294 152.194 187.37 152.014 187.503 151.88C187.637 151.747 187.818 151.671 188.007 151.671H311.651C311.745 151.671 311.838 151.689 311.925 151.725C312.012 151.76 312.091 151.813 312.158 151.879C312.224 151.945 312.277 152.024 312.313 152.11C312.349 152.197 312.368 152.289 312.368 152.383C312.368 152.477 312.349 152.569 312.313 152.656C312.277 152.742 312.224 152.821 312.158 152.887C312.091 152.953 312.012 153.006 311.925 153.041C311.838 153.077 311.745 153.095 311.651 153.095Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M147.841 131.091C145.52 131.089 143.295 130.17 141.654 128.534C140.013 126.898 139.092 124.681 139.092 122.368C139.092 120.056 140.013 117.838 141.654 116.202C143.295 114.567 145.52 113.647 147.841 113.645H277.887C277.233 112.449 276.268 111.45 275.093 110.754C273.917 110.058 272.575 109.69 271.208 109.689H12.7101C9.33759 109.693 6.10452 111.03 3.72128 113.408C1.33804 115.785 -0.000419607 119.008 9.86767e-08 122.368C0.00170636 125.728 1.34085 128.949 3.72363 131.326C6.10641 133.703 9.33824 135.041 12.7101 135.047H271.208C272.575 135.046 273.917 134.678 275.093 133.982C276.268 133.286 277.233 132.287 277.887 131.091L147.841 131.091Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M278.06 118.452H154.416C154.227 118.451 154.046 118.376 153.912 118.242C153.778 118.109 153.703 117.928 153.703 117.739C153.703 117.551 153.778 117.37 153.912 117.237C154.046 117.103 154.227 117.028 154.416 117.027H278.06C278.25 117.027 278.431 117.102 278.565 117.236C278.699 117.369 278.775 117.551 278.775 117.739C278.775 117.928 278.699 118.109 278.565 118.243C278.431 118.376 278.25 118.452 278.06 118.452Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M278.06 123.08H154.416C154.323 123.08 154.23 123.062 154.143 123.026C154.056 122.99 153.977 122.937 153.911 122.871C153.845 122.805 153.792 122.727 153.756 122.64C153.72 122.554 153.702 122.461 153.702 122.368C153.702 122.274 153.72 122.182 153.756 122.095C153.792 122.009 153.845 121.93 153.911 121.864C153.977 121.798 154.056 121.746 154.143 121.71C154.23 121.674 154.323 121.656 154.416 121.656H278.06C278.154 121.656 278.247 121.674 278.334 121.71C278.42 121.746 278.499 121.798 278.566 121.864C278.632 121.93 278.685 122.009 278.721 122.095C278.756 122.182 278.775 122.274 278.775 122.368C278.775 122.461 278.756 122.554 278.721 122.64C278.685 122.727 278.632 122.805 278.566 122.871C278.499 122.937 278.42 122.99 278.334 123.026C278.247 123.062 278.154 123.08 278.06 123.08Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M278.06 127.708H154.416C154.227 127.708 154.045 127.633 153.911 127.5C153.777 127.366 153.702 127.185 153.702 126.996C153.702 126.807 153.777 126.626 153.911 126.493C154.045 126.359 154.227 126.284 154.416 126.284H278.06C278.154 126.284 278.247 126.303 278.334 126.338C278.42 126.374 278.499 126.427 278.566 126.493C278.632 126.559 278.685 126.637 278.721 126.724C278.756 126.81 278.775 126.903 278.775 126.996C278.775 127.09 278.756 127.182 278.721 127.269C278.685 127.355 278.632 127.434 278.566 127.5C278.499 127.566 278.42 127.618 278.334 127.654C278.247 127.69 278.154 127.708 278.06 127.708Z"
                                            fill="currentColor"
                                        />
                                        <path
                                            d="M280.915 76.9348C280.237 76.9337 279.585 76.676 279.09 76.2137C278.595 75.7514 278.296 75.1191 278.251 74.4449L277.854 68.4086C277.808 67.7035 278.045 67.009 278.512 66.4778C278.98 65.9466 279.64 65.6222 280.348 65.576L327.814 62.479C328.562 62.4301 329.313 62.5286 330.023 62.7688C330.733 63.009 331.388 63.3861 331.952 63.8787C332.516 64.3713 332.977 64.9697 333.308 65.6398C333.64 66.3098 333.836 67.0383 333.885 67.7838C333.934 68.5292 333.835 69.277 333.594 69.9844C333.353 70.6918 332.974 71.345 332.48 71.9066C331.985 72.4682 331.385 72.9274 330.712 73.2577C330.04 73.5881 329.308 73.7833 328.56 73.8321L281.094 76.929C281.034 76.9328 280.975 76.9347 280.915 76.9348Z"
                                            fill="#4361EE"
                                        />
                                        <path
                                            d="M290.275 77.713C289.583 77.7119 288.919 77.4442 288.421 76.9662C287.924 76.4881 287.631 75.8366 287.604 75.1482L287.266 66.1324C287.253 65.7828 287.309 65.434 287.431 65.106C287.553 64.778 287.739 64.4772 287.978 64.2208C288.217 63.9644 288.504 63.7573 288.823 63.6115C289.142 63.4657 289.487 63.3839 289.838 63.3709L328.871 61.9174C329.579 61.891 330.27 62.1462 330.789 62.6268C331.309 63.1074 331.616 63.7741 331.643 64.4801L331.981 73.496C331.994 73.8456 331.938 74.1944 331.816 74.5224C331.694 74.8504 331.508 75.1512 331.269 75.4076C331.03 75.664 330.743 75.8711 330.424 76.0169C330.104 76.1627 329.76 76.2445 329.409 76.2575L290.376 77.711C290.342 77.7124 290.308 77.713 290.275 77.713Z"
                                            fill="#2F2E41"
                                        />
                                        <path
                                            d="M336.015 160.823H329.943C329.234 160.822 328.555 160.541 328.054 160.041C327.552 159.542 327.27 158.865 327.27 158.159V107.741C327.27 107.035 327.552 106.358 328.054 105.858C328.555 105.359 329.234 105.078 329.943 105.077H336.015C336.724 105.078 337.404 105.359 337.905 105.858C338.406 106.358 338.688 107.035 338.689 107.741V158.159C338.688 158.865 338.406 159.542 337.905 160.041C337.404 160.541 336.724 160.822 336.015 160.823Z"
                                            fill="#2F2E41"
                                        />
                                        <path
                                            d="M309.066 134.173L303.873 131.037C303.268 130.67 302.833 130.079 302.664 129.393C302.495 128.707 302.606 127.982 302.973 127.378L329.203 84.2625C329.571 83.6589 330.165 83.2254 330.853 83.0572C331.542 82.889 332.269 82.9998 332.876 83.3652L338.068 86.5008C338.674 86.8676 339.109 87.4588 339.278 88.1448C339.446 88.8308 339.335 89.5554 338.969 90.1599L312.738 133.275C312.37 133.879 311.777 134.312 311.088 134.481C310.4 134.649 309.672 134.538 309.066 134.173Z"
                                            fill="#2F2E41"
                                        />
                                        <path
                                            d="M326.794 52.4612C338.38 52.4612 347.773 43.1029 347.773 31.5589C347.773 20.0148 338.38 10.6565 326.794 10.6565C315.207 10.6565 305.814 20.0148 305.814 31.5589C305.814 43.1029 315.207 52.4612 326.794 52.4612Z"
                                            fill="#4361EE"
                                        />
                                        <path
                                            d="M315.438 38.6956C314.763 38.4746 314.143 38.1123 313.621 37.6329C313.274 37.2907 313.007 36.8771 312.838 36.4212C312.67 35.9654 312.603 35.4782 312.643 34.9939C312.665 34.6488 312.766 34.3135 312.94 34.0141C313.113 33.7147 313.354 33.4593 313.643 33.268C314.393 32.7885 315.397 32.7871 316.419 33.2357L316.38 25.0757L317.203 25.0718L317.248 34.6647L316.614 34.2674C315.879 33.8075 314.829 33.4838 314.088 33.958C313.904 34.0833 313.752 34.249 313.644 34.4423C313.535 34.6355 313.473 34.8511 313.462 35.0723C313.434 35.4331 313.484 35.7956 313.61 36.1351C313.735 36.4747 313.933 36.7833 314.189 37.04C315.097 37.9046 316.423 38.175 317.934 38.4166L317.804 39.2258C317.001 39.1199 316.209 38.9424 315.438 38.6956Z"
                                            fill="#2F2E41"
                                        />
                                        <path d="M307.899 24.6635L307.791 25.4761L312.184 26.0541L312.292 25.2415L307.899 24.6635Z" fill="#2F2E41" />
                                        <path d="M321.765 26.4873L321.657 27.2998L326.05 27.8778L326.158 27.0653L321.765 26.4873Z" fill="#2F2E41" />
                                        <path
                                            d="M344.312 121.268H308.934C308.007 121.267 307.119 120.9 306.463 120.247C305.808 119.593 305.439 118.708 305.438 117.784L312.844 61.1985C312.85 60.2791 313.221 59.3994 313.876 58.7516C314.531 58.1038 315.416 57.7405 316.339 57.7412H328.894C333.908 57.7469 338.716 59.7341 342.262 63.267C345.808 66.7999 347.803 71.5899 347.808 76.5861V117.784C347.807 118.708 347.438 119.593 346.783 120.247C346.127 120.9 345.239 121.267 344.312 121.268Z"
                                            fill="#2F2E41"
                                        />
                                        <path
                                            d="M374.749 98.9713C374.967 99.4372 375.046 99.9562 374.975 100.466C374.905 100.975 374.688 101.453 374.351 101.843L370.381 106.42C370.152 106.685 369.872 106.902 369.558 107.059C369.245 107.216 368.903 107.31 368.553 107.336C368.202 107.361 367.851 107.318 367.517 107.208C367.184 107.098 366.876 106.923 366.61 106.695L330.615 75.7111C330.048 75.2228 329.582 74.6279 329.246 73.9603C328.909 73.2928 328.707 72.5657 328.653 71.8205C328.598 71.0754 328.691 70.3268 328.927 69.6175C329.163 68.9083 329.536 68.2522 330.027 67.6869C330.517 67.1215 331.114 66.6579 331.784 66.3226C332.454 65.9872 333.184 65.7866 333.932 65.7323C334.68 65.678 335.431 65.7711 336.143 66.0061C336.855 66.2411 337.513 66.6136 338.081 67.1021L374.075 98.0854C374.36 98.33 374.59 98.6319 374.749 98.9713Z"
                                            fill="#4361EE"
                                        />
                                        <path
                                            d="M366.804 88.7464C367.023 89.2124 367.101 89.7313 367.031 90.2408C366.96 90.7503 366.743 91.2286 366.406 91.6181L359.626 99.4367C359.162 99.9706 358.505 100.299 357.798 100.351C357.091 100.402 356.392 100.172 355.855 99.7109L326.298 74.2689C326.032 74.0402 325.815 73.7616 325.657 73.449C325.499 73.1364 325.405 72.7959 325.379 72.447C325.354 72.0981 325.398 71.7475 325.508 71.4154C325.618 71.0833 325.793 70.7761 326.023 70.5114L332.803 62.6929C333.032 62.4282 333.312 62.2111 333.626 62.054C333.939 61.897 334.281 61.803 334.631 61.7776C334.982 61.7521 335.333 61.7956 335.667 61.9056C336 62.0157 336.308 62.19 336.574 62.4187L366.131 87.8606C366.416 88.1052 366.645 88.4071 366.804 88.7464Z"
                                            fill="#2F2E41"
                                        />
                                        <path
                                            d="M327.186 19.1616C324.381 16.8493 320.632 19.0362 317.461 18.7258C314.426 18.4289 311.984 15.7684 311.319 12.9054C310.542 9.56531 312.225 6.1724 314.761 4.03273C317.537 1.68928 321.265 0.961046 324.818 1.31764C328.89 1.72635 332.641 3.54275 336.019 5.76177C339.277 7.83543 342.284 10.2778 344.979 13.0401C347.394 15.5981 349.457 18.6626 350.164 22.1529C350.806 25.3248 350.43 28.8604 348.593 31.5925C347.617 32.9935 346.296 34.1205 344.757 34.8647C343.153 35.6876 341.436 36.2867 339.884 37.2122C337.538 38.6116 335.286 41.4636 336.084 44.3721C336.256 45.0075 336.582 45.5912 337.033 46.0718C337.575 46.6488 338.517 45.8549 337.974 45.2763C337.019 44.2601 337.03 42.8806 337.505 41.6368C338.071 40.2346 339.098 39.0655 340.418 38.321C342.042 37.3544 343.844 36.7426 345.511 35.8587C347.107 35.0498 348.484 33.8686 349.523 32.4156C351.485 29.5881 352.018 25.9466 351.497 22.5971C350.934 18.9723 348.996 15.7055 346.594 12.9827C343.98 10.0194 340.791 7.52961 337.539 5.30018C334.05 2.90798 330.207 0.902431 325.984 0.230686C322.323 -0.351613 318.377 0.124257 315.224 2.16544C312.282 4.07076 310.059 7.29454 309.899 10.8528C309.849 12.4714 310.232 14.0742 311.009 15.4963C311.787 16.9184 312.931 18.1084 314.323 18.9438C315.751 19.7588 317.4 20.1066 319.036 19.9381C320.787 19.7932 322.531 19.2252 324.298 19.3403C325.097 19.3735 325.864 19.6653 326.481 20.1715C327.094 20.6767 327.794 19.6626 327.186 19.1616Z"
                                            fill="#2F2E41"
                                        />
                                        <path
                                            d="M302.517 128.106C302.524 128.06 302.533 128.014 302.543 127.968C302.616 127.625 302.757 127.301 302.957 127.013C303.157 126.725 303.412 126.48 303.708 126.291L308.81 123.012C309.406 122.63 310.13 122.499 310.823 122.648C311.516 122.797 312.121 123.214 312.506 123.807L328.245 148.119C328.63 148.713 328.762 149.434 328.612 150.125C328.462 150.815 328.044 151.419 327.448 151.802L322.345 155.08C321.749 155.463 321.025 155.594 320.332 155.445C319.639 155.296 319.034 154.879 318.649 154.286L302.91 129.974C302.55 129.421 302.41 128.756 302.517 128.106Z"
                                            fill="#2F2E41"
                                        />
                                    </g>
                                    <defs>
                                        <clipPath id="clip0_1109_89938">
                                            <rect width="375" height="185" fill="white" />
                                        </clipPath>
                                    </defs>
                                </svg>
                            </div>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            <div class="relative">
                                <div class="flex flex-col items-center justify-center sm:-ms-32 sm:flex-row xl:-ms-60">
                                    <div class="mb-2 flex gap-1 text-end text-base leading-5 sm:flex-col xl:text-xl">
                                        <span>It's free </span>
                                        <span>For everyone</span>
                                    </div>
                                    <div class="me-4 ms-2 hidden text-[#0E1726] dark:text-white sm:block rtl:rotate-y-180">
                                        <svg width="111" height="22" viewBox="0 0 116 22" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-16 xl:w-28">
                                            <path
                                                d="M0.645796 11.44C0.215273 11.6829 0.0631375 12.2287 0.305991 12.6593C0.548845 13.0898 1.09472 13.2419 1.52525 12.9991L0.645796 11.44ZM49.0622 20.4639L48.9765 19.5731L48.9765 19.5731L49.0622 20.4639ZM115.315 2.33429L105.013 3.14964L110.87 11.6641L115.315 2.33429ZM1.52525 12.9991C10.3971 7.99452 17.8696 10.3011 25.3913 13.8345C29.1125 15.5825 32.9505 17.6894 36.8117 19.2153C40.7121 20.7566 44.7862 21.7747 49.148 21.3548L48.9765 19.5731C45.0058 19.9553 41.2324 19.0375 37.4695 17.5505C33.6675 16.0481 30.0265 14.0342 26.1524 12.2143C18.4834 8.61181 10.3 5.99417 0.645796 11.44L1.52525 12.9991ZM49.148 21.3548C52.4593 21.0362 54.7308 19.6545 56.4362 17.7498C58.1039 15.8872 59.2195 13.5306 60.2695 11.3266C61.3434 9.07217 62.3508 6.97234 63.8065 5.35233C65.2231 3.77575 67.0736 2.6484 69.8869 2.40495L69.7326 0.62162C66.4361 0.906877 64.1742 2.26491 62.475 4.15595C60.8148 6.00356 59.703 8.35359 58.6534 10.5568C57.5799 12.8105 56.5678 14.9194 55.1027 16.5557C53.6753 18.1499 51.809 19.3005 48.9765 19.5731L49.148 21.3548ZM69.8869 2.40495C72.2392 2.2014 75.0889 2.61953 78.2858 3.35001C81.4816 4.08027 84.9116 5.09374 88.4614 6.04603C91.9873 6.99189 95.6026 7.86868 99.0694 8.28693C102.533 8.70483 105.908 8.67299 108.936 7.75734L108.418 6.04396C105.72 6.85988 102.621 6.91239 99.2838 6.50981C95.9496 6.10757 92.4363 5.25904 88.9252 4.31715C85.4382 3.38169 81.9229 2.34497 78.6845 1.60499C75.4471 0.865243 72.3735 0.393097 69.7326 0.62162L69.8869 2.40495Z"
                                                fill="currentColor"
                                            />
                                        </svg>
                                    </div>
                                    <div class="mb-2 text-center text-2xl font-bold dark:text-white md:text-5xl">Credit card/Debit Card</div>
                                </div>
                                <p class="mb-9 text-center text-base font-semibold">Search instant answers & questions asked by popular users</p>
                                <center> <img src="{{asset('dashboard/card/card.png')}}" width="400px"></center>
                                
                            </div>
                        </div>
                        
                        <br><br>
                        <div class="panel">
                                                <div class="mb-5">
                                                    <h5 class="mb-4 text-lg font-semibold">Payment History</h5>
                                                    <p>
                                                        Changes to your <span class="text-primary">Payment Method</span> information will take effect starting
                                                        with scheduled payment and will be refelected on your next invoice.
                                                    </p>
                                                </div>
                                                <div class="mb-5">
                                                    <div class="border-b border-[#ebedf2] dark:border-[#1b2e4b]">
                                                        <div class="flex items-start justify-between py-3">
                                                            <div class="flex-none ltr:mr-4 rtl:ml-4">
                                                                <img src="assets/images/card-americanexpress.svg" alt="image" />
                                                            </div>
                                                                                                                         
                                                            <h6 class="text-[15px] font-bold text-[#515365] dark:text-white-dark">
                                                                American Express
                                                                <span class="mt-1 block text-xs font-normal text-white-dark dark:text-white-light"
                                                                    >XXXX XXXX XXXX 1652</span
                                                                >
                                                            </h6>
                                                            
                                                                                                                        <div class="flex items-start justify-between ltr:ml-auto rtl:mr-auto">
                                                                <div class="alert alert-primary">
  Processing
</div>
</div>

                                                                                                                      
                                                                                                                    </div>
                                                    </div>
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                    
                                                  <div class="modal" id="myModal26">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="font-size:14px">American Express <img src="{{asset('dashboard/card/American Express.png')}}" width="80px"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <br><br>
<link rel="stylesheet" href="{{asset('dashboard/card/style.css')}}">
<center>
        <div class="card" style="color:white">
            <div class="card-inner">
                <div class="front">
                    <img src="https://i.ibb.co/PYss3yv/map.png" class="map-img">
                    <div class="row">
                       <img src="{{asset('dashboard/card/lite.png')}}" width="150px">
                        <img src="American Express.png" width="60px">
                    </div>
                    <div class="row card-no">
                        <img src="https://i.ibb.co/G9pDnYJ/chip.png" width="60px">
                        <span style="margin-top:20px">
                        <p style="color:white">3742&nbsp;&nbsp;&nbsp;4545&nbsp;&nbsp;&nbsp;2118&nbsp;&nbsp;&nbsp;1652</p>
                        
                        </span>
                    </div>
                    <div class="row card-holder">
                        <p><span style="font-size:18px"><strong>Taylor</strong></span></p>
                        <p>VALID TILL<br>05/26</p>
                    </div>
                    
                </div>
                <div class="back">
                    <img src="https://i.ibb.co/PYss3yv/map.png" class="map-img">
                    <div class="bar"></div>
                    <div class="row card-cvv">
                        <div>
                            <img src="https://i.ibb.co/S6JG8px/pattern.png">
                        </div>
                        <p style="height:30px; margin-top:15px; font-size:14px"><i>375</i></p>
                    </div>
                    <div class="row card-text">
                        <p style="color:white"> Prime Summit Bank bank issued and controls this virtual card, whose use is subject to the bank's terms and conditions.</p>
                    </div>
                    <div class="row signature">
                        <p>CUSTOMER SIGNATURE</p>
                        <img src="{{asset('dashboard/card/American Express.png')}}" width="80px">
                    </div>
                </div>
            </div>
        </div>
        </center>
<br><br>
    </div>
  </div>
</div>  
                                                    
                                                    
                                            
                                                    <div class="border-b border-[#ebedf2] dark:border-[#1b2e4b]">
                                                        <div class="flex items-start justify-between py-3">
                                                            <div class="flex-none ltr:mr-4 rtl:ml-4">
                                                                <img src="assets/images/card-mastercard.svg" alt="image" />
                                                            </div>
                                                            
                                                                                                                         
                                                            <h6 class="text-[15px] font-bold text-[#515365] dark:text-white-dark">
                                                                Mastercard<span
                                                                    class="mt-1 block text-xs font-normal text-white-dark dark:text-white-light"
                                                                    >XXXX XXXX XXXX 310</span
                                                                >
                                                            </h6>
                                                            
                                                            <div class="flex items-start justify-between ltr:ml-auto rtl:mr-auto">
                                                                <a href="card.php?card=Master" class="btn btn-dark">Request</a>
                                                            </div>
                                                                                                                </div>
                                                    <div>
                                                        
                                                        
                                                        <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="font-size:14px">Mastercard <img src=".png" width="80px"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <br><br>
<link rel="stylesheet" href="{{asset('style.css')}}">
<center>
        <div class="card" style="color:white">
            <div class="card-inner">
                <div class="front">
                    <img src="https://i.ibb.co/PYss3yv/map.png" class="map-img">
                    <div class="row">
                       <img src="{{asset('dashboard/card/lite.png')}}" width="150px">
                        <img src=".png" width="60px">
                    </div>
                    <div class="row card-no">
                        <img src="https://i.ibb.co/G9pDnYJ/chip.png" width="60px">
                        <span style="margin-top:20px">
                        <p style="color:white"></p>
                        
                        </span>
                    </div>
                    <div class="row card-holder">
                        <p><span style="font-size:18px"><strong></strong></span></p>
                        <p>VALID TILL<br></p>
                    </div>
                    
                </div>
                <div class="back">
                    <img src="https://i.ibb.co/PYss3yv/map.png" class="map-img">
                    <div class="bar"></div>
                    <div class="row card-cvv">
                        <div>
                            <img src="https://i.ibb.co/S6JG8px/pattern.png">
                        </div>
                        <p style="height:30px; margin-top:15px; font-size:14px"><i></i></p>
                    </div>
                    <div class="row card-text">
                        <p style="color:white"> Prime Summit Bank bank issued and controls this virtual card, whose use is subject to the bank's terms and conditions.</p>
                    </div>
                    <div class="row signature">
                        <p>CUSTOMER SIGNATURE</p>
                        <img src=".png" width="80px">
                    </div>
                </div>
            </div>
        </div>
        </center><br><br>
    </div>
  </div>
</div>  
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        
                                                        <div class="flex items-start justify-between py-3">
                                                            <div class="flex-none ltr:mr-4 rtl:ml-4">
                                                                <img src="assets/images/card-visa.svg" alt="image" />
                                                            </div>
                                                            
                                                                                                                        <h6 class="text-[15px] font-bold text-[#515365] dark:text-white-dark">
                                                                Visa<span class="mt-1 block text-xs font-normal text-white-dark dark:text-white-light"
                                                                    >XXXX XXXX XXXX 5264</span
                                                                >
                                                            </h6>
                                                            <div class="flex items-start justify-between ltr:ml-auto rtl:mr-auto">
                                                                <a href="card.php?card=Visa" class="btn btn-dark">Request</a>
                                                            </div>
                                                                                                            </div>
                                               <!--- <button class="btn btn-primary">Add Payment Method</button>--->
                                            </div>
                                            
                                            
                                            
                                            
                        <div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title" style="font-size:14px">Visa <img src=".png" width="80px"></h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
      <br><br>
<link rel="stylesheet" href="{{asset('dashboard/card/style.css')}}">
<center>
        <div class="card" style="color:white">
            <div class="card-inner">
                <div class="front">
                    <img src="https://i.ibb.co/PYss3yv/map.png" class="map-img">
                    <div class="row">
                       <img src="lite.png" width="150px">
                        <img src=".png" width="60px">
                    </div>
                    <div class="row card-no">
                        <img src="https://i.ibb.co/G9pDnYJ/chip.png" width="60px">
                        <span style="margin-top:20px">
                        <p style="color:white"></p>
                        
                        </span>
                    </div>
                    <div class="row card-holder">
                        <p><span style="font-size:18px"><strong></strong></span></p>
                        <p>VALID TILL<br></p>
                    </div>
                    
                </div>
                <div class="back">
                    <img src="https://i.ibb.co/PYss3yv/map.png" class="map-img">
                    <div class="bar"></div>
                    <div class="row card-cvv">
                        <div>
                            <img src="https://i.ibb.co/S6JG8px/pattern.png">
                        </div>
                        <p style="height:30px; margin-top:15px; font-size:14px"><i></i></p>
                    </div>
                    <div class="row card-text">
                        <p style="color:white"> Prime Summit Bank bank issued and controls this virtual card, whose use is subject to the bank's terms and conditions.</p>
                    </div>
                    <div class="row signature">
                        <p>CUSTOMER SIGNATURE</p>
                        <img src=".png" width="80px">
                    </div>
                </div>
            </div>
        </div>
        </center><br><br>
    </div>
  </div>
</div>                       
                                            
                                            
                                            
                                            
                                            
                        <br><br>
                     
                    </div>
                    <!-- end main content section -->
                </div>
{{-- 
                <!-- start footer section -->
                <div class="mt-auto p-6 pt-0 text-center dark:text-white-dark ltr:sm:text-left rtl:sm:text-right">
                    © <span id="footer-year">2022</span>.  Prime Summit Bank  All rights reserved.
                </div>
                <!-- end footer section -->
            </div>
        </div>

        <script src="assets/js/alpine-collaspe.min.js"></script>
        <script src="assets/js/alpine-persist.min.js"></script>
        <script defer src="assets/js/alpine-ui.min.js"></script>
        <script defer src="assets/js/alpine-focus.min.js"></script>
        <script defer src="assets/js/alpine.min.js"></script>
        <script src="assets/js/custom.js"></script> --}}

        <script>
            document.addEventListener('alpine:init', () => {
                // main section
                Alpine.data('scrollToTop', () => ({
                    showTopButton: false,
                    init() {
                        window.onscroll = () => {
                            this.scrollFunction();
                        };
                    },

                    scrollFunction() {
                        if (document.body.scrollTop > 50 || document.documentElement.scrollTop > 50) {
                            this.showTopButton = true;
                        } else {
                            this.showTopButton = false;
                        }
                    },

                    goToTop() {
                        document.body.scrollTop = 0;
                        document.documentElement.scrollTop = 0;
                    },
                }));

                // theme customization
                Alpine.data('customizer', () => ({
                    showCustomizer: false,
                }));

                // sidebar section
                Alpine.data('sidebar', () => ({
                    init() {
                        const selector = document.querySelector('.sidebar ul a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.click();
                                    });
                                }
                            }
                        }
                    },
                }));

                // header section
                Alpine.data('header', () => ({
                    init() {
                        const selector = document.querySelector('ul.horizontal-menu a[href="' + window.location.pathname + '"]');
                        if (selector) {
                            selector.classList.add('active');
                            const ul = selector.closest('ul.sub-menu');
                            if (ul) {
                                let ele = ul.closest('li.menu').querySelectorAll('.nav-link');
                                if (ele) {
                                    ele = ele[0];
                                    setTimeout(() => {
                                        ele.classList.add('active');
                                    });
                                }
                            }
                        }
                    },

                    notifications: [
                        {
                            id: 1,
                            profile: 'user-profile.jpeg',
                            message: '<strong class="text-sm mr-1">John Doe</strong>invite you to <strong>Prototyping</strong>',
                            time: '45 min ago',
                        },
                        {
                            id: 2,
                            profile: 'profile-34.jpeg',
                            message: '<strong class="text-sm mr-1">Adam Nolan</strong>mentioned you to <strong>UX Basics</strong>',
                            time: '9h Ago',
                        },
                        {
                            id: 3,
                            profile: 'profile-16.jpeg',
                            message: '<strong class="text-sm mr-1">Anna Morgan</strong>Upload a file',
                            time: '9h Ago',
                        },
                    ],

                    messages: [
                        {
                            id: 1,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-success-light dark:bg-success text-success dark:text-success-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path></svg></span>',
                            title: 'Congratulations!',
                            message: 'Your OS has been updated.',
                            time: '1hr',
                        },
                        {
                            id: 2,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-info-light dark:bg-info text-info dark:text-info-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="16" x2="12" y2="12"></line><line x1="12" y1="8" x2="12.01" y2="8"></line></svg></span>',
                            title: 'Did you know?',
                            message: 'You can switch between artboards.',
                            time: '2hr',
                        },
                        {
                            id: 3,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-danger-light dark:bg-danger text-danger dark:text-danger-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></span>',
                            title: 'Something went wrong!',
                            message: 'Send Reposrt',
                            time: '2days',
                        },
                        {
                            id: 4,
                            image: '<span class="grid place-content-center w-9 h-9 rounded-full bg-warning-light dark:bg-warning text-warning dark:text-warning-light"><svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round">    <circle cx="12" cy="12" r="10"></circle>    <line x1="12" y1="8" x2="12" y2="12"></line>    <line x1="12" y1="16" x2="12.01" y2="16"></line></svg></span>',
                            title: 'Warning',
                            message: 'Your password strength is low.',
                            time: '5days',
                        },
                    ],

                    languages: [
                        {
                            id: 1,
                            key: 'Chinese',
                            value: 'zh',
                        },
                        {
                            id: 2,
                            key: 'Danish',
                            value: 'da',
                        },
                        {
                            id: 3,
                            key: 'English',
                            value: 'en',
                        },
                        {
                            id: 4,
                            key: 'French',
                            value: 'fr',
                        },
                        {
                            id: 5,
                            key: 'German',
                            value: 'de',
                        },
                        {
                            id: 6,
                            key: 'Greek',
                            value: 'el',
                        },
                        {
                            id: 7,
                            key: 'Hungarian',
                            value: 'hu',
                        },
                        {
                            id: 8,
                            key: 'Italian',
                            value: 'it',
                        },
                        {
                            id: 9,
                            key: 'Japanese',
                            value: 'ja',
                        },
                        {
                            id: 10,
                            key: 'Polish',
                            value: 'pl',
                        },
                        {
                            id: 11,
                            key: 'Portuguese',
                            value: 'pt',
                        },
                        {
                            id: 12,
                            key: 'Russian',
                            value: 'ru',
                        },
                        {
                            id: 13,
                            key: 'Spanish',
                            value: 'es',
                        },
                        {
                            id: 14,
                            key: 'Swedish',
                            value: 'sv',
                        },
                        {
                            id: 15,
                            key: 'Turkish',
                            value: 'tr',
                        },
                        {
                            id: 16,
                            key: 'Arabic',
                            value: 'ae',
                        },
                    ],

                    removeNotification(value) {
                        this.notifications = this.notifications.filter((d) => d.id !== value);
                    },

                    removeMessage(value) {
                        this.messages = this.messages.filter((d) => d.id !== value);
                    },
                }));

                // main content
                Alpine.data('knowledge', () => ({
                    items: [
                        {
                            src: 'assets/images/knowledge/image-5.jpg',
                            title: 'Excessive sugar is harmful',
                        },
                        {
                            src: 'assets/images/knowledge/image-6.jpg',
                            title: 'Creative Photography',
                        },
                        {
                            src: 'assets/images/knowledge/image-7.jpg',
                            title: 'Plan your next trip',
                        },
                        {
                            src: 'assets/images/knowledge/image-8.jpg',
                            title: 'My latest Vlog',
                        },
                    ],
                }));
            });
        </script>
    </body>

<!-- Mirrored from html. Prime Summit Bank .sbthemes.com/pages-knowledge-base.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 25 Dec 2024 15:16:07 GMT -->
</html>



@include('user.footer')
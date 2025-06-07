@include('user.header')
         

                
                <!-- end header section -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bills Payment</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        .bill-item:hover {
            background-color: #eee;
        }
        .dark .bill-item:hover {
            background-color: rgba(238, 238, 238, 0.1);
        }
        .bill-icon {
            font-size: 1.5rem;
            width: 50px;
            text-align: center;
        }
    </style>
</head>
<body class="dark:bg-gray-800">
    <div class="container p-6">
        <!-- Main content section -->
        <div>
            <ul class="flex space-x-2">
                <li>
                    <a href="#" class="text-primary hover:underline">Dashboard</a>
                </li>
                <li class="text-gray-500">/</li>
                <li>
                    <span>Bills</span>
                </li>
            </ul>

            <div class="pt-5">
                <!-- Modal -->
                <div class="modal fade" id="billPaymentModal" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="billModalTitle">Bill Payment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                You will receive a notification soon with detailed instructions on how to proceed with making your payment. Please keep an eye on your email or phone for further information. Thank you for your patience and cooperation.
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="button" class="btn btn-primary">Proceed to Payment</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="flex flex-col rounded-md border border-gray-200">
                        <!-- Bill Items -->
                        <div class="bill-item flex px-4 py-3 items-center" data-toggle="modal" data-target="#billPaymentModal" data-bill="Electricity Bill">
                            <div class="bill-icon text-yellow-500">
                                <i class="fas fa-bolt"></i>
                            </div>
                            <div class="flex-1 font-semibold">
                                <h6 class="mb-0">Electricity Bill</h6>
                            </div>
                        </div>
                        <hr class="my-0">

                        <div class="bill-item flex px-4 py-3 items-center" data-toggle="modal" data-target="#billPaymentModal" data-bill="Internet Bill">
                            <div class="bill-icon text-blue-500">
                                <i class="fas fa-wifi"></i>
                            </div>
                            <div class="flex-1 font-semibold">
                                <h6 class="mb-0">Internet Bill</h6>
                            </div>
                        </div>
                        <hr class="my-0">

                        <div class="bill-item flex px-4 py-3 items-center" data-toggle="modal" data-target="#billPaymentModal" data-bill="Car Insurance">
                            <div class="bill-icon text-red-500">
                                <i class="fas fa-car"></i>
                            </div>
                            <div class="flex-1 font-semibold">
                                <h6 class="mb-0">Car Insurance</h6>
                            </div>
                        </div>
                        <hr class="my-0">

                        <div class="bill-item flex px-4 py-3 items-center" data-toggle="modal" data-target="#billPaymentModal" data-bill="Health Insurance">
                            <div class="bill-icon text-green-500">
                                <i class="fas fa-heartbeat"></i>
                            </div>
                            <div class="flex-1 font-semibold">
                                <h6 class="mb-0">Health Insurance</h6>
                            </div>
                        </div>
                        <hr class="my-0">

                        <div class="bill-item flex px-4 py-3 items-center" data-toggle="modal" data-target="#billPaymentModal" data-bill="Television Subscription">
                            <div class="bill-icon text-purple-500">
                                <i class="fas fa-tv"></i>
                            </div>
                            <div class="flex-1 font-semibold">
                                <h6 class="mb-0">Television Subscription</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery and Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
    $(document).ready(function(){
        $('.bill-item').click(function(){
            var billType = $(this).data('bill');
            $('#billModalTitle').text(billType + ' Payment');
            $('.modal-body').html('You will receive a notification soon with detailed instructions on how to proceed with making your payment for <strong>' + billType + '</strong>. Please keep an eye on your email or phone for further information. Thank you for your patience and cooperation.');
        });
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
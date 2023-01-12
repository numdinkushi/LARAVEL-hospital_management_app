<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    @include('admin.css')
</head>

<body>
    <div class="container-scroller">
        <div class="row p-0 m-0 proBanner" id="proBanner">
            <div class="col-md-12 p-0 m-0">
                <div class="card-body card-body-padding d-flex align-items-center justify-content-between">
                    <div class="ps-lg-1">
                        <div class="d-flex align-items-center justify-content-between">
                            <p class="mb-0 font-weight-medium me-3 buy-now-text">Free 24/7 customer support, updates, and
                                more with this template!</p>
                            <a href="https://www.bootstrapdash.com/product/corona-free/?utm_source=organic&utm_medium=banner&utm_campaign=buynow_demo"
                                target="_blank" class="btn me-2 buy-now-btn border-0">Get Pro</a>
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between">
                        <a href="https://www.bootstrapdash.com/product/corona-free/"><i
                                class="mdi mdi-home me-3 text-white"></i></a>
                        <button id="bannerClose" class="btn border-0 p-0">
                            <i class="mdi mdi-close text-white me-0"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- partial:partials/_sidebar.html -->
        @include('admin.sidebar')
        <!-- partial -->
        @include('admin.navbar')

        <!-- partial -->
        <div class="container-fluid page-body-wrapper d-flex  justify-content-center" style="width: 100vw">
            <table class="table table-bordered">
                <thead>
                    <tr>

                        <th scope="col">Customer's name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone Number</th>
                        <th scope="col">Doctor's name</th>
                        <th scope="col">Date</th>
                        <th scope="col">Message</th>
                        <th scope="col">Status</th>
                        <th scope="col"> </th>
                        <th scope="col"> </th>
                        {{-- <th scope="col"> <a href="" class="btn btn-danger"> Cancel </a> </th> --}}
                        {{-- <th scope="col">Status</th> --}}

                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointmentDetails as $appointmentDetail)
                        <tr>
                            <td>{{ $appointmentDetail->name }}</td>
                            <td>{{ $appointmentDetail->email }}</td>
                            <td>{{ $appointmentDetail->phone }}</td>
                            <td>{{ $appointmentDetail->doctor }}</td>
                            <td>{{ $appointmentDetail->date }}</td>
                            <td>{{ $appointmentDetail->message }}</td>
                            <td>{{ $appointmentDetail->status }}</td>
                            <td> <a href="{{url('approve-appointment', $appointmentDetail->id)}}" class="btn btn-success" > Approve </a></td>
                            <td> <a href="{{url('reject-appointment', $appointmentDetail->id)}}" class="btn btn-danger"> Cancel</a></td>
                        </tr>
                    @endforeach

                </tbody>
            </table>
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="admin/assets/vendors/js/vendor.bundle.base.js"></script>
    @include('admin.script')
    <script src="admin/assets/js/dashboard.js"></script>
    <!-- End custom js for this page -->
</body>

</html>

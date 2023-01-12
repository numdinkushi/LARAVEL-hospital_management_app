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


        <div class="container-fluid page-body-wrapper d-flex  justify-content-center" style="width: 100vw">

            <div class=" d-flex flex-column  justify-content-center" style="padding-top:40px; padding-bottom:40px; width:80%">

                @if(session()->has('message'))
            <div class="alert alert-success">
                <button type="button" class="close" >
                        x
                </button>
                    {{session()->get('message')}}
            </div>
            @endif

                <form action="{{url('upload_doctor')}}" method="POST"  enctype="multipart/form-data" class="container-fluid d-flex flex-column flex-column
                 align-items-center" style="background-color: gray; " >
                    @csrf
                    <div class="d-flex flex-column col-md-8 justify-content-center" style=" padding:20px;" >
                        <label for="" style="margin-right: 10px; ">
                            Doctor's name
                        </label>
                        <input type="text" style="color: black" name="name" placeholder="enter doctor's name" required="">
                    </div>

                    <div class="d-flex flex-column col-md-8 " style=" padding:20px;" >
                        <label for="" style="margin-right: 10px; ">
                            Phone
                        </label>
                        <input type="number" style="color: black" name="number" placeholder="enter doctor's phone number" required="">
                    </div>

                    <div class="d-flex flex-column col-md-8 " style=" padding:20px;" >
                        <label for="" style="margin-right: 10px; ">
                            Specialty
                        </label>
                        <select name="specialty" id="" style="color: black" required="">

                            <option value="">---select---</option>
                            <option value="Dentist">Dentist</option>
                            <option value="Gaenacologist">Gaenacologist</option>
                            <option value="Ophtamologist">Ophtamologist</option>
                            <option value ="Neuro-surgeon">Neuro-surgeon</option>

                        </select>
                    </div>


                    <div class="d-flex flex-column col-md-8 " style=" padding:20px;" >
                        <label for="" style="margin-right: 10px; ">
                            Doctor's room number
                        </label>
                        <input type="number" style="color: black" name="room" placeholder="enter doctor's room" required="">
                    </div>

                    <div class="d-flex flex-column col-md-8 " style=" padding:20px;" >
                        <label for="" style="margin-right: 10px; ">
                            Doctor's Image
                        </label>
                        <input type="file" style="color: black" name="file" placeholder="set doctor's image" required="">
                    </div>

                    <div class="d-flex flex-column col-md-8 " style=" padding:20px;" >

                        <input type="submit" style="color: black;  " class="btn btn-success filled"  placeholder="enter doctor's name" required="">
                    </div>
                </form>
            </div>
        </div>
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

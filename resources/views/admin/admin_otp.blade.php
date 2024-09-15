<!DOCTYPE html>
<html lang="en">

<head>
    <title>Mentor - Bootstrap 4 Admin Dashboard Template</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="Admin template that can be used to build dashboards for CRM, CMS, etc." />
    <meta name="author" content="Potenza Global Solutions" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- app favicon -->
    <link rel="shortcut icon" href="admin_assets/img/favicon.ico">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="admin_assets/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="admin_assets/css/style.css" />

    <style>
        .alert.alert-danger,
        .alert.alert-success {
            opacity: 0;
            animation: slideIn 0.5s forwards;
            font-weight: 700;
        }

        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(-50px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .form-control:focus {
            box-shadow: none !important;
            border: 2px solid #8e54e9 !important;
        }

        .form-control {
            font-size: 20px !important;
        }
        input::placeholder{
            font-size: 15px !important;
            margin-top: 0px !important;
        }
    </style>
</head>

<body class="bg-white">
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img src="admin_assets/img/loader/loader.svg" alt="loader">
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->

            <!--start login contant-->
            <div class="app-contant">
                <div class="bg-white">
                    <div class="container-fluid p-0">
                        <div class="row no-gutters">
                            <div class="col-sm-6 col-lg-5 col-xxl-3  align-self-center order-2 order-sm-1">
                                <div class="d-flex align-items-center h-100-vh">
                                    <div class="login p-50">
                                        <h1 class="mb-2">VMAE Admin</h1>
                                        <p>Welcome back, Please Enter OTP To Forgot Your Password.</p>
                                        <form action="/otp-verify" class="mt-3 mt-sm-5" method="POST">
                                            @csrf
                                            @if (session('success'))
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        Swal.fire({
                                                            icon: 'success',
                                                            title: 'Success!',
                                                            text: "{{ session('success') }}",
                                                            showConfirmButton: true
                                                        });
                                                    });
                                                </script>
                                            @endif

                                            @if (session('error'))
                                                <script>
                                                    document.addEventListener("DOMContentLoaded", function() {
                                                        Swal.fire({
                                                            icon: 'error',
                                                            title: 'Error!',
                                                            text: "{{ session('error') }}",
                                                            showConfirmButton: true
                                                        });
                                                    });
                                                </script>
                                            @endif
                                            <!-- General response message area, if needed -->
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">OTP*</label>
                                                        <div class="d-flex">
                                                            <input type="text" class="form-control text-center" name="otp" maxlength="6" placeholder="Please Enter Valid OTP" autofocus>
                                                            {{-- <input type="text" class="form-control text-center mx-2" name="otp2" maxlength="1" pattern="[A-Za-z0-9]" title="Enter a character" oninput="moveFocus(this, 'otp3')">
                                                            <input type="text" class="form-control text-center" name="otp3" maxlength="1" pattern="[A-Za-z0-9]" title="Enter a character" oninput="moveFocus(this, 'otp4')">
                                                            <input type="text" class="form-control text-center mx-2" name="otp4" maxlength="1" pattern="[A-Za-z0-9]" title="Enter a character" oninput="moveFocus(this, 'otp5')">
                                                            <input type="text" class="form-control text-center" name="otp5" maxlength="1" pattern="[A-Za-z0-9]" title="Enter a character" oninput="moveFocus(this, 'otp6')">
                                                            <input type="text" class="form-control text-center mx-2" name="otp6" maxlength="1" pattern="[A-Za-z0-9]" title="Enter a character" oninput="moveFocus(this, '')"> --}}
                                                        </div>
                                                        {{-- <script>
                                                            function moveFocus(current, next) {
                                                                if (current.value.length >= current.maxLength && next) {
                                                                    document.getElementsByName(next)[0].focus();
                                                                }
                                                            }
                                                        </script> --}}
                                                        @error('otp')
                                                            <div class="alert alert-danger">
                                                                {{ $message }}
                                                            </div>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="col-12 mt-3">
                                                    <button type="submit" class="btn btn-primary text-uppercase">Submit
                                                        OTP</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xxl-9 col-lg-7 bg-gradient o-hidden order-1 order-sm-2">
                                <div class="row align-items-center h-100">
                                    <div class="col-7 mx-auto ">
                                        <img class="img-fluid" src="admin_assets/img/bg/login.svg" alt="">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--end login contant-->
        </div>
        <!-- end app-wrap -->
    </div>
    <!-- end app -->

    <!-- plugins -->
    <script src="admin_assets/js/vendors.js"></script>

    <!-- custom app -->
    <script src="admin_assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>

</html>

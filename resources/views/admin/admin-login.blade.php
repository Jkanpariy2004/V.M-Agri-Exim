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
                                        <p>Welcome back, please login to your account.</p>
                                        <form id="loginForm" class="mt-3 mt-sm-5">
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
                                            @csrf
                                            <!-- General response message area, if needed -->
                                            <div id="responseMessage" class="alert alert-success d-none"></div>
                                            <div id="responseMessageError" class="alert alert-danger d-none"></div>
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Email*</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-envelope"></i></span>
                                                            </div>
                                                            <input type="email" class="form-control"
                                                                placeholder="Email" name="email" autocomplete="off" />
                                                        </div>
                                                        <div class="alert alert-danger d-none" id="emailError"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="form-group">
                                                        <label class="control-label">Password*</label>
                                                        <div class="input-group">
                                                            <div class="input-group-prepend">
                                                                <span class="input-group-text"><i
                                                                        class="fas fa-lock"></i></span>
                                                            </div>
                                                            <input type="password" class="form-control"
                                                                placeholder="Password" name="password" id="password"
                                                                autocomplete="off" />
                                                            <div class="input-group-append">
                                                                <button class="btn btn-outline-primary" type="button"
                                                                    id="togglePassword">
                                                                    <i class="fas fa-eye"></i>
                                                                </button>
                                                            </div>
                                                        </div>
                                                        <div class="alert alert-danger d-none" id="passwordError"></div>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-block d-sm-flex  align-items-center">
                                                        <a href="/forgot-password" class="ml-auto">Forgot
                                                            Password ?</a>
                                                    </div>
                                                </div>
                                                <div class="col-12 mt-3">
                                                    <button type="submit" class="btn btn-primary text-uppercase">Sign
                                                        In</button>
                                                </div>
                                            </div>
                                        </form>
                                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                                        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                        <script>
                                            $(document).ready(function() {
                                                $('#loginForm').on('submit', function(e) {
                                                    e.preventDefault(); // Prevent default form submission

                                                    // Clear previous error messages
                                                    $('.alert-danger').addClass('d-none').text('');
                                                    $('#responseMessage').addClass('d-none').text('');

                                                    $.ajax({
                                                        type: 'POST',
                                                        url: '/login-submit',
                                                        data: $(this).serialize(),
                                                        success: function(response) {
                                                            Swal.fire({
                                                                icon: 'success',
                                                                title: 'Success!',
                                                                text: response.success,
                                                                timer: 3000,
                                                                timerProgressBar: true,
                                                                showConfirmButton: true
                                                            }).then(() => {
                                                                window.location.href = '/admin-dashboard';
                                                            });
                                                        },
                                                        error: function(xhr) {
                                                            let errors = xhr.responseJSON.errors;

                                                            // Display general error message if exists
                                                            if (xhr.responseJSON.error) {
                                                                Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Error!',
                                                                    text: xhr.responseJSON.error,
                                                                    showConfirmButton: true
                                                                });
                                                            }

                                                            // Iterate through errors and display them in the corresponding input field
                                                            $.each(errors, function(key, value) {
                                                                let errorField = $('#' + key + 'Error');
                                                                let inputField = $('input[name="' + key + '"]');
                                                                errorField.removeClass('d-none').text(value[
                                                                    0]); // Display first error message
                                                                inputField.addClass(
                                                                    'is-invalid'); // Add class to show error styling
                                                            });

                                                            // Handle cases where there are no specific field errors but a general error
                                                            if ($.isEmptyObject(errors)) {
                                                                Swal.fire({
                                                                    icon: 'error',
                                                                    title: 'Error!',
                                                                    text: xhr.responseJSON.error ||
                                                                        'Invalid login credentials.',
                                                                    showConfirmButton: true
                                                                });
                                                            }
                                                        }
                                                    });
                                                });
                                            });
                                            $(document).ready(function() {
                                                const passwordField = $('#password');
                                                passwordField.attr('type', 'password'); // Change to 'text' to show password by default
                                                $('#togglePassword').find('i').removeClass('fa-eye').addClass(
                                                    'fa-eye-slash'); // Change icon to 'eye-slash'

                                                $('#togglePassword').on('click', function() {
                                                    const type = passwordField.attr('type') === 'password' ? 'text' : 'password';
                                                    passwordField.attr('type', type);
                                                    $(this).find('i').toggleClass('fa-eye fa-eye-slash');
                                                });
                                            });
                                        </script>

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

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
    <!-- data table -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- data table -->

    <!-- alert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.all.min.js"></script>

    <style>
        .table-border {
            border: 1px solid black;
        }

        .table-border {
            border: 2px solid black;
            color: black;
        }

        #contact-table {
            border-collapse: collapse;
        }

        #contact-table th,
        #contact-table td {
            border: 1px solid black;
            color: black;
        }

        .sned-mail-btn {
            width: 100%;
            color: white;
            background: #8e54e9;
            border: 0;
            padding: 7px;
            transition: 0.4s;
            border-radius: 4px;
            font-size: 17px;
            outline: none;
            cursor: pointer;
        }

        button:focus {
            outline: 1px dotted;
            outline: none;
        }

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

        .animated-checkbox {
            width: 20px;
            height: 20px;
            cursor: pointer;
            position: relative;
            appearance: none;
            background-color: #fff;
            border: 2px solid #007bff;
            border-radius: 3px;
            transition: background-color 0.2s ease, border-color 0.2s ease;
        }

        .animated-checkbox:checked {
            background-color: #007bff;
            border-color: #007bff;
            animation: checkbox-bounce 0.3s ease;
        }

        .animated-checkbox:checked::after {
            content: '\2713';
            /* Unicode for checkmark */
            font-size: 14px;
            color: #fff;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        @keyframes checkbox-bounce {
            0% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.2);
            }

            100% {
                transform: scale(1);
            }
        }
    </style>
</head>

<body>
    <!-- begin app -->
    <div class="app">
        <!-- begin app-wrap -->
        <div class="app-wrap">
            <!-- begin pre-loader -->
            <div class="loader">
                <div class="h-100 d-flex justify-content-center">
                    <div class="align-self-center">
                        <img alt="loader" src="admin_assets/img/loader/loader.svg" />
                    </div>
                </div>
            </div>
            <!-- end pre-loader -->
            <!-- begin app-header -->
            @include('admin.header')
            <!-- end app-header -->
            <!-- begin app-container -->
            <div class="app-container">
                <!-- begin app-nabar -->
                @include('admin.sidenavbar')
                <!-- end app-navbar -->
                <!-- begin app-main -->
                <div class="app-main" id="main">
                    <!-- begin container-fluid -->
                    <div class="container-fluid">
                        <!-- begin row -->
                        <div class="row">
                            <div class="col-md-12 m-b-30">
                                <!-- begin page title -->
                                <div class="d-block d-sm-flex flex-nowrap align-items-center">
                                    <div class="page-title mb-2 mb-sm-0">
                                        <h1>SEO Details</h1>
                                    </div>
                                    <div class="ml-auto d-flex align-items-center">
                                        <nav>
                                            <ol class="breadcrumb p-0 m-b-0">
                                                <li class="breadcrumb-item">
                                                    <a href="index">
                                                        <i class="ti ti-home"></i>
                                                    </a>
                                                </li>
                                                <li aria-current="page" class="breadcrumb-item active text-primary">
                                                    SEO
                                                </li>
                                            </ol>
                                        </nav>
                                    </div>
                                </div>
                                <!-- end page title -->
                            </div>
                        </div>
                        <!-- end row -->
                        <!--mail-read-contant-start-->
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-statistics p-3 rounded">
                                    <div class="table-border p-3 rounded">
                                        @if(session('success'))
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

                                        @if(session('error'))
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

                                        <form id="bulk-delete-form" action="{{ url('/bulk-delete-seo') }}" method="POST">
                                            @csrf
                                            <div style="display: flex;">
                                                <div style="width: 50%; text-align: left;">
                                                    <h3>SEO Details</h3>
                                                </div>
                                                <div style="width: 50%; text-align: right;">
                                                    <button type="button" class="btn btn-danger mb-2" id="bulk-delete-btn" disabled>
                                                        <i class="fas fa-trash-alt"></i> Bulk Delete
                                                    </button>
                                                    <a href="/add-seo" class="btn btn-outline-primary mb-2">
                                                        <i class="fa-solid fa-plus mr-2"></i>Add More
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="contact-table" class="table table-hover table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th><input type="checkbox" id="select-all" class="animated-checkbox"></th>
                                                            <th>No.</th>
                                                            <th>Keywords</th>
                                                            <th>Description</th>
                                                            <th>Action</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $no = 1; ?>
                                                    <tbody>
                                                        @foreach($seoSettings as $seo)
                                                        <tr>
                                                            <td><input type="checkbox" name="ids[]" class="select-item animated-checkbox" value="{{ $seo->id }}"></td>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $seo->keywords }}</td>
                                                            <td>{{ $seo->description }}</td>
                                                            <td>
                                                                <a href="{{ url('/edit-seo', $seo->id) }}" class="btn btn-primary">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>
                                                                <a href="{{ url('/delete-seo', $seo->id) }}" class="btn btn-danger delete-btn" data-id="{{ $seo->id }}">
                                                                    <i class="fas fa-trash-alt"></i> Delete
                                                                </a>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                        </form>
                                    </div>
                                </div>

                                <script>
                                    document.addEventListener("DOMContentLoaded", function() {
                                        const selectAll = document.getElementById('select-all');
                                        const checkboxes = document.querySelectorAll('.select-item');
                                        const bulkDeleteBtn = document.getElementById('bulk-delete-btn');
                                        const bulkDeleteForm = document.getElementById('bulk-delete-form');

                                        selectAll.addEventListener('change', function() {
                                            checkboxes.forEach(function(checkbox) {
                                                checkbox.checked = selectAll.checked;
                                            });
                                            bulkDeleteBtn.disabled = !selectAll.checked;
                                        });

                                        checkboxes.forEach(function(checkbox) {
                                            checkbox.addEventListener('change', function() {
                                                const allChecked = Array.from(checkboxes).every(checkbox => checkbox.checked);
                                                selectAll.checked = allChecked;
                                                bulkDeleteBtn.disabled = !Array.from(checkboxes).some(checkbox => checkbox.checked);
                                            });
                                        });

                                        bulkDeleteBtn.addEventListener('click', function() {
                                            if (Array.from(checkboxes).some(checkbox => checkbox.checked)) {
                                                Swal.fire({
                                                    title: 'Are you sure?',
                                                    text: "You won't be able to revert this!",
                                                    icon: 'warning',
                                                    showCancelButton: true,
                                                    confirmButtonColor: '#3085d6',
                                                    cancelButtonColor: '#d33',
                                                    confirmButtonText: 'Yes, delete it!'
                                                }).then((result) => {
                                                    if (result.isConfirmed) {
                                                        bulkDeleteForm.submit();
                                                    }
                                                });
                                            }
                                        });
                                    });
                                </script>

                            </div>
                        </div>
                    </div>

                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Event delegation to handle the click event on delete buttons
                            document.body.addEventListener('click', function(e) {
                                if (e.target && e.target.closest('.delete-btn')) {
                                    e.preventDefault(); // Prevent the default action of the link

                                    const deleteUrl = e.target.closest('.delete-btn').getAttribute('href'); // Get the delete URL

                                    Swal.fire({
                                        icon: 'warning',
                                        title: 'Are you sure?',
                                        text: "You won't be able to revert this!",
                                        showCancelButton: true,
                                        confirmButtonColor: '#3085d6',
                                        cancelButtonColor: '#d33',
                                        confirmButtonText: 'Yes, delete it!'
                                    }).then((result) => {
                                        if (result.isConfirmed) {
                                            // If confirmed, redirect to the delete URL
                                            window.location.href = deleteUrl;
                                        }
                                    });
                                }
                            });
                        });
                    </script>

                    <script>
                        $(document).ready(function() {
                            $('#contact-table').DataTable({
                                "destroy": true
                            });
                        });
                    </script>
                    <!--mail-read-contant-end-->
                </div>
                <!-- end container-fluid -->
            </div>
            <!-- end app-main -->
        </div>
        <!-- end app-container -->
        <!-- begin footer -->
        <footer class="footer">
            <div class="row">
                <div class="col-12 col-sm-6 text-center text-sm-left">
                    <p>&copy; Copyright 2019. All rights reserved.</p>
                </div>
                <div class="col  col-sm-6 ml-sm-auto text-center text-sm-right">
                    <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
                </div>
            </div>
        </footer>
        <!-- end footer -->
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
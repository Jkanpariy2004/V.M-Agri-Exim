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
    <style>
        .table-border {
            border: 1px solid black;
        }

        .table-border {
            border: 2px solid black;
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

        .ck.ck-editor__editable_inline>:last-child {
            margin-bottom: var(--ck-spacing-large);
            height: 200px;
        }

        .table .table {
            background: none;
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
                                        <h1>Blog</h1>
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
                                                    Blog
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

                        <script>
                            $(document).ready(function() {
                                $('#contact-table').DataTable({
                                    "destroy": true
                                });
                            });
                        </script>

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

                                        <form id="bulk-delete-form" action="{{ url('/bulk-delete-blog') }}" method="POST">
                                            @csrf
                                            <div style="display: flex;">
                                                <div style="width: 50%; text-align: left;">
                                                    <h3>Blog Details</h3>
                                                </div>
                                                <div style="width: 50%; text-align: right;">
                                                    <button type="button" class="btn btn-danger mb-2" id="bulk-delete-btn" disabled>
                                                        <i class="fas fa-trash-alt"></i> Bulk Delete
                                                    </button>
                                                    <a href="/add-blog" class="btn btn-outline-primary mb-2">
                                                        <i class="fa-solid fa-plus mr-2"></i>Add Blog
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="table-responsive">
                                                <table id="contact-table" class="table table-hover table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th><input type="checkbox" id="select-all" class="animated-checkbox"></th>
                                                            <th>No.</th>
                                                            <th>Title</th>
                                                            <th>Category</th>
                                                            <th>Content</th>
                                                            <th>Image</th>
                                                            <th>Date</th>
                                                            <th>Edit</th>
                                                            <th>Delete</th>
                                                        </tr>
                                                    </thead>
                                                    <?php $no = 1; ?>
                                                    <tbody>
                                                        @foreach($blogs as $blog)
                                                        <tr>
                                                            <td><input type="checkbox" name="ids[]" class="select-item animated-checkbox" value="{{ $blog->id }}"></td>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $blog->title }}</td>
                                                            <td>{{ $blog->category }}</td>
                                                            <td>{!! nl2br(preg_replace('/((?:\S+\s+){15}\S+)(?=\s|$)/', '$1<br>', $blog->content)) !!}</td>
                                                            <td>
                                                                <img src="{{ asset('images/blog/' . $blog->image) }}" class="rounded-circle" alt="Blog Image" height="50" width="50" data-toggle="modal" data-target="#imageModal{{ $blog->id }}" style="cursor: pointer;">

                                                                <!-- Image Modal -->
                                                                <div class="modal fade" id="imageModal{{ $blog->id }}" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel{{ $blog->id }}" aria-hidden="true">
                                                                    <div class="modal-dialog modal-dialog-centered modal-lg">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="imageModalLabel{{ $blog->id }}">{{ Str::words($blog->title, 10) }}</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <img src="{{ asset('images/blog/' . $blog->image) }}" class="img-fluid w-100" alt="Blog Image" style="max-height: 80vh; object-fit: contain;">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </td>
                                                            <td>{{ $blog->date }}</td>
                                                            <td>
                                                                <a href="/edit-blog/{{ $blog->id }}" class="btn btn-primary">
                                                                    <i class="fas fa-edit"></i> Edit
                                                                </a>
                                                            </td>
                                                            <td>
                                                                <button type="button" class="btn btn-danger" onclick="confirmDelete('{{ $blog->id }}')">
                                                                    <i class="fas fa-trash-alt"></i> Delete
                                                                </button>
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                        </form>
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

                                        function confirmDelete(blogId) {
                                            Swal.fire({
                                                title: 'Are you sure?',
                                                text: "You won't be able to revert this!",
                                                icon: 'warning',
                                                showCancelButton: true,
                                                confirmButtonColor: '#3085d6',
                                                cancelButtonColor: '#d33',
                                                confirmButtonText: 'Yes, delete it!',
                                                cancelButtonText: 'No, cancel!'
                                            }).then((result) => {
                                                if (result.isConfirmed) {
                                                    // Redirect to delete route
                                                    window.location.href = '/delete-blog/' + blogId;
                                                }
                                            });
                                        }
                                    </script>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
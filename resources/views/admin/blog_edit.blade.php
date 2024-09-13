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
    <link rel="shortcut icon" href="/admin_assets/img/favicon.ico">
    <!-- google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <!-- font awsome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" />
    <!-- plugin stylesheets -->
    <link rel="stylesheet" type="text/css" href="/admin_assets/css/vendors.css" />
    <!-- app style -->
    <link rel="stylesheet" type="text/css" href="/admin_assets/css/style.css" />
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
                        <img alt="loader" src="/admin_assets/img/loader/loader.svg" />
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
                                    <div class="text-center">
                                        <h3>Write a Blog</h3>
                                    </div>
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
                                    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                    <form method="POST" action="{{$url}}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="title">Blog Title:</label>
                                            <input type="text" class="form-control" id="title" name="title" value="{{$new->title}}" placeholder="Enter blog title">
                                            @error('title')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="category">Category:</label>
                                            <select class="form-control" id="category" name="category">
                                                <option value="" hidden>Select a category</option>
                                                <option value="import" {{ $new->category == 'import' ? 'selected' : '' }}>Import</option>
                                                <option value="export" {{ $new->category == 'export' ? 'selected' : '' }}>Export</option>
                                                <option value="logistics" {{ $new->category == 'logistics' ? 'selected' : '' }}>Logistics</option>
                                                <option value="regulations" {{ $new->category == 'regulations' ? 'selected' : '' }}>Regulations</option>
                                            </select>
                                            @error('category')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="content">Blog Content:</label>
                                            <textarea class="form-control" id="content" name="content" placeholder="Write your blog post here">{{$new->content}}</textarea>
                                            @error('content')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="blog_image">Blog Image:</label>
                                            <div id="drop_zone" class="border-dashed p-5 text-center" style="border: 2px dashed gray; border-radius: 10px; cursor: pointer;">
                                                <i class="fas fa-cloud-upload-alt fa-3x mb-3" style="color: #8e54e9; font-size: 10rem;"></i>
                                                <p>Drag & Drop your image here or click anywhere to select a file</p>
                                                <div id="file_name" class="mt-2"></div>
                                                <div id="image_preview" class="mt-3 text-center"></div>
                                            </div>
                                            <input type="file" class="form-control d-none" id="blog_image" name="blog_image" accept="image/*">
                                            @error('blog_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <script>
                                            const dropZone = document.getElementById('drop_zone');
                                            const fileInput = document.getElementById('blog_image');
                                            const fileNameDisplay = document.getElementById('file_name');
                                            const imagePreview = document.getElementById('image_preview');

                                            dropZone.addEventListener('click', () => {
                                                fileInput.click();
                                            });

                                            dropZone.addEventListener('dragover', (e) => {
                                                e.preventDefault();
                                                dropZone.classList.add('bg-light');
                                            });

                                            dropZone.addEventListener('dragleave', () => {
                                                dropZone.classList.remove('bg-light');
                                            });

                                            dropZone.addEventListener('drop', (e) => {
                                                e.preventDefault();
                                                dropZone.classList.remove('bg-light');
                                                fileInput.files = e.dataTransfer.files;
                                                updateFileInfo();
                                            });

                                            fileInput.addEventListener('change', updateFileInfo);

                                            function updateFileInfo() {
                                                if (fileInput.files.length > 0) {
                                                    const file = fileInput.files[0];
                                                    fileNameDisplay.textContent = `Selected file: ${file.name}`;

                                                    // Show image preview
                                                    if (file.type.startsWith('image/')) {
                                                        const reader = new FileReader();
                                                        reader.onload = (e) => {
                                                            imagePreview.innerHTML = `
                                                                <div class="position-relative">
                                                                    <img src="${e.target.result}" alt="Preview" style="max-width: 300px; max-height: 300px;">
                                                                    <button type="button" class="btn btn-danger btn-sm position-absolute" style="top: 5px; right: 5px;" onclick="removeImage()">
                                                                        <i class="fas fa-times"></i>
                                                                    </button>
                                                                </div>`;
                                                        };
                                                        reader.readAsDataURL(file);
                                                    } else {
                                                        imagePreview.innerHTML = '';
                                                    }
                                                } else {
                                                    fileNameDisplay.textContent = '';
                                                    imagePreview.innerHTML = '';
                                                }
                                            }

                                            function removeImage() {
                                                fileInput.value = '';
                                                fileNameDisplay.textContent = '';
                                                imagePreview.innerHTML = '';
                                            }
                                        </script>
                                        <img src="{{ asset('images/blog/' . $new->image) }}" alt="{{ $new->title }}" style="width: 300px; height: 200px; margin-bottom: 10px;">
                                        <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
                                        <script>
                                            ClassicEditor
                                                .create(document.querySelector('#content'))
                                                .catch(error => {
                                                    console.error(error);
                                                });
                                        </script>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-paper-plane mr-2"></i>Update Blog</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card card-statistics p-3 rounded">
                                    <div class="table-border p-3 rounded">
                                        <div class="table-responsive">
                                            @if(session('d_success'))
                                            <script>
                                                document.addEventListener("DOMContentLoaded", function() {
                                                    Swal.fire({
                                                        icon: 'success',
                                                        title: 'Success!',
                                                        text: "{{ session('d_success') }}",
                                                        showConfirmButton: true
                                                    });
                                                });
                                            </script>
                                            @endif

                                            @if(session('d_error'))
                                            <script>
                                                document.addEventListener("DOMContentLoaded", function() {
                                                    Swal.fire({
                                                        icon: 'error',
                                                        title: 'Error!',
                                                        text: "{{ session('d_error') }}",
                                                        showConfirmButton: true
                                                    });
                                                });
                                            </script>
                                            @endif
                                            <table id="contact-table" class="table table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Title</th>
                                                        <th>Category</th>
                                                        <th>Content</th>
                                                        <th>Image</th>
                                                        <th>Date</th>
                                                    </tr>
                                                </thead>
                                                <?php $no = 1; ?>
                                                <tbody>
                                                    @foreach($blogs as $blog)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $blog->title }}</td>
                                                        <td>{{ $blog->category }}</td>
                                                        <td>{!! $blog->content !!}</td>
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
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
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
    <script src="/admin_assets/js/vendors.js"></script>

    <!-- custom app -->
    <script src="/admin_assets/js/app.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</body>


</html>
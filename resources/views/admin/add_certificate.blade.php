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
                                        <h1>Certificate</h1>
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
                                                    Certificate
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
                                        <h3>Add Certificate</h3>
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
                                    <form id="certificateForm" action="/insert-certificate" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="certificate_name">Certificate Name:</label>
                                            <input type="text" class="form-control" id="certificate_name" name="certificate_name" placeholder="Please Enter Certificate Name" value="{{ old('certificate_name') }}">
                                            @error('certificate_name')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="certificate_image">Certificate Image:</label>
                                            <div id="drop_zone" class="border-dashed p-5 text-center" style="border: 2px dashed gray; border-radius: 10px; cursor: pointer;">
                                                <i class="fas fa-image fa-3x mb-3" style="color: #8e54e9; font-size: 10rem;"></i>
                                                <p>Drag & Drop your image here or click to upload</p>
                                                <div id="file_name" class="mt-2"></div>
                                                <div id="image_preview" class="mt-3 text-center"></div>
                                            </div>
                                            <input type="file" class="form-control d-none" id="certificate_image" name="certificate_image" accept="image/*">
                                            @error('certificate_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <script>
                                            const dropZone = document.getElementById('drop_zone');
                                            const fileInput = document.getElementById('certificate_image');
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
                                        <div class="form-group">
                                            <label for="certificate_description">Certificate Description:</label>
                                            <textarea class="form-control" id="certificate_description" name="certificate_description" rows="6" placeholder="Please Enter Certificate Description">{{ old('certificate_description') }}</textarea>
                                            @error('certificate_description')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
                                        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
                                        <script>
                                            $(document).ready(function() {
                                                $('#certificate_description').summernote({
                                                    placeholder: 'Write your Certificate details here...',
                                                    height: 200, // set the height of the editor
                                                    toolbar: [
                                                        ['style', ['style']],
                                                        ['font', ['italic', 'bold', 'underline', 'clear']],
                                                        ['fontname', ['fontname']],
                                                        ['color', ['color']],
                                                        ['para', ['ul', 'ol', 'paragraph']],
                                                        ['insert', ['link', 'picture', 'video']]
                                                    ],
                                                    fontNames: ['Avenir', 'Arial', 'Helvetica', 'Comic Sans MS', 'Courier New'], // Include Avenir if available
                                                    fontNamesIgnoreCheck: ['Avenir'], // Ensure Avenir is used even if not found in default fonts
                                                    callbacks: {
                                                        onImageUpload: function(files) {
                                                            // Handle image uploads (if needed)
                                                        }
                                                    }
                                                });
                                            });
                                        </script>
                                        <div class="text-center">
                                            <button type="submit" class="sned-mail-btn">Submit</button>
                                        </div>
                                    </form>
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
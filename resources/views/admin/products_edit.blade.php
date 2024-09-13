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
                                        <h1>Products</h1>
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
                                                    Products
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
                                        <h3>Update Vegitables Details</h3>
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
                                    <form method="POST" action="{{ $url }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group">
                                            <label for="name">Product Name:</label>
                                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter product name" value="{{ $new->name }}">
                                            @error('name')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="description">Product Description:</label>
                                            <textarea class="form-control" id="description" name="description" placeholder="Write your product description here">{{ $new->description }}</textarea>
                                            @error('description')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="product_hs_code">Product HS Code:</label>
                                            <input type="text" class="form-control" id="product_hs_code" name="product_hs_code" value="{{ $new->product_hs_code }}" placeholder="Enter product HS code">
                                            @error('product_hs_code')
                                            <div class="alert alert-danger">
                                                {{ $message }}
                                            </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label for="bg_image">Product Background Image:</label>
                                            <div id="bg_drop_zone" class="border-dashed p-5 text-center" style="border: 2px dashed gray; border-radius: 10px; cursor: pointer;">
                                                <i class="fas fa-image fa-3x mb-3" style="color: #8e54e9; font-size: 10rem;"></i>
                                                <p>Drag & Drop your image here or click anywhere to select a file</p>
                                                <div id="bg_file_name" class="mt-2"></div>
                                                <div id="bg_image_preview" class="mt-3 text-center"></div>
                                            </div>
                                            <input type="file" class="form-control d-none" id="bg_image" name="bg_image" accept="image/*">
                                            @error('bg_image')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <img src="{{ asset('images/products/' . $new->bg_image) }}" alt="Product Background Image" style="max-height: 100px; max-width: 100px;">

                                        <div class="form-group">
                                            <label for="other_image">Product Other Images:</label>
                                            <div id="other_drop_zone" class="border-dashed p-5 text-center" style="border: 2px dashed gray; border-radius: 10px; cursor: pointer;">
                                                <i class="fas fa-image fa-3x mb-3" style="color: #8e54e9; font-size: 10rem;"></i>
                                                <p>Drag & Drop your images here or click anywhere to select files</p>
                                                <div id="other_file_name" class="mt-2"></div>
                                                <div id="other_image_preview" class="mt-3 text-center"></div>
                                            </div>
                                            <input type="file" class="form-control d-none" id="other_image" name="other_image[]" accept="image/*" multiple>
                                            @error('other_image.*')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        @php $otherImages = json_decode($new->other_image); @endphp
                                        @if($otherImages)
                                        <div class="gallery mb-3">
                                            @foreach($otherImages as $image)
                                            <img src="{{ asset('images/products/' . $image) }}" alt="Product Other Image" style="max-height: 100px; max-width: 100px;">
                                            @endforeach
                                        </div>
                                        @endif

                                        <script>
                                            function setupImageUpload(dropZoneId, fileInputId, fileNameId, imagePreviewId) {
                                                const dropZone = document.getElementById(dropZoneId);
                                                const fileInput = document.getElementById(fileInputId);
                                                const fileNameDisplay = document.getElementById(fileNameId);
                                                const imagePreview = document.getElementById(imagePreviewId);

                                                dropZone.addEventListener('click', () => fileInput.click());

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
                                                    updateFileInfo(fileInput, fileNameDisplay, imagePreview);
                                                });

                                                fileInput.addEventListener('change', () => updateFileInfo(fileInput, fileNameDisplay, imagePreview));

                                                function updateFileInfo(input, nameDisplay, preview) {
                                                    if (input.files.length > 0) {
                                                        nameDisplay.textContent = `Selected files:`;
                                                        preview.innerHTML = ''; // Clear previous previews
                                                        Array.from(input.files).forEach(file => {
                                                            if (file.type.startsWith('image/')) {
                                                                const reader = new FileReader();
                                                                reader.onload = (e) => {
                                                                    preview.innerHTML += `
                                                                        <div class="position-relative">
                                                                            <img src="${e.target.result}" alt="Preview" style="max-width: 300px; max-height: 300px;">
                                                                            <button type="button" class="btn btn-danger btn-sm position-absolute" style="top: 5px; right: 5px;" onclick="removeImage('${fileInputId}', '${nameDisplay.id}', '${imagePreviewId}', '${file.name}')">
                                                                                <i class="fas fa-times"></i>
                                                                            </button>
                                                                        </div>`;
                                                                };
                                                                reader.readAsDataURL(file);
                                                            }
                                                        });
                                                    } else {
                                                        nameDisplay.textContent = '';
                                                        preview.innerHTML = '';
                                                    }
                                                }
                                            }

                                            function removeImage(inputId, nameId, previewId, fileName) {
                                                const input = document.getElementById(inputId);
                                                const nameDisplay = document.getElementById(nameId);
                                                const preview = document.getElementById(previewId);

                                                const filesArray = Array.from(input.files).filter(file => file.name !== fileName);
                                                const dataTransfer = new DataTransfer();
                                                filesArray.forEach(file => dataTransfer.items.add(file));
                                                input.files = dataTransfer.files;

                                                nameDisplay.textContent = `Selected files: ${filesArray.length}`;
                                                preview.innerHTML = '';
                                                updateFileInfo(input, nameDisplay, preview);
                                            }

                                            setupImageUpload('bg_drop_zone', 'bg_image', 'bg_file_name', 'bg_image_preview');
                                            setupImageUpload('other_drop_zone', 'other_image', 'other_file_name', 'other_image_preview');
                                        </script>

                                        <script src="https://cdn.ckeditor.com/ckeditor5/38.0.1/classic/ckeditor.js"></script>
                                        <script>
                                            ClassicEditor
                                                .create(document.querySelector('#description'))
                                                .catch(error => {
                                                    console.error(error);
                                                });
                                        </script>
                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary w-100"><i class="fa-solid fa-plus mr-2"></i>Update Product</button>
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
                                            <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                                            <table id="contact-table" class="table table-hover table-striped">
                                                <thead>
                                                    <tr>
                                                        <th>No.</th>
                                                        <th>Product Name</th>
                                                        <th>Product Description</th>
                                                        <th>Product HS Code</th>
                                                        <th>Product Background Image</th>
                                                        <th>Product Other Images</th>
                                                    </tr>
                                                </thead>
                                                <?php $no = 1; ?>
                                                <tbody>
                                                    @foreach($products as $product)
                                                    <tr>
                                                        <td>{{ $no++ }}</td>
                                                        <td>{{ $product->name }}</td>
                                                        <td>{!! nl2br(preg_replace('/((?:\S+\s+){15}\S+)(?=\s|$)/', '$1<br>', $product->description)) !!}</td>
                                                        <td>{{ $product->product_hs_code }}</td>
                                                        <td>
                                                            <a href="#" data-toggle="modal" data-target="#bgImageModal{{ $product->id }}">
                                                                <img src="{{ asset('images/products/' . $product->bg_image) }}" alt="Product Background Image" style="max-height: 100px; max-width: 100px;">
                                                            </a>
                                                            <!-- Bootstrap Modal for Background Image -->
                                                            <div class="modal fade" id="bgImageModal{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="bgImageModalLabel{{ $product->id }}" aria-hidden="true">
                                                                <div class="modal-dialog" role="document">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <h5 class="modal-title" id="bgImageModalLabel{{ $product->id }}">{{ $product->name }}</h5>
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">&times;</span>
                                                                            </button>
                                                                        </div>
                                                                        <div class="modal-body">
                                                                            <img src="{{ asset('images/products/' . $product->bg_image) }}" alt="Product Background Image" class="img-fluid">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </td>
                                                        <td>
                                                            @php $otherImages = json_decode($product->other_image); @endphp
                                                            @if($otherImages)
                                                            <div class="gallery">
                                                                @foreach($otherImages as $index => $image)
                                                                <a href="#" data-toggle="modal" data-target="#otherImageModal{{ $product->id }}{{ $index }}">
                                                                    <img src="{{ asset('images/products/' . $image) }}" alt="Product Other Image" style="max-height: 100px; max-width: 100px;">
                                                                </a>

                                                                <!-- Bootstrap Modal for Other Images -->
                                                                <div class="modal fade" id="otherImageModal{{ $product->id }}{{ $index }}" tabindex="-1" role="dialog" aria-labelledby="otherImageModalLabel{{ $product->id }}{{ $index }}" aria-hidden="true">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <h5 class="modal-title" id="otherImageModalLabel{{ $product->id }}{{ $index }}">{{ $product->name }} - Image {{ $index + 1 }}</h5>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                </button>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <img src="{{ asset('images/products/' . $image) }}" alt="Product Other Image" class="img-fluid">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                @endforeach
                                                            </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            $(document).ready(function() {
                                $('#contact-table').DataTable({
                                    "destroy": true
                                });
                            });
                        </script>
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
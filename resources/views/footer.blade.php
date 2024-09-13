<footer id="footer" class="footer dark-background">

    <div class="footer-top">
        <div class="container">
            <div class="row gy-4">
                <div class="col-lg-4 col-md-6 footer-about">
                    <a href="index.php" class="logo d-flex align-items-center">
                        <span class="sitename">VMAE</span>
                    </a>
                    <div class="footer-contact pt-3">
                        <p>Surat , Gujrat,</p>
                        <p>India , 396590.</p>
                        <p class="mt-3"><strong>Phone:</strong> <span>+91 97121 01878</span></p>
                        <p><strong>Email:</strong> <span>vmagriexim@gmail.com</span></p>
                    </div>
                    <div class="social-links d-flex mt-4">
                        <a href="https://wa.me/+919712101878" target="_blank"><i class="bi bi-whatsapp"></i></a>
                        <a href=""><i class="bi bi-facebook"></i></a>
                        <a href=""><i class="bi bi-instagram"></i></a>
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4 class="text-white">Useful Links</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Home</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> About us</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Services</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Terms of service</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Privacy policy</a></li>
                    </ul>
                </div>

                <div class="col-lg-2 col-md-3 footer-links">
                    <h4 class="text-white">Our Services</h4>
                    <ul>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Web Design</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Web Development</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Product Management</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Marketing</a></li>
                        <li><i class="bi bi-chevron-right"></i> <a href="#"> Graphic Design</a></li>
                    </ul>
                </div>

                <div class="col-lg-4 col-md-12 footer-newsletter">
                    <h4 class="text-white">Our Newsletter</h4>
                    <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
                    <form action="/newsletter" method="post">
                        @csrf
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
                        <div class="newsletter-form">
                            <input type="email" name="email" required>
                            <input type="submit" value="Subscribe">
                        </div>
                    </form>

                    <!-- Modal -->
                    <div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="successModalLabel">Success</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p id="successMessage"></p>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>

    <div class="copyright">
        <div class="container text-center">
            <p>© <span>Copyright</span> <strong class="px-1 sitename">VMAE</strong> <span>All Rights Reserved</span></p>
            <div class="credits">
                <!-- All the links in the footer should remain intact. -->
                <!-- You can delete the links only if you've purchased the pro version. -->
                <!-- Licensing information: https://bootstrapmade.com/license/ -->
                <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
                Designed by <a href="tel:+917862882054"><span class="text-white">Jenish Kanpariya</span></a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</footer>
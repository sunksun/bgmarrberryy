<?php
session_start();
include_once '../admin/db_connect.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>BGMarrBerryy</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon">
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,600;1,700&family=Inter:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&family=Cardo:ital,wght@0,400;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/main.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: PhotoFolio
  * Updated: Sep 18 2023 with Bootstrap v5.3.2
  * Template URL: https://bootstrapmade.com/photofolio-bootstrap-photography-website-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="header d-flex align-items-center fixed-top">
        <div class="container-fluid d-flex align-items-center justify-content-between">
            <nav id="navbar" class="navbar">
                <ul>
                    <a href="../admin/login.php">Login</a>
                    <a>//</a>
                    <a href="register.php">Register</a>
                </ul>
            </nav>
            <nav id="navbar" class="navbar">
                <ul>

                    <li><a href="index.html" class="active">Home</a></li>
                    <li><a href="all_id.html">All ID</a></li>
                    <a href="index.html" class="logo d-flex align-items-center  me-auto me-lg-0">
                        <img src="img/BG_Logo1.png" alt="">
                    </a>
                    <li><a href="how_to_order.html">How To Order</a></li>
                    <li><a href="https://www.facebook.com/bgmarrberryy">Contact Us</a></li>
                </ul>
            </nav><!-- .navbar -->

            <div class="header-social-links">
                <input type="text" class="sidebar-search" placeholder="Search...">
                <button class="bi bi-search"></button>

                <!-- <button class="bi bi-cart"></button> -->
            </div>
            <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
            <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>

        </div>
    </header><!-- End Header -->
    </section>

    <main id="main">

        <!-- ======= End Page Header ======= -->
        <div class="page-header d-flex align-items-center">
            <div class="container position-relative">
                <div class="row d-flex justify-content-center">
                </div>
            </div>
        </div><!-- End Page Header -->

        <!-- ======= Gallery Single Section ======= -->
        <section id="gallery-single" class="gallery-single">
            <div class="container">

                <div class="position-relative h-100">
                    <div class="slides-1 portfolio-details-slider swiper">
                        <div class="swiper-wrapper align-items-center">

                            <div class="swiper-slide">
                                <img src="assets/img/imgcarousel/BGXMARRBERRYY_คูปอง_00000.png" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="assets/img/imgcarousel/BGXMARRBERRYY_คูปอง_00001.png" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="assets/img/imgcarousel/BGXMARRBERRYY_คูปอง_00002.png" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="assets/img/imgcarousel/BGXMARRBERRYY_คูปอง_00003.png" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="assets/img/imgcarousel/BGXMARRBERRYY_คูปอง_00004.png" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="assets/img/imgcarousel/BGXMARRBERRYY_คูปอง_00005.png" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="assets/img/imgcarousel/BGXMARRBERRYY_คูปอง_00006.png" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img src="assets/img/imgcarousel/BGXMARRBERRYY_คูปอง_00007.png" alt="">
                            </div>

                        </div>
                        <!-- <div class="swiper-pagination"></div> -->
                    </div>
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                </div>

            </div>
        </section><!-- End Gallery Single Section -->



        <main id="main">
            <section>
                <!-- ======= Gallery Section ======= -->
                <br>
                <br>
                <h3 align="center">Recommended ID</h3>
                </align>
                <br>

                <section id="gallery" class="gallery">
                    <div class="container-fluid">
                        <div class="row gy-4 justify-content-center">
                            <?php
                            $sql = "SELECT * FROM `bgmarr_tbl` ORDER BY RAND() LIMIT 4; ";
                            $result = mysqli_query($conn, $sql);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <div class="col-xl-3 col-lg-4 col-md-6">
                                    <div class="gallery-item h-100">
                                        <img src="../admin/uploaded_imgs/<?php echo $row['bgmarr_img'] ?>" class="img-fluid" alt="">
                                        <!-- ดึงรูปสินค้านั้นๆจาก database มาแสดง -->
                                        <div class="gallery-links d-flex align-items-center justify-content-center">
                                            <a href="details_id.php?id=<?php echo $row['bgmarr_name'] ?>" class="details-link"><i class="bi bi-link-45deg"></i></a>
                                            <!-- ลิงก์ไปยังสินค้านั้นๆ -->
                                            <a href="../admin/uploaded_imgs/<?php echo $row['bgmarr_img'] ?>" title="Gallery 1" class="glightbox preview-link"><i class="bi bi-arrows-angle-expand"></i></a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            ?>
                        </div>

                    </div>
                </section>

                <!-- End Gallery Section -->

        </main><!-- End #main -->
        </section>
        <!-- ======= Footer ======= -->
        <footer id="footer" class="footer">
            <div class="container">
                <div class="copyright">
                    &copy; Copyright <strong><span>BGMarrBerryy</span></strong>.
                </div>
            </div>
        </footer><!-- End Footer -->

        <a href="#" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

        <div id="preloader">
            <div class="line"></div>
        </div>

        <!-- Vendor JS Files -->
        <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
        <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
        <script src="assets/vendor/aos/aos.js"></script>
        <script src="assets/vendor/php-email-form/validate.js"></script>
        <!-- Template Main JS File -->
        <script src="assets/js/main.js"></script>
    </main><!-- End #main -->
</body>

</html>
<?php 
session_start();
include("./connections/connect.php");
$con = $lib->openConnection();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Alde Medado Dental Clinic | Notifications</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Jost:wght@500;600;700&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link href="lib/twentytwenty/twentytwenty.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <style type="text/css">
        /********** Template CSS **********/
:root {
/*    --success: #06A3DA;*/

    --success: limegreen;
    --secondary: #F57E57;
    --light: #EEF9FF;
    --dark: #091E3E;
}

h1,
h2,
.font-weight-bold {
    font-weight: 700 !important;
}

h3,
h4,
.font-weight-semi-bold {
    font-weight: 600 !important;
}

h5,
h6,
.font-weight-medium {
    font-weight: 500 !important;
}

.btn {
    font-family: 'Jost', sans-serif;
    font-weight: 600;
    transition: .5s;
}

.btn-success,
.btn-secondary {
    color: #FFFFFF;
}

.btn-success:hover {
    background: var(--secondary);
    border-color: var(--secondary);
}

.btn-secondary:hover {
    background: var(--success);
    border-color: var(--success);
}

.btn-square {
    width: 36px;
    height: 36px;
}

.btn-sm-square {
    width: 28px;
    height: 28px;
}

.btn-lg-square {
    width: 46px;
    height: 46px;
}

.btn-square,
.btn-sm-square,
.btn-lg-square {
    padding-left: 0;
    padding-right: 0;
    text-align: center;
}

#spinner {
    opacity: 0;
    visibility: hidden;
    transition: opacity .5s ease-out, visibility 0s linear .5s;
    z-index: 99999;
}

#spinner.show {
    transition: opacity .5s ease-out, visibility 0s linear 0s;
    visibility: visible;
    opacity: 1;
}

.back-to-top {
    position: fixed;
    display: none;
    right: 45px;
    bottom: 45px;
    z-index: 99;
}

.top-shape::before {
    position: absolute;
    content: "";
    width: 35px;
    height: 100%;
    top: 0;
    left: -17px;
    background: var(--success);
    transform: skew(40deg);
}

.navbar-light .navbar-nav .nav-link {
    font-family: 'Jost', sans-serif;
    padding: 35px 15px;
    font-size: 18px;
    color: var(--dark);
    outline: none;
    transition: .5s;
}

.sticky-top.navbar-light .navbar-nav .nav-link {
    padding: 20px 15px;
}

.navbar-light .navbar-nav .nav-link:hover,
.navbar-light .navbar-nav .nav-link.active {
    color: var(--success);
}

@media (max-width: 991.98px) {
    .navbar-light .navbar-nav .nav-link,
    .sticky-top.navbar-light .navbar-nav .nav-link {
        padding: 10px 0;
    }
}

.carousel-caption {
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
/*    background: rgba(9, 30, 62, .85);*/
    background: rgba(51, 51, 51, 0.5);
    z-index: 1;
}

@media (max-width: 576px) {
    .carousel-caption h5 {
        font-size: 14px;
        font-weight: 500 !important;
    }

    .carousel-caption h1 {
        font-size: 30px;
        font-weight: 600 !important;
    }
}

.carousel-control-prev,
.carousel-control-next {
    width: 10%;
}

.carousel-control-prev-icon,
.carousel-control-next-icon {
    width: 3rem;
    height: 3rem;
}

@media (min-width: 991.98px) {
    .banner {
        position: relative;
        margin-top: -90px;
        z-index: 1;
    }
}

.section-title h5::before {
    position: absolute;
    content: "";
    width: 45px;
    height: 3px;
    right: -55px;
    bottom: 11px;
    background: var(--success);
}

.section-title h5::after {
    position: absolute;
    content: "";
    width: 15px;
    height: 3px;
    right: -75px;
    bottom: 11px;
    background: var(--secondary);
}

.twentytwenty-wrapper {
    height: 100%;
}

.hero-header {
    background: linear-gradient(rgba(51, 51, 51, 0.5), rgba(51, 51, 51, 0.5)), url(./img/bg_dental.png) center center no-repeat;
    background-size: cover;
}
.bg-appointment {
    background: linear-gradient(rgba(51, 51, 51, 0.5),rgba(51, 51, 51, 0.5)), url(./img/bg_dental.png) center center no-repeat;
    background-size: cover;
}

.appointment-form {
    background: rgba(51, 51, 51, 0.5);
}

.service-item img,
.service-item .bg-light,
.service-item .bg-light h5,
.team-item .team-text {
    transition: .5s;
}

.service-item:hover img {
    transform: scale(1.15);
}

.team-item .team-text::after,
.service-item .bg-light::after {
    position: absolute;
    content: "";
    top: 50%;
    bottom: 0;
    left: 15px;
    right: 15px;
    border-radius:100px / 15px;
    box-shadow: 0 0 15px rgba(0, 0, 0, .7);
    opacity: 0;
    transition: .5s;
    z-index: -1;
}

.team-item:hover .team-text::after,
.service-item:hover .bg-light::after {
    opacity: 1;
}

.bg-offer {
    background:url(./img/carousel-1.jpg) center center no-repeat;
    background-size: cover;
}

.offer-text {
    background: rgba(6, 163, 218, .85);
}

.price-carousel .owl-nav {
    position: absolute;
    width: calc(100% + 45px);
    height: 45px;
    top: calc(50% - 22.5px);
    left: -22.5px;
    display: flex;
    justify-content: space-between;
    opacity: 0;
    transition: .5s;
}

.price-carousel:hover .owl-nav {
    opacity: 1;
}

.price-carousel .owl-nav .owl-prev,
.price-carousel .owl-nav .owl-next {
    position: relative;
    width: 45px;
    height: 45px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFFFFF;
    background: var(--success);
    border-radius: 2px;
    font-size: 22px;
    transition: .5s;
}

.price-carousel .owl-nav .owl-prev:hover,
.price-carousel .owl-nav .owl-next:hover {
    background: var(--secondary);
}

.bg-testimonial {
    background: url(./img/carousel-2.jpg) center center no-repeat;
    background-size: cover;
}

.testimonial-carousel {
    background: rgba(6, 163, 218, .85);
}

.testimonial-carousel .owl-nav {
    position: absolute;
    width: calc(100% + 46px);
    height: 46px;
    top: calc(50% - 23px);
    left: -23px;
    display: flex;
    justify-content: space-between;
    z-index: 1;
}

.testimonial-carousel .owl-nav .owl-prev,
.testimonial-carousel .owl-nav .owl-next {
    position: relative;
    width: 46px;
    height: 46px;
    display: flex;
    align-items: center;
    justify-content: center;
    color: #FFFFFF;
    background: var(--success);
    border-radius: 2px;
    font-size: 22px;
    transition: .5s;
}

.testimonial-carousel .owl-nav .owl-prev:hover,
.testimonial-carousel .owl-nav .owl-next:hover {
    background: var(--secondary);
}

.testimonial-carousel .owl-item img {
    width: 120px;
    height: 120px;
}
    </style>
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-grow text-primary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-dark m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
        <div class="spinner-grow text-secondary m-1" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Topbar Start -->
    <?php

$settings = $con->prepare("SELECT * FROM tblsettings");
$settings->execute();

$setting = $settings->fetch();

?>
    <div class="container-fluid bg-light ps-5 pe-0 d-none d-lg-block">
        <div class="row gx-0">
            <div class="col-md-6 text-center text-lg-start mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <small class="py-2"><i class="far fa-clock text-success me-2"></i><?=$setting['opening'];?></small>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-end">
                <div class="position-relative d-inline-flex align-items-center bg-success text-white top-shape px-5">
                    <div class="me-3 pe-3 border-end py-2">
                        <p class="m-0"><i class="fa fa-envelope-open me-2"></i><?=$setting['email'];?></p>
                    </div>
                    <div class="py-2">
                        <p class="m-0"><i class="fa fa-phone-alt me-2"></i><?=$setting['contact'];?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <?php include("./nav.php"); ?>
    <!-- Navbar End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <br><br>
                <h1 class="display-3 text-white animated zoomIn">Notifications</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Notification</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Appointment Start -->
    <div class="container-fluid bg-primary bg-appointment mb-5 wow fadeInUp" data-wow-delay="0.1s" style="margin-top: 90px;">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-12">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-left p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Notifications</h1>
                        <?php 
                        	$view_notif = $con->prepare("SELECT * FROM notif AS n INNER JOIN tblusers AS t ON n.user_id = t.id WHERE n.user_id = ? ORDER BY n.date_added DESC");
                        	$view_notif->execute([$_SESSION['user_id']]);

                        	if($view_notif->rowCount() > 0){
                        		while ($notif = $view_notif->fetch()) {
                                              ?>
                        <div class="alert alert-info" style="position: relative;"> <?=$notif['notif']; ?> <span class="badge bg-white" style="position: absolute; bottom: -2px; right: 0px; color: black"><?= $notif['date_added']; ?></span></div>
                        <?php }} ?>
                    </div>
                </div>            
            </div>
        </div>
    </div>
    <!-- Appointment End -->
    

    <br><br><br>
    

    <!-- Footer Start -->
    <?php include("./footer.php"); ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="lib/twentytwenty/jquery.event.move.js"></script>
    <script src="lib/twentytwenty/jquery.twentytwenty.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>
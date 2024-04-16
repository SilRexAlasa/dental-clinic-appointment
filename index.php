<?php 
session_start();
include("./connections/connect.php");
$con = $lib->openConnection();


if(isset($_POST['btn_appoint'])){

    $service_id = $_POST['service_id'];
    $patient_name = $_POST['patient_name'];
    $account_name  = $_SESSION['fname'] . " " . $_SESSION['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $mobileno = $_POST['mobileno'];
    $date = $_POST['date'];    
    $time = $_POST['time'];

    $check_app = $con->prepare("SELECT * FROM tblappointments WHERE `date` = ? AND `service_id` = ? AND `account_id` = ?");
    $check_app->execute([$date, $service_id, $_SESSION['user_id']]);

    if($check_app->rowCount() > 0){
        echo "<script>window.alert('Schedule is already set!');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }else{
        $ins = $con->prepare("INSERT INTO tblappointments(`account_id`,`account_name`,`patient_name`,`email`,`address`,`mobileno`,`service_id`,`date`,`time`) VALUES(?,?,?,?,?,?,?,?,?)");
        $ins->execute([$_SESSION['user_id'], $account_name, $patient_name, $email, $address, $mobileno, $service_id, $date, $time]);
        echo "<script>window.alert('Your appointment was submitted please wait the text message for your schedule, Thank You!');</script>";
        echo "<script>window.location.href='index.php';</script>";
    }
}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Home - AldeMedado Dental Clinic </title>
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
    <!-- <link href="css/style1.css" rel="stylesheet"> -->
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
                        <input type="text" class="form-control bg-transparent border-success p-3" placeholder="Type search keyword">
                        <button class="btn btn-success px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->


    <!-- Carousel Start -->
    <div class="container-fluid p-0">
        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img style="width: 100%; height: 95vh" src="img/bg_dental.png" alt="Image">
                    
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center" style="margin-top: 100px;">
                        <div class="p-3" style="max-width: 900px;">

                            <h2 class="text-white text-uppercase mb-3 animated slideInDown">WELCOME TO ALDE-MEDADO DENTAL CLINIC</h2>
                            <br><br>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Take The Highest Quality Dental Therapy</h1>
                            <a href="appointment.php" class="btn btn-success py-md-3 px-md-5 me-3 animated slideInLeft">Make Appointment</a>
                            <!-- <a href="contact.php" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a> -->
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-success text-uppercase">About Us</h5>
                        <h1 class="display-5 mb-0">The World's Best Dental Clinic That You Can Trust</h1>
                    </div>
                    <p class="mb-4">"Welcome To Alde-Medado Dental Clinic Appointment System Dental care of the highest quality for everyone". We approach dentistry holistically, with an emphasis on total health that starts with a healthy mouth. We will provide you with services that you won't regret using and that can make you feel at ease. Alde Medado Dental Clinic's devoted staff treats you just as we would treat a member of our own family. We care for our patients with kindness and attention to detail. We are sure we can deliver on all of these promises and more. Call now to schedule a consultation and find out what it's like to have a dentist you can trust!. The top dental staff at Alde-Medado Dental Clinic is prepared to relieve your discomfort and assist you in achieving the confident smile of your dreams. Call us today at to schedule an appointment for your comprehensive dental care.</p>
                    <a href="appointment.php" class="btn btn-success py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">Make Appointment</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/dentist2.jpeg" style="object-fit:contain; margin-left: 100px;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Appointment Start -->
    <div class="container-fluid bg-success bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-6 py-5">
                    <div class="py-5">
                        <h1 class="display-5 text-white mb-4">We Are A Certified and Award Winning Dental Clinic You Can Trust</h1>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                        <h1 class="text-white mb-4">Make Appointment</h1>
                        <form method="POST">
                            <div class="row g-3">

                                <div class="col-12 col-sm-12">
                                    <select name="service_id" class="form-select bg-light border-0" style="height: 55px;" required> 
                                        <option selected>Select A Service</option>
                                        <?php 

                                        $services = $con->prepare("SELECT * FROM tblservices");
                                        $services->execute();

                                        while($serv = $services->fetch()){

                                        ?>
                                        <option value="<?=$serv['id'];?>"><?= $serv['service_name'] ?></option>
                                        <?php } ?>
                                        
                                    </select>
                                </div>

                                <!-- <div class="col-12 col-sm-6">
                                    <select class="form-select bg-light border-0" style="height: 55px;">
                                        <option selected>Select Doctor</option>
                                        <option value="1">Doctor 1</option>
                                        <option value="2">Doctor 2</option>
                                        <option value="3">Doctor 3</option>
                                    </select>
                                </div> -->

                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" name="patient_name" placeholder="Patient Name" style="height: 55px;"
                                    required>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control bg-light border-0" name="email" placeholder="Your Email" style="height: 55px;" required>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" name="address" placeholder="Your Address" style="height: 55px;" required>
                                </div>

                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control bg-light border-0" name="mobileno" placeholder="Your Mobile No." style="height: 55px;" required>
                                </div>


                                <div class="col-12 col-sm-6">
                                    <input type="date"
                                        class="form-control bg-light border-0 datetimepicker-input"
                                        placeholder="Appointment Date" name="date" required style="height: 55px;">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="time"
                                        class="form-control bg-light border-0 datetimepicker-input"
                                        name="time" 
                                        placeholder="Appointment Time" style="height: 55px;">                                </div>
                                <div class="col-12">
                                    <button class="btn btn-success w-100 py-3" type="submit" name="btn_appoint">Make Appointment</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Appointment End -->


    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 mb-5">
                <!-- <div class="col-lg-5 wow zoomIn" data-wow-delay="0.3s" style="min-height: 400px;">
                    <div class="twentytwenty-container position-relative h-100 rounded overflow-hidden">
                        <img class="position-absolute w-100 h-100" src="img/before.jpg" style="object-fit: cover;">
                        <img class="position-absolute w-100 h-100" src="img/after.jpg" style="object-fit: cover;">
                    </div>
                </div> -->
                <div class="col-lg-12">
                    <div class="section-title mb-5">
                        <h5 class="position-relative d-inline-block text-success text-uppercase">Our Services</h5>
                        <h1 class="display-5 mb-0">We Offer The Best Quality Dental Services</h1>
                    </div>
                    <div class="row g-5">

                        <?php 

                        $serv01 = $con->prepare("SELECT * FROM tblservices ORDER BY rand(id) LIMIT 3");
                        $serv01->execute();

                        if($serv01->rowCount() > 0){
                            while ($val01 = $serv01->fetch()) {


                        ?>

                        <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.6s">
                            <a href="appointment.php?id=<?=$val01['id']?>">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" style="height: 200px; width: 100%;" src="img/<?=$val01['image']?>" alt="">

                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0"><?=$val01['service_name']?></h5>
                            </div>
                            </a>
                        </div>

                        
                        <?php }} ?>

                    </div>
                </div>
            </div>
            <div class="row g-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="col-lg-12">
                    
                    <div class="row g-5">
                        <?php 


                            $serv02 = $con->prepare("SELECT * FROM tblservices");
                            $serv02->execute();

                            if($serv02->rowCount() > 0){
                                while ($val02 = $serv02->fetch()) {

                        ?>
                        <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.3s">

                            <a href="appointment.php?id=<?=$val02['id']?>">
                            <div class="rounded-top overflow-hidden">
                                <img class="img-fluid" style="height: 200px; width: 100%" src="img/<?=$val02['image'];?>" alt="">
                            </div>
                            <div class="position-relative bg-light rounded-bottom text-center p-4">
                                <h5 class="m-0"><?=$val02['service_name'];?></h5>
                            </div>
                            </a>
                        </div>
                        <?php  } } ?>
                        <div class="col-lg-4 service-item wow zoomIn" data-wow-delay="0.9s">
                            <div class="position-relative bg-success rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-4">
                                <h3 class="text-white mb-3">Call For Appointment</h3>
                                <h2 class="text-white mb-0">+639055955762</h2>
                            </div>
                        </div>
                    </div>   
                </div> 
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Pricing Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-12">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-success text-uppercase">Pricing Plan</h5>
                        <h1 class="display-5 mb-0">We Offer Fair Prices for Dental Treatment</h1>
                    </div>
                    <h5 class="text-uppercase text-success wow fadeInUp" data-wow-delay="0.3s">Call for Appointment</h5>
                    <h1 class="wow fadeInUp" data-wow-delay="0.6s">+63 0905 595 5762</h1>
                </div>
            
                <?php  

                $pricing = $con->prepare("SELECT * FROM tblservices");
                $pricing->execute();

                if($pricing->rowCount() > 0){
                    while($theprice = $pricing->fetch()){
                ?>
                    <div class="col-lg-4">
                    <div class="price-item pb-4">
                        <div class="position-relative">
                            <img class="img-fluid rounded-top" src="img/<?= $theprice['image'] ?>" style="width: 100%; height: 200px;" alt="">
                            <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
                                <h3 class="text-success m-0">₱ <?= number_format($theprice['price'], 2);?></h3>
                            </div>
                        </div>
                        <div class="position-relative text-center bg-light border-bottom border-success py-5 p-4" style="max-height: 200px; height: 100%;">
                            <h4><?=$theprice['service_name'];?></h4>
                            <hr class="text-success w-50 mx-auto mt-0">
                            <div class="d-flex justify-content-between mb-3" style="text-align: center;">
                                <span><?=$theprice['description'];?></span>
                            </div>
                            <a href="appointment.php?id=<?=$theprice['id'];?>" class="btn btn-success py-2 px-4 position-absolute top-100 start-50 translate-middle">Make Appointment</a>
                        </div>
                    </div>
                    </div>
                <?php }} ?>
                
            </div>
        </div>
    </div>
    <!-- Pricing End -->


    <!-- Testimonial Start -->
<!--     <div class="container-fluid bg-success bg-testimonial py-5 my-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="owl-carousel testimonial-carousel rounded p-5 wow zoomIn" data-wow-delay="0.6s">
                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto rounded mb-4" src="img/testimonial-1.jpg" alt="">
                            <p class="fs-5">Dolores sed duo clita justo dolor et stet lorem kasd dolore lorem ipsum. At lorem lorem magna ut et, nonumy labore diam erat. Erat dolor rebum sit ipsum.</p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-white mb-0">Client Name</h4>
                        </div>
                        <div class="testimonial-item text-center text-white">
                            <img class="img-fluid mx-auto rounded mb-4" src="img/testimonial-2.jpg" alt="">
                            <p class="fs-5">Dolores sed duo clita justo dolor et stet lorem kasd dolore lorem ipsum. At lorem lorem magna ut et, nonumy labore diam erat. Erat dolor rebum sit ipsum.</p>
                            <hr class="mx-auto w-25">
                            <h4 class="text-white mb-0">Client Name</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> -->
    <!-- Testimonial End -->


    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.1s">
                    <div class="section-title bg-light rounded h-100 p-5">
                        <h5 class="position-relative d-inline-block text-success text-uppercase">Our Dentist</h5>
                        <h1 class="display-6 mb-4">Meet Our Certified & Experienced Dentist</h1>
                        <a href="appointment.php" class="btn btn-success py-3 px-5">Make Appointment</a>
                    </div>
                </div>

                <?php 
                    $stmt2 = $con->prepare("SELECT * FROM tblusers WHERE type = 2");
                    $stmt2->execute();
                    while ($value = $stmt2->fetch()) {
                        ?>
                            <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                                <div class="team-item">
                                    <div class="position-relative rounded-top" style="z-index: 1;">
                                        <img class="img-fluid rounded-top w-100" src="uploads/<?=$value['profile'];?>" style="height: 400px;" alt="">
                                    </div>
                                    <div class="team-text position-relative bg-light text-center rounded-bottom p-2 pt-3">
                                        <h4 class="mb-2"><?=$value['fname'];?> <?=$value['lname'];?></h4>
                                        <p class="text-success mb-0"><?=$value['specialist'];?></p>
                                    </div>
                                </div>
                            </div>
                        <?php
                    }
                ?>
            


                <!--<div class="col-lg-4 wow slideInUp" data-wow-delay="0.1s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-3.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-success btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-success btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-success btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-success btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. John Doe</h4>
                            <p class="text-success mb-0">Implant Surgeon</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-4.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-success btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-success btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-success btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-success btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. John Doe</h4>
                            <p class="text-success mb-0">Implant Surgeon</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                    <div class="team-item">
                        <div class="position-relative rounded-top" style="z-index: 1;">
                            <img class="img-fluid rounded-top w-100" src="img/team-5.jpg" alt="">
                            <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                                <a class="btn btn-success btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                                <a class="btn btn-success btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-success btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                                <a class="btn btn-success btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                            <h4 class="mb-2">Dr. John Doe</h4>
                            <p class="text-success mb-0">Implant Surgeon</p>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Team End -->


    <br><br><br>
    

    <!-- Footer Start -->
    <?php include("./footer.php"); ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-success btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <!-- Template Javascript -->
    <!-- <script src="js/main.js"></script> -->
    <script>
        (function ($) {
    "use strict";

    // Spinner
    // var spinner = function () {
    //     setTimeout(function () {
    //         if ($('#spinner').length > 0) {
    //             $('#spinner').removeClass('show');
    //         }
    //     }, 1);
    // };
    // spinner();
    
    
    // Initiate the wowjs
    new WOW().init();


    Sticky Navbar
    $(window).scroll(function () {
        if ($(this).scrollTop() > 40) {
            $('.navbar').addClass('fixed-top');
        } else {
            $('.navbar').removeClass('fixed-top');
        }
    });
    
    // Dropdown on mouse hover
    const $dropdown = $(".dropdown");
    const $dropdownToggle = $(".dropdown-toggle");
    const $dropdownMenu = $(".dropdown-menu");
    const showClass = "show";
    
    $(window).on("load resize", function() {
        if (this.matchMedia("(min-width: 992px)").matches) {
            $dropdown.hover(
            function() {
                const $this = $(this);
                $this.addClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "true");
                $this.find($dropdownMenu).addClass(showClass);
            },
            function() {
                const $this = $(this);
                $this.removeClass(showClass);
                $this.find($dropdownToggle).attr("aria-expanded", "false");
                $this.find($dropdownMenu).removeClass(showClass);
            }
            );
        } else {
            $dropdown.off("mouseenter mouseleave");
        }
    });
    
    
    // Back to top button
    $(window).scroll(function () {
        if ($(this).scrollTop() > 100) {
            $('.back-to-top').fadeIn('slow');
        } else {
            $('.back-to-top').fadeOut('slow');
        }
    });
    $('.back-to-top').click(function () {
        $('html, body').animate({scrollTop: 0}, 1500, 'easeInOutExpo');
        return false;
    });


    // Date and time picker
    $('.date').datetimepicker({
        format: 'L'
    });
    $('.time').datetimepicker({
        format: 'LT'
    });


    // Image comparison
    $(".twentytwenty-container").twentytwenty({});


    // Price carousel
    $(".price-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1500,
        margin: 45,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
        responsive: {
            0:{
                items:1
            },
            768:{
                items:2
            }
        }
    });


    // Testimonials carousel
    $(".testimonial-carousel").owlCarousel({
        autoplay: true,
        smartSpeed: 1000,
        items: 1,
        dots: false,
        loop: true,
        nav : true,
        navText : [
            '<i class="bi bi-arrow-left"></i>',
            '<i class="bi bi-arrow-right"></i>'
        ],
    });
    
})(jQuery);


    </script>
</body>

</html>
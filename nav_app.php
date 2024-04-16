<?php

include_once "./connections/connect.php";
$con = $lib->openConnection();

if(isset($_SESSION['user_id'])){
    $apt = $con->prepare("SELECT * FROM tblappointments WHERE stat != ? AND account_id = ?");
    $apt->execute([3, $_SESSION['user_id']]);
    $apt_count = $apt->rowCount();

    $msg = $con->prepare("SELECT * FROM chats WHERE opened = ? AND to_id = ?");
    $msg->execute([0, $_SESSION['user_id']]);
    $msg_count = $msg->rowCount();

    $notif = $con->prepare("SELECT * FROM notif WHERE user_id = ?");
    $notif->execute([$_SESSION['user_id']]);
    $notif_count = $notif->rowCount();

    $total_num = $apt_count + $msg_count + $notif_count;
}

if(isset($_POST['btn_reg'])){

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $pass  = md5($_POST['password']);
    $address = $_POST['address'];
    $gender = $_POST['gender'];
    $mobileno = $_POST['mobileno'];

    $check_email = $con->prepare("SELECT * FROM tblusers WHERE email = ?");
    $check_email->execute([$email]);


    if($check_email->rowCount() > 0){

        echo "<script>window.alert('Email already exist!');</script>";

    }else{

        $insert = $con->prepare("INSERT INTO tblusers(`fname`,`lname`,`email`,`address`,`gender`,`pass`, `mobileno`) VALUES(?,?,?,?,?,?,?)");
        $insert->execute([$fname, $lname, $email, $address, $gender, $pass, $mobileno]);


        echo "<script>window.alert('Successfully Registered!');</script>";
        echo "<script>window.location.href = 'index.php?stat=done';</script>";
        // echo "<script>$('#login').modal('show');</script>";

    }

}

if(isset($_POST['btn_login'])){

    $email = $_POST['email'];
    $pass  = md5($_POST['password']);

    $check_email = $con->prepare("SELECT * FROM tblusers WHERE email = ? AND pass = ?");
    $check_email->execute([$email, $pass]);

    $val = $check_email->fetch();


    if($check_email->rowCount() > 0){

        $_SESSION['user_id'] = $val['id'];
        $_SESSION['fname'] = $val['fname'];
        $_SESSION['lname'] = $val['lname'];
        $_SESSION['email'] = $val['email'];
        $_SESSION['profile'] = $val['profile'];
        $_SESSION['address'] = $val['address'];
        $_SESSION['mobileno'] = $val['mobileno'];

        echo "<script>window.alert('Welcome Alde-Medado User! You are successfully login.');</script>";
        echo "<script>window.location.href = 'index.php';</script>";

    }else{

        echo "<script>window.alert('Login failed!');</script>";

    }

}


?>
<style>
    .dropdown-user li:hover{
        background: limegreen;

    }
</style>
<div style="position: fixed; top: 0; width: 100%; z-index: 999999">
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
<nav id="navbar" class="navbar navbar-expand-lg bg-white navbar-light shadow-sm px-5 py-3 py-lg-0">
        <a href="index.php" class="navbar-brand p-0">
            <h1 class="m-0 p-0 text-primary" ></h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto py-0">
                <a href="index.php" class="nav-item nav-link">Home</a>
                <a href="about.php" class="nav-item nav-link">About</a>
                <a href="service.php" class="nav-item nav-link">Service</a>
                <a href="price.php" class="nav-item nav-link">Pricing Plan</a>
                <a href="contact.php" class="nav-item nav-link">Contact</a>
                <a href="appointment.php" class="nav-item nav-link active">Appointment</a>
            </div>
            <?php if(isset($_SESSION['user_id'])){ ?>
            <div class="dropdown" style="z-index: 999999">
                <?php

                if(isset($_SESSION['profile'])){

                    if(!empty($_SESSION['profile'])){
                ?>
                    <a class="nav-link text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="position: relative;">
                    <img src="./uploads/<?=$_SESSION['profile'];?>" style="width: 50px; height: 50px; border-radius: 50%" alt="user" class="profile-pic" />
                    <span class="badge bg-danger" style="border-radius: 50%; position: absolute; top: -5px; right: 10px"><?=$total_num;?></span>
                    </a>
                <?php }else{ ?>
                    <a class="nav-link text-muted" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="./img/userbg.png" style="width: 50px; height: 50px; border-radius: 50%" alt="user" class="profile-pic" />
                    <span class="badge bg-danger" style="border-radius: 50%; position: absolute; top: -5px; right: 10px"><?=$total_num;?></span>

                </a>
                <?php } } ?>
                
                <div class="dropdown-menu dropdown-menu-left animated zoomIn" style="margin-left: -100px; width: auto; background: #222; color: #fff">
                    <ul class="dropdown-user" style="list-style-type: none; padding: 0">
                        <li style="padding: 10px 20px">
                            <a href="profile.php" style="color: #f2f2f2; padding: 0; line-height: 40px;"><i class="fa fa-user"></i> My Profile
                            </a>
                        </li>
                        <li style="position: relative; padding: 10px 20px">
                            <a href="my_appointments.php" style="color: #f2f2f2; padding: 0; line-height: 40px;"><i class="fa fa-list"></i> Appointments
                                <?php if($apt_count > 0){ ?>
                                <span class="badge bg-danger" style="border-radius: 50%; position: absolute; top: 0; right: 10px"><?=$apt_count;?></span>
                                <?php } ?>
                            </a>
                        </li>
                        <li style="position: relative; padding: 10px 20px">
                            <a href="./messages/index.php" style="color: #f2f2f2; padding: 0; line-height: 40px;"><i class="fa fa-sms"></i> Messages
                                <?php if($apt_count > 0){ ?>
                                <span class="badge bg-danger" style="border-radius: 50%; position: absolute; top: 0; right: 10px"><?=$msg_count;?></span>
                                <?php } ?>
                            </a>
                        </li>
                        <li style="position: relative; padding: 10px 20px">
                            <a href="notifications.php" style="color: #f2f2f2; padding: 0; line-height: 40px;"><i class="fa fa-bell"></i> Notifications
                                <?php if($apt_count > 0){ ?>
                                <span class="badge bg-danger" style="border-radius: 50%; position: absolute; top: 0; right: 10px"><?=$notif_count;?></span>
                                <?php } ?>
                            </a>
                        </li>
                        <li style="padding: 10px 20px"><a href="logout.php" style="color: #f2f2f2; padding: 0; line-height: 40px;"><i class="fa fa-power-off"></i> Logout</a></li>
                    </ul>
                </div>
            </div>
            <?php }else{ ?>

            <a href="#" style="border-radius: 20px;" class="btn btn-success py-2 px-4 ms-3" data-bs-toggle="modal" data-bs-target="#login">Login</a>
            <!-- <a href="#" style="border-radius: 20px;" class="btn btn-success py-2 px-4 ms-3" data-bs-toggle="modal" data-bs-target="#signup">Signup</a> -->

                <!-- Login Modal -->
                <form method="POST">
                    
               

                <div class="modal fade" id="login" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" style="padding: 25px 50px; width: 600px; margin-left: -50px">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Login Now</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div>
                            <center><img src="./img/dental-logo.png" width="200" height="200"></center>
                        </div>
                        <br>
                        <div>
                            <label>Email</label>
                            <br>
                            <input type="email" class="form-control" name="email">
                        </div>
                        <br>
                        <div>
                            <label>Password</label>
                            <br>
                            <input type="password" class="form-control" name="password">
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="btn_login" class="btn btn-block btn-primary" style="width: 100%;">Login</button>
                        <br>
                      </div>
                      <hr>
                        <center><a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#signup">Do you haven't an account yet? Register here.</a></center>
                    </div>
                  </div>
                </div>
                </form>



                <!-- Signup Modal -->
                <form method="POST" style="z-index: 9999">
                <div class="modal fade" id="signup" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content" style="padding: 25px 50px; width: 600px; margin-left: -50px">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Signup Now</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body row">
                        <div class="col-lg-12">
                            <center><img src="./img/dental-logo.png" width="200" height="200"></center>
                        </div>
                        <br>
                        <div class="col-lg-6">
                            <label>Firstname</label>
                            <br>
                            <input type="text" class="form-control" name="fname"><br>
                        </div>
                        <br>
                        <div class="col-lg-6">
                            <label>Lastname</label>
                            <br>
                            <input type="text" class="form-control" name="lname"><br>
                        </div>
                        <br>
                        <div class="col-lg-6">
                            <label>Email</label>
                            <br>
                            <input type="email" class="form-control" name="email"><br>
                        </div>
                        <br>
                        <div class="col-lg-6">
                            <label>Password</label>
                            <br>
                            <input type="password" class="form-control" name="password"><br>
                        </div>
                        <br>
                        <div class="col-lg-12">
                            <label>Address</label>
                            <br>
                            <input type="text" class="form-control" name="address"><br>
                        </div>
                        <br>
                        <div class="col-lg-6">
                            <label>Mobile No.</label>
                            <br>
                            <input type="text" class="form-control" name="mobileno"><br>
                        </div>
                        <br>
                        <div class="col-lg-6">
                            <label>Gender</label>
                            <br>
                            <select name="gender" class="form-control">
                                <option value="" selected disabled> --- </option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>

                            </select><br>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="submit" name="btn_reg" class="btn btn-primary" style="width: 100%">Signup</button>
                      </div>
                      <hr>
                        <center><a href="#" data-bs-dismiss="modal" data-bs-toggle="modal" data-bs-target="#login">Do you have an account already? Login here.</a></center>
                        <br>
                    </div>
                  </div>
                </div>
                </form>

            <?php } ?>
        </div>
    </nav>
</div>

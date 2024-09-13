<?php
include("dbconnect.php");
$rdate = date("d-m-Y");
extract($_REQUEST);
$msg = "";
$success = "";

if (isset($btn)) {
    // Use prepared statements to prevent SQL injection
    $q1 = mysqli_prepare($connect, "SELECT * FROM rs_rider WHERE email=? AND uname=?");
    mysqli_stmt_bind_param($q1, "ss", $email, $uname);
    mysqli_stmt_execute($q1);
    mysqli_stmt_store_result($q1);
    $n1 = mysqli_stmt_num_rows($q1);
    mysqli_stmt_close($q1);

    if ($n1 == 0) {
        $mq = mysqli_query($connect, "SELECT MAX(id) FROM rs_rider");
        $mr = mysqli_fetch_array($mq);
        $id = $mr['MAX(id)'] + 1;


        $ins = mysqli_prepare($connect, "INSERT INTO rs_rider(id, name, gender, mobile, email, city, uname, pass, create_date) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
        mysqli_stmt_bind_param($ins, "issssssss", $id, $name, $gender, $mobile, $email, $city, $uname, $pass, $rdate);
        mysqli_stmt_execute($ins);
        mysqli_stmt_close($ins);

        if ($ins) {
            $success = "Registered Successfully";
            
            header("Location: login_user.php");
            exit();
        } else {
            $msg = "Error: " . mysqli_error($connect);
        }
    } else {
        $msg = "Already Exist!";
    }
}
?>


<html>
<head>
    <meta charset="utf-8">
    <title>Ride-Sharing</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <link href="static/img/favicon.ico" rel="icon">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

  
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <link href="static/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="static/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <link href="static/css/bootstrap.min.css" rel="stylesheet">

    <link href="static/css/style.css" rel="stylesheet">

    <script language="javascript">
function validate() {
    var name = document.form1.name.value.trim();
    var gender = document.form1.gender.value;
    var mobile = document.form1.mobile.value.trim();
    var email = document.form1.email.value.trim();
    var city = document.form1.city.value.trim();
    var uname = document.form1.uname.value.trim();
    var pass = document.form1.pass.value.trim();
    var cpass = document.form1.cpass.value.trim();

    if (name === "") {
        alert("Enter the Name");
        document.form1.name.focus();
        return false;
    }

    if (gender === "") {
        alert("Select the Gender");
        document.form1.gender.focus();
        return false;
    }

    if (mobile === "") {
        alert("Enter the Mobile No.");
        document.form1.mobile.focus();
        return false;
    }

    if (isNaN(mobile)) {
        alert("Invalid Mobile No.");
        document.form1.mobile.select();
        return false;
    }

    if (mobile.length !== 10) {
        alert("Mobile No. must be 10 digits!");
        document.form1.mobile.select();
        return false;
    }

    if (email === "") {
        alert("Enter the Email");
        document.form1.email.focus();
        return false;
    }

    var emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if (!emailRegex.test(email)) {
        alert("Invalid E-mail!");
        document.form1.email.select();
        return false;
    }

    if (city === "") {
        alert("Enter Your City");
        document.form1.city.focus();
        return false;
    }

    if (uname === "") {
        alert("Enter the Username");
        document.form1.uname.focus();
        return false;
    }

    if (pass === "") {
        alert("Enter the Password");
        document.form1.pass.focus();
        return false;
    }

    if (cpass === "") {
        alert("Enter the Confirm Password");
        document.form1.cpass.focus();
        return false;
    }

    if (pass !== cpass) {
        alert("Password does not match!");
        document.form1.cpass.select();
        return false;
    }

    return true;
}
</script>

</head>

<body>
    <div class="container-fluid bg-dark py-3 px-lg-5 d-none d-lg-block">
        <div class="row">
            <div class="col-md-6 text-center text-lg-left mb-2 mb-lg-0">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body pr-3" href=""><i class="fa fa-phone-alt mr-2"></i>+012 345 6789</a>
                    <span class="text-body">|</span>
                    <a class="text-body px-3" href=""><i class="fa fa-envelope mr-2"></i>travel@info.com</a>
                </div>
            </div>
            <div class="col-md-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-body px-3" href="">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                    <a class="text-body px-3" href="">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a class="text-body pl-3" href="">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid position-relative nav-bar p-0">
        <div class="position-relative px-lg-5" style="z-index: 9;">
            <nav class="navbar navbar-expand-lg bg-secondary navbar-dark py-3 py-lg-0 pl-3 pl-lg-5">
                <a href="" class="navbar-brand">
                    <h1 class="text-uppercase text-primary mb-1">Ride-Sharing</h1>
                </a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between px-3" id="navbarCollapse">
                    <div class="navbar-nav ml-auto py-0">
                        <a href="index.php" class="nav-item nav-link active">Home</a>
						 <a href="login_user.php" class="nav-item nav-link">User</a>
                        <a href="login.php" class="nav-item nav-link">Driver</a>
						<a href="login_admin.php" class="nav-item nav-link">Admin</a>
                       

                    </div>
                </div>
            </nav>
        </div>
    </div>
 
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Ride-Sharing</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="index.php">Home</a></h6>
            <h6 class="text-body m-0 px-3"></h6>
            <h6 class="text-uppercase text-body m-0"></h6>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Rider Registration</h1>
            <div class="row">
                <div class="col-lg-7 mb-2">
                    <div class="contact-form bg-light mb-4" style="padding: 30px;">
                    <?php
                    if (!empty($success)) {
                        echo "<span style='color:#009900'>$success</span>";
                    }

                    if (!empty($msg)) {
                        echo "<span style='color:red'>$msg</span>";
                    }
                    ?>


					
                        <form name="form1" method="post" onsubmit="return validate();">
                            <div class="row">
                                <div class="col-6 form-group">
								<label>Name</label>
                                    <input type="text" name="name" class="form-control p-4" placeholder="">
                                </div>
                                <div class="col-6 form-group">
									<label>Gender</label>
                                    <select name="gender" class="form-control p-4">
									<option value="">-Gender-</option>
									<option>Male</option>
									<option>Female</option>
									</select>
                                </div>
                            </div>
							<div class="row">
                                <div class="col-6 form-group">
									<label>Mobile No.</label>
                                    <input type="text" name="mobile" class="form-control p-4">
                                </div>
                                <div class="col-6 form-group">
									<label>Email</label>
                                    <input type="text" name="email" class="form-control p-4" placeholder="">
                                </div>
                            </div>
							
							<div class="row">
                                <div class="col-6 form-group">
									<label>City</label>
                                    <input type="text" name="city" class="form-control p-4" placeholder="">
                                </div>
                                <div class="col-6 form-group">
									<label>Username</label>
                                    <input type="text" name="uname" class="form-control p-4" placeholder="">
                                </div>
                            </div>
							
							<div class="row">
                                <div class="col-6 form-group">
									<label>Password</label>
                                    <input type="password" name="pass" class="form-control p-4" placeholder="">
                                </div>
                                <div class="col-6 form-group">
									<label>Confirm Password</label>
                                    <input type="password" name="cpass" class="form-control p-4" placeholder="">
                                </div>
                            </div>
                          
                           <div class="form-group">
                           <button class="btn btn-primary py-3 px-5" type="submit" name="btn">Register</button>
                                </div>
                        </form>
                    </div>
                </div>
               <div class="col-lg-5 mb-2">
                    <div class="bg-secondary d-flex flex-column justify-content-center px-5 mb-4" style="height: 435px;">
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Ride Sharing</h5>
                                <p>sharing of rides in a motor vehicle</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-map-marker-alt text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Ride Sharing</h5>
                                <p>share vehicle like a bike / car / van</p>
                            </div>
                        </div>
                        <div class="d-flex mb-3">
                            <i class="fa fa-2x fa-envelope-open text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Ride Sharing</h5>
                                <p>connect drivers with passengers.</p>
                            </div>
                        </div>
                        <div class="d-flex">
                            <i class="fa fa-2x fa-envelope-open text-primary flex-shrink-0 mr-3"></i>
                            <div class="mt-n1">
                                <h5 class="text-light">Ride Sharing</h5>
                                <p class="m-0">holdover from the term, sharing economy.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
  <?php include("footer.php");?>
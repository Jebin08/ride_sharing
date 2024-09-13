<?php
include("dbconnect.php");
extract($_REQUEST);
$msg = "";
if(isset($btn))
{
	
$uploadDir = "uploads/vehicle/";
$file = $uploadDir . basename($_FILES["file"]["name"]);

if (move_uploaded_file($_FILES["file"]["tmp_name"], $file)) {
    echo "";
} else {
    echo "";
}

$up=mysqli_query($connect,"update rs_driver set driving='$driving',vehicle='$vehicle',vmodel='$vmodel',vno='$vno',vphoto='$file' where id='$rid'");
 
			if($up)
			{
		 ?>
	<script language="javascript">
		alert("Vechicle Details Added");
		window.location.href="login.php";
		 </script>
		 <?php
			}
	
            else
            {
            $msg="Already Exist!";
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

    <!-- Favicon -->
    <link href="static/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@400;500;600;700&family=Rubik&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="static/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="static/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="static/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="static/css/style.css" rel="stylesheet">
<script language="javascript">
function validate()
{
	if(document.form1.driving.value=="")
	{
	alert("Enter the Driving License No.");
	document.form1.driving.focus();
	return false;
	}
	
	if(document.form1.vehicle.value=="")
	{
	alert("Select the Vehicle");
	document.form1.vehicle.focus();
	return false;
	}
	if(document.form1.vmodel.value=="")
	{
	alert("Enter the Vehicle Model");
	document.form1.vmodel.focus();
	return false;
	}
	if(document.form1.vno.value=="")
	{
	alert("Enter the Vehicle Number");
	document.form1.vno.focus();
	return false;
	}
	if(document.form1.file.value=="")
	{
	alert("Select the Vehicle Photo");
	document.form1.file.focus();
	return false;
	}
	
return true;
}
</script>
</head>

<body>
    <!-- Topbar Start -->
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
    <!-- Topbar End -->


    <!-- Navbar Start -->
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
						 <a href="login_user.php" class="nav-item nav-link">Rider</a>
                        <a href="login.php" class="nav-item nav-link">Driver</a>
						<a href="login_admin.php" class="nav-item nav-link">Admin</a>
                        <!--<div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Cars</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="static/car.html" class="dropdown-item">Car Listing</a>
                                <a href="static/detail.html" class="dropdown-item">Car Detail</a>
                                <a href="static/booking.html" class="dropdown-item">Car Booking</a>
                            </div>
                        </div>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                            <div class="dropdown-menu rounded-0 m-0">
                                <a href="static/team.html" class="dropdown-item">The Team</a>
                                <a href="static/testimonial.html" class="dropdown-item">Testimonial</a>
                            </div>
                        </div>
                        <a href="static/contact.html" class="nav-item nav-link">Contact</a>-->
                    </div>
                </div>
            </nav>
        </div>
    </div>
    <!-- Navbar End -->


    <!-- Search Start -->
    <!--<div class="container-fluid bg-white pt-3 px-lg-5">
        <div class="row mx-n2">
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select class="custom-select px-4 mb-3" style="height: 50px;">
                    <option selected>Pickup Location</option>
                    <option value="1">Location 1</option>
                    <option value="2">Location 2</option>
                    <option value="3">Location 3</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select class="custom-select px-4 mb-3" style="height: 50px;">
                    <option selected>Drop Location</option>
                    <option value="1">Location 1</option>
                    <option value="2">Location 2</option>
                    <option value="3">Location 3</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <div class="date mb-3" id="date" data-target-input="nearest">
                    <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Date"
                        data-target="#date" data-toggle="datetimepicker" />
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <div class="time mb-3" id="time" data-target-input="nearest">
                    <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Time"
                        data-target="#time" data-toggle="datetimepicker" />
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select class="custom-select px-4 mb-3" style="height: 50px;">
                    <option selected>Select A Car</option>
                    <option value="1">Car 1</option>
                    <option value="2">Car 1</option>
                    <option value="3">Car 1</option>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <button class="btn btn-primary btn-block mb-3" type="submit" style="height: 50px;">Search</button>
            </div>
        </div>
    </div>-->
    <!-- Search End -->


    <!-- Page Header Start -->
    <div class="container-fluid page-header">
        <h1 class="display-3 text-uppercase text-white mb-3">Ride-Sharing</h1>
        <div class="d-inline-flex text-white">
            <h6 class="text-uppercase m-0"><a class="text-white" href="/">Home</a></h6>
            <h6 class="text-body m-0 px-3"></h6>
            <h6 class="text-uppercase text-body m-0"></h6>
        </div>
    </div>
    <!-- Page Header Start -->


    <!-- Contact Start -->
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Driver Registration</h1>
			<h3>Vehicle Information</h3>
            <div class="row">
                <div class="col-lg-7 mb-2">
                    <div class="contact-form bg-light mb-4" style="padding: 30px;">
					
                        <form name="form1" method="post" enctype="multipart/form-data" onsubmit="return validate();">
                            
							<div class="row">
                               
                                <div class="col-6 form-group">
									<label>Driving License</label>
                                    <input type="text" name="driving" class="form-control p-4" placeholder="">
                                </div>
								<div class="col-6 form-group">
									<label>Vehicle</label>
                                    <select name="vehicle" class="form-control p-4">
									<option value="">-Vehicle-</option>
									<option>Two-Wheeler</option>
									<option>Car</option>
									<option>Van</option>
									</select>
                                </div>
                            </div>
							
							<div class="row">
                                
                                <div class="col-6 form-group">
									<label>Vehicle Model</label>
                                    <input type="text" name="vmodel" class="form-control p-4" placeholder="">
                                </div>
								<div class="col-6 form-group">
									<label>Vehicle No.</label>
                                    <input type="text" name="vno" class="form-control p-4" placeholder="">
                                </div>
                            </div>
							
							<div class="row">
                                
                                <div class="col-6 form-group">
									<label>Vehicle Photo</label>
                                    <input type="file" name="file" class="form-control p-4" placeholder="">
                                </div>
                            </div>
							
							
							
                          
                           <div class="form-group">
                                    <button class="btn btn-primary py-3 px-5" name="btn" type="submit">Submit</button>
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
<?php include("footer.php");
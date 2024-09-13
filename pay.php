<?php
session_start();
include("dbconnect.php");
$uname = $_SESSION['uname'];
extract($_REQUEST);
$msg="";
if(isset($btn))
{
$up=mysqli_query($connect, "UPDATE rs_request SET pay_st='1' WHERE id='$rid'");
if($up)
{
    ?>
    <script>
        alert("Money paid");
        window.location.href="user_req.php"
    </script>
    <?php
}
else{
    $msg="Not Paid";
}
}
?>
<?php include("userheader.php");?>

    <div class="container-fluid pt-5">
        <div class="container pt-5">
		  <h2 class="display-4 text-uppercase mb-5">Payment</h2>
					<h3>Rider</h3>
            <div class="row">
                <div class="col-lg-4 mb-5">
                  
				
							
						
				
               </div>

                <div class="col-lg-6 mb-5">
			
                    <div class="bg-secondary p-5">
					<span style="color:red"><?php echo $msg;?></span>
						<form name="form1" method="post">
					
						<div class="form-group">
               				<label>UPI No.</label>
							<input type="text" name="card" class="form-control px-4" placeholder="" style="height: 50px;" required>
                        </div>
						
                       
                     
                        
                        <div class="form-group mb-0">
                            <button class="btn btn-primary btn-block" name="btn" type="submit" style="height: 50px;">Payment</button>
                        </div>
						</form>
                    </div>
                </div>
				
            </div>
        </div>
    </div>
    <!-- Detail End -->


    <!-- Related Car Start -->
   
    <!-- Related Car End -->



    <!-- Footer Start -->
    <div class="container-fluid bg-secondary py-5 px-sm-3 px-md-5" style="margin-top: 90px;">
        <div class="row pt-5">
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Get In Touch</h4>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-white mr-3"></i>India</p>
                <p class="mb-2"><i class="fa fa-phone-alt text-white mr-3"></i>+012 345 67890</p>
                <p><i class="fa fa-envelope text-white mr-3"></i>travel@info.com</p>
                <h6 class="text-uppercase text-white py-2">Follow Us</h6>
                <div class="d-flex justify-content-start">
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-twitter"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square mr-2" href="#"><i class="fab fa-linkedin-in"></i></a>
                    <a class="btn btn-lg btn-dark btn-lg-square" href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Usefull Links</h4>
                <div class="d-flex flex-column justify-content-start">
                    <a class="text-body mb-2" href="/userhome"><i class="fa fa-angle-right text-white mr-2"></i>Home</a>
                    <a class="text-body mb-2" href="/logout"><i class="fa fa-angle-right text-white mr-2"></i>logout</a>
                </div>
            </div>
           
            <div class="col-lg-3 col-md-6 mb-5">
                <h4 class="text-uppercase text-light mb-4">Newsletter</h4>
                <p class="mb-4">Share vehicle like a bike / car / van, connect drivers with passengers.</p>
                <div class="w-100 mb-3">
                    <!--<div class="input-group">
                        <input type="text" class="form-control bg-dark border-dark" style="padding: 25px;" placeholder="Your Email">
                        <div class="input-group-append">
                            <button class="btn btn-primary text-uppercase px-3">Sign Up</button>
                        </div>
                    </div>-->
                </div>
                <i></i>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-dark py-4 px-sm-3 px-md-5">
        <p class="mb-2 text-center text-body">Ride Sharing <a href="#"></a></p>
        <p class="m-0 text-center text-body"><a href="https://htmlcodex.com"></a></p>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="../static/lib/easing/easing.min.js"></script>
    <script src="../static/lib/waypoints/waypoints.min.js"></script>
    <script src="../static/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../static/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../static/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../static/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../static/js/main.js"></script>
</body>

</html>

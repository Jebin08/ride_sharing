<?php
session_start();
include("dbconnect.php");
$username=$_SESSION['username'];
extract($_REQUEST);

$q1=mysqli_query($connect,"select * from rs_driver where id='$did'");
$mr=mysqli_fetch_array($q1);
?>
<?php include("adminheader.php");?>
    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Driver</h1>
			<h4>Ride Service Issuer</h4>
			
			<?php
			if ($act == "yes") {
				mysqli_query($connect, "UPDATE rs_driver SET status='1' WHERE id='$did'");
				$mess = "Dear " . $name . ", Your rs_Request has Approved";
				$q2=mysqli_query($connect,"select * from rs_driver where id='$did'");
                $mr1=mysqli_fetch_array($q2);
				$name=$mr1['name'];
				$email=$mr1['email'];

				$mess = "Dear " . $name . ", Your rs_Request has Approved";

             ?>

				<span style="color:#006600">Request Approved..</span>
						<iframe src="http://iotcloud.co.in/testmail/testmail1.php?message=<?php echo $mess;?>&email=<?php echo $email;?>&subject=Driver Request" width="10" height="10" frameborder="1"></iframe>
						<script>

			setTimeout(function () {
			window.location.href= 'view_driver.php?did=<?php echo $did;?>';
			}, 4000);
			</script>
			<?php
			}
			else{
				
				echo "";

			}
			?>
						<?php
			if ($act == "no") {
				mysqli_query($connect, "UPDATE rs_driver SET status='2' WHERE id='$did'");
				$mess = "Dear " . $name . ", Your rs_Request has Approved";
				$q2=mysqli_query($connect,"select * from rs_driver where id='$did'");
                $mr1=mysqli_fetch_array($q2);
				$name=$mr1['name'];
				$email=$mr1['email'];

				$mess = "Dear " . $name . ", Your rs_Request has Rejected";

             ?>

				<span style="color:#006600">Request Rejected..</span>
						<iframe src="http://iotcloud.co.in/testmail/testmail1.php?message=<?php echo $mess;?>&email=<?php echo $email;?>&subject=Driver Request" width="10" height="10" frameborder="1"></iframe>
						<script>

			setTimeout(function () {
			window.location.href= 'view_driver.php?did=<?php echo $did;?>';
			}, 4000);
			</script>
			<?php
			}
			else{
				
				echo "";

			}
			?>

            <div class="row">
				<div class="col-lg-8 mb-2">
                    <div class="contact-form bg-light mb-4" style="padding: 30px;">
                        <form name="form1" method="post">
                          
							<div class="row">
                                <div class="col-4">
									<img class="img-fluid mb-4" src="<?php echo $mr['photo'];?>" alt="">
                                   
                                </div>
                                <div class="col-6">
									<p>Driver: <?php echo $mr['name'];?></p>
									<p>Gender:<?php echo $mr['gender'];?></p>
									<p>Date of Birth:<?php echo $mr['dob'];?></p>
									<p>Address: <?php echo $mr['address'];?></p>
									<p>City: <?php echo $mr['city'];?></p>
									<p>Pincode: <?php echo $mr['pincode'];?></p>
									<p>Mobile No.: <?php echo $mr['mobile'];?></p>
									<p>Email: <?php echo $mr['email'];?></p>
									<p>Aadhar No.: <?php echo $mr['aadhar'];?></p>
									<p>Registered on:<?php echo $mr['create_date'];?></p>
                                	   
                                </div>
                            </div>
							
							<h4>Vehicle Information</h4>
							<div class="row">
                                <div class="col-4">
									<img class="img-fluid mb-4" src="<?php echo $mr['vphoto'];?>" alt="">
                                   
                                </div>
                                <div class="col-6">
									<p>Driving License No.: <?php echo $mr['driving'];?></p>
									<p>Vehicle: <?php echo $mr['vehicle'];?></p>
									<p>Model: <?php echo $mr['vmodel'];?></p>
									<p>Vehicle No.: <?php echo $mr['photo'];?></p>
								
                                </div>
                            </div>
							
							
                          
                           <div class="form-group">
							<?php 
							if($mr['status']==1)
							{
								?>
								 <span style="color:#009933">Approved</span> /
                                 <a class="btn btn-primary px-3" href="view_driver.php?act=no&did=<?php echo $did;?>">Reject</a>
								 <?php

							}
							elseif($mr['status']==2)
							{
								?>
								<a class="btn btn-primary px-3" href="view_driver.php?act=yes&did=<?php echo $did;?>">Approve</a>
                                 / <span style="color:#FF0000">Rejected</span>
								 <?php

							}
							else{
								?>
								<a class="btn btn-primary px-3" href="view_driver.php?act=yes&did=<?php echo $did;?>">Approve</a>
                                 <a class="btn btn-primary px-3" href="view_driver.php?act=no&did=<?php echo $did;?>">Reject</a>
								 <?php

							}
							?>
						  
                                </div>
								
								
								
                        </form>
                    </div>
                </div>
				
				
				
            </div>
        </div>
    </div>
	
<?php include("footer.php");?>
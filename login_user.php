<?php
include("dbconnect.php");
session_start();
extract($_REQUEST);
$msg="";
if(isset($btn))
	{
		$q1=mysqli_query($connect,"select * from rs_rider where uname='$uname' && pass='$pass' ");
			$n1=mysqli_num_rows($q1);
				if($n1==1)
				{
				$_SESSION['uname']=$uname;
                ?>
                <script language="javascript">
                    alert("Logged In");
                    window.location.href="userhome.php";
                </script>
                <?php
				}
				else
				{
				$msg="Invalid Username or Password!";
				}
	}
?>

<?php include("homeheader.php");?>

    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Rider</h1>
            <div class="row">
                <div class="col-lg-7 mb-2">
                    <div class="contact-form bg-light mb-4" style="padding: 30px;">
                        <form name="form1" method="post">
                          
							<div class="row">
                                <div class="col-6 form-group">
									<label>Username</label>
                                    <input type="text" name="uname" class="form-control p-4" placeholder="" required>
                                </div>
                                <div class="col-6 form-group">
									<label>Password</label>
                                    <input type="password" name="pass" class="form-control p-4" placeholder="" required>
                                </div>
                            </div>
							
							
                          
                           <div class="form-group">
                                    <button class="btn btn-primary py-3 px-5" type="submit" name="btn">Login</button>
                                </div>
								<span style="color:#FF0000"><?php echo $msg;?></span>
								<br>
								<a href="register.php">New Rider</a>
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

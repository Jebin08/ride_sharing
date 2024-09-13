<?php
session_start();
include("dbconnect.php");
$uname=$_SESSION['uname'];
extract($_REQUEST);
$q1=mysqli_query($connect,"select * from rs_driver where uname='$uname'");
$mr=mysqli_fetch_array($q1);
$msg="";
$msg1="";
$rdate=date("d-m-Y");
if(isset($btn))
{

	$mq=mysqli_query($connect,"select max(id) from rs_rideshare");
	$mr=mysqli_fetch_array($mq);
	$id=$mr['max(id)']+1;
    $formattedDate = date('d-m-Y', strtotime(str_replace('/', '-', $pdate)));
    $ins=mysqli_query($connect,"insert into rs_rideshare(id,uname,splace,dplace,route,pdate,ptime,seats,rate,create_date,status,trip_st) values($id,'$uname','$splace','$dplace','$route','$formattedDate','$ptime','$seats','$rate','$rdate','0','2')");
			if($ins)
			{
                mysqli_query($connect, "UPDATE rs_driver SET trip_st='2' WHERE uname='$uname'");
                $msg="success";


		 ?>
	
		 <?php
			}
	
	else
	{
	$msg1="Already Exist!";
	}
}
?>
<?php
			if ($routine == "1") {
				mysqli_query($connect, "UPDATE rs_driver SET trip_st='1' WHERE uname='$uname'");
				
             ?>

				
			<script>
            window.location.href= 'home.php';
		
			</script>
			<?php
			}
			else{
				
				echo "";

			}
			?>
            <?php
			if ($routine == "2") {
				mysqli_query($connect, "UPDATE rs_driver SET trip_st='2' WHERE uname='$uname'");
				
             ?>

				
			<script>
            window.location.href= 'home.php';
		
			</script>
			<?php
			}
			else{
				
				echo "";

			}
			?>
<?php include("driverheader.php");?>
    <div class="container-fluid pt-5">
        <div class="container pt-5">
            <div class="row">
                <div class="col-lg-8 mb-5">
                    <h2 class="display-4 text-uppercase mb-5">Driver Information</h3>
					<h3>Ride Service Issuer</h3>
					<div class="row">
                                <div class="col-4">
									<img class="img-fluid mb-4" src="<?php echo $mr['photo'];?>" alt="">
                                   
                                </div>
                                <div class="col-6">

									<p>Driver: <?php echo $mr['name'];?></p>
									<p>Gender: <?php echo $mr['gender'];?></p>
									<p>Date of Birth: <?php echo $mr['dob'];?></p>
									<p>Address: <?php echo $mr['address'];?></p>
									<p>City: <?php echo $mr['city'];?></p>
									<p>Pincode: <?php echo $mr['pincode'];?></p>
									<p>Mobile No.: <?php echo $mr['mobile'];?></p>
									<p>Email: <?php echo $mr['email'];?></p>
									<p>Aadhar No.: <?php echo $mr['aadhar'];?></p>
									<p>Registered on: <?php echo $mr['create_date'];?></p>
                                	   
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
									<p>Vehicle No.: <?php echo $mr['vno'];?></p>
								
                                </div>
                            </div>
							<h4>Status : 
						    <?php
                            if($mr['vehicle_st']==1)
                            {
                                ?>
                                <span style="color:#FF3300">De-activated</span> /
							    <a href="/home?act=yes">Click to Activate</a>
                            <?php
                            }
                            else
                            {
                                ?>
                                <span style="color:#003399">Activate</span> /
							    <a href="/home?act=no">Click to De-activate</a>
                                <?php

                            }
                            ?>
                            
                          
							</h4>
							
							<p>&nbsp;</p>
							<p>			
                 Set you Trip  <a href="home.php?routine=1">Routine</a> / <a href="home.php?routine=2">Occational</a>
                   </p>
							<h4>Trip Details</h4>
                            <?php 
                            if($mr['trip_st']==1)
                            {
                                ?>
                             <p>Routine Trip (<a href="home1.php">Add</a>)</p>
                             <?php

                            }
                            else if($mr['trip_st']==2)
                            {
                                ?>
                                <p>Occational Trip</p>
                                <?php

                            }
                            else{
                                ?>
                                <p>No Trip</p>
                                <?php


                            }
                            ?>
                            

							
				
               </div>

                <div class="col-lg-4 mb-5">
                    <div class="bg-secondary p-5">
						<form name="form1" method="post">
						
                        <h3 class="text-primary text-center mb-4">Ride Share in Occational Trip</h3>
						<?php
                        if($msg=="success")
                        {
                            ?>
                            <span style="color:#00FF66">Added Success..</span>
						<script>
                        setTimeout(function () {
                        window.location.href= 'home.php';
                        }, 2000);
                        </script>
                        <?php
                        }
                        else{
                            echo '<span style="color:red">' . $msg1 . '</span>';

                        }
                        ?>
                        <div class="form-group">
                            <!--<select name="splace" class="custom-select px-4" style="height: 50px;">
                                <option selected>Source Location</option>
                                <option value="1">Location 1</option>
                                <option value="2">Location 2</option>
                                <option value="3">Location 3</option>
                            </select>-->
							<input type="text" name="splace" class="form-control px-4" placeholder="Source Location" style="height: 50px;" required>
                        </div>
                        <div class="form-group">
                            <!--<select name="dplace" class="custom-select px-4" style="height: 50px;">
                                <option selected>Destination Location</option>
                                <option value="1">Location 1</option>
                                <option value="2">Location 2</option>
                                <option value="3">Location 3</option>
                            </select>-->
							
							<input type="text" name="dplace" class="form-control px-4" placeholder="Destination Location" style="height: 50px;" required>
                        </div>
						<div class="form-group">
               
							<input type="text" name="route" class="form-control px-4" placeholder="Route" style="height: 50px;" required>
                        </div>
						
                        <div class="form-group">
                            <div class="date" id="date1" data-target-input="nearest">
                                <input name="pdate" type="date" class="form-control p-4" placeholder="Pickup Date" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="time" id="time1" data-target-input="nearest">
                                <input type="text" name="ptime" class="form-control p-4 datetimepicker-input" placeholder="Pickup Time"
                                    data-target="#time1" data-toggle="datetimepicker" required />
                            </div>
                        </div>
						<div class="form-group">
                            <div class="time" id="time1" data-target-input="nearest">
                                <input type="text" name="seats" class="form-control p-4" placeholder="Available Seats" />
                            </div>
                        </div>
						
						<div class="form-group">
                            <div class="time" id="time1" data-target-input="nearest">
                                <input type="text" name="rate" class="form-control p-4" placeholder="Rate" required />
                            </div>
                        </div>
                        
                        <div class="form-group mb-0">
                            <button class="btn btn-primary btn-block" type="submit" name="btn" style="height: 50px;">Submit</button>
                        </div>
						</form>
                    </div>
                </div>
				
            </div>
        </div>
    </div>
  
 <?php include("footer.php");?>
<?php
session_start();
include("dbconnect.php");
$uname=$_SESSION['uname'];
extract($_REQUEST);
$msg="";
$msg1="";
$rdate=date("d-m-Y");
if(isset($btn))
{

	$mq=mysqli_query($connect,"select max(id) from rs_rideshare");
	$mr=mysqli_fetch_array($mq);
	$id=$mr['max(id)']+1;
    $ins=mysqli_query($connect,"insert into rs_rideshare(id,uname,splace,dplace,route,pdate,ptime,seats,rate,create_date,status,trip_st) values($id,'$uname','$splace','$dplace','$route','','$ptime','$seats','$rate','$rdate','0','1')");
			if($ins)
			{
                mysqli_query($connect, "UPDATE rs_driver SET trip_st='1' WHERE uname='$uname'");
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
<?php include("driverheader.php");?>
    <div class="container-fluid pt-5">
        <div class="container pt-5">
		  <h2 class="display-4 text-uppercase mb-5">Driver Information</h2>
					<h3>Ride Service Issuer</h3>
            <div class="row">
                <div class="col-lg-4 mb-5">
                  
				
							
						
				
               </div>

                <div class="col-lg-6 mb-5">
			
                    <div class="bg-secondary p-5">
						<form name="form1" method="post">
						
                        <h3 class="text-primary text-center mb-4">Ride Share in Routine Trip</h3>
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
<?php
session_start();
include("dbconnect.php");
$uname = $_SESSION['uname'];
extract($_REQUEST);
$rdate = date("d-m-Y");
date_default_timezone_set('Asia/Kolkata');
$currentDateTime = date('H:i:s');
$msg = "";
$finalamt=$num_seats1*$amount;

if (isset($btn)) {
    $q1 = mysqli_query($connect, "SELECT r.id AS rideshare_id, d.id AS request_id, r.*, d.* 
    FROM rs_rideshare AS r 
    JOIN rs_request AS d ON r.id = d.ride_id 
    WHERE d.rdate='$rdate'
    ORDER BY d.id DESC
    LIMIT 1");


    
    $n1 = mysqli_num_rows($q1);
    $mq = mysqli_query($connect, "SELECT MAX(id) AS max_id FROM rs_request");
    $mr = mysqli_fetch_array($mq);
    $id = $mr['max_id'] + 1;

    if ($n1 == 1) {
        while ($r1 = mysqli_fetch_array($q1)) {
            $num_seats_available = $r1['num_seats'];
            $a_seat = $r1['a_seat'];

            if ($a_seat >= $num_seats_available) {
                
        
                $final_seat = max(0, $a_seat - $num_seats1);
        
                $ins = mysqli_query($connect, "INSERT INTO rs_request(id,ride_id,rider,driver,num_seats,a_seat,rdate,rtime,status,amount,pay_st) VALUES ($id,'$rid','$uname','$driver','$num_seats1','$final_seat','$rdate','$currentDateTime','0','$finalamt','0')");
                
                if ($ins) {
                    ?>
                    <script language="javascript">
                        alert("<?php echo $uname; ?>,Your Booking have been registered!");
                        window.location.href = "user_req.php";
                    </script>
                    <?php
                } else {
                    $msg = "Error while inserting data";
                }
            } else {
                $msg = "Invalid number of seats. Please check the available seats and try again.";
            }
        }
        }
    else if ($n1 == 0) {
        if ($num_seats1 >= 1 && $num_seats1 <= 4) {
            $final_seat2 = $num_seats1;
            $saets=$seats-$num_seats1;

            if ($final_seat2 > 0) {
                $ins = mysqli_query($connect, "INSERT INTO rs_request(id,ride_id,rider,driver,num_seats,a_seat,rdate,rtime,status,amount,pay_st) VALUES ($id,'$rid','$uname','$driver','$final_seat2','$saets','$rdate','$currentDateTime','0','$finalamt','0')");
                if ($ins) {
                    ?>
                    <script language="javascript">
                        alert("<?php echo $uname; ?>,Your booking have been registered!");
                        window.location.href = "user_req.php";
                    </script>
                    <?php
                    
                } else {
                    $msg= "Booking error";
                }
            } else {
                $msg= "Seat count is 0. Skipping insertion.";
            }
        } else {
            $msg= "Invalid seat count";
        }
    } else {
        $msg= "Booking error";
    }
}
?>


<?php include("userheader.php");?>

    <div class="container-fluid pt-5">
        <div class="container pt-5">
		  <h2 class="display-4 text-uppercase mb-5">Send Request</h2>
					<h3>Rider</h3>
            <div class="row">
                <div class="col-lg-4 mb-5">
               </div>

                <div class="col-lg-6 mb-5">
			
                    <div class="bg-secondary p-5">
					
					<span style="color:#0099CC"><?php echo $msg;?></span>
						<form name="form1" method="post">
					
						<div class="form-group">
               				<label>Number of Seats</label>
							<input type="text" name="num_seats1" class="form-control px-4" placeholder="" style="height: 50px;" required>
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
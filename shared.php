<?php
session_start();
include("dbconnect.php");
$uname=$_SESSION['uname'];
extract($_REQUEST);
?>

<?php include("driverheader.php");?>
    <div class="container-fluid pt-5">
        <div class="container pt-5">
		  <h2 class="display-4 text-uppercase mb-5"></h2>
					<h3>Rider Request</h3>
            <div class="row">
                <div class="col-lg-4 mb-5">
                  
				
							
						
				
               </div>

                <div class="col-lg-6 mb-5">
			
                   
						<form name="form1" method="post">
						<?php
            $q2 = mysqli_query($connect, "SELECT * FROM rs_rideshare WHERE uname='$uname' order by id desc");
			$r1 = mysqli_fetch_array($q2);
			
			?>

						<h5>Ride Share on <?php echo $r1['splace']; ?>-<?php echo $r1['dplace']; ?> , <?php echo $r1['pdate']; ?>-<?php echo $r1['ptime']; ?></h5>
						
						
						
                        </form>
						<?php
						if ($act == "ok") {
							$q22 = mysqli_query($connect, "select * from rs_request where id='$reqid'");
							$mr11 = mysqli_fetch_array($q22);
							$num_seats=$mr11['num_seats'];
							$amount=$mr11['amount'];
							/* $finalamt =$num_seats * $amount; */

							mysqli_query($connect, "UPDATE rs_request SET status='1' WHERE id='$reqid'");

							$q2 = mysqli_query($connect, "select * from rs_rider where uname='$rider'");
							$mr1 = mysqli_fetch_array($q2);
							$email = $mr1['email'];

							$mess = "Dear " . $rider . ", Your booking request has been approved for " . $slotbook . " slots. The amount is " . $amount . ".";
						?>
							<span style="color:#006600">Booking Approved..</span>
							<iframe src="http://iotcloud.co.in/testmail/testmail1.php?message=<?php echo $mess; ?>&email=<?php echo $email; ?>&subject=Seat Booking Request" width="10" height="10" frameborder="1"></iframe>
							<script>
								setTimeout(function() {
									window.location.href = 'shared.php';
								}, 4000);
							</script>
						<?php
						} else {
							echo "";
						}
						?>

							<?php
			if ($act == "no") {
				$q22=mysqli_query($connect,"select * from rs_request where id='$reqid'");
				$mr11=mysqli_fetch_array($q22);
				$num_seats=$mr11['num_seats'];
				$amount=$mr11['amount'];
				/* $finalamt=$num_seats*$amount; */
				mysqli_query($connect, "UPDATE rs_request SET status='2' WHERE id='$reqid'");
				$q2=mysqli_query($connect,"select * from rs_rider where uname='$rider'");
                $mr1=mysqli_fetch_array($q2);
				$email=$mr1['email'];

				$mess = "Dear " . $rider . ", Your booking request has been Rejected for " . $slotbook . " slots. The amount is " . $amount . ".";

             ?>

				<span style="color:#006600">Booking Rejected..</span>
						<iframe src="http://iotcloud.co.in/testmail/testmail1.php?message=<?php echo $mess;?>&email=<?php echo $email;?>&subject=Seat Booking Request" width="10" height="10" frameborder="1"></iframe>
						<script>

			setTimeout(function () {
			window.location.href= 'shared.php';
			}, 4000);
			</script>
			<?php
			}
			else{
				
				echo "";

			}
			?>
                  
                </div>
				<br>
				
				
						
						<table class="table">
						<tr>
						<?php
						if($rid){
							$q22 = mysqli_query($connect, "SELECT * FROM rs_request WHERE ride_id='$rid' AND driver='$uname'");


						}
						else{
							            $q22 = mysqli_query($connect, "SELECT * FROM rs_request WHERE ride_id='".$r1['id']."' AND driver='$uname'");


						}
            $k = 1;
            $headings = array("#", "Rider", "No. of Seats", "Request on", "Action");
            foreach ($headings as $heading) {
                ?>
						<th><?php echo $heading; ?></th>
						<?php
            }
            ?>
						</tr>
						<?php
        while ($r11 = mysqli_fetch_array($q22)) {
            ?>	
						

						<tr>
						<td><?php echo $k; ?></td>
						<td><?php echo $r11['rider']; ?></td>
						<td><?php echo $r11['num_seats']; ?></td>
						<td><?php echo $r11['rdate']; ?> <?php echo $r11['rtime']; ?></td>
						<td>
							<?php
						if ($r11['status'] == 1) {
						echo "Accepted<br />";
						echo "Amount: Rs. " . $r11['amount'] . "<br />";
						echo "Pay Status: ";

						if ($r11['pay_st'] == 1) {
							echo "Paid";
						} else {
							echo "Not Paid";
						}
					} elseif ($r11['pay_st'] == 2) {
						echo "Rejected";
					} else {
						?>
						<a href="shared.php?act=ok&reqid=<?php echo $r11['id'];?>&rider=<?php echo $r11['rider'];?>&slotbook=<?php echo $r11['num_seats']; ?>">Accept</a> / <a href="shared.php?act=no&reqid=<?php echo $r11['id'];?>&rider=<?php echo $r11['rider'];?>">Reject</a>
						<?php
					}
					?>
						</td>
						
						</tr>
						<?php
            $k++;
        }
        ?>
						</table>
            </div>
        </div>
    </div>

<?php include("footer.php");?>
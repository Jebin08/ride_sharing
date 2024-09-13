<?php
session_start();
include("dbconnect.php");
$uname = $_SESSION['uname'];
extract($_REQUEST);
?>
<?php include("userheader.php");?>

    <div class="container-fluid pt-5">
        <div class="container pt-5">
		  <h2 class="display-4 text-uppercase mb-5">Request Status</h2>
					<h3>Rider</h3>
            <div class="row">
                <div class="col-lg-4 mb-5">
                  
				
							
						
				
               </div>

              	
						<table class="table">
						<tr>
						<?php
            $q2 = mysqli_query($connect, "SELECT * FROM rs_request WHERE rider='$uname'");
            $k = 1;
            $headings = array("#", "Driver", "No. of Seats", "Request on", "Status");
            foreach ($headings as $heading) {
                ?>
						<th><?php echo $heading; ?></th>
						<?php
            }
            ?>


						
						</tr>
						<?php
        while ($r1 = mysqli_fetch_array($q2)) {
            ?>	
						
						<tr>
						<td><?php echo $k; ?></td>
						<td><?php echo $r1['driver']; ?></td>
						<td><?php echo $r1['num_seats'];?></td>
						<td><?php echo $r1['rdate'];?> <?php echo $r1['rtime'];?></td>
						
						<td>
							<?php
						if ($r1['status'] == 1) {
						echo "Accepted<br />";
						echo "Amount: Rs. " . $r1['amount'] . "<br />";

						if ($r1['pay_st'] == 1) {
							echo "Paid";
						} else {
							?>
								<a href="pay.php?rid=<?php echo $r1['id']; ?>">Payment</a>
								<?php

						}
					} elseif ($r1['status'] == 2) {
						echo "Rejected";
					} else {
						echo "Wait for Request";
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
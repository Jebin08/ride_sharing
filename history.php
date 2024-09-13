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
					<h3>Ride Shared</h3>
            <div class="row">
                <div class="col-lg-4 mb-5">
                  
				
							
						
				
               </div>
						
						<table class="table">
						<tr>
						<?php
            $q22 = mysqli_query($connect, "SELECT * FROM rs_rideshare WHERE uname='$uname'");
            $k = 1;
            $headings = array("#", "Travel on", "Route", "Date / Time", "Trip", "Shared");
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
						<td><?php echo $r11['splace']; ?> - <?php echo $r11['dplace']; ?></td>
						<td><?php echo $r11['route']; ?></td>
						<td><?php echo $r11['pdate']; ?> <?php echo $r11['ptime']; ?></td>
						<td>
							<?php
							if($r11['trip_st']==1)
							{
								echo "Routine";
							} 
							else
							{
								echo "Occational";
							}
							?>
						</td>
						<td><a href="shared.php?rid=<?php echo $r11['id'];?>">View</a></td>
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

<?php
session_start();
include("dbconnect.php");
$username=$_SESSION['username'];
extract($_REQUEST);

/* $q1=mysqli_query($connect,"select * from rs_driver where id='$did'");
$mr=mysqli_fetch_array($q1); */
?>
<?php include("adminheader.php");?>

    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Admin</h1>
			<h4>Driver Information</h4>
            <div class="row">
			<?php
			
            $q1=mysqli_query($connect,"select * from rs_driver where status='1'");
            $k = 1;
            $n1=mysqli_num_rows($q1);
            if($n1>0)
            {
            while($mr=mysqli_fetch_array($q1)){
                ?>

            
               <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4">
                        <img class="img-fluid mb-4" src="<?php echo $mr['photo'];?>" alt="">
                        <h4 class="text-uppercase mb-4"><?php echo $mr['name'];?> [<?php echo $mr['uname'];?>]</h4>
						<p>Mobile: <?php echo $mr['mobile'];?></p>
						<p>Email: <?php echo $mr['email'];?></p>
						<p>Registered on <?php echo $mr['create_date'];?></p>

                        <a class="btn btn-primary px-3" href="view_driver.php?did=<?php echo $mr['id'];?>">View</a>
                    </div>
                </div>
                <?php
                 $k++;

                }
                
            }
            else{
                ?>
                			<span style="color:#0033CC">No Information!!</span>
                            <?php


            }
            ?>
				
			

            </div>
        </div>
    </div>
<?php include("footer.php");?>
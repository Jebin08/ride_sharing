<?php
session_start();
include("dbconnect.php");
$uname = $_SESSION['uname'];
$mq = mysqli_query($connect, "SELECT DISTINCT splace FROM rs_rideshare");
$sdata = array();

while ($mr = mysqli_fetch_array($mq)) {
    $sdata[] = $mr['splace'];
}
$mq1 = mysqli_query($connect, "SELECT DISTINCT dplace FROM rs_rideshare");
$ddata = array();

while ($mr1 = mysqli_fetch_array($mq1)) {
    $ddata[] = $mr1['dplace'];
}

?>


<?php include("userheader.php"); ?>


<div class="container-fluid bg-white pt-3 px-lg-5">
    <form name="form1" method="post">
        <div class="row mx-n2">
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <input type="text" name="getval" class="form-control" placeholder="Search Route" style="height: 50px;">
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select name="splace" class="custom-select px-4 mb-3" style="height: 50px;">
                    <option value="">-Source-</option>
                    <?php
                    foreach ($sdata as $dr) {
                        echo "<option>$dr</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <select name="dplace" class="custom-select px-4 mb-3" style="height: 50px;">
                    <option value="">-Destination-</option>
                    <?php
                    foreach ($ddata as $dr1) {
                        echo "<option>$dr1</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <div class="date mb-3" id="date" data-target-input="nearest">
                    <input type="date" name="rdate1" class="form-control p-4 datetimepicker-input" placeholder="Pickup Date" />
                </div>
            </div>
            <div class="col-xl-2 col-lg-4 col-md-6 px-2">
                <button class="btn btn-primary btn-block mb-3" type="submit" name="btn" style="height: 50px;">Search</button>
            </div>
        </div>
    </form>
</div>
<?php
function formatDate($inputDate) {
    $dateTime = new DateTime($inputDate);
    return $dateTime->format('d-m-Y');
}

// Assuming you have already connected to the database using $connect

if (isset($_POST['btn'])) {
    $getval = $_POST['getval'];
    $splace = $_POST['splace'];
    $dplace = $_POST['dplace'];
    $rdate1 = $_POST['rdate1'];
    $rdate2 = formatDate($rdate1);

    if ($splace !== "" && $dplace !== "" && $getval !== "" && $rdate1 !== "") {
        $query = "SELECT r.id AS rideshare_id, d.id AS driver_id, r.*, d.* FROM rs_rideshare AS r, rs_driver AS d WHERE r.uname=d.uname AND r.splace='$splace' AND r.dplace='$dplace' AND r.route LIKE '%$getval%' AND (r.pdate='$rdate2' OR r.trip_st=1)";
    } else if ($getval == "" && $splace !== "" && $dplace !== "" && $rdate1 !== "") {
        $query = "SELECT r.id AS rideshare_id, d.id AS driver_id, r.*, d.* FROM rs_rideshare AS r, rs_driver AS d WHERE r.uname=d.uname AND r.splace='$splace' AND r.dplace='$dplace' AND (r.pdate='$rdate2' OR r.trip_st=2)";
    } else {
        $query = "SELECT r.id AS rideshare_id, d.id AS driver_id, r.*, d.* FROM rs_rideshare AS r, rs_driver AS d WHERE r.uname=d.uname AND r.splace='$splace' AND r.dplace='$dplace' AND r.trip_st=1";
    }
    

    // Add error handling for the query execution
    $q1 = mysqli_query($connect, $query);
    if (!$q1) {
        die('Error: ' . mysqli_error($connect));
    }

    ?>

    <div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-4 text-uppercase text-center mb-5">Ride Sharing</h1>
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-2">
                    <?php
                    // Check if there are results before entering the loop
                    if (mysqli_num_rows($q1) > 0) {
                        while ($rs = mysqli_fetch_array($q1)) {
                            ?>
                            <div class="rent-item mb-4">
                                <h4 class="text-uppercase mb-4">Share by <?php echo $rs['uname']; ?></h4>
                                <p>Vehicle: <?php echo $rs['driving']; ?></p>
                                <p>No. of Seats: <?php echo $rs['seats']; ?></p>
                                <div class="d-flex justify-content-center mb-4">
                                    <div class="px-2">
                                        <i class="fa fa-car text-primary mr-1"></i>
                                        <span><?php echo $rs['splace']; ?> - <?php echo $rs['dplace']; ?></span>
                                    </div>
                                    <div class="px-2 border-left border-right">
                                        <i class="fa fa-cogs text-primary mr-1"></i>
                                        <span>Route: <?php echo $rs['route']; ?></span>
                                    </div>
                                    <div class="px-2">
                                        <i class="fa fa-road text-primary mr-1"></i>
                                        <span><?php echo $rs['ptime']; ?></span>
                                    </div>
                                </div>
                                <p>Rs. <?php echo $rs['rate']; ?></p>
                                <a class="btn btn-primary px-3" href="send.php?act=yes&rid=<?php echo $rs['rideshare_id']; ?>&seats=<?php echo $rs['seats'];?>&driver=<?php echo $rs['uname'];?>&amount=<?php echo $rs['rate'];?>">Send Request</a>
                            </div>
                            <?php
                        }
                    } else {
                        echo '<span style="color:red">No Information! or Incorrect Date!</span>';

                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
    <?php
}
?>


<?php include("footer.php"); ?>

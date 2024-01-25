<?php
include('../includes/connection.php');
 $id=$_POST['d_id'];
$sql="SELECT * FROM `district` WHERE province_id='$id'";
$run=mysqli_query($conn,$sql);

?>

<select id="inputProvince" name="district" class="form-select">
        <option value="">Select</option>

        <?php
        while($fet=mysqli_fetch_array($run)){
            ?>
<option value="<?php echo $fet['dc_id'];?>"><?php echo $fet['district'];?></option>

<?php
        }
        ?>

</select>


<!-- ================ -->

<?php

 $id2=$_POST['d_id2'];
$sql2="SELECT * FROM `tehsil` WHERE th_district='$id2'";
$run2=mysqli_query($conn,$sql2);

?>

<select id="inputProvince" name="tehsil" class="form-select">
        

        <?php
        while($fet=mysqli_fetch_array($run2)){
            ?>
<option value="<?php echo $fet['th_id'];?>"><?php echo $fet['th_name'];?></option>

<?php
        }
        ?>

</select>


<!-- ================= -->


<?php

 $id3=$_POST['d_id3'];
$sql3="SELECT * FROM `court` WHERE district_cou='$id3'";
$run3=mysqli_query($conn,$sql3);

?>

<select id="inputProvince" name="court" class="form-select">
        

        <?php
        while($fet=mysqli_fetch_array($run3)){
            ?>
<option value="<?php echo $fet['cou_id'];?>"><?php echo $fet['cou_name'];?></option>

<?php
        }
        ?>

</select>


<!-- ================= -->



<?php
// include('../includes/connection.php');
 $id4=$_POST['d_id4'];
$sql4="SELECT * FROM `court_type` WHERE court_id='$id4'";
$run4=mysqli_query($conn,$sql4);

?>

<select id="inputProvince" name="court_type" class="form-select">
        

        <?php
        while($fet=mysqli_fetch_array($run4)){
            ?>
<option value="<?php echo $fet['coid'];?>"><?php echo $fet['cotype'];?></option>

<?php
        }
        ?>

</select>

<!-- ================= -->


<?php
// include('../includes/connection.php');
 $id8=$_POST['d_id8'];
$sql8="SELECT * FROM `court_name` WHERE cn_courttype='$id8'";
$run8=mysqli_query($conn,$sql8);

?>

<select id="inputProvince" name="court_name" class="form-select">
        

        <?php
        while($fet=mysqli_fetch_array($run8)){
            ?>
<option value="<?php echo $fet['c_id'];?>"><?php echo $fet['court_name'];?></option>

<?php
        }
        ?>

</select>

<!-- ================= -->



<?php

 $id5=$_POST['d_id5'];
$sql5="SELECT * FROM `police_station` WHERE tehsil_id='$id5'";
$run5=mysqli_query($conn,$sql5);

?>

<select id="inputProvince" name="police_station" class="form-select">
        

        <?php
        while($fet=mysqli_fetch_array($run5)){
            ?>
<option value="<?php echo $fet['po_id'];?>"><?php echo $fet['policestation'];?></option>

<?php
        }
        ?>

</select>

<!-- ================= -->


<?php
// include('../includes/connection.php');
 $id6=$_POST['d_id6'];
$sql6="SELECT * FROM `case_category` WHERE casetype='$id6'";
$run6=mysqli_query($conn,$sql6);

?>

<select id="inputProvince" name="casecategory" class="form-select">
        

        <?php
        while($fet=mysqli_fetch_array($run6)){
            ?>
<option value="<?php echo $fet['case_id'];?>"><?php echo $fet['case_category'];?></option>

<?php
        }
        ?>

</select>

<!-- ================= -->

<?php
// include('../includes/connection.php');
 $id7=$_POST['d_id7'];
$sql7="SELECT * FROM view_sub_category WHERE idcase_cate='$id7'";
$run7=mysqli_query($conn,$sql7);

?>

<select id="inputProvince" name="casecategory" class="form-select">
        

        <?php
        while($fet=mysqli_fetch_array($run7)){
            ?>
<option value="<?php echo $fet['case_sub_id'];?>"><?php echo $fet['sub_category'];?></option>

<?php
        }
        ?>

</select>

<!-- ================= -->

<?php
include('../includes/connection.php');
 $id=$_POST['d_id1'];
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



<?php
 $id3=$_POST['d_id3'];
$sql="SELECT * FROM `court` WHERE tehsil_id='$id3'";
$run=mysqli_query($conn,$sql);

?>

<select id="inputProvince" name="court" class="form-select">
        

        <?php
        while($fet=mysqli_fetch_array($run)){
            ?>
<option value="<?php echo $fet['cou_id'];?>"><?php echo $fet['cou_name'];?></option>

<?php
        }
        ?>

</select>




<?php

 $id4=$_POST['d_id4'];
$sql4="SELECT * FROM `court_type` WHERE court_id='$id4'";
$run4=mysqli_query($conn,$sql4);

?>

<select id="inputProvince" name="court_type" class="form-select court_type">
        

        <?php
        while($fet=mysqli_fetch_array($run4)){
            ?>
<option value="<?php echo $fet['coid'];?>"><?php echo $fet['cotype'];?></option>

<?php
        }
        ?>

</select>






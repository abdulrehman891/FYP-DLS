<?php
include('../includes/connection.php');
$id1=$_POST['d_id1'];
$sql1="SELECT * FROM `district` WHERE province_id='$id1'";
$run1=mysqli_query($conn,$sql1);

?>

<select id="inputProvince" name="district" class="form-select">
        <option value="">Select</option>

        <?php
        while($fet=mysqli_fetch_array($run1)){
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


echo $id3=$_POST['d_id3'];
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








<?php
include('../includes/connection.php');
 $id=$_POST['d_id'];
$sql="SELECT * FROM `district` WHERE province_id='$id'";
$run=mysqli_query($conn,$sql);

?>

<select id="inputProvince" name="district" class="form-select">
        <option value="">Select District</option>

        <?php
        while($fet=mysqli_fetch_array($run)){
            ?>
<option value="<?php echo $fet['dc_id'];?>"><?php echo $fet['district'];?></option>

<?php
        }
        ?>

</select>




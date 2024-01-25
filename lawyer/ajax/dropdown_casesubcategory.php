<?php
include('../includes/connection.php');
 $id=$_POST['d_id'];
$sql="SELECT * FROM `case_category` WHERE casetype='$id'";
$run=mysqli_query($conn,$sql);

?>

<select id="inputProvince" name="casecategory" class="form-select casecategory">
        <option value="">Select Case Category</option>

        <?php
        while($fet=mysqli_fetch_array($run)){
            ?>
<option value="<?php echo $fet['case_id'];?>"><?php echo $fet['case_category'];?></option>

<?php
        }
        ?>

</select>
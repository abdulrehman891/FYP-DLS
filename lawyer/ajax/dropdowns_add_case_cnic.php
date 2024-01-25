<?php
include('../includes/connection.php');
  $id=$_POST['d_id'];
  $lawyer_key = $_SESSION['lawyer_id'];
  if ($_SESSION['user'] == 'USER') {
                                  
  
  $sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
    $lawyer_key=$row['lawer_key'];
    
  }
$sql="SELECT * FROM `client` WHERE client_id='$id' and lawyer_id='$lawyer_key'";
$run=mysqli_query($conn,$sql);



    ?>
<select id="inputcnic" name="cnic" class="form-select">
        <option value="">Select</option>

        <?php
        while($fet=mysqli_fetch_array($run)){
        ?>
       
<option value="<?php echo $fet['client_id'];?>"><?php echo $fet['client_cnic'];?></option>

<?php
        }
        ?>

</select>

<!-- ============== -->
<?php
  $id2=$_POST['d_id2'];
//   $l_id2=$_SESSION['lawyer_id'];
  $sql1="SELECT * FROM `client` WHERE client_id='$id2' and lawyer_id='$lawyer_key'";
$run1=mysqli_query($conn,$sql1);



    ?>
<select id="inputclientmobile" name="clientmobile" class="form-select">
     

        <?php
        while($fet1=mysqli_fetch_array($run1)){
        ?>
       
<option value="<?php echo $fet1['client_id'];?>"><?php echo $fet1['client_mobile'];?></option>

<?php
        }
        ?>

</select>

<!-- ============== -->
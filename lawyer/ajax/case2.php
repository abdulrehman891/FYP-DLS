<?php 

include('../includes/connection.php');



// SELECT Court Using Court Type

$courtTypeName = $_REQUEST['courtTypeName'];
$sql = "SELECT * FROM court WHERE court_type_name = '$courtTypeName' ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $data .= '<option>'.$row['court_name'].'</option>';
}
echo $data;





?>
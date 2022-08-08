<?php 

include('../includes/connection.php');



// SELECT District Using Province

$provinceId = $_REQUEST['provinceId'];
$sql = "SELECT * FROM district WHERE province_id = '$provinceId' ";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $data .= '<option>'.$row['district_name'].'</option>';
}
echo $data;





?>
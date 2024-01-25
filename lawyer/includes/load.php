
<?php 
if(!isset($_SESSION)){
    session_start();
}

$conn = mysqli_connect("localhost", "root", "", "dls2");

$lawyer_key = $_SESSION['lawyer_id'];
if ($_SESSION['user'] == 'USER') {
                                

$sql1 = "SELECT * FROM `lawyer_user_access` WHERE `user_access_id`= '$lawyer_key'";
  $result1 = mysqli_query($conn, $sql1);
  $row = mysqli_fetch_assoc($result1);
  $lawyer_key=$row['lawer_key'];
  
}
$sql = "SELECT * FROM appointment WHERE lawyer_id = '$lawyer_key' AND (appointment_status = 1 OR appointment_status = 0)";
$result = mysqli_query($conn, $sql);
while($row = mysqli_fetch_assoc($result)){
    $data[] = array(
        'id' => $row['appointment_id'],
        'title' => 'Appointment - ' . $row['client_name'],
        'start' => $row['appointment_date'] . ' ' . $row['appointment_time']
        // 'end' => $row['end']
    );
}

echo json_encode($data);

?>

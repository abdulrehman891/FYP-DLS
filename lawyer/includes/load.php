
<?php 

$conn = mysqli_connect("localhost", "root", "", "dls");


$sql = "SELECT * FROM appointment WHERE appointment_status = 1 OR appointment_status = 0";
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

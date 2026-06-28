<?php 

include('../includes/connection.php');


    
        // Show data for Edit
        $caseTypeId = $_REQUEST['id'];
        $sql = "SELECT * FROM casetype WHERE case_type_id = '$caseTypeId'";
        $result = mysqli_query($conn, $sql);
        $data = mysqli_fetch_assoc($result);
        echo json_encode($data);



?>
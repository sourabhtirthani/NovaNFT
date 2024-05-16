<?php
// Include your database connection file
include "connection.php";

// Assume you have the ID of the entry you want to copy
$code = $_POST['code'];
$status=$_POST['status'];

if($status==0){
    $fetchSql="SELECT * FROM coupencode WHERE code = '$code'";
    $fetchResult = $conn->query($fetchSql);
    if($fetchResult->num_rows == 0){
        $response = array(
            'message' =>  'Invalid Coupen Code',
            'status' => 404 
        );
        $json_response = json_encode($response);
        echo $json_response;
    }else{
        $data = array();

        // Fetch each row from the result set
        while ($fetchRow = $fetchResult->fetch_assoc()) {
            // Add row data to the array
            $data[] = $fetchRow;
        }
        $response = array(
            'data'=>   $data,
            'message' =>  'valid Coupen Code',
            'status' => 200 
        );
        $json_response = json_encode($response);
        echo $json_response;
    }
}
else{
    $ownerAddress = $_POST['owner_address'];

// Fetch the existing entry from the database
$sql = "SELECT * FROM coupencode WHERE code = '$code' AND address='$ownerAddress'"; // Replace 'your_table_name' with your actual table name
$result = $conn->query($sql);

// Check if the query returned any results
if ($result->num_rows == 0) {
    // Fetch the existing entry
    $row = $result->fetch_assoc();

    // Set the timezone to India
    date_default_timezone_set('Asia/Kolkata');
    $currentTimestamp = time();
    $currentTime = date("Y-m-d H:i:s", $currentTimestamp);

    // Insert the modified entry back into the database
    $sql="INSERT INTO `coupencode`(`code`, `address`) VALUES ('$code','$ownerAddress')";
    
   if ($conn->query($sql) === TRUE) {
    // Execute the query
        $response = array(
            'message' =>  'Success',
            'status' => 201 
        );
        $json_response = json_encode($response);
        echo $json_response;
    
    } else {
        $response = array(
            'message' =>  $conn->error,
            'status' => 400 
        );
        $json_response = json_encode($response);
        echo $json_response;
    }
} else {
   // echo "No entry found with ID: $id";
    $response = array(
        'message' =>  "Same Coupen Code Already Given to User",
        'status' => 401 
    );
    $json_response = json_encode($response);
    echo $json_response;
}
}


?>

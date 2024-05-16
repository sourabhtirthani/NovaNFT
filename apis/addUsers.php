<?php
// Include your database connection file
include "connection.php";

// Assume you have the ID of the entry you want to copy
$ownerAddress = $_POST['address'];
$random_number = rand(1000, 9999); // Generate a random number between 1000 and 9999

// Concatenate "NOVA" with the random number
$username = "NOVA" . $random_number;


// Fetch the existing entry from the database
$sql = "select * from users where address='$ownerAddress'"; // Replace 'your_table_name' with your actual table name
$result = $conn->query($sql);

// Check if the query returned any results
if ($result->num_rows == 0) {

    date_default_timezone_set('Asia/Kolkata');
    $currentTimestamp = time();
    $currentTime = date("Y-m-d H:i:s", $currentTimestamp);

    // Insert the modified entry back into the database
    $sql="INSERT INTO `users`(`address`, `name`,  `joiningTime`) VALUES ('$ownerAddress','$username','$currentTime')";
    
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
    $data = array();

    // Fetch each row from the result set
    while ($row = $result->fetch_assoc()) {
        // Add row data to the array
        $data[] = $row;
    }
   // echo "No entry found with ID: $id";
    $response = array(
        'message' =>  "user Already Exits",
        'data'=>$data,
        'status' => 200 
    );
    $json_response = json_encode($response);
    echo $json_response;
}

?>

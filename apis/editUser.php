<?php
// Include your database connection file
include "connection.php";

// Assume you have the ID of the entry you want to copy
$ownerAddress = $_POST['address'];
$name = $_POST['name'];

// Fetch the existing entry from the database
$sql = "select * from users where address='$ownerAddress'"; // Replace 'your_table_name' with your actual table name
$result = $conn->query($sql);

// Check if the query returned any results
if ($result->num_rows > 0) {

     $sql="UPDATE `users` SET `name`='$name' WHERE address='$ownerAddress'";
    
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
    $response = array(
        'message' =>  "Invalid Entry! Address Not Found ",
        'status' => 400 
    );
    $json_response = json_encode($response);
    echo $json_response;
}

?>

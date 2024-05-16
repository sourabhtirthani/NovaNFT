<?php
// MySQL database connection parameters
include "connection.php";
$address=$_GET['address'];
// Prepare SQL statement to fetch data
$sql = "SELECT * FROM nft_info where nft_owner_address='$address'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Create an array to store results
    $data = array();

    // Fetch each row from the result set
    while ($row = $result->fetch_assoc()) {
        // Add row data to the array
        $data[] = $row;
    }
    // Encode data as JSON and output
    $response = array(
        'message'=>'Data Found',
        'data' =>  $data,
        'status' => 200 
    );
    $json_response = json_encode($response);
    echo $json_response;
} else {
    // If no data found
    $response = array(
        'message'=>'Data  NOT Found',
        'data' => '' ,
        'status' => 400 
    );
    $json_response = json_encode($response);
    echo $json_response;
}

// Close MySQL connection
$conn->close();
?>

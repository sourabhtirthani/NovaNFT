<?php
// MySQL database connection parameters
include "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nftId = $_POST['nft_id'];
    

// Prepare SQL statement to insert data
    $sql = "DELETE FROM `nft_info` WHERE `nft_id`=$nftId";

    if ($conn->query($sql) === TRUE) {
        $response = array(
            'message' => 'NFT deleted successfully',
            'status' => 201 
        );
        $json_response = json_encode($response);
        echo $json_response;
    } else {
        //echo "Error: " . $sql . "<br>" . $conn->error;
        $response = array(
            'message' =>  $conn->error,
            'status' => 400 
        );
        $json_response = json_encode($response);
        echo $json_response;
    }
    }


?>

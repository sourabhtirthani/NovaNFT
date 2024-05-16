<?php
// Include your database connection file
include "connection.php";

// Assume you have the ID of the entry you want to copy
$ownerAddress = $_POST['owner_address'];
$id = $_POST['id'];
$price=$_POST['price'];
$sell=$_POST['sell'];

    $sql="UPDATE `nft_info` SET `price`='$price' ,`sell`=$sell WHERE nft_id='$id' AND nft_owner_address='$ownerAddress'";
    
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


?>
<?php
// Include your database connection file
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
// Assume you have the ID of the entry you want to copy
$planId = $_POST['planId'];
$nftId = $_POST['nftId'];
$address = $_POST['address'];
$amount = $_POST['amount'];
$nftAddress = $_POST['nftAddress'];


    date_default_timezone_set('Asia/Kolkata');
    $currentTimestamp = time();
    // fetch and modifiy nft cpoies
    $nftsql="SELECT nft_cpoies FROM `nft_info` where nft_id=$nftId AND nft_owner_address='$address'";
    $nftResult = $conn->query($nftsql);
    $nftRow = $nftResult->fetch_assoc();
    $newcopies=$nftRow['nft_cpoies']-$amount;
    $updatecopies="UPDATE `nft_info` SET `nft_cpoies`=$newcopies WHERE `nft_id`=$nftId AND `nft_owner_address`='$address'";
    $conn->query($updatecopies); 
    
    //=============================================================================
    
    // Insert the modified entry back into the database
    $plansql="SELECT `apy`, `lockingPeriod` FROM `stakingPlans` WHERE planId=$planId";
    $planResult = $conn->query($plansql);
    $plansRow = $planResult->fetch_assoc();
    
    $apy=$plansRow['apy'];
    $unlockTime=$currentTimestamp+($plansRow['lockingPeriod']*86400);
    $sql="INSERT INTO `stakes`( `address`, `planId`, `nftAddress`, `nftId`, `amount`, `apy` ,`time`,`unlockTime`) VALUES 
    ('$address',$planId,'$nftAddress',$nftId,$amount,$apy,$currentTimestamp,$unlockTime)";
    
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

}
else if($_SERVER["REQUEST_METHOD"] == "GET"){
    $address = $_GET['address'];
    $sql = "SELECT * FROM stakes LEFT JOIN nft_info ON stakes.nftId = nft_info.nft_id WHERE stakes.address = '$address' AND isClaimed=0
                                                 UNION 
    SELECT * FROM stakes RIGHT JOIN nft_info ON stakes.nftId = nft_info.nft_id WHERE stakes.address = '$address' AND isClaimed=0";
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

}

else if($_SERVER["REQUEST_METHOD"]=="DELETE"){
    $requestData = json_decode(file_get_contents("php://input"), true);

    $planId = $requestData['planId'];
    $nftId = $requestData['nftId'];
    $address = $requestData['address'];
    $sql="DELETE FROM `stakes` WHERE `address`='$address' AND`planId`=$planId AND`nftId`=$nftId";
    
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
    
}


else if($_SERVER["REQUEST_METHOD"]=="PATCH"){
    $requestData = json_decode(file_get_contents("php://input"), true);

    $planId = $requestData['planId'];
    $nftId = $requestData['nftId'];
    $address = $requestData['address'];
    
    $sql="UPDATE `stakes` SET  isClaimed=1 WHERE  `address`='$address' AND`planId`=$planId AND`nftId`=$nftId";
    
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
    
}
?>
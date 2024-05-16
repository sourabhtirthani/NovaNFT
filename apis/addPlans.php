<?php
// Include your database connection file
include "connection.php";

if($_SERVER["REQUEST_METHOD"] == "POST"){
// Assume you have the ID of the entry you want to copy
$planId = $_POST['planId'];
$apy = $_POST['apy'];
$lockingPeriod = $_POST['lockingPeriod'];
$rewardToken = $_POST['rewardToken'];
$rewardTokenName = $_POST['rewardTokenName'];


    date_default_timezone_set('Asia/Kolkata');
    $currentTimestamp = time();
    $currentTime = date("Y-m-d H:i:s", $currentTimestamp);

    // Insert the modified entry back into the database
    
    $sql="INSERT INTO `stakingPlans`( `planId`, `apy`, `lockingPeriod`, `rewardToken`, `rewardTokenName`, `time`) 
    VALUES ($planId,$apy,$lockingPeriod,'$rewardToken','$rewardTokenName','$currentTime')";
    
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
    $sql = "SELECT * FROM stakingPlans";
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
?>

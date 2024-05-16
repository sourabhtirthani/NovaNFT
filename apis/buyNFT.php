<?php
// Include your database connection file
include "connection.php";

// Assume you have the ID of the entry you want to copy
$id = $_POST['id'];
$ownerAddress = $_POST['owner_address'];
$copies = $_POST['copies'];
$newOwner=$_POST['new_owner'];
$coupenCode=$_POST['coupen_code'];

// Fetch the existing entry from the database
$sql = "SELECT * FROM nft_info WHERE nft_id = $id AND nft_owner_address='$ownerAddress'"; // Replace 'your_table_name' with your actual table name
$result = $conn->query($sql);

// Check if the query returned any results
if ($result->num_rows > 0) {
    // Fetch the existing entry
    $row = $result->fetch_assoc();

    // Set the timezone to India
    date_default_timezone_set('Asia/Kolkata');
    $currentTimestamp = time();
    $currentTime = date("Y-m-d H:i:s", $currentTimestamp);
    
    $newsql = "SELECT * FROM nft_info WHERE nft_id = $id AND nft_owner_address='$newOwner'";
    $newresult = $conn->query($newsql);
    if ($newresult->num_rows == 0)
    {
    $sql="INSERT INTO `nft_info`( `nft_id`, `nft_cpoies`, `nft_owner_address`, `nft_creator_address`, `image`, `discription`, `price`, `sub_title`, `royalties`, `computing_power`, `energy_efficiency`, `special_events`, `rarity`, `sell`,`time`,`isAdminMinted`)
    VALUES ('{$row['nft_id']}','{$copies}','{$newOwner}','{$row['nft_creator_address']}','{$row['image']}','{$row['discription']}','{$row['price']}','{$row['sub_title']}','{$row['royalties']}','{$row['computing_power']}','{$row['energy_efficiency']}','{$row['special_events']}','{$row['rarity']}','0','{$currentTime}',0)";
    
    }else{
        $newrow = $newresult->fetch_assoc();
        $updatedNFTs=$newrow['nft_cpoies']+$copies;

        $sql="UPDATE `nft_info` SET `nft_cpoies`='$updatedNFTs',`sell`='0' WHERE  nft_id='$id' && `nft_owner_address`='$newOwner'";
    }
    // Insert the modified entry back into the database
    
   if ($conn->query($sql) === TRUE) {
    $remainingNFTs=$row['nft_cpoies']-$copies;
    $updateSql = "UPDATE `nft_info` SET `nft_cpoies`='$remainingNFTs' WHERE nft_id='$id' AND nft_owner_address='$ownerAddress'"; // Modify the query as needed
    // Execute the query
    
    if ($conn->query($updateSql) === TRUE) {
        if($coupenCode) updateCouponCodeFreq($conn,$coupenCode);
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
            'message' =>  $conn->error,
            'status' => 400 
        );
        $json_response = json_encode($response);
        echo $json_response;
    }
} else {
   // echo "No entry found with ID: $id";
    $response = array(
        'message' =>  "No entry found with ID: $id",
        'status' => 401 
    );
    $json_response = json_encode($response);
    echo $json_response;
}

function updateCouponCodeFreq($conn,$coupenCode) {
    $codesql = "SELECT * FROM coupencode WHERE code = '$coupenCode'";
    $coderesult = $conn->query($codesql);
    if($coderesult->num_rows > 0){
        $coderow = $coderesult->fetch_assoc();

        $freq=$coderow['frequency']+1;
        $updateSQL="UPDATE `coupencode` SET `frequency`='$freq' WHERE code='$coupenCode'";
        $conn->query($updateSQL);
        return;
    }else{
        $response = array(
        'message' =>  "No coupon code",
        'status' => 401 
    );
    $json_response = json_encode($response);
    echo $json_response;
    }
}
?>

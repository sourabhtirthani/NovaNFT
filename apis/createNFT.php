<?php
// MySQL database connection parameters
include "connection.php";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $nftId = $_POST['nft_id'];
    $nftCopies = $_POST['nft_copies'];
    $nftOwnerAddress = $_POST['nft_owner_address'];
    $nftCreatorAddress = $_POST['nft_creator_address'];
    $discription = $_POST['discription'];
    $price = $_POST['price'];
    $subTitle = $_POST['sub_title'];
    $royalties = $_POST['royalties'];
    $computingPower = $_POST['computing_power'];
    $energyEfficiency = $_POST['energy_efficiency'];
    $specialEvents = $_POST['special_events'];
    $rarity = $_POST['rarity'];


    // Set the timezone to India
    date_default_timezone_set('Asia/Kolkata');

    // Get the current timestamp
    $currentTimestamp = time();

    // Convert timestamp to desired format
    $currentTime = date("Y-m-d H:i:s", $currentTimestamp);
    // Add more fields as needed

    // Handle image upload
    $target_dir = "../uploads/"; // Specify the folder where images will be stored
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $response = array(
            'message' => 'File is not an image.',
            'status' => 400 
        );
        $json_response = json_encode($response);
        echo $json_response;
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["image"]["size"] > 500000) {
        $response = array(
            'message' => 'Sorry, your file is too large.',
            'status' => 400 
        );
        $json_response = json_encode($response);
        echo $json_response;
        $uploadOk = 0;
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif") {
        $response = array(
            'message' => 'Sorry, only JPG, JPEG, PNG & GIF files are allowed.',
            'status' => 400 
        );
        $json_response = json_encode($response);
        echo $json_response;
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $response = array(
            'message' => 'Sorry, your file was not uploaded.',
            'status' => 400 
        );
        $json_response = json_encode($response);
        echo $json_response;
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
            // File uploaded successfully, proceed to insert data into database
            $image_url = "uploads/" . basename($_FILES["image"]["name"]);

            // Prepare SQL statement to insert data
            $sql = "INSERT INTO nft_info (`nft_id`, `nft_cpoies`, `nft_owner_address`, `nft_creator_address`, `image`, `time`,`discription`,`price`,`sub_title`,`royalties`, `energy_efficiency`,`computing_power`,`special_events`,`rarity`) 
            VALUES ('$nftId', '$nftCopies', '$nftOwnerAddress','$nftCreatorAddress','$image_url','$currentTime','$discription','$price','$subTitle','$royalties','$energyEfficiency','$computingPower','$specialEvents','$rarity')";

            if ($conn->query($sql) === TRUE) {
                createMetadata($computingPower,$energyEfficiency,$specialEvents,$rarity,$nftId,$subTitle,$nftCreatorAddress,$discription,$image_url);
                $response = array(
                    'message' => 'NFT minted Successfully',
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
        } else {
            echo "Sorry, there was an error uploading your file.";
            $response = array(
                'message' => 'Sorry, there was an error uploading your file.',
                'status' => 400 
            );
            $json_response = json_encode($response);
            echo $json_response;
        }
    }
}

function createMetadata($computingPower,$energyEfficiency,$specialEvents,$rarity,$nftId,$subTitle,$nftCreatorAddress,$discription,$image_url){
    $data = array(
    "attributes" => array(
        array("trait_type" => "Computing_power", "value" => $computingPower),
        array("trait_type" => "Energy efficiency", "value" => $energyEfficiency),
        array("trait_type" => "Special events", "value" => $specialEvents),
        array("trait_type" => "rarity", "value" => $rarity)
    ),
    "name" => $subTitle,
    "artist" => $nftCreatorAddress,
    "description" => $discription,
    "image" => "https://www.coodingdessign.com/novarealchain/$image_url",
    "external_url" => "https://www.coodingdessign.com/novarealchain/tokens/$nftId",
    "tokenIndex" => $nftId,
);

$directory = '../tokens/';

// Generate a unique file name for the new JSON file
$fileName =  $directory . $nftId . '.json';

// Encode data to JSON format
$jsonData = json_encode($data, JSON_PRETTY_PRINT);

// Write JSON data to the new file
$file = fopen($fileName, 'w');
fwrite($file, $jsonData);
fclose($file);

}
?>

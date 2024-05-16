<?php
// Fetch data based on the search query
include "connection.php";
$search = isset($_GET['search']) ? $_GET['search'] : '';
$isAdminMinted = isset($_GET['isAdminMinted']) ? $_GET['isAdminMinted'] : 1;

// Check if sorting parameter is provided
$query = "SELECT * FROM nft_info WHERE isAdminMinted=$isAdminMinted AND sub_title LIKE '%$search%' AND sell=1 ";
if (isset($_GET['sort'])) {
    $sort = $_GET['sort'];
    if ($sort === 'asc') {
        $query .= " ORDER BY price ASC";
    } elseif ($sort === 'desc') {
        $query .= " ORDER BY price DESC";
    }
}else{
    $query .= " ORDER BY id DESC";
}
$result = $conn->query($query);

$nfts = [];

if ($result->num_rows > 0) {
    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        // Add each NFT to the array
        $nfts[] = $row;
    }
}

// Return JSON response
header('Content-Type: application/json');
echo json_encode($nfts);
?>

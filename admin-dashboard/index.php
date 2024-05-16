<?php
include "header.php";
include "../apis/connection.php";
$sqlNFTS = "SELECT DISTINCT COUNT(*) AS count FROM `nft_info`"; 
$resultNFTS = $conn->query($sqlNFTS);
$rowNFTS = $resultNFTS->fetch_assoc();
$countNFTS = $rowNFTS['count'];


$sqlUsers = "SELECT COUNT(*) AS count FROM `users`"; 
$resultUSers = $conn->query($sqlUsers);
$rowUsers = $resultUSers->fetch_assoc();
$countUsers = $rowUsers['count'];
?>
   <div class="content-body">
        <div class="container">
            <div class="row">
                <div class="col-xxl-6">
                    <div class="promotion d-flex justify-content-between align-items-center">
                        <div class="promotion-detail">
                            <h3 class="text-white mb-3">Discover, Collect, Sell <br> and Create your Own NFT</h3>
                            <p>Digital marketplace for crypto collectibles and non fungable tokens</p><a href="create_nft.php" class="btn btn-secondary">Create</a>
                        </div>
                    </div>
                </div>
                
                <div class="col-xxl-3 col-xl-12">
                    <div class="card m-0">
                        <div class="card-header">
                            <h4 class="card-title">Site Info</h4>
                        </div>
                        <div class="card-body bs-0 bg-transparent p-0">
                            <div class="row">
                                <div class="col-xxl-12 col-xl-4 col-md-4 col-sm-6">
                                    <div class="stat-widget d-flex align-items-center">
                                        <div class="widget-icon me-3 bg-primary"><span><i
                                                    class="ri-wallet-line"></i></span></div>
                                        <div class="widget-content">
                                            <h3><?php echo $countNFTS ?></h3>
                                            <p>Total NFTS</p>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- <div class="col-xxl-12 col-xl-4 col-md-4 col-sm-6">
                                    <div class="stat-widget d-flex align-items-center">
                                        <div class="widget-icon me-3 bg-secondary"><span><i
                                                    class="ri-wallet-2-line"></i></span></div>
                                        <div class="widget-content">
                                            <h3>82K</h3>
                                            <p>Total  NFTS</p>
                                        </div>
                                        
                                    </div>
                                </div> -->
                                <div class="col-xxl-12 col-xl-4 col-md-4 col-sm-6">
                                    <a href="./bids.php"><div class="stat-widget d-flex align-items-center">
                                        <div class="widget-icon me-3 bg-success"><span><i
                                                    class="ri-wallet-3-line"></i></span></div>
                                        <div class="widget-content">
                                        <h3><?php echo $countUsers ?></h3>
                                            <p>Total Users</p>
                                        </div>
                                        
                                    </div></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
    </div>


    
</div>

<?php include "footer.php"; ?>
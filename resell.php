
<?php 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include "header.php";
$id=$_GET['id'];
$owner=$_GET['owner'];
// Prepare SQL statement to fetch data
$sql = "SELECT * FROM nft_info where nft_id='$id' AND nft_owner_address='$owner' ";
$result = $conn->query($sql);
$row = $result->fetch_assoc();

?>

        <section class="mainsection">
           
            <section class="privewNftContainer py-md-5 py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="text-center">
                                <div class="priviewConttentrow">
                                    <img src="https://www.coodingdessign.com/novarealchain/<?php echo $row['image']; ?>" class="img-fluid shadow" alt="" />
                                </div>
                                <div class="d-flex align-items-center justify-content-around my-4">
                                    <div class="button-border-cian border-0 px-2">
                                        <div class="cart-icons">
                                            <img src="./assets/img/icon-chart.png" alt="" />
                                        </div>
                                        <div class="RWAfi-text text-left">
                                            <h6 class="m-0"><?php echo $row['price']; ?> MATIC</h6>
                                            <span>~$ 3,504.43</span>
                                        </div>
                                    </div>
                                    <?php if( $row['sell']==0){ ?>
                                    <div class="">
                                        <button class="btn button-Wallet" data-toggle="modal" data-target="#exampleModalCenter">RESELL</button>
                                    </div>
                                    <div class="">
                                        <button class="btn button-Wallet" data-toggle="modal" data-target="#exampleModalCenterStake">STAKE</button>
                                    </div>
                                    <?php }else{?>
                                     <div class="">
                                        <button class="btn button-Wallet" data-toggle="modal" data-target="#exampleModalCenter">CHANGE PRICE</button>
                                    </div>
                                    <?php }?>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class="preview-right mb-3">
                                <div class="commonRow">
                                    <div class="COMMON-span">
                                        <span><?php echo $row['rarity']; ?></span>
                                    </div>
                                    <div class="NFT-NAME-CREATOR-GREENPLANET d-flex align-items-center justify-content-between">
                                        <div class="">
                                            <h4 class="m-0"><?php echo $row['sub_title']; ?> <span class="title-span"> #<?php echo $row['nft_id']; ?> </span></h4>
                                            <div class="POWERMINING">
                                                POWERMINING
                                                <img src="./assets/img/icon-verified-nft.png" width="16px" alt="" />
                                            </div>
                                        </div>
                                        <div class="">
                                            <img src="./assets/img/GREEN-PLANT.png" alt="" />
                                        </div>
                                    </div>
                                    <div class="MAIN_FEATURES_Row mt-3">
                                        <span class="main-fea">MAIN FEATURES</span>
                                        <div class="my-2 d-flex align-items-center justify-content-between flex-wrap">
                                            <div class="wth40-Row sec-50">
                                                <div class="d-flex align-items-center">
                                                    <img src="./assets/img/WTH.png" width="18px" alt="" />
                                                    <h6 class="m-0 ml-2 font-weight-bold"><?php echo $row['energy_efficiency']; ?><span class="sub-span"></span></h6>
                                                </div>
                                                <p class="event-des pt-2">Energy Efficiency</p>
                                            </div>
                                            <div class="wth40-Row sec-50">
                                                <div class="d-flex align-items-center">
                                                    <img src="./assets/img/90TH.png" width="25px" alt="" />
                                                    <h6 class="m-0 ml-2 font-weight-bold"><?php echo $row['computing_power']; ?> <span class="sub-span"></span></h6>
                                                </div>
                                                <p class="event-des pt-2">Computing Power</p>
                                            </div>
                                             <div class="wth40-Row sec-100">
                                                <div class="d-flex align-items-center">
                                                    <!--<img src="./assets/img/dollers.png" width="18px" alt="" />-->
                                                    <h6 class="m-0 ml-2 font-weight-bold"><?php echo $row['nft_cpoies']; ?></h6>
                                                </div>
                                                <p class="event-des pt-2">Number of NFTs</p>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="preview-right">
                                <div class="commonRow">
                                    <div class="MAIN_FEATURES_Row mt-3">
                                        <span>ADDITIONAL FEATURES</span>
                                        <div class="my-2 d-flex align-items-center justify-content-between flex-wrap">
                                            <div class="wth40-Row sec-100">
                                                <h6 class="font-weight-bold">Special Events</h6>
                                                <p class="event-des"><?php echo $row['special_events']; ?></p>
                                            </div>
                                            
                                        </div>
                                        <h6 class="mt-4">MAIN FEATURES</h6>
                                        <div class="mb-3 d-flex align-items-center justify-content-between flex-wrap">
                                            <div class="Special-Events sec-100">
                                                <div class="d-flex align-items-center">
                                                    <img src="./assets/img/nft2-1.png" class="rounded" width="35px" height="35px" alt="" />
                                                    <div class="ml-2">
                                                        <h6 class="m-0">Special Events</h6>
                                                        <span style="font-size: 11px;"><?php echo $row['special_events']; ?></span>
                                                    </div>
                                                </div> 
                                            </div>
                                            <!-- <div class="Special-Events sec-100">
                                                <div class="d-flex align-items-center">
                                                    <img src="./assets/img/nft2-1.png" class="rounded" width="35px" height="35px" alt="" />
                                                    <div class="ml-2">
                                                        <h6 class="m-0">Special Events</h6>
                                                        <span style="font-size: 11px;">Combine 1 for +3 TH bonus</span>
                                                    </div>
                                                </div> 
                                            </div> -->
                                        </div>
                                        <div class="py-2">
                                            <h6 class="font-weight-light">MAIN FEATURES</h6>
                                            <p class="font-size13">
                                            <?php echo $row['discription']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <footer class="footers border-top py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="footerlogo mid-footer">
                                <div class="logo-footer">
                                    <img src="./assets/img/FOOTER-LOGO.png" width="100px" alt="">
                                </div>
                                <div class="footer-menus">
                                    <ul class="list-unstyled d-flex align-items-center m-0" style="gap: 10px;">
                                        <li><a href="#" class="text-dark">Products</a></li> 
                                        <li><a href="#" class="text-dark">Company</a></li> 
                                        <li><a href="#" class="text-dark">Mining</a></li> 
                                        <li><a href="#" class="text-dark">Docs</a></li> 
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="text-right">
                                <ul class="list-unstyled d-flex align-items-center justify-content-end m-0 last-foot" style="gap: 20px;">
                                    <li><a href="#"><img src="./assets/img/telegram-icon.png" alt=""></a></li> 
                                    <li><a href="#"><img src="./assets/img/twitter-icon.png" alt=""></a></li>  
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
        </section>

        <!-- Modal buy Now -->
        <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="exampleModalLongTitle">Checkout</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="checkOutContainer">
                            <p class="">Selected Item :</p>
                            <div class="PowerDiamondbox">
                                <div class="d-flex align-items-center">
                                    <img src="https://www.coodingdessign.com/novarealchain/<?php echo $row['image']; ?>" class="rounded" width="45px" height="45px" alt="" />
                                    <div class="ml-2">
                                        <h6 class=""> <?php echo $row['sub_title']; ?> <span>#<?php echo $row['nft_id']; ?></span> </h6>
                                        <div class="d-flex align-items-center" style="gap: 10px;">
                                            <div class="d-flex align-items-center">
                                                <img src="./assets/img/WTH.png" class="img-fluid" style="width: 9px; height: auto;" alt="" />
                                                <span class="font-size13"><?php echo $row['energy_efficiency']; ?> <sub></sub> </span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="./assets/img/90TH.png" class="img-fluid" style="width: 9px; height: auto;" alt="" />
                                                <span class="font-size13"><?php echo $row['computing_power']; ?> <sub></sub> </span>
                                            </div>
                                            
                                        </div> 
                                    </div>
                                </div> 
                            </div>
                            <div class="my-3">
                                
                            </div>
                            <div class="p-3 rounded" style="background: #F6F6F7;">
                            
                                <span class="font-size13 mt-3">Enter price of one:</span>
                                <div class="cupSearch my-2">
                                    <input type="text" class="searchinput" id="price" placeholder="0.2">
                                </div>
                               
                                <div class="text-center mt-3">
                                   <button id="codeCheck" onclick="resellNow()" class="w-50 btn button-Wallet">CONFIRM</button>
                                </div>
                                
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        
        <!-- Stake Section -->
        <div class="modal fade" id="exampleModalCenterStake" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="exampleModalLongTitle">Stake</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="checkOutContainer">
                            <div class="PowerDiamondbox">
                                <div class="d-flex align-items-center">
                                    <img src="https://www.coodingdessign.com/novarealchain/<?php echo $row['image']; ?>" class="rounded" width="45px" height="45px" alt="" />
                                    <div class="ml-2">
                                        <h6 class=""> <?php echo $row['sub_title']; ?> <span>#<?php echo $row['nft_id']; ?></span> </h6>
                                        <div class="d-flex align-items-center" style="gap: 10px;">
                                            <div class="d-flex align-items-center">
                                                <img src="./assets/img/WTH.png" class="img-fluid" style="width: 9px; height: auto;" alt="" />
                                                <span class="font-size13"><?php echo $row['energy_efficiency']; ?> <sub></sub> </span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="./assets/img/90TH.png" class="img-fluid" style="width: 9px; height: auto;" alt="" />
                                                <span class="font-size13"><?php echo $row['computing_power']; ?> <sub></sub> </span>
                                            </div>
                                            
                                        </div> 
                                    </div>
                                </div> 
                            </div>
                            <div class="pt-4">
                                <div class="row" id="allPlans">
                                    <!--<div class="col-md-12 mt-3">-->
                                    <!--   <div class="text-center PowerDiamondbox">-->
                                    <!--       <h5>Plan 1</h5>-->
                                    <!--        <div class="d-flex align-items-center justify-content-between" style="gap: 3px;">-->
                                    <!--            <div class="TH-bg40">-->
                                    <!--                <p class="m-0 p-0">APY</p>-->
                                    <!--                <p class="m-0 p-0">5%</p>-->
                                    <!--            </div>-->
                                    <!--            <div class="TH-bg40">-->
                                    <!--                <p class="m-0 p-0">Reward</p>-->
                                    <!--                <p class="m-0 p-0">5<span> Matic</span></p>-->
                                    <!--            </div>-->
                                    <!--            <div class="TH-bg40">-->
                                    <!--                <p class="m-0 p-0">Period</p>-->
                                    <!--                <p class="m-0 p-0">30 <span>Days</span></p>-->
                                    <!--            </div>-->
                                    <!--            <button class="btn button-Wallet"  data-toggle="modal" data-target="#exampleModalCenterStakeConfrim">Stake</button>-->
                                    <!--        </div>-->
                                    <!--    </div> -->
                                    <!--</div>-->
                                </div>
                              
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        
        
        <!-- Stake buy NFT Section -->
        <div class="modal fade" id="exampleModalCenterStakeConfrim" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="checkOutContainer">
                            <div class="p-3 rounded">
                                <span class="font-size13 mt-3">Enter no. of NFT:</span>
                                <div class="cupSearch my-2">
                                    <input type="text" onkeyup="checkInput()" class="searchinput" id="nftsforstake" placeholder="2">
                                </div>
                                <span id="nftwarning" style="display:none; color:red;">
                                         Don't have enough nfts to stake
                                    </span>
                                <div class="text-center mt-3">
                                   <button id="stakingButton" onclick="approveNFTs()" class="w-50 btn button-Wallet">CONFIRM</button>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        
        
        <script src="./assets/js/jquery-3.2.1.slim.min.js"></script>
        <script src="./assets/js/popper.min.js"></script>
        <script src="./assets/js/bootstrap.min.js"></script>
    </body>
</html>
<script>
</script>

<script>
let planId;
const resellNow=async()=>{
    const web3 = new Web3(provider);
    if(selectedAccount){
        let amountToPay=document.getElementById("price").value;
        let nftId='<?php echo $_GET['id']?>';
        let nftOwnerAddress='<?php echo $_GET['owner']?>';
        if( balance>0){
            let amount=web3.utils.toWei(amountToPay, 'ether');
            myContract.methods.resell(nftId,nftOwnerAddress,amount,true).send({ from: selectedAccount})
                .on("transactionHash", function (hash) {
                        document.getElementById("loadingdiv").classList.remove("d-none");
                        document.getElementById("loadingdiv").className = "d-block";
                })
                .then((receipt1) => { 
                    document.getElementById("loadingdiv").className = "d-none";
                    updateData(nftId,nftOwnerAddress,amountToPay);
                }).catch((error)=>{
                     document.getElementById("loadingdiv").className = "d-none";
                     Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: `${error.message}`
                    });
                });
        }else{
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Not enough MATIC in account for transaction"
            });
        }
    }else{
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Please connect your wallet first"
            });
        }

}
const updateData=async(nftId,nftOwnerAddress,price)=>{

        const formdata = new FormData();
        formdata.append("id", nftId);
        formdata.append("owner_address", nftOwnerAddress);
        formdata.append("price", price);
        formdata.append("sell", 1);

        const requestOptions = {
        method: "POST",
        body: formdata,
        redirect: "follow"
        };

        fetch("./apis/sell.php", requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if(result.status==201){
                Swal.fire({
                    title: "Your transaction was successful",
                    icon: "success"
                }).then((ok)=>{
                    window.location.href="./index.php?id=1";
                });
            }else{
                Swal.fire({
                icon: "error",
                title: "Oops...",
                text: `${result.message}`
            });
            }
        })
        .catch((error) => console.error(error));
}

const fetchPlans=async()=>{
    
    const requestOptions = {
      method: "GET",
      redirect: "follow"
    };
    
    fetch("./apis/addPlans.php", requestOptions)
      .then((response) => response.json())
      .then((result) => {
          if(result.data.length>0){
              let count=1;
              result.data.forEach(plans=>{
                  
                  let planshtml=`       
                                    <div class="col-md-12 mt-3">
                                       <div class="text-center PowerDiamondbox">
                                    
                                        <h5>Plan ${count}</h5>
                                            <div class="d-flex align-items-center justify-content-between" style="gap: 3px;">
                                                <div class="TH-bg40">
                                                    <p class="m-0 p-0">APY</p>
                                                    <p class="m-0 p-0">${plans.apy}%</p>
                                                </div>
                                                <div class="TH-bg40">
                                                    <p class="m-0 p-0">Reward</p>
                                                    <p class="m-0 p-0"><span> ${plans.rewardTokenName}</span></p>
                                                </div>
                                                <div class="TH-bg40">
                                                    <p class="m-0 p-0">Period</p>
                                                    <p class="m-0 p-0">${plans.lockingPeriod} <span>Days</span></p>
                                                </div>
                                                <button class="btn button-Wallet"  onclick="toggleModel(${plans.planId})" data-toggle="modal" data-target="#exampleModalCenterStakeConfrim" >Stake</button>
                                            </div>
                                        </div>
                                </div>
                  `;
                  count++;
                  document.getElementById("allPlans").innerHTML += planshtml;
              })
          }else{
              
          }
      })
      .catch((error) => console.error(error));
}
const toggleModel=(plan)=>{
    planId=plan;
}
const checkInput=()=>{
    let amount=document.getElementById("nftsforstake").value;
    let actualAmount=<?php echo $row['nft_cpoies']; ?>;
    if(actualAmount<amount){
        $("#stakingButton").prop("disabled", true);
        document.getElementById("nftwarning").style.display="block";
    }else{
        $("#stakingButton").prop("disabled", false);
        document.getElementById("nftwarning").style.display="none";
    }
}
const approveNFTs=async()=>{
    const web3 = new Web3(provider);
    if(selectedAccount){
       if( balance>0){
           myContract.methods.setApprovalForAll(stakingContract.contract_address,true).send({ from: selectedAccount})
                .on("transactionHash", function (hash) {
                        document.getElementById("loadingdiv").classList.remove("d-none");
                        document.getElementById("loadingdiv").className = "d-block";
                })
                .then((receipt1) => { 
                    document.getElementById("loadingdiv").className = "d-none";
                    stakeNFTs();
                }).catch((error)=>{
                     document.getElementById("loadingdiv").className = "d-none";
                     Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: `${error.message}`
                    });
                });
        }else{
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Not enough MATIC in account for transaction"
            });
        }
    }else{
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Please connect your wallet first"
            });
        }

}
const stakeNFTs=async()=>{
    const web3 = new Web3(provider);
    if(selectedAccount){
        let amount=document.getElementById("nftsforstake").value;
        if( balance>0){
            let nftIdToStake='<?php echo $_GET['id'];?>';
            stakContract.methods.stake(planId,nftIdToStake,amount).send({ from: selectedAccount})
                .on("transactionHash", function (hash) {
                        document.getElementById("loadingdiv").classList.remove("d-none");
                        document.getElementById("loadingdiv").className = "d-block";
                })
                .then((receipt1) => { 
                    document.getElementById("loadingdiv").className = "d-none";
                    insertStakes(planId,'<?php echo $_GET['id'];?>',selectedAccount,amount);
                }).catch((error)=>{
                     document.getElementById("loadingdiv").className = "d-none";
                     Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: `${error.message}`
                    });
                });
        }else{
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Not enough MATIC in account for transaction"
            });
        }
    }else{
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Please connect your wallet first"
            });
        }

}
const insertStakes=async(planId,nftId,address,amount)=>{
    const formdata = new FormData();
    formdata.append("planId", planId);
    formdata.append("nftId", nftId);
    formdata.append("address", address);
    formdata.append("amount", amount);
    formdata.append("nftAddress", nftContract.contract_address);
    
    const requestOptions = {
      method: "POST",
      body: formdata,
      redirect: "follow"
    };
    
    fetch("./apis/stake.php", requestOptions)
      .then((response) => response.json())
      .then((result) => {
           if(result.status==201){
                Swal.fire({
                    title: "Your transaction was successful",
                    icon: "success"
                }).then((ok)=>{
                    window.location.href="./stake.php";
                });
            }else{
                Swal.fire({
                icon: "error",
                title: "Oops...",
                text: `${result.message}`
            });
            }
      })
      .catch((error) => console.error(error));
}

fetchPlans();


</script>

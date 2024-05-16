<?php
session_start();

// Check if user is not logged in
if (!isset($_SESSION['email'])) {
    // Redirect user to the login page
    header("Location: signin.php");
    exit();
}
// Check if the logout button has been clicked
if (isset($_GET['logout'])) {
    // Unset all session variables
    $_SESSION = array();

    // Destroy the session
    session_destroy();

    // Redirect to the sign-in page
    header("Location: signin.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">



<meta http-equiv="content-type" content="text/html;charset=utf-8" />
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!---- Website Information ---->
    <title>Nova Realchain Dashboard</title>
    <meta name="description"
        content="Nova Realchain NFT marketplace">


    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <link rel="stylesheet" href="css/style.css?v=1.7">
</head>

<body class="@@dashboard">
<div id="loadingdiv" class="d-none" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 2000;">
            <div class="" style="display: flex; justify-content: center; align-items: center; flex-direction: column; width: 100%; height: 100vh; background-color: #0d0d0db8;backdrop-filter: blur(10px);">
                <h3 class="text-white">Your transaction is processing, do not refresh this page</h3>
                <img src="../uploads/loader.gif" class="rounded-pill" width="200" height="200" />
            </div>
        </div>
<div id="main-wrapper">

    <div class="header">
    <div class="container">
        <div class="row">
            <div class="col-xxl-12">
                <div class="header-content">
                    <div class="header-left">
                        <div class="brand-logo"><a class="mini-logo" href="index.html"><img src="images/favicon.png" alt=""
                                    width="40"></a></div>
                        <!--<div class="search">-->
                        <!--    <form action="#"><span><i class="ri-search-line"></i></span><input type="text"-->
                        <!--            placeholder="Search Here"></form>-->
                        <!--</div>-->
                    </div>
                    <div class="header-right">
                        <!-- <div class="theme-switch"><i class="ri-sun-line"></i></div> -->

                        <div class="dark-light-toggle theme-switch" onclick="themeToggle()">
                            <span class="dark"><i class="ri-moon-line"></i></span>
                            <span class="light"><i class="ri-sun-line"></i></span>
                        </div>
                        <div class="my-2 my-lg-0 admin-wallet"> 
                                <button class="btn connect"  id="myBtn" onclick="metamask()" ><img src="icons/w.svg" alt=""
                                    width="20"></button>
                                <button style="display:none;" class="btn disconnect"  onclick="onDisconnect()" ><img src="icons/w.svg" alt=""
                                    width="20"></button>
                        </div>
                        <span> <a class="logout" href="signin.php" style="color:gray;"> <i class="ri-logout-circle-line"></i> </a></span>
                       
                        <!--<div class="dropdown profile_log dropdown">-->
                        <!--    <div data-bs-toggle="dropdown" aria-haspopup="true" class="" aria-expanded="false">-->
                        <!--        <div class="user icon-menu active">-->
                        <!--            <span><img src="images/favicon.png" alt=""></span>-->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">-->
                        <!--        <div class="user-email">-->
                        <!--            <div class="user">-->
                        <!--                <div class="user-info">-->
                        <!--                    <h5>Admin</h5>-->
                        <!--                </div>-->
                        <!--            </div>-->
                        <!--        </div>-->
                        <!--        <a class="dropdown-item logout" href="signin.php">-->
                        <!--            <i class="ri-logout-circle-line"></i>Logout-->
                        <!--        </a>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <div class="sidebar">
    <div class="brand-logo"><a class="full-logo" href="index.php"><img src="images/favicon.png" alt="" width="50"></a></div>
    <div class="menu">
        <ul>
            <li>
                <a href="index.php">
                    <span><i class="ri-layout-grid-fill"></i></span>
                    <span class="nav-text">Dashboard</span>
                </a>
            </li>
            <li class="">
                <a href="bids.php">
                    <span><i class="ri-briefcase-line"></i></span>
                    <span class="nav-text">User List</span></a>
            </li>
            <li class="" id="hidecontract" style="display:none;">
                <a href="address.php">
                    <span><i class="ri-heart-line"></i></span>
                    <span class="nav-text">Coupon management </span></a>
            </li>
            
            <li class="" id="hideNft" style="display:none;">
                <a href="create_nft.php">
                    <span><i class="ri-star-line"></i></span>
                    <span class="nav-text">Create NFT </span></a>
            </li>
            
            <li class="logout"><a href="signin.php">
                    <span><i class="ri-logout-circle-line"></i></span>
                    <span class="nav-text">Signout</span>
                </a>
            </li>
        </ul>
    </div>
</div>


<script type="text/javascript" src="https://unpkg.com/web3@1.2.11/dist/web3.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/web3modal@1.9.0/dist/index.js"></script>
<script type="text/javascript" src="https://unpkg.com/evm-chains@0.2.0/dist/umd/index.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/@walletconnect/web3-provider@1.2.1/dist/umd/index.min.js"></script>
<script type="text/javascript" src="https://unpkg.com/fortmatic@2.0.6/dist/fortmatic.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>

<script>
const Web3Modal = window.Web3Modal.default;
const WalletConnectProvider = window.WalletConnectProvider.default;

let web3Modal
let provider; 
let selectedAccount;
let stakContract;
let balance = 0;
let myContract;
let ownerAddress=''
let supportedChainid = 80002
let supportedRpcUrl = "https://rpc-amoy.polygon.technology/";
let supportedExplorer = "https://www.oklink.com/amoy";
let supportedNetwork = "Polygon Amoy Testnet";
let nftContract= {
    contract_address: "0x0Dae430eC7321B71d7eFf1f4cEa67b1e9BeaC09D", 
    contract_abi:[ { "inputs": [], "stateMutability": "nonpayable", "type": "constructor" }, { "inputs": [ { "internalType": "address", "name": "sender", "type": "address" }, { "internalType": "uint256", "name": "balance", "type": "uint256" }, { "internalType": "uint256", "name": "needed", "type": "uint256" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" } ], "name": "ERC1155InsufficientBalance", "type": "error" }, { "inputs": [ { "internalType": "address", "name": "approver", "type": "address" } ], "name": "ERC1155InvalidApprover", "type": "error" }, { "inputs": [ { "internalType": "uint256", "name": "idsLength", "type": "uint256" }, { "internalType": "uint256", "name": "valuesLength", "type": "uint256" } ], "name": "ERC1155InvalidArrayLength", "type": "error" }, { "inputs": [ { "internalType": "address", "name": "operator", "type": "address" } ], "name": "ERC1155InvalidOperator", "type": "error" }, { "inputs": [ { "internalType": "address", "name": "receiver", "type": "address" } ], "name": "ERC1155InvalidReceiver", "type": "error" }, { "inputs": [ { "internalType": "address", "name": "sender", "type": "address" } ], "name": "ERC1155InvalidSender", "type": "error" }, { "inputs": [ { "internalType": "address", "name": "operator", "type": "address" }, { "internalType": "address", "name": "owner", "type": "address" } ], "name": "ERC1155MissingApprovalForAll", "type": "error" }, { "anonymous": false, "inputs": [ { "indexed": true, "internalType": "address", "name": "account", "type": "address" }, { "indexed": true, "internalType": "address", "name": "operator", "type": "address" }, { "indexed": false, "internalType": "bool", "name": "approved", "type": "bool" } ], "name": "ApprovalForAll", "type": "event" }, { "anonymous": false, "inputs": [ { "indexed": true, "internalType": "address", "name": "previousOwner", "type": "address" }, { "indexed": true, "internalType": "address", "name": "newOwner", "type": "address" } ], "name": "OwnershipTransferred", "type": "event" }, { "anonymous": false, "inputs": [ { "indexed": true, "internalType": "address", "name": "owner", "type": "address" }, { "indexed": false, "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "indexed": true, "internalType": "address", "name": "buyer", "type": "address" }, { "indexed": false, "internalType": "uint256", "name": "amount", "type": "uint256" } ], "name": "RoyaltyPaid", "type": "event" }, { "anonymous": false, "inputs": [ { "indexed": true, "internalType": "address", "name": "operator", "type": "address" }, { "indexed": true, "internalType": "address", "name": "from", "type": "address" }, { "indexed": true, "internalType": "address", "name": "to", "type": "address" }, { "indexed": false, "internalType": "uint256[]", "name": "ids", "type": "uint256[]" }, { "indexed": false, "internalType": "uint256[]", "name": "values", "type": "uint256[]" } ], "name": "TransferBatch", "type": "event" }, { "anonymous": false, "inputs": [ { "indexed": true, "internalType": "address", "name": "operator", "type": "address" }, { "indexed": true, "internalType": "address", "name": "from", "type": "address" }, { "indexed": true, "internalType": "address", "name": "to", "type": "address" }, { "indexed": false, "internalType": "uint256", "name": "id", "type": "uint256" }, { "indexed": false, "internalType": "uint256", "name": "value", "type": "uint256" } ], "name": "TransferSingle", "type": "event" }, { "anonymous": false, "inputs": [ { "indexed": false, "internalType": "string", "name": "value", "type": "string" }, { "indexed": true, "internalType": "uint256", "name": "id", "type": "uint256" } ], "name": "URI", "type": "event" }, { "inputs": [ { "internalType": "string", "name": "_code", "type": "string" } ], "name": "addCoupon", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "account", "type": "address" }, { "internalType": "uint256", "name": "id", "type": "uint256" } ], "name": "balanceOf", "outputs": [ { "internalType": "uint256", "name": "", "type": "uint256" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "address[]", "name": "accounts", "type": "address[]" }, { "internalType": "uint256[]", "name": "ids", "type": "uint256[]" } ], "name": "balanceOfBatch", "outputs": [ { "internalType": "uint256[]", "name": "", "type": "uint256[]" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "_tokenId", "type": "uint256" }, { "internalType": "address", "name": "_owner", "type": "address" }, { "internalType": "uint256", "name": "_amount", "type": "uint256" }, { "internalType": "string", "name": "_code", "type": "string" } ], "name": "buy", "outputs": [], "stateMutability": "payable", "type": "function" }, { "inputs": [ { "internalType": "string", "name": "", "type": "string" } ], "name": "coupons", "outputs": [ { "internalType": "string", "name": "code", "type": "string" }, { "internalType": "uint256", "name": "discountPercentage", "type": "uint256" }, { "internalType": "bool", "name": "isValid", "type": "bool" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "account", "type": "address" }, { "internalType": "address", "name": "operator", "type": "address" } ], "name": "isApprovedForAll", "outputs": [ { "internalType": "bool", "name": "", "type": "bool" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "_tokenId", "type": "uint256" }, { "internalType": "uint256", "name": "_initialSupply", "type": "uint256" }, { "internalType": "uint256", "name": "_price", "type": "uint256" }, { "internalType": "uint256", "name": "_royaltyPercentage", "type": "uint256" } ], "name": "mint", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "", "type": "address" }, { "internalType": "uint256", "name": "", "type": "uint256" } ], "name": "nfts", "outputs": [ { "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "internalType": "address", "name": "owner", "type": "address" }, { "internalType": "address", "name": "creator", "type": "address" }, { "internalType": "uint256", "name": "price", "type": "uint256" }, { "internalType": "uint256", "name": "royaltyPercentage", "type": "uint256" }, { "internalType": "uint256", "name": "totalSupply", "type": "uint256" }, { "internalType": "uint256", "name": "availableSupply", "type": "uint256" }, { "internalType": "bool", "name": "isForSale", "type": "bool" } ], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "owner", "outputs": [ { "internalType": "address", "name": "", "type": "address" } ], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "renounceOwnership", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "_tokenId", "type": "uint256" }, { "internalType": "address", "name": "_owner", "type": "address" }, { "internalType": "uint256", "name": "_price", "type": "uint256" }, { "internalType": "bool", "name": "isForSale", "type": "bool" } ], "name": "resell", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "from", "type": "address" }, { "internalType": "address", "name": "to", "type": "address" }, { "internalType": "uint256[]", "name": "ids", "type": "uint256[]" }, { "internalType": "uint256[]", "name": "values", "type": "uint256[]" }, { "internalType": "bytes", "name": "data", "type": "bytes" } ], "name": "safeBatchTransferFrom", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "from", "type": "address" }, { "internalType": "address", "name": "to", "type": "address" }, { "internalType": "uint256", "name": "id", "type": "uint256" }, { "internalType": "uint256", "name": "value", "type": "uint256" }, { "internalType": "bytes", "name": "data", "type": "bytes" } ], "name": "safeTransferFrom", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "operator", "type": "address" }, { "internalType": "bool", "name": "approved", "type": "bool" } ], "name": "setApprovalForAll", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "_tokenId", "type": "uint256" }, { "internalType": "address", "name": "_owner", "type": "address" }, { "internalType": "uint256", "name": "_price", "type": "uint256" } ], "name": "setPrice", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "bytes4", "name": "interfaceId", "type": "bytes4" } ], "name": "supportsInterface", "outputs": [ { "internalType": "bool", "name": "", "type": "bool" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "newOwner", "type": "address" } ], "name": "transferOwnership", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "id", "type": "uint256" } ], "name": "uri", "outputs": [ { "internalType": "string", "name": "", "type": "string" } ], "stateMutability": "view", "type": "function" } ]}
    ;
let stakingContract= {
    contract_address: "0x179009f6d650F2bb357Efc073797bAf374339A66",
    contract_abi:[ { "inputs": [ { "internalType": "address", "name": "_stakingToken", "type": "address" } ], "stateMutability": "nonpayable", "type": "constructor" }, { "anonymous": false, "inputs": [ { "indexed": true, "internalType": "address", "name": "previousOwner", "type": "address" }, { "indexed": true, "internalType": "address", "name": "newOwner", "type": "address" } ], "name": "OwnershipTransferred", "type": "event" }, { "anonymous": false, "inputs": [ { "indexed": true, "internalType": "address", "name": "user", "type": "address" }, { "indexed": true, "internalType": "uint256", "name": "planId", "type": "uint256" }, { "indexed": true, "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "indexed": false, "internalType": "uint256", "name": "amount", "type": "uint256" } ], "name": "RewardsClaimed", "type": "event" }, { "anonymous": false, "inputs": [ { "indexed": true, "internalType": "address", "name": "user", "type": "address" }, { "indexed": true, "internalType": "uint256", "name": "planId", "type": "uint256" }, { "indexed": true, "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "indexed": false, "internalType": "uint256", "name": "amount", "type": "uint256" } ], "name": "Staked", "type": "event" }, { "anonymous": false, "inputs": [ { "indexed": true, "internalType": "address", "name": "user", "type": "address" }, { "indexed": true, "internalType": "uint256", "name": "planId", "type": "uint256" }, { "indexed": true, "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "indexed": false, "internalType": "uint256", "name": "amount", "type": "uint256" } ], "name": "Unstaked", "type": "event" }, { "inputs": [ { "internalType": "address", "name": "user", "type": "address" } ], "name": "calculateRewardsForUser", "outputs": [ { "internalType": "uint256[]", "name": "", "type": "uint256[]" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "planId", "type": "uint256" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" } ], "name": "claimRewards", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "planId", "type": "uint256" }, { "internalType": "uint256", "name": "apy", "type": "uint256" }, { "internalType": "uint256", "name": "lockingPeriod", "type": "uint256" }, { "internalType": "address", "name": "rewardToken", "type": "address" } ], "name": "createStakingPlan", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "", "type": "address" }, { "internalType": "address", "name": "", "type": "address" }, { "internalType": "uint256[]", "name": "", "type": "uint256[]" }, { "internalType": "uint256[]", "name": "", "type": "uint256[]" }, { "internalType": "bytes", "name": "", "type": "bytes" } ], "name": "onERC1155BatchReceived", "outputs": [ { "internalType": "bytes4", "name": "", "type": "bytes4" } ], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "", "type": "address" }, { "internalType": "address", "name": "", "type": "address" }, { "internalType": "uint256", "name": "", "type": "uint256" }, { "internalType": "uint256", "name": "", "type": "uint256" }, { "internalType": "bytes", "name": "", "type": "bytes" } ], "name": "onERC1155Received", "outputs": [ { "internalType": "bytes4", "name": "", "type": "bytes4" } ], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "", "type": "address" }, { "internalType": "address", "name": "", "type": "address" }, { "internalType": "uint256", "name": "", "type": "uint256" }, { "internalType": "bytes", "name": "", "type": "bytes" } ], "name": "onERC721Received", "outputs": [ { "internalType": "bytes4", "name": "", "type": "bytes4" } ], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [], "name": "owner", "outputs": [ { "internalType": "address", "name": "", "type": "address" } ], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "renounceOwnership", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "planId", "type": "uint256" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" }, { "internalType": "uint256", "name": "amount", "type": "uint256" } ], "name": "stake", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "", "type": "uint256" } ], "name": "stakingPlans", "outputs": [ { "internalType": "uint256", "name": "apy", "type": "uint256" }, { "internalType": "uint256", "name": "lockingPeriod", "type": "uint256" }, { "internalType": "address", "name": "rewardToken", "type": "address" } ], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "stakingToken", "outputs": [ { "internalType": "contract IERC1155", "name": "", "type": "address" } ], "stateMutability": "view", "type": "function" }, { "inputs": [], "name": "totalStakingPlans", "outputs": [ { "internalType": "uint256", "name": "", "type": "uint256" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "newOwner", "type": "address" } ], "name": "transferOwnership", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "uint256", "name": "planId", "type": "uint256" }, { "internalType": "uint256", "name": "tokenId", "type": "uint256" } ], "name": "unstake", "outputs": [], "stateMutability": "nonpayable", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "", "type": "address" }, { "internalType": "uint256", "name": "", "type": "uint256" } ], "name": "userStakeCount", "outputs": [ { "internalType": "uint256", "name": "", "type": "uint256" } ], "stateMutability": "view", "type": "function" }, { "inputs": [ { "internalType": "address", "name": "", "type": "address" }, { "internalType": "uint256", "name": "", "type": "uint256" }, { "internalType": "uint256", "name": "", "type": "uint256" } ], "name": "userStakes", "outputs": [ { "internalType": "uint256", "name": "amount", "type": "uint256" }, { "internalType": "uint256", "name": "timestamp", "type": "uint256" } ], "stateMutability": "view", "type": "function" } ]
    };
</script>
<script>
async function Switchchain() {
    try {
        await ethereum.request({
            method: "wallet_switchEthereumChain",
            params: [{
                chainId: '0x' + supportedChainid.toString(16)
            }],
        });
    } catch (switchError) {
        console.log(switchError);
        // This error code indicates that the chain has not been added to MetaMask.
        if (switchError.code === 4902) {
            try {
                await ethereum.request({
                    method: 'wallet_addEthereumChain',
                    params: [{
                        chainId: '0x' + supportedChainid.toString(16),
                        chainName: supportedNetwork,
                        nativeCurrency: {
                            name: 'DMC',
                            symbol: 'DFI',
                            decimals: 18
                        },
                        rpcUrls: [supportedRpcUrl],
                        blockExplorerUrls: [supportedExplorer]
                    }, ],
                });
            } catch (addError) {
                Swal.fire('Error', `Please add the first ${supportedNetwork} to your Metamask.`, 'error');
                // handle "add" error
            }
        }
    }
}
async function fetchAccountData(provider) {
    const web3 = new Web3(provider);
    const chainId = await web3.eth.getChainId();
    console.log(chainId);
    if (chainId == '') {
        chainchanged();
    }
     if (chainId == supportedChainid) {
        const accounts = await web3.eth.getAccounts();
        selectedAccount = accounts[0];
        myContract = new web3.eth.Contract(nftContract.contract_abi, nftContract.contract_address);
        stakContract = new web3.eth.Contract(stakingContract.contract_abi, stakingContract.contract_address);
        ownerAddress= await myContract.methods.owner().call();
        const currentURL = window.location.href;
        const parts = currentURL.split("/");
        const lastIndex = parts[parts.length - 1];
        if(ownerAddress.toLowerCase()==selectedAccount.toLowerCase()){
            document.getElementById("hidecontract").style.display="block";
            document.getElementById("hideNft").style.display="block"
        }
        if((lastIndex=='create_nft.php' || lastIndex=='address.php' ) && ownerAddress.toLowerCase()!=selectedAccount.toLowerCase()) window.location.href = "./index.php";
        if (selectedAccount) {
            if (screen.width < 1024) {
                document.querySelector(".disconnect").style.display = "block";
                //document.querySelector(".connect").style.display = "none";
                document.getElementById("myBtn").innerHTML=`${selectedAccount.slice(0,5)}...${selectedAccount.slice(-3)}`
            } else {
                document.querySelector(".disconnect").style.display = "block";
                //document.querySelector(".connect").style.display = "none";
                document.getElementById("myBtn").innerHTML=`${selectedAccount.slice(0,5)}...${selectedAccount.slice(-3)}`
            }
            localStorage.setItem("wallet_address", selectedAccount);
            balance  = ((await web3.eth.getBalance(selectedAccount)) / 10 ** 18).toFixed(3);
           }
          
    } else {
        Switchchain();
    }

}
async function onConnect() {
    try {

        provider = new WalletConnectProvider({
            infuraId: "",
            rpc: {
                56: "https://bsc-dataseed1.binance.org",
            },
            chainId: 56,
            qrcode: true,
            qrcodeModalOptions: {
                mobileLinks: [
                    "metamask",
                    "trust",
                ],
            },
        });
        await provider.enable();
        localStorage.setItem("wallet", "trust");
        const web3 = new Web3(provider);
        let chainId = await web3.eth.getChainId();


        setTimeout(async function() {
            if (chainId == supportedChainid) {
                await fetchAccountData(provider);

            } else {
                Switchchain();
            }
        }, 5000);

        provider.on("accountsChanged", (accounts) => {
            fetchAccountData(provider);
        });

        provider.on('networkChanged', function(networkId) {

            if (networkId != supportedChainid) {
                Switchchain();
            } 
        });


    } catch (e) {

        return;
    }
}
async function metamask() {

    try {

        provider = await window.web3.currentProvider;
        await provider.enable();
        await fetchAccountData(provider);

        localStorage.setItem("wallet", "metamask");

        provider.on("accountsChanged", (accounts) => {
            window.location.reload();
            fetchAccountData(provider);
        });

        provider.on('networkChanged', function(networkId) {

            if (networkId != supportedChainid) {
                Switchchain();
            } else {
                fetchAccountData(provider);

            }
        });
    } catch (e) {
        console.log(e, "e")
        Swal.fire({
            icon: 'warning',
            title: "Couldn't find Metamask!...",
            html: "You can download it from" + "<a href='https://metamask.io/'>https://metamask.io/ </a>" + "or try connecting via WalletConnect!",
        }).then((ok) => {})
        return;
    }

}
async function onDisconnect() {


    const swalWithBootstrapButtons = Swal.mixin({
        customClass: {
            confirmButton: 'btn btn-success',
        },
        buttonsStyling: false
    })

    swalWithBootstrapButtons.fire({
        title: 'Disconnect?',
        text: "Are you sure you want to disconnect?",
        icon: 'info',
        confirmButtonText: 'Disconnect',
        reverseButtons: true
    }).then(async (result) => {
        if (result.isConfirmed) {
            var connectedWith = localStorage.getItem('wallet');

            if (connectedWith === "Metamask") {
                provider = ethereum;
            }

            if (provider.disconnect) provider.disconnect().catch(console.log);
            localStorage.clear();
            if (screen.width < 1024) {
                document.querySelector(".mconnect").textContent = "Connect";
                document.querySelector(".mdisconnect").style.display = "none";
                document.querySelector("#mpro").style.display = "none";
            } else {
                document.querySelector(".connect").textContent = "Connect";
                document.querySelector(".disconnect").style.display = "none";
                window.location.reload();
            }
        }
    })
    selectedAccount = null;
}

function dataLoad() {
    let wallet = localStorage.getItem("wallet");

    if (wallet == "metamask") {
        metamask();

    } else if (wallet == "trust") {
        onConnect();
    }
}


dataLoad();
</script>

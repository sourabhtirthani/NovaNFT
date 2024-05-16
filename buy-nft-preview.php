
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
                                            <span id="maticusdPrice">~$ 0</span>
                                        </div>
                                    </div>
                                    <div class="">
                                        <button class="btn button-Wallet" style="display:none"  id="buybtn" data-toggle="modal" data-target="#exampleModalCenter">Buy Now</button>
                                    </div>
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
                                        <!-- <div class="mb-3 d-flex align-items-center justify-content-between flex-wrap">
                                        <!--    <div class="wth40-Row sec-50">-->
                                        <!--        <h6 class="m-0 ml-2 font-weight-bold">9<span class="sub-span">th</span> <sub>Level</sub></h6>-->
                                        <!--    </div>-->
                                        <!--    <div class="wth40-Row sec-50">-->
                                        <!--        <h6 class="m-0 ml-2 font-weight-bold">405%<sub> ROI</sub></h6>-->
                                        <!--    </div>-->
                                        <!--    <div class="wth40-Row sec-100">-->
                                        <!--        <h6 class="m-0 ml-2 font-weight-bold">777.6 <sub>USD / Y</sub></h6>-->
                                        <!--    </div>
                                        <!--</div> 
                                        <!-- <div class="py-2">
                                        <!--    <h6 class="font-weight-light">LEVEL EFFICIENCY</h6>-->
                                        <!--    <div class="d-flex align-items-center justify-content-between pt-2">-->
                                        <!--        <div class="LVL1 w-auto">-->
                                        <!--            <h6 class="m-0">LVL 1</h6>-->
                                        <!--        </div>-->
                                        <!--        <div class="LVLPROGRESS w-100 px-3">-->
                                        <!--            <div class="progress">-->
                                        <!--                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--        <div class="LVL2 text-right">-->
                                        <!--            <h6 class="m-0">LVL 2</h6>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div> -->
                                        <!-- <div class="py-2">
                                        <!--    <h6 class="font-weight-light">MINING PERIOD</h6>-->
                                        <!--    <div class="d-flex align-items-center justify-content-between pt-2">-->
                                        <!--        <div class="LVL1 w-auto">-->
                                        <!--            <h6 class="m-0">1Y</h6>-->
                                        <!--        </div>-->
                                        <!--        <div class="LVLPROGRESS w-100 px-3">-->
                                        <!--            <div class="progress">-->
                                        <!--                <div class="progress-bar" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>-->
                                        <!--            </div>-->
                                        <!--        </div>-->
                                        <!--        <div class="LVL2 text-right">-->
                                        <!--            <h6 class="m-0">5Y</h6>-->
                                        <!--        </div>-->
                                        <!--    </div>-->
                                        <!--</div> -->
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
            <section class="nftcontainers py-md-5 py-3">
                <div class="container">
                    <div class="py-3 bg-white"></div>
                    <h3 class="py-3">Popular NFTs</h3>
                    <div class="row no-data">
                    <?php
                            // Execute your query to fetch data from the database
                            $query = "SELECT * FROM nft_info where nft_id='$id' AND nft_owner_address!='$owner' ORDER BY id DESC"; // Replace 'your_table_name' with your actual table name
                            
                            $result = $conn->query($query);

                            // Check if there are any rows returned
                            if (mysqli_num_rows($result) > 0) {
                                // Loop through each row of data
                                while ($rows = mysqli_fetch_assoc($result)) {
                                    
                                    $priceInUsd=(1.34)*$row['price'];
                                    // Output dynamic HTML for each item
                                    echo '<div class="col-lg-3">
                                    <a href="./buy-nft-preview.php?id=' . $rows['nft_id'] . '&owner=' . $rows['nft_owner_address'] . '"><div class="nftContainers">
                                        <div class="imgROw">
                                            <img src="https://www.coodingdessign.com/novarealchain/' . $rows['image'] . '" class="w-100" alt="" />
                                            <div class="nftpontbtns">
                                                <div class="d-flex align-items-center justify-content-between" style="gap: 10px;">
                                                    <div class="d-flex align-items-center TH-bg40">
                                                        <img src="./assets/img/WTH.png" class="img-fluid" style="width: 9px; height: auto;" alt="" />
                                                        <span>' . $rows['energy_efficiency'] . ' </span>
                                                    </div>
                                                   
                                                    <div class="d-flex align-items-center TH-bg40">
                                                        <img src="./assets/img/90TH.png" class="img-fluid" style="width: 9px; height: auto;" alt="" />
                                                        <span>' . $rows['computing_power'] . ' </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <div class="">
                                                    <h5 class="m-0">' . $rows['sub_title'] . '</h5>
                                                    <div class="POWERMINING">
                                                        POWERMINING
                                                        <img src="./assets/img/icon-verified-nft.png" width="16px" alt="" />
                                                    </div>
                                                </div>
                                                <div class="right-box text-right">
                                                    <div class="right-box10">
                                                        <span>#' . $rows['nft_id'] . '</span>
                                                    </div>
                                                    <span class="font-weight-bold" style="font-size: 13px;">' . $rows['nft_cpoies'] . '</span>
                                                </div>
                                            </div>
                                            <div class="button-border-cian">
                                                <div class="cart-icons">
                                                    <img src="./assets/img/icon-chart.png" alt="" />
                                                </div>
                                                <div class="RWAfi-text">
                                                    <h6 class="m-0">' . $rows['price'] . ' MATIC</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>';
                                }
                            } else {
                                // If no rows found
                                echo "No data found.";
                            }

                            ?>

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
                                                <span class="font-size13"><?php echo $row['computing_power']; ?> <sub>TH</sub> </span>
                                            </div>
                                            <!-- <div class="d-flex align-items-center">
                                                <img src="./assets/img/dollers.png" class="img-fluid" style="width: 9px; height: auto;" alt="" />
                                                <span class="font-size13">846.6 <sub>USD</sub> </span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <img src="./assets/img/light-star.png" class="img-fluid" alt="" />
                                                <span class="font-size13">LVL 1</span>
                                            </div> -->
                                        </div> 
                                    </div>
                                </div> 
                            </div>
                            <div class="my-3">
                            
                                <!--<div class="cupSearch my-2">-->
                                <!--    <input type="Number" oninput="calclulatePrice()" class="searchinput" id="numberOFNfts" placeholder="Number of NFTS">-->
                                <!--</div>-->
                                <span class="font-size13">Number of NFTs</span>
                                <select class="form-select searchinput" onchange="calclulatePrice()"  id="numberOFNfts" aria-label="Default select example">
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                    <option value="5">5</option>
                                    <option value="6">6</option>
                                    <option value="7">7</option>
                                    <option value="8">8</option>
                                    <option value="9">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                    <option value="32">32</option>
                                    <option value="33">33</option>
                                    <option value="34">34</option>
                                    <option value="35">35</option>
                                    <option value="36">36</option>
                                    <option value="37">37</option>
                                    <option value="38">38</option>
                                    <option value="39">39</option>
                                    <option value="40">40</option>
                                    <option value="41">41</option>
                                    <option value="42">42</option>
                                    <option value="43">43</option>
                                    <option value="44">44</option>
                                    <option value="45">45</option>
                                    <option value="46">46</option>
                                    <option value="47">47</option>
                                    <option value="48">48</option>
                                    <option value="49">49</option>
                                    <option value="50">50</option>
                                    <option value="51">51</option>
                                    <option value="52">52</option>
                                    <option value="53">53</option>
                                    <option value="54">54</option>
                                    <option value="55">55</option>
                                    <option value="56">56</option>
                                    <option value="57">57</option>
                                    <option value="58">58</option>
                                    <option value="59">59</option>
                                    <option value="60">60</option>
                                    <option value="61">61</option>
                                    <option value="62">62</option>
                                    <option value="63">63</option>
                                    <option value="64">64</option>
                                    <option value="65">65</option>
                                    <option value="66">66</option>
                                    <option value="67">67</option>
                                    <option value="68">68</option>
                                    <option value="69">69</option>
                                    <option value="70">70</option>
                                    <option value="71">71</option>
                                    <option value="72">72</option>
                                    <option value="73">73</option>
                                    <option value="74">74</option>
                                    <option value="75">75</option>
                                    <option value="76">76</option>
                                    <option value="77">77</option>
                                    <option value="78">78</option>
                                    <option value="79">79</option>
                                    <option value="80">80</option>
                                    <option value="81">81</option>
                                    <option value="82">82</option>
                                    <option value="83">83</option>
                                    <option value="84">84</option>
                                    <option value="85">85</option>
                                    <option value="86">86</option>
                                    <option value="87">87</option>
                                    <option value="88">88</option>
                                    <option value="89">89</option>
                                    <option value="90">90</option>
                                    <option value="91">91</option>
                                    <option value="92">92</option>
                                    <option value="93">93</option>
                                    <option value="94">94</option>
                                    <option value="95">95</option>
                                    <option value="96">96</option>
                                    <option value="97">97</option>
                                    <option value="98">98</option>
                                    <option value="99">99</option>

                                </select>
                                
                            </div>
                            <div class="p-3 rounded" style="background: #F6F6F7;">
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h6 class="font-size13 font-weight-light">YOUR BALANCE</h6>
                                    <h6 class="font-weight-normal" id="yourbalance">0 MATIC</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h6 class="font-size13 font-weight-light">NFT PRICE</h6>
                                    <h6 class="font-weight-normal" ><?php echo $row['price']; ?> MATIC</h6>
                                </div>
                                <div class="d-flex align-items-center justify-content-between mb-2">
                                    <h6 class="font-size13 font-weight-light">TOTAL PRICE</h6>
                                    <h6 class="font-weight-normal" id="youPay">0 MATIC</h6>
                                    
                                </div> 
                                <span id="NFTwarning" style="display:none; color:red">
                                         Not enough NFTs available
                                </span>
                                <div class="mt-3 text-center mb-3">
                                    <button id="buyNFT" onclick="buyNow()" class="w-50 btn button-Wallet">PURCHASE</button>
                                </div>
                               
                                <span class="font-size13 mt-3">COUPON CODE:</span>
                                <div class="cupSearch my-2">
                                    <input type="text" class="searchinput" id="code" placeholder="COUPON CODE">
                                </div>
                                <span id="codesuccess"  style="display:none; color:green;  font-weight: bold; font-size: 18px;">
                                        10% off 🎉
                                </span>
                                <span id="codewarning" style="display:none; color:red;">
                                         Invalid coupon code
                                </span>
                                <div class="text-center mt-3">
                                   <button id="codeCheck" onclick="checkCode()" class="w-50 btn button-Wallet">APPLY COUPON</button>
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
let isCouponCodeApplied;
let intervalId = setInterval(() => {
    if(selectedAccount){
    document.getElementById("maticusdPrice").innerHTML=`$ `+(maticToUsdPrice*<?php echo $row['price']; ?>).toFixed(4);
    let owner='<?php echo $_GET['owner'];?>';
    if(selectedAccount) document.getElementById("yourbalance").innerHTML=balance+' MATIC';
    if(selectedAccount.toLowerCase()==owner.toLowerCase()){
        const button = document.getElementById("buybtn");
        button.textContent = "You already own this NFT";
        button.disabled = true;
        button.style.display="block";
    }else{
        const button = document.getElementById("buybtn");
         button.style.display="block";
    }
    calclulatePrice();
    clearInterval(intervalId); // Stop the interval
    }
},1000)

const calclulatePrice=()=>{
    const priceOfOne=<?php echo $row['price']; ?>;
    const numOfNFTS=document.getElementById("numberOFNfts").value;
    const totalNFTS=<?php echo $row['nft_cpoies']; ?>;
    if(numOfNFTS>totalNFTS)  { 
        document.getElementById("NFTwarning").style.display = "block";
        document.getElementById("buyNFT").disabled=true;
    }else {
        document.getElementById("NFTwarning").style.display = "none";
         document.getElementById("buyNFT").disabled=false
        };

    document.getElementById("youPay").innerHTML=(priceOfOne*numOfNFTS).toFixed(4);
    document.getElementById("youPay").value=(priceOfOne*numOfNFTS).toFixed(4);

}
const buyNow=async()=>{
    const web3 = new Web3(provider);
    if(selectedAccount){
        let amountToPay=document.getElementById("youPay").value;
        let NftsToBuy=document.getElementById("numberOFNfts").value;
        let nftId='<?php echo $_GET['id']?>';
        let nftOwnerAddress='<?php echo $_GET['owner']?>';
        let coupenCode=document.getElementById("code").value;
        if(!coupenCode) coupenCode='';
        if( balance>amountToPay){
            let amount=web3.utils.toWei(amountToPay, 'ether');
            myContract.methods.buy(nftId,nftOwnerAddress,NftsToBuy,coupenCode.toString()).send({ from: selectedAccount,value:amount})
                .on("transactionHash", function (hash) {
                        document.getElementById("loadingdiv").classList.remove("d-none");
                        document.getElementById("loadingdiv").className = "d-block";
                })
                .then((receipt1) => { 
                    document.getElementById("loadingdiv").className = "d-none";
                    updateData(nftId,NftsToBuy,nftOwnerAddress,selectedAccount,coupenCode);
                }).catch((error)=>{
                     document.getElementById("loadingdiv").className = "d-none";
                     console.log("error",error);
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
                text: "Not enough MATIC to buy NFT"
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
const updateData=async(nftId,nftCopies,nftOwnerAddress,account,coupenCode)=>{

        const formdata = new FormData();
        formdata.append("id", nftId);
        formdata.append("owner_address", nftOwnerAddress);
        formdata.append("copies", nftCopies);
        formdata.append("new_owner", account);
        formdata.append("coupen_code", coupenCode);

        const requestOptions = {
        method: "POST",
        body: formdata,
        redirect: "follow"
        };

        fetch("./apis/buyNFT.php", requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if(result.status==201){
                Swal.fire({
                    title: "Your transaction was successful",
                    icon: "success"
                }).then((ok)=>{
                    window.location.reload();
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

const checkCode=async()=>{
    const codeInput = document.getElementById('code').value;
    const formdata = new FormData();
        formdata.append("code", codeInput);
        formdata.append("status", 0);


        const requestOptions = {
        method: "POST",
        body: formdata,
        redirect: "follow"
        };

        fetch("./apis/addCoupenCode.php", requestOptions)
        .then((response) => response.json())
        .then((result) => {

            if(result.status==200){
                let amountToPay=document.getElementById("youPay").value;
                document.getElementById("youPay").innerHTML=(amountToPay-((amountToPay/10).toFixed(3))).toFixed(3);
                document.getElementById("youPay").value=(amountToPay-((amountToPay/10).toFixed(3))).toFixed(3);
                document.getElementById("codeCheck").disabled=true;
                document.getElementById("codewarning").style.display = "none";
                document.getElementById("codesuccess").style.display = "block";

            }else{
                document.getElementById("codewarning").style.display = "block";
            }
        })
        .catch((error) => console.error(error));

}
</script>

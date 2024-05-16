<?php 
include "header.php";
?>

 <section class="mainsection">
            
            <section class="privewNftContainer py-md-5 py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="d-flex flex-wrap align-items-center  justify-content-md-between justify-content-sm-center justify-content-center">
                                <div class="d-flex mb-mb-0 mb-3">
                                    <div class="pro-img mr-2">
                                        <img src="./assets/img/icon-nova-token.png" class="" alt="">
                                    </div>
                                    <div class="usrename ">
                                        <div class="d-md-flex align-items-center d-sm-block d-block text-center">
                                            <h4 class="mb-0" id="totalClaim">50,503.56</h4> &nbsp;
                                            <span style="color: #64B963; font-size: 14px;"> ~$14,589.23</span>
                                        </div>
                                        <div class="d-flex align-items-center">
                                            <span style="font-size: 12px;">Total rewards</span> 
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex flex-wrap align-items-center justify-content-center" style="gap: 20px;">
                                    <div class="text-center">
                                        <h5 style="font-size: 18px;" class="m-0">12 /<sub>14</sub></h5>
                                        <span style="font-size: 12px;">Staked NFTs</span>
                                    </div>
                                    <div class="text-center">
                                        <h5 style="font-size: 18px;" class="m-0">543.54<sub>%</sub></h5>
                                        <span style="font-size: 12px;">Average ROI</span>
                                    </div>
                                    <div class="d-flex">
                                        <div class="pro-img mr-2">
                                            <img src="./assets/img/icon-nova-token.png" class="" alt="">
                                        </div>
                                        <div class="usrename ">
                                            <div class="d-flex align-items-center">
                                                <h4 class="mb-0" style="font-size: 18px;">12.29k</h4>
                                                <span style="color: #64B963; font-size: 14px;"> ~$1.53k</span>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <span style="font-size: 12px;">~Monthly Earnings</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex">
                                        <div class="pro-img mr-2">
                                            <img src="./assets/img/icon-nova-token.png" class="" alt="">
                                        </div>
                                        <div class="usrename text-center">
                                            <div class="d-flex align-items-center">
                                                <h4 class="mb-0" style="font-size: 18px;">154.29k</h4>
                                                <span style="color: #64B963; font-size: 14px;"> ~$13.77k</span>
                                            </div>
                                            <div>
                                                <span style="font-size: 12px;">~Yearly Earnings</span> 
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
            <section class="nftcontainers">
                <div class="container">
                    <div class="d-flex align-items-center justify-content-between flex-wrap">
                        <div class="tabs-container border-bottom w-100">
                            <ul class="nav nav-pills" id="pills-tab" role="tablist">
                                <li class="nav-item">
                                  <a class="nav-link active" style="font-size: 14px;" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true"><span><img src="./assets/img/icon-staked.png" alt=""></span> Staked (0)</a>
                                </li>
                                <li class="nav-item">
                                  <a class="nav-link " style="font-size: 14px; color: #A3A3B2;" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                    Available to Stake 
                                  </a>
                                </li> 
                            </ul>
                        </div> 
                        <!--<div class="">-->
                        <!--    <div class="dropdown show">-->
                        <!--        <a class="btn dropdown-toggle text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">-->
                        <!--            Sort-->
                        <!--        </a> -->
                        <!--        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">-->
                        <!--          <a class="dropdown-item" href="#">Sort</a>-->
                        <!--          <a class="dropdown-item" href="#">Sort</a> -->
                        <!--        </div>-->
                        <!--    </div>-->
                        <!--</div>-->
                    </div>
                    <style>
                        .nubers10 {
                            background-color: #2CFF9F;
                            padding: 2px 4px;
                            color: #05000F;
                            border-radius: 5px;
                            font-size: 16px;
                        }
                        .stake-bor {
                            border: 1px solid #E4E4E8;
                            padding: 3px 8px;
                            border-radius: 50px;
                            font-weight: 500;
                        }
                        .dropdown-toggle::after {
                            display: none;
                        }
                        .tabsrows {
                            border: 1px solid #E4E4E8;
                            padding: 15px;
                            border-radius: 12px;
                        }
                        .xbvansbkv {
                            border: 1px solid #E85B76;
                            padding: 15px;
                            border-radius: 20px;
                        }
                        .inputvhjd {
                            width: 100%;
                            height: 45px;
                            padding: 0 15px;
                            background: #F6F6F7;
                            border: 1px solid #E4E4E8;
                            border-radius: 12px;
                            outline: none !important;
                        }
                        .textarea {
                            width: 100%;  
                            background: #F6F6F7;
                            border: 1px solid #E4E4E8;
                            border-radius: 12px;
                            outline: none !important;
                            padding: 5px 15px;
                        }
                        .Unstacks {
                            background: var(--primary);
                            border-radius: 12px;
                            padding: 10px 30px;
                            text-align: center;
                            margin: auto;
                        }
                        .POWERMINING {
                            font-size: 10px;
                        }
                        .dropdown-menu { 
                            right: 0; 
                            float: right; 
                            border: 1px solid #E4E4E8;
                            border-radius: 17px;
                            transform: translate3d(-113px, 43px, 0px) !important;
                        }
                        @media (max-width: 767.98px) { .dropdown {
                              position: absolute;
                              right: 2px;
                              top: -330%;
                            } 
                            .mb-2.tabsrows {
                              position: relative;
                            }
                            
                            .mobile-icon-img{width: 15px;margin-right: 2px !important;}
                            
                            .line-height-18{line-height: 18px;}
                            
                            .mb-2.tabsrows .font-weight-bold {
                              font-size: 12px !important;
                            }
                        }
                    </style>
                    <div class="tab-content py-md-5 py-3 mt-3" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">...</div>
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
        
        
          <!-- Modal -->
                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content" id="modalinfo">
                        <div class="modal-header">
                        <h5 class="modal-title" style="font-size: 23px;" id="exampleModalLongTitle">Unstake PowerDiamond#12034</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="nbfvksjdf text-center ">
                                <span class="text-center" style="color: #E85B76; font-size: 14px;">If you unstake then you will lose all your rewards :</span>
                            </div>
                            <div class="xbvansbkv my-3">
                                <div class="d-flex">
                                     <span class="mr-2">
                                        <img src="./assets/img/nft1.png" class="" width="50px" height="50px" alt="" style="border-radius: 12px;">
                                      </span>
                                      <div>
                                           <h5 class="font-weight-bold" style="font-size: 12px;">Power Diamond <span class="nubers10">#10</span></h5>
                                            <div class="d-flex align-items-center" style="gap: 10px;">
                                                <div class="d-flex align-items-center stake-bor">
                                                    <img src="./assets/img/star.png" class="img-fluid" alt="">
                                                    <h6 class="m-0 ml-1 font-weight-bold" style="font-size: 12px;">1 <sub>LVL</sub></h6>
                                                </div>
                                                <div class="d-flex align-items-center stake-bor">
                                                    <img src="./assets/img/WTH.png" class="img-fluid" width="12px" alt="">
                                                    <h6 class="m-0 ml-1 font-weight-bold" style="font-size: 12px;">40 <sub>W/TH</sub></h6>
                                                </div> 
                                                <div class="d-flex align-items-center stake-bor">
                                                    <img src="./assets/img/90TH.png" class="img-fluid" alt="">
                                                    <h6 class="m-0 ml-1 font-weight-bold" style="font-size: 12px;">90 <sub>W/TH</sub></h6>
                                                </div> 
                                                <div class="d-flex align-items-center stake-bor">
                                                    <img src="./assets/img/lock.png" class="img-fluid" alt="">
                                                    <h6 class="m-0 ml-1 font-weight-bold" style="font-size: 12px;">90 <sub>D</sub></h6>
                                                </div> 
                                            </div>
                                      </div>
                                </div>
                               
                            </div>
                            <div class="jfskfdj mb-3">
                                <label for="" style="font-size: 9px;">STAKING REWARD</label>
                                <input type="text" class="inputvhjd" placeholder="12043.50">
                            </div>
                            <div class="jfskfdj mb-3">
                                <label for="" style="font-size: 9px;">TERMS AND CONDITIONS</label>
                                <textarea name="" class="textarea" id="" cols="30" rows="3"></textarea>
                            </div>
                            
                            <div class="pb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1" style="font-size: 12px;">I accept the Terms and Conditions</label>
                                  </div>
                                <div class="form-check my-3">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                    <label class="form-check-label" for="exampleCheck2" style="font-size: 12px;">I confirm that long bla bla because of the conditions that bla bla because bla is bla</label>
                                  </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input bg-dark" id="exampleCheck3">
                                    <label class="form-check-label" for="exampleCheck3" style="color: #E85B76; font-size: 12px;">I confirm that this is important and early unlock will fuck me hard</label>
                                  </div>
                            </div>
                            <div class="py-3 text-center">
                                <button class="btn Unstacks">Unstake</button>
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
    let intervalId = setInterval(() => {
    if(selectedAccount) {
        clearInterval(intervalId); // Stop the interval
        fetchUserData(selectedAccount);
    }
}, 1000);

const fetchUserData=async(address)=>{
    const requestOptions = {
        method: "GET",
        redirect: "follow"
        };

        fetch(`./apis/stake.php?address=${address}`, requestOptions)
        .then((response) => response.json())
        .then((result) =>{ 
            let unlockTime=0;
            let rewards=0;
            let totalRewards=0;
            if(result.status==200){
            let html=``;
            for(let i=0;i<result.data.length;i++){
                unlockTime=countdownToUnlock(result.data[i].unlockTime);
                rewards=calclulateRewards(result.data[i].amount,result.data[i].apy,result.data[i].unlockTime);
                totalRewards+=Number(rewards);
                html+=`<div class="mb-2 tabsrows"> 
                                <div class="row align-items-center ">
                                    <div class="col-xl-3">
                                        <div class="d-flex align-items-center justify-content-md-start justify-content-sm-center justify-content-center">
                                            <span class="mr-2">
                                                <img src="https://www.coodingdessign.com/novarealchain/${result.data[i].image}" class="" width="50px" height="50px" alt="" style="border-radius: 12px;">
                                            </span>
                                            <div class="">
                                                <h5 class="m-0" style="font-size: 16px;">${result.data[i].sub_title} <span class="nubers10">#10</span></h5>
                                                <div class="POWERMINING">POWERMINING
                                                    <img src="./assets/img/icon-verified-nft.png" width="16px" alt="">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-5  my-md-0 my-sm-3 my-3 "> 
                                        <div class="d-flex align-items-center justify-content-md-start justify-content-sm-center justify-content-center" style="gap: 10px;">
                                            <div class="d-flex align-items-center stake-bor">
                                                <img src="./assets/img/star.png" class="img-fluid" alt="">
                                                <h6 class="m-0 ml-1" style="font-size: 14px;">${result.data[i].amount} <sub></sub></h6>
                                            </div>
                                            <div class="d-flex align-items-center stake-bor">
                                                <img src="./assets/img/WTH.png" class="img-fluid" width="12px" alt="">
                                                <h6 class="m-0 ml-1" style="font-size: 14px;">${result.data[i].energy_efficiency} <sub></sub></h6>
                                            </div> 
                                            <div class="d-flex align-items-center stake-bor">
                                                <img src="./assets/img/90TH.png" class="img-fluid" alt="">
                                                <h6 class="m-0 ml-1" style="font-size: 14px;">${result.data[i].computing_power} <sub>W/TH</sub></h6>
                                            </div> 
                                            <div class="d-flex align-items-center stake-bor">
                                                <img src="./assets/img/lock.png" class="img-fluid" alt="">
                                                <h6 class="m-0 ml-1" style="font-size: 14px;">${result.data[i].special_events} <sub>D</sub></h6>
                                            </div> 
                                        </div> 
                                    </div>
                                    <div class="col-xl-4" style="padding-right: 10px;padding-left: 10px;">
                                        <div class="d-flex flex-wrap justify-content-md-end justify-content-sm-center justify-content-center" style="gap: 18px;">
                                            <div class="text-center line-height-18">
                                                <h6 class="m-0 font-weight-bold" style="font-size: 14px;">${unlockTime}</h6>
                                                <span style="font-size: 10px;">Unlocks In</span>
                                            </div>
                                            <div class="text-center line-height-18">
                                                <h6 class="m-0 font-weight-bold" style="font-size: 14px;">${result.data[i].apy}<sub>%</sub></h6>
                                                <span style="font-size: 10px;">ROI</span>
                                            </div>
                                            <div class="line-height-18">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <img src="./assets/img/icon-nova-token.png" class="mr-2 mobile-icon-img" alt="">
                                                    <h5 class="mb-0 font-weight-bold" style="font-size: 14px;">${rewards}</h5> 
                                                </div>
                                                <div class="usrename">   
                                                    <span style="font-size: 10px;">Rewards after period over</span>  
                                                </div>
                                            </div> 
                                            <div class="dropdown show">
                                                <a class="btn dropdown-toggle text-dark" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </a> 
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                  <button class="dropdown-item" onclick="claimRewards('${result.data[i].planId}','${result.data[i].nftId}','${result.data[i].unlockTime}')"href="#">Claim</button>
                                                  <button class="dropdown-item" onclick="myunStakeFunc('${result.data[i].sub_title}','${result.data[i].image}','${result.data[i].energy_efficiency}','${result.data[i].computing_power}','${result.data[i].special_events}' ,'${rewards}','${result.data[i].planId}','${result.data[i].nftId}','${result.data[i].amount}')" href="#" data-toggle="modal" data-target="#exampleModalCenter" style="color: #E85B76;">Unstake</button> 
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>`;
            }
            document.getElementById("totalClaim").innerHTML=totalRewards;
            if(html!='') {
                document.getElementById("pills-home").innerHTML=html;
                document.getElementById("pills-home-tab").innerHTML=`Staked(${result.data.length})`
            }
            else{
                document.getElementById("pills-home").innerHTML=`No stake found`
                document.getElementById("pills-home-tab").innerHTML=`Staked(${result.data.length})`
            }
            }else{
             document.getElementById("pills-home").innerHTML=`No stake found`;
             document.getElementById("pills-home-tab").innerHTML=`Staked(0)`
            }
            
        })
        .catch((error) => console.error(error));
}
const countdownToUnlock=(unlockTimeInSeconds)=> {
    // Convert seconds to milliseconds
    let unlockTimeInMillis = unlockTimeInSeconds * 1000;
    
    // Get current time in milliseconds
    let currentTimeInMillis = Date.now();
    
    // Calculate the difference
    let timeDifference = unlockTimeInMillis - currentTimeInMillis;
    
    // Convert milliseconds to seconds
    let secondsRemaining = Math.floor(timeDifference / 1000);

    // Convert seconds to hours, minutes, and seconds
    let hours = Math.floor(secondsRemaining / 3600);
    secondsRemaining %= 3600;
    let minutes = Math.floor(secondsRemaining / 60);
    let seconds = secondsRemaining % 60;

    // Format the countdown
    let countdown = `${hours}H: ${minutes}M: ${seconds}S`;
    return countdown;
}

const myunStakeFunc=(name,image,energy_efficiency,computing_power,special_events,rewards,planId,nftId,amount)=>{
    let modalHTMl=`<div class="modal-header">
                        <h5 class="modal-title" style="font-size: 23px;" id="exampleModalLongTitle">Unstake ${name}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <div class="nbfvksjdf text-center ">
                                <span class="text-center" style="color: #E85B76; font-size: 14px;">If you unstake then you will lose all your rewards :</span>
                            </div>
                            <div class="xbvansbkv my-3">
                                <div class="d-flex">
                                     <span class="mr-2">
                                        <img src="https://www.coodingdessign.com/novarealchain/${image}" class="" width="50px" height="50px" alt="" style="border-radius: 12px;">
                                      </span>
                                      <div>
                                           <h5 class="font-weight-bold" style="font-size: 12px;">${name} </h5>
                                            <div class="d-flex align-items-center" style="gap: 10px;">
                                                
                                                <div class="d-flex align-items-center stake-bor">
                                                    <img src="./assets/img/WTH.png" class="img-fluid" width="12px" alt="">
                                                    <h6 class="m-0 ml-1 font-weight-bold" style="font-size: 12px;">${energy_efficiency} <sub></sub></h6>
                                                </div> 
                                                <div class="d-flex align-items-center stake-bor">
                                                    <img src="./assets/img/90TH.png" class="img-fluid" alt="">
                                                    <h6 class="m-0 ml-1 font-weight-bold" style="font-size: 12px;">${computing_power} <sub></sub></h6>
                                                </div> 
                                                <div class="d-flex align-items-center stake-bor">
                                                    <img src="./assets/img/lock.png" class="img-fluid" alt="">
                                                    <h6 class="m-0 ml-1 font-weight-bold" style="font-size: 12px;">${special_events}<sub></sub></h6>
                                                </div> 
                                            </div>
                                      </div>
                                </div>
                               
                            </div>
                            <div class="jfskfdj mb-3">
                                <label for="" style="font-size: 9px;">STAKING REWARD</label>
                                <input type="text" readonly value="${rewards}" class="inputvhjd" placeholder="12043.50">
                            </div>
                            <div class="jfskfdj mb-3">
                                <label for="" style="font-size: 9px;">TERMS AND CONDITIONS</label>
                                <textarea name="" class="textarea" id="" cols="30" rows="3"></textarea>
                            </div>
                            
                            <div class="pb-3">
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1" style="font-size: 12px;">I accept the Terms and Conditions</label>
                                  </div>
                                <div class="form-check my-3">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck2">
                                    <label class="form-check-label" for="exampleCheck2" style="font-size: 12px;">I confirm that long bla bla because of the conditions that bla bla because bla is bla</label>
                                  </div>
                                <div class="form-check">
                                    <input type="checkbox" class="form-check-input bg-dark" id="exampleCheck3">
                                    <label class="form-check-label" for="exampleCheck3" style="color: #E85B76; font-size: 12px;">I confirm that this is important and early unlock will fuck me hard</label>
                                  </div>
                            </div>
                            <div class="py-3 text-center">
                                <button class="btn Unstacks" onclick="unstakeNFTs('${planId}','${nftId}','${amount}')">Unstake</button>
                            </div>

                        </div> `;
    document.getElementById("modalinfo").innerHTML=modalHTMl;
}

const calclulateRewards=(amount,apy,lockingPeriod)=>{
    let stakeRewards = (amount *apy * lockingPeriod) / (100 * 365 * 24 * 60 * 60);
    if(stakeRewards) return stakeRewards.toFixed(2);
    else return 0;
}

const unstakeNFTs=async(planId,nftIdToUnstake,amount)=>{
    const web3 = new Web3(provider);
    if(selectedAccount){
        if( balance>0){
            let isChecked1 = document.getElementById("exampleCheck1").checked;
            let isChecked2 = document.getElementById("exampleCheck2").checked;
            let isChecked3 = document.getElementById("exampleCheck3").checked;
            
            if(isChecked1 && isChecked2 && isChecked3){
                stakContract.methods.unstake(planId,nftIdToUnstake).send({ from: selectedAccount})
                    .on("transactionHash", function (hash) {
                            document.getElementById("loadingdiv").classList.remove("d-none");
                            document.getElementById("loadingdiv").className = "d-block";
                    })
                    .then((receipt1) => { 
                        document.getElementById("loadingdiv").className = "d-none";
                        deleteData(planId,nftIdToUnstake,selectedAccount,amount);
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
                text: "Please accpect all term and conditons"
            });
            }
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
const deleteData=(planId,nftId,address,amount)=>{
    const myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    
    const raw = JSON.stringify({
      "planId": planId,
      "nftId": nftId,
      "address": address,
      "amount": amount
    });
    
    const requestOptions = {
      method: "DELETE",
      headers: myHeaders,
      body: raw,
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

const claimRewards=async(planId,nftIdToUnstake,unlockTime)=>{
    const web3 = new Web3(provider);
    if(selectedAccount){
        if( balance>0){
                if(Math.floor(Date.now()/1000)>unlockTime){
                stakContract.methods.claimRewards(planId,nftIdToUnstake).send({ from: selectedAccount})
                    .on("transactionHash", function (hash) {
                            document.getElementById("loadingdiv").classList.remove("d-none");
                            document.getElementById("loadingdiv").className = "d-block";
                    })
                    .then((receipt1) => { 
                        document.getElementById("loadingdiv").className = "d-none";
                        updateData(planId,nftIdToUnstake,selectedAccount);
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
                    text: "Locking period is not over yet"
                });
                }
                
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
const updateData=(planId,nftId,address)=>{
    const myHeaders = new Headers();
    myHeaders.append("Content-Type", "application/json");
    
    const raw = JSON.stringify({
      "planId": planId,
      "nftId": nftId,
      "address": address
    });
    
    const requestOptions = {
      method: "PATCH",
      headers: myHeaders,
      body: raw,
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



</script>
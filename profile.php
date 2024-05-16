<?php include "header.php"?>

        <section class="mainsection">
            
            <section class="privewNftContainer py-md-5 py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="profile-container-edits">
                                <div class="profile-container">
                                    <div class="pro-img">
                                        <img src="./assets/img/icon-big-user.png" class="" width="80px" height="80px" alt="">
                                    </div>
                                    <div class="usrename ">
                                        <h5 id="userName">@ultraBro</h5>
                                        <div class="d-flex align-items-center meta-add">
                                            <span id="address">0x295e2649..b89b</span>
                                            <span class="ml-3"><img src="./assets/img/icon-copy.png" alt=""></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="edit-btn">
                                    <a data-toggle="modal" data-target="#exampleModalCenter1" style="cursor: pointer;">
                                        <img src="./assets/img/button-edit-small.png" alt="">
                                    </a>
                                </div>
                            </div>
                        </div> 
                    </div>
                </div>
            </section>
            <section class="nftcontainers py-md-5 py-3">
                <div class="container">
                    <div class="tabs-container">
                        <ul class="nav nav-pills mb-3 border-bottom" id="pills-tab" role="tablist">
                            <li class="nav-item">
                              <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Owned</a>
                            </li>
                            <li class="nav-item">
                            <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">
                                Listed
                              </a>
                            </li> 
                        </ul>
                    </div> 
                    <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                            <div class="tabsrows"> 
                                <div class="row" id="ownedTab">
                                    
                                    
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                             <div class="tabsrows"> 
                                <div class="row" id="listTab">
                                    
                                    
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
        <div class="modal fade" id="exampleModalCenter1" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header border-0">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Profile</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="my-3">
                            <span class="font-size13">CONNECTED WALLET</span>
                            <div class="cupSearch my-2">
                                <input type="text" readonly class="searchinput" id="connectedAddress" placeholder="0x70F657164e5b75689b64B7fd1fA275F334f28e18">
                            </div>
                        </div>
                        <div class="my-3">
                            <span class="font-size13">YOUR Name</span>
                            <div class="cupSearch my-2">
                                <input type="text" id="name" class="searchinput" placeholder="Enter Username">
                            </div>
                        </div>
                        <div class="mt-3">
                            <button id="buyNFT" onclick="updateProfile()" class="w-100 btn button-Wallet">Submit</button>
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
        document.getElementById("address").innerHTML=`${selectedAccount.slice(0,6)}...${selectedAccount.slice(-5)}`;
        document.getElementById("connectedAddress").value=selectedAccount;
        document.getElementById("userName").innerHTML=`@${userName}`;
        clearInterval(intervalId); // Stop the interval
        fetchUserData(selectedAccount);
    }else{
        document.getElementById("address").innerHTML=`Please Connect Wallet`;
    }
}, 1000);

const fetchUserData=async(address)=>{
    const requestOptions = {
        method: "GET",
        redirect: "follow"
        };

        fetch(`./apis/getNFTS.php?address=${address}`, requestOptions)
        .then((response) => response.json())
        .then((result) =>{ 
            if(result.status==200){
                let html=``;
                let listHtml=``;
            for(let i=0;i<result.data.length;i++){
                 if(result.data[i].sell==0){
                     
                html+=`<div class="col-lg-3">
                                        <div class="nftContainers">
                                        <a href="https://www.coodingdessign.com/novarealchain/resell.php?id=${result.data[i].nft_id}&owner=${result.data[i].nft_owner_address}"><div class="imgROw">
                                        <img src="https://www.coodingdessign.com/novarealchain/${result.data[i].image}" class="w-100" alt="" />
                                                <div class="nftpontbtns">
                                                    <div class="d-flex align-items-center justify-content-between" style="gap: 3px;">
                                                        <div class="d-flex align-items-center TH-bg40">
                                                            <img src="./assets/img/WTH.png" class="img-fluid" style="width: 9px; height: auto;" alt="" />
                                                            <span>${result.data[i].energy_efficiency} </span>
                                                        </div>
                                                        <div class="d-flex align-items-center TH-bg40">
                                                            <img src="./assets/img/90TH.png" class="img-fluid" style="width: 9px; height: auto;" alt="" />
                                                            <span>${result.data[i].computing_power} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="">
                                                        <h5 class="m-0">${result.data[i].sub_title}</h5>
                                                        <div class="POWERMINING">
                                                            POWERMINING
                                                            <img src="./assets/img/icon-verified-nft.png" width="16px" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="right-box text-right">
                                                        <div class="right-box10">
                                                            <span>#${result.data[i].nft_id}</span>
                                                        </div>
                                                        <span class="font-weight-bold" style="font-size: 13px;">${result.data[i].nft_cpoies}</span>
                                                    </div>
                                                </div>
                                                <div class="button-border-cian">
                                                    <div class="cart-icons">
                                                        <img src="./assets/img/icon-chart.png" alt="" />
                                                    </div>
                                                    <div class="RWAfi-text">
                                                        <h6 class="m-0">${result.data[i].price} MATIC</h6>
                                                            <span>~$ ${(maticToUsdPrice*result.data[i].price).toFixed(4)}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                 }else {                      
                        listHtml+=`<div class="col-lg-3">
                                        <div class="nftContainers">
                                         <a href="https://www.coodingdessign.com/novarealchain/buy-nft-preview.php?id=${result.data[i].nft_id}&owner=${result.data[i].nft_owner_address}"><div class="imgROw">
                                            <img src="https://www.coodingdessign.com/novarealchain/${result.data[i].image}" class="w-100" alt="" />
                                                <div class="nftpontbtns">
                                                    <div class="d-flex align-items-center justify-content-between" style="gap: 3px;">
                                                        <div class="d-flex align-items-center TH-bg40">
                                                            <img src="./assets/img/WTH.png" class="img-fluid" style="width: 9px; height: auto;" alt="" />
                                                            <span>${result.data[i].energy_efficiency} </span>
                                                        </div>
                                                        <div class="d-flex align-items-center TH-bg40">
                                                            <img src="./assets/img/90TH.png" class="img-fluid" style="width: 9px; height: auto;" alt="" />
                                                            <span>${result.data[i].computing_power} </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-2">
                                                <div class="d-flex align-items-center justify-content-between mb-2">
                                                    <div class="">
                                                        <h5 class="m-0">${result.data[i].sub_title}</h5>
                                                        <div class="POWERMINING">
                                                            POWERMINING
                                                            <img src="./assets/img/icon-verified-nft.png" width="16px" alt="" />
                                                        </div>
                                                    </div>
                                                    <div class="right-box text-right">
                                                        <div class="right-box10">
                                                            <span>#${result.data[i].nft_id}</span>
                                                        </div>
                                                        <span class="font-weight-bold" style="font-size: 13px;">${result.data[i].nft_cpoies}</span>
                                                    </div>
                                                </div>
                                                <div class="button-border-cian">
                                                    <div class="cart-icons">
                                                        <img src="./assets/img/icon-chart.png" alt="" />
                                                    </div>
                                                    <div class="RWAfi-text">
                                                        <h6 class="m-0">${result.data[i].price} MATIC</h6>
                                                            <span>~$ ${(maticToUsdPrice*result.data[i].price).toFixed(4)}</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>`;
                }
            }
            if(html!='') document.getElementById("ownedTab").innerHTML=html;
            else document.getElementById("ownedTab").innerHTML=`No NFTs Found `

            if(listHtml!='') document.getElementById("listTab").innerHTML=listHtml;
            else document.getElementById("listTab").innerHTML=`No NFTs Found `
            }else{
                console.log("")
            }
            
        })
        .catch((error) => console.error(error));
}

const updateProfile=async()=>{
    let name=document.getElementById("name").value;
    if(!name) userName;
    const formdata = new FormData();
        formdata.append("address", selectedAccount);
        formdata.append("name", name);

        const requestOptions = {
        method: "POST",
        body: formdata,
        redirect: "follow"
        };

        fetch("./apis/editUser.php", requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if(result.status==201){
                Swal.fire({
                    title: "Edit Profile",
                    text: `Name Successfully Changed`,
                    icon: "success"
                }).then((ok)=>{
                    window.location.reload();
                });
            }else{
                Swal.fire(`${result.message}`);
            }
        })
        .catch((error) => console.error(error));


}
</script>

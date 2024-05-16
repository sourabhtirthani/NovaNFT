<?php 
include "header.php";
?>
    
    <section class="mainsection">
        <!--Primary NFT marketplace section-->
        <div class="tab-content" id="myTabContent">
          <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
              <section class="heroContainer">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="herorows">
                                <h2 class="main-head">Push Your Limits!</h2>
                                <h6 class="my-2 sub-main-head">Discover the PowerMining NFT</h6>
                                <div class="py-3">
                                    <p class="main-dec">Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum it esse molestie consequat click to learn more.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
              <section class="nftcontainers py-md-5 py-3">
                <div class="container">
                    <div class="py-3">
                    
                    <div class="d-lg-none d-md-none d-sm-flex d-flex align-items-center justify-content-between position-relative">
                        <div class="mobi-search ">
                            <button class="btn-mobi-search" id="serachbarToggale">
                                <i class="fa-solid fa-magnifying-glass fa-sm" style="color: #292929;"></i>
                            </button>
                        </div>
                        
                        <div class="searchpopup" id="searchpopup">
                            <div class="position-relative">
                                <input type="search" class="searchinput" onkeyup="searchNFTs()" placeholder="Search...">
                                <span class="close search-close" >&times;</span> 
                            </div>
                        </div>

                        <div class="mobi-search">
                            <button class="btn-toggale" id="filters">
                                <i class="fa-solid fa-bars-staggered fa-sm" style="color: #292929;"></i>
                            </button> 
                        </div>
                        <div class="popup" id="popup">
                            <span class="close item-close">&times;</span>
                            <div class="">
                                <!--<div class="selector mb-3">-->
                                <!--    <select class="selectors w-100" name="" id="">-->
                                <!--        <option value="">Popular Items</option>-->
                                <!--        <option value="">Popular Items1</option>-->
                                <!--    </select>-->
                                <!--</div> -->
                                <div class="selector">
                                    <select class="selectors" name="Sort" id="sorting" onchange="searchNFTs()">
                                        <option value="">Price</option>
                                        <option value="asc">Low to High</option>
                                        <option value="desc">High to Low</option>
                                    </select>
                                </div> 
                            </div>
                            <style>
                                /* Style for the popup */
                        .popup {
                            display: none;
                            position: absolute;
                            bottom: -29%;
                            left: 50%;
                            transform: translate(-50%, -50%);
                            background-color: var(--white);
                            padding: 20px;
                            border: none;
                            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                            z-index: 9;
                            width: 100%;
                            border-radius: 12px;
                          }
                          
                          /* Style for the close button */
                          .close {
                            position: absolute;
                            top: 10px;
                            right: 10px;
                            cursor: pointer;
                          }
                        
                            </style>
                        </div>
                    </div>

                    <div class="d-lg-flex d-md-flex d-sm-none d-none align-items-center justify-content-between">
                        <div class="searchingarea">
                            <div class="position-relative">
                                <input type="text" name="search" class="searchinput" id="searchInput" onkeyup="searchNFTs()" placeholder="Search...">
                                <button class="btn-Sraching">
                                    <i class="fa-solid fa-magnifying-glass fa-sm" type="submit" style="color: #292929;"></i>
                                </button>
                            </div>
                        </div>
                        <!-- <div class="filterarea">
                            <div class="selector">
                                <select class="selectors" name="" id="">
                                    <option value="">Popular Items</option>
                                    <option value="">Popular Items1</option>
                                </select>
                            </div>  -->
                            <div class="selector">
                                <select class="selectors" name="Sort" id="sorting" onchange="searchNFTs()">
                                    <option value="">Price</option>
                                    <option value="asc">Low to High</option>
                                    <option value="desc">High to Low</option>
                                </select>
                            </div> 
                        </div>
                    </div>
                    <div class="row mt-3" id="nftContainer">
                    </div>
                    <div id="loadmore" style="display:none;" class="text-center py-4">
                        <button  class="btn button-Wallet">Load More</button>
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
          </div>
        </div>
    </section>    

    <script src="./assets/js/jquery-3.2.1.slim.min.js"></script>
    <script src="./assets/js/popper.min.js"></script>
    <script src="./assets/js/bootstrap.min.js"></script>
    
     
    <script>
        // Function to open the popup
        function openPopup() {
          document.getElementById("popup").style.display = "block";
        }
        
        // Function to close the popup
        function closePopup() {
          document.getElementById("popup").style.display = "none";
        }
        
        // Add onclick event to the icon to open the popup
        document.getElementById("filters").addEventListener("click", openPopup);
        document.querySelector(".item-close").addEventListener("click", closePopup);
    </script>


    <script> 
        // header toggal var 
        function openPopup2() {
          document.getElementById("searchpopup").style.display = "block";
        } 
        // Function to close the popup
        function closePopup2() {
          document.getElementById("searchpopup").style.display = "none";
        } 
        // Add onclick event to the icon to open the popup
        document.getElementById("serachbarToggale").addEventListener("click", openPopup2);
        document.querySelector(".search-close").addEventListener("click", closePopup2);
    
    function searchNFTs() {
        var searchInput = document.getElementById("searchInput").value;
        var sortInput = document.getElementById("sorting").value;
        let activeTab = hasActive();
        let isAdminMinted;
        if (activeTab) {
          if (activeTab === '#home') {
            isAdminMinted=1;
          } else if (activeTab === '#profile') {
            isAdminMinted=0;
          }
        } else {
          console.log('No active tab found');
        }
        
        // Make an API call to fetch data based on the search input
        // Replace 'YOUR_API_ENDPOINT' with the actual API endpoint
        var apiUrl = `./apis/search.php?search=${searchInput}&sort=${sortInput}&isAdminMinted=${isAdminMinted}`;

        fetch(apiUrl)
            .then(response => response.json())
            .then(data => {
                // Clear the existing content
                document.getElementById("nftContainer").innerHTML = "";

                // Check if there are any results
                if (data.length > 0) {
                    data.forEach(nft => {
                        // Create HTML elements for each NFT
                        var nftHtml = `
                        <div class="col-lg-3">
                                    <a href="./buy-nft-preview.php?id=${nft.nft_id}&owner=${nft.nft_owner_address}"><div class="nftContainers">
                                        <div class="imgROw">
                                            <img src="https://www.coodingdessign.com/novarealchain/${nft.image}" class="w-100" alt="" />
                                            <div class="nftpontbtns">
                                                <div class="d-flex align-items-center justify-content-between" style="gap: 3px;">
                                                    <div class="d-flex align-items-center TH-bg40">
                                                        <img src="./assets/img/WTH.png" class="img-fluid" style="width: 9px; height: auto;" alt="" />
                                                        <span>${nft.energy_efficiency} </span>
                                                    </div>
                                                    <div class="d-flex align-items-center TH-bg40">
                                                        <img src="./assets/img/90TH.png" class="img-fluid" style="width: 9px; height: auto;" alt="" />
                                                        <span>${nft.computing_power} </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-2">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <div class="">
                                                    <h5 class="m-0">${nft.sub_title}</h5>
                                                    <div class="POWERMINING">
                                                        POWERMINING
                                                        <img src="./assets/img/icon-verified-nft.png" width="16px" alt="" />
                                                    </div>
                                                </div>
                                                <div class="right-box text-right">
                                                    <div class="right-box10">
                                                        <span>#${nft.nft_cpoies}</span>
                                                    </div>
                                                    
                                                </div>
                                            </div>
                                            <div class="button-border-cian">
                                                <div class="cart-icons">
                                                    <img src="./assets/img/icon-chart.png" alt="" />
                                                </div>
                                                <div class="RWAfi-text">
                                                    <h6 class="m-0">${nft.price} MATIC</h6>
                                                    <span>~$ ${(maticToUsdPrice*nft.price).toFixed(4)}</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div></a>
                                </div>`;
                        // Append the HTML to the container
                        document.getElementById("nftContainer").innerHTML += nftHtml;
                        if(data.length>8){
                        document.getElementById("loadmore").style.display="block";
                        }
                    });
                } else {
                    // If no results found, display a message
                    document.getElementById("nftContainer").innerHTML = "No results found.";
                    // document.getElementById("nftContainersecondary").innerHTML = "No results found.";

                }
            })
            .catch(error => console.error('Error:', error));
    }
    
    setTimeout(()=>{
        searchNFTs();
    },1000)
    
    function hasActive() {
      let activeTab;
      $('#myTab a').each(function() {
        if ($(this).hasClass('active')) {
          activeTab = $(this).attr('href');
          return false; // Exit the loop once the active tab is found
        }
      });
      return activeTab;
}
$('#myTab a').on('shown.bs.tab', function (e) {
  // Get the href attribute of the newly activated tab
  let targetTab = $(e.target).attr('href');
  if (targetTab === '#home') {
    searchNFTs();
  } else if (targetTab === '#profile') {
    searchNFTs();
  }
});
    </script>

 



</body>
</html>
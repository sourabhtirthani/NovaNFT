<?php include "header.php"; ?>

<style>
    .upload-area .brows-file-wrapper {z-index: 0;position: relative; border: 2px dashed #575767;border-radius: 5px;}
    .upload-area .brows-file-wrapper input {position: absolute;height: 100%; width: 100%; opacity: 0;cursor: pointer; z-index: 10;}
    .upload-area .brows-file-wrapper img {position: absolute;height: 100%;width: 100%; z-index: 9; cursor: pointer; border-radius: 5px; object-fit: cover;}
    .upload-area .brows-file-wrapper label {position: relative;z-index: 10; transition: var(--transition);}
    .upload-area label {width: 100%;height: 250px;border-radius: 5px;display: flex;justify-content: center;align-items: center;cursor: pointer;flex-direction: column; margin-bottom: 15px;}
    .form-wrapper-one {padding: 40px 35px;border-radius: 6px;background: var(--background-color-1);height: 100%;border: 1px solid var(--color-border);}
    .form-wrapper-one .input-box {display: block;}
    .form-wrapper-one input,
    .form-wrapper-one textarea {background: #fff;height: 50px;border-radius: 5px;color: var(--color-white);font-size: 14px;padding: 10px 20px;border: 2px solid var(--color-border);transition: 0.3s;width: 100%}
    .pb--20 {padding-bottom: 20px !important;}
</style>
<div class="content-body">
    <div class="container">
        <div class="row">

            <div class="col-xxl-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Create NFT by Admin</h4>
                    </div>
                 
                    <div class="card-body bs-0 p-0 top-creators-content  bg-transparent create-nft-sec">
                        <div class="row m-auto">
                            <div class="col-lg-3">
                                <!-- file upload area -->
                                <div class="upload-area">

                                    <div class="upload-formate mb--30">
                                        <h6 class="title">
                                            Upload file *
                                        </h6>
                                        <p class="formate">
                                            Drag or choose your file to upload
                                        </p>
                                    </div>

                                    <div class="brows-file-wrapper">
                                        <!-- actual upload which is hidden -->
                                        <input name="createinputfile" id="createinputfile" type="file" class="inputfile"
                                            onchange="previewImage(this)" />
                                        <img id="createfileImage" src="" alt=""
                                            data-black-overlay="6">
                                        <!-- our custom upload button -->
                                        <label for="createinputfile" title="No File Choosen">
                                            <i class="feather-upload"></i>
                                            <span class="text-center">Choose a File</span>
                                            <p class="text-center mt--10">PNG, GIF, JPG</p>
                                        </label>
                                    </div>
                                    <span id="imagewarning" style="display:none; color:red;">
                                         Please select image 
                                </span>
                                </div>
                                <!-- end upoad file area -->


                            </div>

                            <div class="col-lg-8">
                                <div class="form-wrapper-one">
                                    <!-- <form class="row" action="#"> -->

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="input-box pb--20">
                                                <label for="name" class="form-label">Product Name *</label>
                                                <input id="name" placeholder="Product Name" required>
                                                <span id="namewarning" style="display:none; color:red;">
                                                 Please enter product name
                                                </span>
                                            </div>
                                            
                                        </div>
                                        <div class="col-md-6">
                                            <div class="input-box pb--20">
                                                <label for="name" class="form-label">Copies *</label>
                                                <input id="copies" placeholder="Product Copies" required>
                                                <span class="col-md-6" id="copieswarning" style="display:none; color:red;">
                                                     Please enter number of copies
                                                </span>
                                            </div>
                                        
                                            
                                        </div>

                                    <div class="col-md-12">
                                        <div class="input-box pb--20">
                                            <label for="Discription" class="form-label">Description *</label>
                                            <textarea cols="80"  name="editor1" id="discription" rows="6"></textarea>
                                            <span id="descriptionwarning" style="display:none; color:red;">
                                         Please enter item description
                                    </span>
                                            <!--<textarea id="Discription" rows="3"-->
                                            <!--    placeholder="e. g. After purchasing the product you can get item..."-->
                                            <!--    required></textarea>-->
                                        </div>
                                        
                                    </div>

                                    <div class="col-md-12">
                                        <div class="input-box pb--20">
                                            <label for="dollerValue" class="form-label">Item Price *</label>
                                            <input type="number" min="0" max="20" id="dollerValue"
                                                placeholder="e. g. 0.00" required>
                                                <span id="pricewarning" style="display:none; color:red;">
                                         Please enter item price
                                    </span>
                                        </div>
                                        
                                    </div>

                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="pb--20">
                                                <label for="collection" class="form-label">Computing Power: </label>
                                                <input id="ComputingPower" placeholder="2 TH">
                                                <span id="powerwarning" style="display:none; color:red;">
                                         Please enter computing power
                                    </span>
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-4">
                                            <div class="pb--20">
                                                <label for="collection" class="form-label">Energy Efficiency: </label>
                                                    <input id="EnergyEfficiency" placeholder="20 W/TH">
                                                    <span id="energywarning" style="display:none; color:red;">
                                         Please enter energy Efficiency
                                        </span>
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-4">
                                            <div class="pb--20">
                                                <label for="collection" class="form-label">Special Events: </label>
                                                <input id="SpecialEvents" placeholder="Quarterly raffles">
                                                <span id="eventswarning" style="display:none; color:red;">
                                            Please enter special events
                                        </span>
                                            </div>
                                            
                                        </div>
                                        
                                        <div class="col-md-4">
                                            <div class="input-box pb--20">
                                                <label for="Royality" class="form-label">Rarity</label>
                                                <select class="form-control" id="Rarity">
                                                    <option value="Common">Common</option>
                                                    <option value="Uncommon">Uncommon</option>
                                                    <option value="Rare">Rare</option>
                                                    <option value="Very Rare">Very Rare</option>
                                                    <option value="Epic">Epic</option>
                                                    <option value="Legendary">Legendary</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="input-box pb--20">
                                                <label for="Royality" class="form-label">Royalty *</label>
                                                <input id="Royality" placeholder="5"  max="10">
                                                <span id="royalitywarning" style="display:none; color:red;">
                                            Please enter royality
                                        </span>
                                            </div>
                                        
                                        </div>


                                    </div>

                                    <div class="col-md-12 col-xl-12 mt_lg--15 mt_md--15 mt_sm--15">
                                        <div class="input-box">
                                            <button type="submit" onclick="checkAllDeatils()" id="mintButton"
                                                class="btn btn-primary btn-large w-100">MINT NOW</button>
                                        </div>
                                    </div>

                                    <!-- </form> -->
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">NFTs List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-icon">
                            <?php
                            include "../apis/connection.php";
                            $query = "SELECT * FROM nft_info GROUP BY nft_id ORDER BY id DESC"; // Replace 'your_table_name' with your actual table name
                            $result = $conn->query($query);
                            // Check if there are any rows returned
                            if (mysqli_num_rows($result) > 0) {
                                // Output table header
                                echo '<table class="table">
                                        <thead>
                                            <tr>
                                                <th>S.no.</th>
                                                <th>NFT ID</th>
                                                <th>Name</th>
                                                <th>Image</th>
                                                <th>Price</th>
                                                <th>Copies</th>
                                                <th>Delete</th>
                                            </tr>
                                        </thead>
                                        <tbody class="exploreItems">';
                                
                                // Loop through each row of data
                                $i=1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Output table row
                                    echo '<tr>
                                            <td>' . $i. '</td>
                                            <td>' . $row['nft_id'] . '</td>
                                            <td>' . $row['sub_title'] . '</td>
                                            <a href="https://www.coodingdessign.com/novarealchain/id=' . $row['nft_id'] . '&owner=' . $row['nft_owner_address'] . '"><td><img src="https://www.coodingdessign.com/novarealchain/' . $row['image'] . '" width="50"></td></a>
                                            <td>' . $row['price'] . '</td>
                                            <td>' . $row['nft_cpoies'] . '</td>
                                            <td> <button type="button" onclick=deleteNft(' . $row['nft_id'] . ') class="btn btn-danger">Delete</button> </td>
                                        </tr>';
                                        $i=$i+1;
                                }

                                // Close table
                                echo '</tbody></table>';
                            } else {
                                // If no rows found
                                echo "No data found.";
                            }
                            ?>
                          
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
</div>

<?php include "footer.php"; ?>

<script>
function previewImage(input) {
        var file = input.files[0];

        if (file) {
            var reader = new FileReader();

            reader.onload = function (e) {
                document.getElementById('createfileImage').src = e.target.result;
            };

            reader.readAsDataURL(file);
        }
    }

const checkAllDeatils=()=>{
    let allConditionsMet = true;
    let name=document.getElementById("name").value;
    if(!name) {
        document.getElementById("namewarning").style.display="block";
        allConditionsMet = false;
    };

    let copies=document.getElementById("copies").value;
    if(!copies){
        document.getElementById("copieswarning").style.display="block";
        allConditionsMet = false;
    };
    
    let discription=document.getElementById("discription").value;
    if(!discription) {
        document.getElementById("descriptionwarning").style.display="block";
        allConditionsMet = false;
    }
    
    let price=document.getElementById("dollerValue").value;
    if(!price) {
        document.getElementById("pricewarning").style.display="block";
        allConditionsMet = false;
    }

    let royality=document.getElementById("Royality").value;
    if(!royality) {
        document.getElementById("royalitywarning").style.display="block";
        allConditionsMet = false;
    }

    let fileInput = document.getElementById("createinputfile");
    let selectedFile = fileInput.files[0];
    if(!selectedFile) {
        document.getElementById("imagewarning").style.display="block";
        allConditionsMet = false;
    };

    let ComputingPower=document.getElementById("ComputingPower").value;
    if(!ComputingPower){
        ComputingPower=0;
    };

    let EnergyEfficiency=document.getElementById("EnergyEfficiency").value;
    if(!EnergyEfficiency) {
       EnergyEfficiency=0
    };

    let SpecialEvents=document.getElementById("SpecialEvents").value;
    if(!SpecialEvents) {
       SpecialEvents='None';
    };

    let rarity=document.getElementById("Rarity").value;
    if(!rarity) {
        document.getElementById("namewarning").style.display="block";
        allConditionsMet = false;
    };
    if (allConditionsMet) {
        document.getElementById("namewarning").style.display="none";
        document.getElementById("copieswarning").style.display="none";
        document.getElementById("descriptionwarning").style.display="none";
        document.getElementById("namewarning").style.display="none";
        document.getElementById("pricewarning").style.display="none";
        document.getElementById("royalitywarning").style.display="none";
        document.getElementById("imagewarning").style.display="none";
        document.getElementById("powerwarning").style.display="none";
        document.getElementById("energywarning").style.display="none";
        document.getElementById("eventswarning").style.display="none";

        mintNow(name, copies, discription, price, royality, selectedFile, ComputingPower, EnergyEfficiency, SpecialEvents, rarity);
    }
}

const mintNow=async(name,copies,discription,price,royality,selectedFile,ComputingPower,EnergyEfficiency,SpecialEvents,rarity)=>{
    const web3 = new Web3(provider);
    if(selectedAccount){
        if( balance>0){
            let nft_id=Math.floor(Math.random() * 10000);
            let amount=web3.utils.toWei(price, 'ether');
            myContract.methods.mint(nft_id,copies,amount,royality).send({ from: selectedAccount})
                .on("transactionHash", function (hash) {
                        document.getElementById("loadingdiv").classList.remove("d-none");
                        document.getElementById("loadingdiv").className = "d-block";
                })
                .then((receipt1) => { 
                    document.getElementById("loadingdiv").className = "d-none";
                    saveData(nft_id,copies,selectedAccount,discription,price,name,royality,selectedFile,ComputingPower,EnergyEfficiency,SpecialEvents,rarity);
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
                text: "Either Not Enough Matic To Mint NFT"
            });
        }
    }else{
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Please Connect Your Wallet First"
            });
        }

}

const saveData=async(nftId,nftCopies,account,discription,price,name,royalties,image,ComputingPower,EnergyEfficiency,SpecialEvents,rarity)=>{

        const formdata = new FormData();
        formdata.append("nft_id", nftId);
        formdata.append("nft_copies", nftCopies);
        formdata.append("nft_owner_address", account);
        formdata.append("nft_creator_address",account);
        formdata.append("discription", discription);
        formdata.append("price", price);
        formdata.append("sub_title", name);
        formdata.append("royalties", royalties);
        formdata.append("image", image);
        formdata.append("computing_power", ComputingPower);
        formdata.append("energy_efficiency", EnergyEfficiency);
        formdata.append("special_events", SpecialEvents);
        formdata.append("rarity", rarity);


        const requestOptions = {
        method: "POST",
        body: formdata,
        redirect: "follow"
        };

        fetch("../apis/createNFT.php", requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if(result.status==201){
                Swal.fire({
                    title: "Transaction Successful",
                    text: `${result.message}`,
                    icon: "success"
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

const deleteNft=async(nftId)=>{

        const formdata = new FormData();
        formdata.append("nft_id", nftId);

        const requestOptions = {
        method: "POST",
        body: formdata,
        redirect: "follow"
        };

        fetch("../apis/deleteNft.php", requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if(result.status==201){
                Swal.fire({
                    title: "Transaction Successful",
                    text: `${result.message}`,
                    icon: "success"
                }).then((ok)=>{
                    window.location.href="./create_nft.php";
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
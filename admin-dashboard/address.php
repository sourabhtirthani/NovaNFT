<?php include "header.php"; ?>
 <div class="content-body">
        <div class="container">
            <div class="page-title">
                <div class="row mt-3">
                    <div class="col-md-4 mt-2">
                        <div class="card">
                            <h3>Management</h3>
                            <div class="card-body">
                                <form action="#">
                                    <div class="row">
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Add Coupon Code</label>
                                            <input name="fullName" type="text" id="Code" class="form-control">
                                        </div>
                                        <div class="col-12 mb-3">
                                            <label class="form-label">Add User For Coupon Code</label>
                                            <input name="fullName" type="text" id="user" class="form-control">
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="button" onclick="addCoupen()" class="btn btn-primary mr-2">Save</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <h3> Add Plans For stake</h3>
                            <div class="card-body">
                                <form >
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">APY </label>
                                            <input name="fullName" type="text" id="APY" class="form-control">
                                            <span id="apywarning" style="display:none; color:red;">
                                         Please enter APY 
                                </span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Reward token address </label>
                                            <input name="fullName" type="text" id="tokenaddress" class="form-control">
                                            <span id="addresswarning" style="display:none; color:red;">
                                         Please enter reward token address
                                </span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Reward token name </label>
                                            <input name="fullName" type="text" id="tokenname" class="form-control">
                                            <span id="namewarning" style="display:none; color:red;">
                                         Please enter reward token name
                                </span>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label class="form-label">Locking period </label>
                                            <input name="fullName" type="text" id="lockingperiod" class="form-control">
                                            <span id="periodwarning" style="display:none; color:red;">
                                         Please enter locking period time
                                </span>
                                        </div>
                                    </div>
                                    <div class="mt-2">
                                        <button type="button" onclick="checkAllDeatils()" class="btn btn-primary mr-2">Save</button></div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
            <div class="col-md-12">

                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Code List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-icon">
                            <?php
                            include "../apis/connection.php";
                            $query = "SELECT * FROM coupencode ORDER BY id DESC"; // Replace 'your_table_name' with your actual table name
                            $result = $conn->query($query);
                            // Check if there are any rows returned
                            if (mysqli_num_rows($result) > 0) {
                                // Output table header
                                echo '<table class="table">
                                        <thead>
                                            <tr>
                                                <th>S.no.</th>
                                                <th>Coupon Code</th>
                                                <th>Address</th>
                                                <th>Frequency</th>
                                            </tr>
                                        </thead>
                                        <tbody class="exploreItems">';
                                
                                // Loop through each row of data
                                $i=1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Output table row
                                    echo '<tr>
                                            <td>' . $i. '</td>
                                            <td>' . $row['code'] . '</td>
                                            <td>' . $row['address'] . '</td>
                                            <td>' . $row['frequency'] . '</td>
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
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Plans List</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive table-icon">
                            <?php
                            include "../apis/connection.php";
                            $query = "SELECT * FROM stakingPlans ORDER BY id DESC"; // Replace 'your_table_name' with your actual table name
                            $result = $conn->query($query);
                            // Check if there are any rows returned
                            if (mysqli_num_rows($result) > 0) {
                                // Output table header
                                echo '<table class="table">
                                        <thead>
                                            <tr>
                                                <th>S.no.</th>
                                                <th>Plan id</th>
                                                <th>APY</th>
                                                <th>Reward token</th>
                                                <th>Locking period</th>
                                            </tr>
                                        </thead>
                                        <tbody class="exploreItems">';
                                
                                // Loop through each row of data
                                $i=1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Output table row
                                    echo '<tr>
                                            <td>' . $i. '</td>
                                            <td>' . $row['planId'] . '</td>
                                            <td>' . $row['apy'] . '</td>
                                            <td>' . $row['rewardTokenName'] . '</td>
                                            <td>' . $row['lockingPeriod'] . ' days</td>
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


</div>

<?php include "footer.php"; ?>

<script>
const checkAllDeatils=()=>{
    let allConditionsMet = true;
    let apy=document.getElementById("APY").value;
    if(!apy) {
        document.getElementById("apywarning").style.display="block";
        allConditionsMet = false;
    };

    let tokanAddress=document.getElementById("tokenaddress").value;
    if(!tokanAddress){
        document.getElementById("addresswarning").style.display="block";
        allConditionsMet = false;
    };
    
    let tokanName=document.getElementById("tokenname").value;
    if(!tokanName) {
        document.getElementById("namewarning").style.display="block";
        allConditionsMet = false;
    }
    
    let lockPeriod=document.getElementById("lockingperiod").value;
    if(!lockPeriod) {
        document.getElementById("periodwarning").style.display="block";
        allConditionsMet = false;
    }
    
    if (allConditionsMet) {
        document.getElementById("namewarning").style.display="none";
        document.getElementById("apywarning").style.display="none";
        document.getElementById("addresswarning").style.display="none";
        document.getElementById("periodwarning").style.display="none";

        addPlans(apy, tokanAddress, tokanName, lockPeriod);
    }
}

const addCoupen=async()=>{
    const web3 = new Web3(provider);
    if(selectedAccount){
        if( balance>0){
            let code=document.getElementById("Code").value;
            let user=document.getElementById("user").value;
            myContract.methods.addCoupon(code).send({ from: selectedAccount})
                .on("transactionHash", function (hash) {
                        document.getElementById("loadingdiv").classList.remove("d-none");
                        document.getElementById("loadingdiv").className = "d-block";
                })
                .then((receipt1) => { 
                    document.getElementById("loadingdiv").className = "d-none";
                    saveData(code,user);
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
                text: " Not Enough Matic To Sign Transaction"
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

const saveData=async(code,address)=>{

        const formdata = new FormData();
        formdata.append("owner_address", address);
        formdata.append("code", code);
        formdata.append("status", 1);


        const requestOptions = {
        method: "POST",
        body: formdata,
        redirect: "follow"
        };

        fetch("../apis/addCoupenCode.php", requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if(result.status==201){
                Swal.fire({
                    title: "Coupen Code Added SuccessFully",
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

const addPlans=async(apy, tokanAddress, tokanName, lockPeriod)=>{
    const web3 = new Web3(provider);
    if(selectedAccount){
        if( balance>0){
            let planId=Math.floor(Math.random()*1000);
            let lockPeriodForSmartContract=lockPeriod*86400;
            stakContract.methods.createStakingPlan(planId,apy,lockPeriodForSmartContract,tokanAddress).send({ from: selectedAccount})
                .on("transactionHash", function (hash) {
                        document.getElementById("loadingdiv").classList.remove("d-none");
                        document.getElementById("loadingdiv").className = "d-block";
                })
                .then((receipt1) => { 
                    document.getElementById("loadingdiv").className = "d-none";
                    savePlans(planId,apy, tokanAddress, tokanName, lockPeriod);
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
                text: " Not Enough Matic To Sign Transaction"
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


const savePlans=async(planId,apy, tokanAddress, tokanName, lockPeriod)=>{

        const formdata = new FormData();
        formdata.append("planId", planId);
        formdata.append("apy", apy);
        formdata.append("lockingPeriod", lockPeriod);
        formdata.append("rewardToken", tokanAddress);
        formdata.append("rewardTokenName", tokanName);


        const requestOptions = {
        method: "POST",
        body: formdata,
        redirect: "follow"
        };

        fetch("../apis/addPlans.php", requestOptions)
        .then((response) => response.json())
        .then((result) => {
            if(result.status==201){
                Swal.fire({
                    title: "Plan added successFully",
                    text: `${result.message}`,
                    icon: "success"
                }).then((ok)=>{
                    window.location.href="./address.php";
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
<?php include "header.php"; ?>
<div class="content-body">
        <div class="container">
            <div class="page-title">
                <div class="row align-items-center justify-content-between">
                    <div class="col-6">
                        <div class="page-title-content">
                            <h3>User Lists</h3>
                            <p class="mb-2">Welcome Nova Realchain User Lists page</p>
                        </div>
                    </div>
                    <div class="col-auto">
                        <div class="breadcrumbs"><a href="#">Home </a><span><i
                                    class="ri-arrow-right-s-line"></i></span><a href="#">Bids</a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0 bs-0 bg-transparent">
                            <div class="bid-table">
                                <div class="table-responsive">
                                <?php
                            include "../apis/connection.php";
                            $query = "SELECT * FROM users ORDER BY id DESC"; // Replace 'your_table_name' with your actual table name
                            $result = $conn->query($query);
                            // Check if there are any rows returned
                            if (mysqli_num_rows($result) > 0) {
                                // Output table header
                                echo '<table class="table">
                                        <thead>
                                            <tr>
                                                <th>S.no.</th>
                                                <th>Name</th>
                                                <th>Address</th>
                                                <th>Joining Date</th>
                                            </tr>
                                        </thead>
                                        <tbody class="exploreItems">';
                                
                                // Loop through each row of data
                                $i=1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                    // Output table row
                                    echo '<tr>
                                            <td>' . $i. '</td>
                                            <td>' . $row['name'] . '</td>
                                            <td>' . $row['address'] . '</td>
                                            <td>' . $row['joiningTime'] . '</td>
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
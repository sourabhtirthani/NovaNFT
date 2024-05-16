<?php
session_start();
include "../apis/connection.php";
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Validate user credentials
    $sql = "SELECT * FROM admins WHERE email = '$email' AND password = '$password'";
    $result = $conn->query($sql);

    if ($result->num_rows == 1) {
        // Authentication successful
        $row = $result->fetch_assoc();
        
        // Store user data in session
        $_SESSION['email'] = $row['email'];
        // Redirect user to dashboard or any other authenticated page
        header("Location: index.php");
        exit();
    } else {
        // Authentication failed
        $error_message = "Invalid email or password.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from enftx-html.vercel.app/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2024 11:13:23 GMT -->
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
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="@@dashboard">



<div class="authincation section-padding">
    <div class="container h-100">
        <div class="row justify-content-center h-100 align-items-center">
            <div class="col-xl-5 col-md-6">
                <div class="mini-logo text-center my-2"><a href="signin.php"><img src="images/nova-real-chain.png" width="150" alt=""></a>
                    <h4 class="card-title mt-3">Sign in to Nova Realchain</h4>
                </div>
                <div class="auth-form card">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                            <div class="row">
                                <div class="col-12 mb-3"><label class="form-label">Email</label><input name="email"
                                        type="text" class="form-control" value=""></div>
                                <div class="col-12 mb-3"><label class="form-label">Password</label><input
                                        name="password" type="password" class="form-control" value=""></div>
                                <div class="col-6">
                                    <div class="form-check"><input name="acceptTerms" type="checkbox"
                                            class="form-check-input " value=""><label class="form-check-label">Remember
                                            me</label></div>
                                </div>
                                
                            </div>
                            <div class="mt-3 d-grid gap-2"><button type="submit" class="btn btn-primary mr-2">Sign
                                    In</button></div>
                        </form>
                        <?php
                            // Display error message if authentication failed
                            if (isset($error_message)) {
                                echo '<div class="alert alert-danger">' . $error_message . '</div>';
                            }
                            ?>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>














<script src="js/scripts.js"></script>


</body>


<!-- Mirrored from enftx-html.vercel.app/signin.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 02 Feb 2024 11:13:23 GMT -->
</html>
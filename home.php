<?php
    require_once "config.php";

    session_start();
    
    // if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){              
    //     header("location: login.php");
    // }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <script src="https://kit.fontawesome.com/118a820504.js" crossorigin="anonymous"></script>
    <script src="library/chart.min.js"></script>
    
</head>
<body>
    <div class="dashboard-container">
        <?php include "templates/nav-temp.php"; ?>
        <div class="dashboard-body-area">
            <div class="container">
                <div class="job-header">
                    <h2>Job Section</h2>
                    <div class="job-buttons">
                        <div class="job-post-button">
                            <button class="job-button"><a href="">Post new Job</a></button>
                        </div>
                        <div class="job-applied">
                            <button class="job-button"><a href="">My Post Job</a></button>
                        </div>
                        <div class="i-applied">
                            <button class="job-button"><a href="">Applied Job</a></button>
                        </div>
                    </div>
                </div>
                <div class="job-list">
                    <div class="job-card">
                        <h3>We are hairgin</h3>
                        <h4>Location : Sydney</h4>
                        <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Assumenda maiores explicabo consectetur dolorem officia suscipit soluta cupidit.
                        </p>
                        <h5>2024/2/6</h5>
                        <h5>Posted by: some some</h5>
                        <button class="job-apply-button">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>
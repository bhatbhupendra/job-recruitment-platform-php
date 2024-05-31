<?php
    require_once "config.php";

    session_start();
    
    if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true){              
        header("location: login.php");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <script src="https://kit.fontawesome.com/118a820504.js" crossorigin="anonymous"></script>
    <script src="library/chart.min.js"></script>
    
</head>
<body>
    <div class="dashboard-container">
        <?php include "templates/nav-temp.php"; ?>
        <div class="dashboard-body-area">
            <span>This is the dashboard section</span>
        </div>
    </div>  
</body>
</html>
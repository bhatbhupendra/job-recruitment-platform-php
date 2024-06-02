<?php
    session_start();
        



    if (isset($_GET['jobID'])) {
        include "config.php";
        $jobId = $_GET['jobID'];
        $userId = $_SESSION['id'];
        $sql = "INSERT INTO jobapplication (job_id, user_id) VALUES ('{$jobId}','{$userId}')";
        $query = mysqli_query($conn,$sql);

    }
     header("location: home.php");
?>
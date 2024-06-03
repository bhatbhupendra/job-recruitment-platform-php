<?php
    require_once "config.php";

    session_start();
   // getting job post
    include "config.php";
    $id=$_SESSION['id'];
    $sql = "SELECT * FROM `jobpost` WHERE post_by='{$id}' ";
    $post = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM jobpost j JOIN jobapplication a ON j.id = a.job_id where user_id ='{$id}'";
    $myApplied = mysqli_query($conn, $sql);

    $sql = "SELECT * FROM jobpost j JOIN jobapplication a ON j.id = a.job_id JOIN users u ON u.id=a.user_id where post_by ='{$id}'";
    $appliedToMe = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/nav.css">
    <link rel="stylesheet" href="assets/css/profile.css">
    <script src="https://kit.fontawesome.com/118a820504.js" crossorigin="anonymous"></script>
</head>
<body>
    <div class="dashboard-container">
        <?php include "templates/nav-temp.php"; ?>
        <div class="dashboard-body-area">
            <div class="container">
                <div class="profile">
                    <div class="card">
                        <img src="assets/images/profile.png" alt="John" style="width:100%">
                        <h1><?php echo $_SESSION['first_name']." ";echo $_SESSION['last_name'];?></h1>
                        <p class="title"><?php echo $_SESSION['email'];?></p>
                        <p>Role:- <?php echo $_SESSION['role'];?></p>
                        <p style="margin: 24px 0;"><button>UserID:- # <?php echo $_SESSION['id'];?></button></p>
                    </div>
                </div>
                <div class="my-job-posts">
                    <div class="header">
                        <?php if(isset($_SESSION['role']) && $_SESSION['role']=="employer"){?>
                            <h2>My Job Posts</h2>
                            <div class="job-list">
                                <?php if($post!=null){ ?>
                                    <?php foreach($post as $row){ ?>
                                        <div class="job-card">
                                            <h3><?php echo $row["title"];?></h3>
                                            <h4>Location : <?php echo $row["location"];?></h4>
                                            <p><?php echo $row["description"];?></p>
                                            <h5><?php echo $row["time"];?></h5> 
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php }?>
                        <?php if(isset($_SESSION['role']) && $_SESSION['role']=="candidate"){?>
                            <h2>Applied Jobs</h2>
                            <div class="job-list">
                                <?php if($myApplied!=null){?>
                                    <?php foreach($myApplied as $row){ ?>
                                        <div class="job-card">
                                            <h3><?php echo $row["title"];?></h3>
                                            <h4>Location : <?php echo $row["location"];?></h4>
                                            <p><?php echo $row["description"];?></p>
                                            <h5><?php echo $row["time"];?></h5> 
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php }?>

                        <?php if(isset($_SESSION['role']) && $_SESSION['role']=="employer"){?>
                            <h2>Job Request</h2>
                            <div class="job-list">
                                <?php if($post!=null){ ?>
                                    <?php foreach($appliedToMe as $row){ ?>
                                        <div class="job-card">
                                            <h3><?php echo $row["title"];?></h3>
                                            <p>Location : <?php echo $row["location"];?></p>
                                            <h4>Job post id : #<?php echo $row["job_id"];?></h4>
                                            <h4>Candidate id : #<?php echo $row["user_id"];?></h4>
                                            <h4>Candidate name : <?php echo $row["first_name"]."&nbsp;".$row["last_name"];?></h4>
                                            <h4>Candidate email : <?php echo $row["email"];?></h4>
                                            <p><?php echo $row["time"];?></p> 
                                        </div>
                                    <?php } ?>
                                <?php } ?>
                            </div>
                        <?php }?>

                    </div>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>
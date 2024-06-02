<?php
    require_once "config.php";

    session_start();
    
    // getting job post
    include "config.php";
    $sql = "SELECT * FROM `jobpost`";
    $post = mysqli_query($conn, $sql);

    function checkAlreadyApplied($jobId){
        include "config.php";
        $userId = $_SESSION['id'];
        $sql = "SELECT * FROM jobapplication WHERE job_id='{$jobId}' and user_id='{$userId}'";
        $query = mysqli_query($conn,$sql);
        if(mysqli_num_rows($query)>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }
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
                        <?php if(isset($_SESSION['role']) && $_SESSION['role']=="employer"){
                            echo '
                                <div class="job-post-button">
                                    <button class="job-button"><a href="post-job.php">Post new Job</a></button>
                                </div>
                                <div class="job-applied">
                                    <button class="job-button"><a href="profile.php">My Post Job</a></button>
                                </div>
                            ';
                        } ?>
                        
                        <?php if(isset($_SESSION['role']) && $_SESSION['role']=="candidate"){
                            echo '
                                <div class="i-applied">
                                    <button class="job-button"><a href="profile.php">Applied Job</a></button>
                                </div>
                            ';
                        } ?>
                        
                    </div>
                    <h3>Recent Posted Jobs</h3>
                </div>
                <div class="job-list">
                    <?php if($post!=null){ ?>
                        <?php foreach($post as $row){ ?>
                            <div class="job-card">
                                <h3><?php echo $row["title"];?></h3>
                                <h4>Location : <?php echo $row["location"];?></h4>
                                <p><?php echo $row["description"];?></p>
                                <h5><?php echo $row["time"];?></h5> 
                                <h5>Posted by: some some</h5>
                                <?php if(isset($_SESSION['role']) && $_SESSION['role']=="candidate"){ ?>
                                    <?php if(!checkAlreadyApplied($row["id"])){ ?>
                                        <button class="job-apply-button"><a href="apply.php?jobID=<?php echo $row["id"];?>">Apply</a></button>
                                    <?php }else{ ?>
                                            <button class="job-apply-button">Applied</button>
                                    <?php }?>
                                <?php }?>
                            </div>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>  
</body>
</html>
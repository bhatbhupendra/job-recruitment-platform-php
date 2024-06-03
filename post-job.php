<?php
    require_once "config.php";

    session_start();

    function submitPost($title,$location,$description){
        include "config.php";
        $id=$_SESSION['id'];
        $sql = "INSERT INTO jobpost (title, location ,post_by, description) VALUES ('{$title}','{$id}','{$location}', '{$description}')";
        $query = mysqli_query($conn,$sql);
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }
    }
    
    // getting job post
    include "config.php";
    if ($_SERVER['REQUEST_METHOD'] == "POST"){   
        $title = trim($_POST["title"]);  
        $location = trim($_POST["location"]);       
        $description = trim($_POST["description"]);  
        if(!empty(trim($_POST["title"])) && !empty(trim($_POST["location"])) && !empty(trim($_POST["description"]))){
            if(submitPost($title,$location,$description)){
                header("location: home.php");// sucess
            }else{    
                $_POST['error']='sorry cant post';
            }
        }                           
    }else{
        $_POST['error']='All input fields are required';
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="assets/css/post-job.css">
    <link rel="stylesheet" href="assets/css/nav.css">
    <script src="https://kit.fontawesome.com/118a820504.js" crossorigin="anonymous"></script>
    
</head>
<body>
    <div class="dashboard-container">
        <?php include "templates/nav-temp.php"; ?>
        <div class="dashboard-body-area">
            <div class="form_wrapper">
                <section class="signup_form">
                    <h2>Fill the form for new Job Post</h2>
                    <form action="<?php $_PHP_SELF ?>" method="post">
                        <div class="field title">
                            <label for="title">Job Title:-</label>
                            <input type="text" id="title" name="title" placeholder="Job Title">
                        </div>
                        <div class="field location">
                            <label for="location">Job Location:-</label>
                            <input type="text" id="location" name="location" placeholder="Location">
                        </div>
                        <div class="field description">
                            <label for="description">Description:-</label>
                            <textarea rows="10" cols="70" name="description" id="description" placeholder="Description"></textarea>
                        </div>
                        <input class="submit-btm" type="submit">
                    </form>
                    <?php 
                        if(isset($_POST["error"])){ 
                        $errorData = $_POST['error'];
                            echo "<div class='error-txt'> $errorData </div>";
                        }
                    ?>
                </section>
                </div>
        </div>
    </div>  
</body>
</html>
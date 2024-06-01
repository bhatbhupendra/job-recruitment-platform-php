<?php
    include "config.php";                                   ///embed PHP code from another file   

    function checkEmail($email){
        include "config.php";
        $sql = "SELECT email FROM users WHERE email = '{$email}'";
        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query)>0){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    function createUser($first_name,$last_name,$email,$hashed_password){
        include "config.php";
        $sql = "INSERT INTO users (first_name, last_name, email, password) VALUES ('{$first_name}','{$last_name}', '{$email}', '{$hashed_password}')";
        $query = mysqli_query($conn,$sql);
        if($query){
            return TRUE;
        }else{
            return FALSE;
        }
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST"){                      //check for the post request which occure after user submit form
        $first_name = trim($_POST["firstName"]);                    //get first name
        $last_name = trim($_POST["lastName"]);                      //get last name
        $email = trim($_POST["email"]);                             //get email
        $password = trim($_POST['password']);                       //get password
        $confirm_password = trim($_POST['confirm_password']);       //get conform password
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);//hashing the entered password 
        if(!empty(trim($_POST["email"])) && !empty(trim($_POST["password"])) && !empty(trim($_POST["confirm_password"]))){      //checking if any of the field is empty
            if(filter_var($email, FILTER_VALIDATE_EMAIL)){//varify email
                if(!checkEmail($email)){  //checks if the entered email is already exist in batabase or not
                    if($password == $confirm_password){ //validate password
                        if(createUser($first_name,$last_name,$email,$hashed_password)){////create user
                            header("location: login.php");// sucess
                        }else{    
                            $_POST['error']='Something went Wronh!! Contact Admin'; //error
                          }
                          
                        }else{
                          // $error = "Password & Conform Password does not matched";
                          $_POST['error']='Password & Conform Password does not matched';
                        }
                      }else{
                        // $error = "Email is already registred";
                        $_POST['error']='Email is already registred';
                      }
                    }else{
                      // $error = "Email is not valid";
                      $_POST['error']='Email is not valid';
                    }
                  }else{
                    // $error = "All input fields are required";
                    $_POST['error']='All input fields are required';
        }
    }
    mysqli_close($conn);   // closing mysqli connection
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>SignUp</title>
    <link rel="stylesheet" href="assets/css/register.css">
    <script src="https://kit.fontawesome.com/e5f4960269.js" crossorigin="anonymous"></script>
  </head>
  <body>
    <div class="form_wrapper">
      <section class="signup_form">
        <h2>Register Form</h2>
        <form action="<?php $_PHP_SELF ?>" method="post">
          <div class="name-details">
              <div class="field first_name">
                  <label for="firstName">First Name</label>
                  <input type="text" id="firstName" name="firstName" placeholder="First Name">
              </div>
              <div class="field last_name">
                  <label for="lastName">Last Name</label>
                  <input type="text" id="lastName" name="lastName" placeholder="Last Name">
              </div>
          </div>
          <div class="field email">
            <label for="email">Email Address</label>
            <input type="text" id="email" name="email" placeholder="Enter your email Address">
          </div>
          <div class="field password">
              <label for="password">Password</label>
              <div class="password_eye">
                <input type="password" id="password" name="password" placeholder="Enter new Password">
                <i class="fas fa-eye"></i>
              </div>
          </div> 
          <div class="field confirm_password">
            <label for="confirm_password">Conform Password</label>
            <div class="password_eye">
              <input type="password" id="confirm_password" name="confirm_password" placeholder="Conform Password">
              <i class="fas fa-eye"></i>
            </div>
          </div>
          <div class="field button_submit">
            <input type="submit" value="Register">
          </div>
        </form>
        <div class="link">Already signed up? <a href="\job-recruitment-platform-php\login.php">Login now</a></div>
        <?php 
            if(isset($_POST["error"])){ 
              $errorData = $_POST['error'];
                echo "<div class='error-txt'> $errorData </div>";
            }
        ?>
      </section>
    </div>
    <script src="assets/js/script.js"></script>
  </body>
</html>


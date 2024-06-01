<div class="nav dashboard-body-area">
            <div class="logo">
                <h3>Job Recruiment Platform</h3>
            </div>
            <div class="list">
                <ul>
                    <li><a href="home.php">Home</a></li>
                    <li><a href="profile.php">Profile</a></li>
                </ul>
            </div>
            <div class="user_detail">
                <div class="email">
                    <i class="fa-regular fa-user"></i>
                    <?php if(isset($_SESSION['email'])) echo $_SESSION['email']; ?>
                </div>
                    <?php if(isset($_SESSION['email'])) echo "<div class='logout'><a href='logout.php'>LogOut</a></div>"; ?>
                    <?php if(!isset($_SESSION['email'])) echo "<div class='logout'><a href='login.php'>LogIn</a></div>"; ?>
            </div>
</div>
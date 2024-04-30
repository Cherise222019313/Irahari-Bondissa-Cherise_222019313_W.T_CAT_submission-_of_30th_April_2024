<?php session_start(); 

?>
<html>
    <header>
        <title>Test Login</title>
        <style>
            body {
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    font-family: Arial, sans-serif;
}

header {
    text-align: center;
    margin-top: 50px;
    color: #fff;
}

.main {
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
    max-width: 400px;
    margin: 0 auto;
}

.form-group {
    margin-bottom: 20px;
}

.form-control {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

.form-actions {
    text-align: center;
}

.btn {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
}

.btn:hover {
    background-color: #0056b3;
}

.error-message {
    color: red;
    text-align: center;
    margin-top: 20px;
}

.register-link {
    text-align: center;
    margin-top: 10px;
}

.register-link a {
    color: #007bff;
    text-decoration: none;
}

.register-link a:hover {
    text-decoration: underline;
}

        </style>
    </header>
    <body style="background-image: url('myImages/hostelImage.jpg');">
	<?php 
include("connection/connection.php");

if(isset($_POST['submit'])) {
    $user = mysqli_real_escape_string($conn, $_POST['username']);
    $pass = mysqli_real_escape_string($conn, $_POST['password']);
    $md5Pass=md5($pass);
    if($user == "" ||  $pass == "") {
        echo "Either username or password field is empty.";
        echo "<br/>";
        echo "<a href='login.php'>Go back</a>";
    } else {
        $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$user' AND password='$md5Pass'")
        or die("Could not execute the select query.");
        
        $row = mysqli_fetch_assoc($result);
        if(!empty($row)) {
            $validuser = $row['full_name'];
            $_SESSION['valid'] = $validuser;
            $_SESSION['full_name'] = $row['full_name'];
            $_SESSION['role'] = $row['role'];
            $_SESSION['image'] = $row['image'];
            $_SESSION['id'] = $row['id'];
        } else {
            echo "<center>";
            echo "<h4 style='color:red;'>Invalid username or password.</h4>";
            echo "<br/>";
            echo "<a href='login.php'>Go back</a>";
            echo "</center>";
        }

        if(isset($_SESSION['valid'])) {
            header('Location: index.php');          
        }
    }
} else {
?>
    <?php
}
?>
 
  
<?php include("connection/connection.php"); ?>
    <header>
        <h1>Test Login</h1>
    </header>
    <main>
        <!-- Your login form goes here -->
        <form class="form-login" method="post" onsubmit="return validateForm()">
            <!-- Form fields -->
            <!-- Username field -->
            <div class="form-group">
                <input type="text" class="form-control" name="username" placeholder="Username" required>
            </div>
            <!-- Password field -->
            <div class="form-group">
                <input type="password" class="form-control password" name="password" placeholder="Password" required>
            </div>
            <!-- Login button -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary pull-right" name="submit">Login</button>
            </div>
        </form>
        <!-- Register link -->
        <div class="register-link">
            <a href="register.php">Register</a>
        </div>
        <!-- Error message -->
        <div class="error-message">
            <?php
            if (isset($_SESSION['errmsg'])) {
                echo $_SESSION['errmsg'];
                $_SESSION['errmsg'] = ""; // Clear error message after displaying
            }
            ?>
        </div>
    </main>
    <script>
        function validateForm() {
    var username = document.forms["form-login"]["username"].value;
    var password = document.forms["form-login"]["password"].value;
    if (username == "" || password == "") {
        alert("Username and password must be filled out");
        return false;
    }
}
validateForm();
    </script> 
</body>
</html>
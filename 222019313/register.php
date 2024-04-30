<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
<style>
    body {
    font-family: Arial, sans-serif;
}

h2 {
    text-align: center;
    color: #fff;
}

form {
    max-width: 400px;
    margin: 0 auto;
    background-color: rgba(255, 255, 255, 0.8);
    padding: 20px;
    border-radius: 10px;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="email"],
input[type="password"],
select,
input[type="file"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
}

input[type="submit"] {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 5px;
    cursor: pointer;
}

input[type="submit"]:hover {
    background-color: #0056b3;
}

</style>
</head>
<body style="background-image: url('myImages/hostelImage.jpg'); background-repeat: no-repeat;">
    <h2>Add User</h2>
    <form action="add_user.php" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
        <label for="full_name">Full Name:</label><br>
        <input type="text" id="full_name" name="full_name" required><br><br>

        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="phone">Phone:</label><br>
        <input type="text" id="phone" name="phone" required><br><br>

        <label for="gender">Gender:</label><br>
        <select id="gender" name="gender" required>
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="other">Other</option>
        </select><br><br>

        <label for="address">Address:</label><br>
        <input type="text" id="address" name="address" required><br><br>

        <label for="reg_nbr">Registration Number:</label><br>
        <input type="text" id="reg_nbr" name="reg_nbr" required><br><br>

        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password" required><br><br>

        <label for="role">Role:</label><br>
        <select id="role" name="role" required>
            <option value="admin">Admin</option>
            <option value="student">Student</option>
        </select><br><br>

        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" accept="image/*" required><br><br>

        <input type="submit" value="Submit">
    </form>
    <script>
        function validateForm() {
    var full_name = document.getElementById("full_name").value;
    var email = document.getElementById("email").value;
    var phone = document.getElementById("phone").value;
    var address = document.getElementById("address").value;
    var reg_nbr = document.getElementById("reg_nbr").value;
    var password = document.getElementById("password").value;
    var role = document.getElementById("role").value;
    var image = document.getElementById("image").value;

    if (full_name == "" || email == "" || phone == "" || address == "" || reg_nbr == "" || password == "" || role == "" || image == "") {
        alert("Please fill out all fields.");
        return false;
    }
    return true;
}
validateForm();
    </script> 
</body>
</html>

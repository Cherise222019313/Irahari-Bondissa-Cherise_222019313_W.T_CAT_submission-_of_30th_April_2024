<?php
include_once("./connection/connection.php");

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $full_name = $_POST['full_name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $address = $_POST['address'];
    $reg_nbr = $_POST['reg_nbr'];
    $password = md5($_POST['password']); // Encrypt password using md5
    $role = $_POST['role'];

    // File upload handling
    $target_dir = "myImages/"; // Specify the directory where you want to store uploaded images
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if the file is an actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if($check !== false) {
        // Allow only certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            exit();
        }
    } else {
        echo "File is not an image.";
        exit();
    }

    // Move uploaded file to specified directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["image"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
        exit();
    }

    // Prepare SQL statement to insert data into users table
    $sql = "INSERT INTO users (full_name, email, phone, gender, address, reg_nbr, password, role, image) 
            VALUES ('$full_name', '$email', '$phone', '$gender', '$address', '$reg_nbr', '$password', '$role', '$target_file')";

    if ($conn->query($sql) === TRUE) {
        // Redirect to a success page or display a success message
header("location:login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the connection
    $conn->close();
}
?>

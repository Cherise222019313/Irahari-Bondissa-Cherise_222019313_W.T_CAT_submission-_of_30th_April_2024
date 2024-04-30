<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $stud_name = $_POST["stud_name"];
    $stud_email = $_POST["stud_email"];
    $stud_phone = $_POST["stud_phone"];
    $stud_reg_nmbr = $_POST["stud_reg_nmbr"];
    $stud_gender = $_POST["stud_gender"];
    $stud_address = $_POST["stud_address"];

    // Check if ID is provided for updating
    if ($_POST['studentId'] != 'Auto') {
        $id = $_POST['studentId'];
        // Update data in the students table
        $sql = "UPDATE students SET stud_name='$stud_name', stud_email='$stud_email', stud_phone='$stud_phone', stud_reg_nmbr='$stud_reg_nmbr', stud_gender='$stud_gender', stud_address='$stud_address' WHERE id=$id";
    } else {
        $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';

        // Insert data into the students table
        $sql = "INSERT INTO students (stud_name, stud_email, stud_phone, stud_reg_nmbr, stud_gender, stud_address,image) 
                VALUES ('$stud_name', '$stud_email', '$stud_phone', '$stud_reg_nmbr', '$stud_gender', '$stud_address','$image')";
    }

    if ($conn->query($sql) === TRUE) {
      if (!empty($_FILES['image']['tmp_name'])) {
            $target_dir = "myImages/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }
        // Redirect to the students page
        if ($_POST['studentId'] != 'Auto') {
            header('location:./?page=students&message=edit');
        } else {
            header('location:./?page=students&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>

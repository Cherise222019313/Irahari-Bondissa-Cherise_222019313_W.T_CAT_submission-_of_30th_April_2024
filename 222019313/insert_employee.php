<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $emp_name = $_POST["emp_name"];
    $emp_email = $_POST["emp_email"];
    $emp_phone = $_POST["emp_phone"];
    $emp_address = $_POST["emp_address"];
    $emp_salary = $_POST["emp_salary"];
    $emp_gender = $_POST["emp_gender"];

    // Check if ID is provided for updating
    if ($_POST['employeeId'] != 'Auto') {
        $id = $_POST['employeeId'];
        // Update data in the employees table
        $sql = "UPDATE employees SET emp_name='$emp_name', emp_email='$emp_email', emp_phone='$emp_phone', emp_address='$emp_address', emp_saraly='$emp_salary', emp_gender='$emp_gender' WHERE id=$id";
    } else {
        $image = isset($_FILES['emp_image']['name']) ? $_FILES['emp_image']['name'] : '';

        // Insert data into the employees table
        $sql = "INSERT INTO employees (emp_name, emp_email, emp_phone, emp_address, emp_saraly, emp_gender, image) 
                VALUES ('$emp_name', '$emp_email', '$emp_phone', '$emp_address', '$emp_salary', '$emp_gender', '$image')";
    }

    if ($conn->query($sql) === TRUE) {
        if (!empty($_FILES['emp_image']['tmp_name'])) {
            $target_dir = "myImages/";
            $target_file = $target_dir . basename($_FILES["emp_image"]["name"]);
            move_uploaded_file($_FILES["emp_image"]["tmp_name"], $target_file);
        }
        // Redirect to the employees page
        if ($_POST['employeeId'] != 'Auto') {
            header('location:./?page=employees&message=edit');
        } else {
            header('location:./?page=employees&message=insert');
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>

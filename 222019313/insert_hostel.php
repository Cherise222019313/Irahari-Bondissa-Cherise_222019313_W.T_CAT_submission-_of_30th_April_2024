<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $host_name = $_POST["host_name"];
    $availability = $_POST["availability"];
    $host_rooms = $_POST["host_rooms"];
    $hostel_gender = $_POST["hostel_gender"];

    // Check if ID is provided for updating
    if ($_POST['hostelId']!='Auto') {
        $id = $_POST['hostelId'];
        // Update data in the cars table
        $sql = "UPDATE hostels SET host_name='$host_name', host_rooms='$host_rooms', hostel_status='$hostel_gender', available='$availability' WHERE id=$id";
    } else {
        // Retrieve image name if uploaded
       // $image = isset($_FILES['image']['name']) ? $_FILES['image']['name'] : '';

        // Insert data into the cars table
        $sql = "INSERT INTO hostels (host_name, host_rooms, hostel_status, available) 
                VALUES ('$host_name', '$host_rooms', '$hostel_gender', '$availability')";
    }

    if ($conn->query($sql) === TRUE) {
        // Move uploaded image to 'allImages' folder if exists
      /*  if (!empty($_FILES['image']['tmp_name'])) {
            $target_dir = "allImages/";
            $target_file = $target_dir . basename($_FILES["image"]["name"]);
            move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
        }*/

        // Redirect to the cars page
        if ($_POST['hostelId']!='Auto') {

        header('location:./?page=hostels&message=edit');
        }else{
            header('location:./?hostels=cars&message=insert');

        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>

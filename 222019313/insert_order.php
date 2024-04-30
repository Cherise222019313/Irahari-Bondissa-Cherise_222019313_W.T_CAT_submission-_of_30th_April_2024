<?php 
include_once("./connection/connection.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve data from the form
    $student_id = $_POST["student_id"];
    $hostel_id = $_POST["hostel_id"];
    $amount = $_POST["amount"];
     $date = $_POST["date"];
    $orderCode=rand();
    // Check if ID is provided for updating
    if ($_POST['order_id'] != 'Auto') {
        $id = $_POST['order_id'];
        // Update data in the orders table
        $sql = "UPDATE orders SET student_id='$student_id', hostel_id='$hostel_id',amount='$amount', date='$date' WHERE id=$id";
     } else {
        // Insert data into the orders table
        $sql = "INSERT INTO orders (student_id, hostel_id,amount,orderCode, date) 
                VALUES ('$student_id', '$hostel_id','$amount','$orderCode', '$date')";
        $sql2 = "INSERT INTO payments (amount, student_id,orderCode) 
                VALUES ('$amount', '$student_id','$orderCode')";

    }

    if ($conn->query($sql) === TRUE) {
        // Redirect to the orders page
        if ($_POST['order_id'] != 'Auto') {
             header('location:./?page=orders&message=edit');
            
        } else {
            if($conn->query($sql2) === TRUE){

            header('location:./?page=orders&message=insert');
            }
        }
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close the database connection
    $conn->close();
} 
?>

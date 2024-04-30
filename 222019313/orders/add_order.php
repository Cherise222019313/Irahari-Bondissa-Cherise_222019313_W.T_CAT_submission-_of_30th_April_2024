<?php 
include_once("./connection/connection.php");

$order_id = "Auto";
$student_id = "";
$hostel_id = "";
$amount = "";
$status = "";
$date = "";

if(isset($_GET['id'])) {
    $order_id = $_GET['id'];
    $sql = "SELECT * FROM orders WHERE id = $order_id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $student_id = $row['student_id'];
        $hostel_id = $row['hostel_id'];
        $amount = $row['amount'];
        $status = $row['status'];
        $date = $row['date'];
    }
}
?>
<!-- Add this CSS style block within your HTML -->
<style>
    .error-message {
        color: red;
    }
    .error-border {
        border: 1px solid red;
    }
</style>

<div class="page">
    <div class="left">
        <h1><?php echo isset($_GET['id']) ? 'Edit Order' : 'Add New Order'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Orders</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Order' : 'Add New Order'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="orderForm" action="insert_order.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="order_id">Order ID:</label>
            <input type="text" id="order_id" name="order_id" class="form-control" value="<?php echo $order_id; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="student_id">Student ID:</label>
            <input type="text" id="student_id" name="student_id" class="form-control" value="<?php echo $_SESSION['id']; ?>">
            <div id="student_id_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="hostel_id">Hostel:</label>
            <select id="hostel_id" name="hostel_id" class="form-control">
                <?php
                // Fetch hostel data from the database
                $sql = "SELECT * FROM hostels";
                $result = $conn->query($sql);

                // Check if there are any hostels
                if ($result->num_rows > 0) {
                    // Output options for each hostel
                    while($row = $result->fetch_assoc()) {
                        // Display hostel name as the option text and hostel ID as the value
                        echo "<option value='".$row['host_name']."' ";
                        // If the current hostel ID matches the selected hostel ID, mark it as selected
                        if ($row['id'] == $hostel_id) {
                            echo "selected";
                        }
                        echo ">".$row['host_name']."</option>";
                    }
                } else {
                    echo "<option value=''>No hostels found</option>";
                }
                ?>
            </select>
            <div id="hostel_id_error" class="error-message"></div>
        </div>

        <div class="form-group">
            <label for="amount">Amount:</label>
            <input type="text" id="amount" name="amount" class="form-control" value="<?php echo $amount; ?>">
            <div id="amount_error" class="error-message"></div>
        </div>
        
        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" class="form-control" value="<?php echo $date; ?>">
            <div id="date_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit">Submit</button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("orderForm").addEventListener("submit", function(event) {
        var studentId = document.getElementById("student_id");
        var hostelId = document.getElementById("hostel_id");
        var amount = document.getElementById("amount");
        var date = document.getElementById("date");
        var isValid = true;

        if (studentId.value.trim() === "") {
            document.getElementById("student_id_error").textContent = "Student ID is required";
            studentId.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("student_id_error").textContent = "";
            studentId.classList.remove("error-border");
        }

        if (hostelId.value.trim() === "") {
            document.getElementById("hostel_id_error").textContent = "Hostel ID is required";
            hostelId.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("hostel_id_error").textContent = "";
            hostelId.classList.remove("error-border");
        }

        if (amount.value.trim() !== "40000") {
            document.getElementById("amount_error").textContent = "Amount should be exactly 40000";
            amount.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("amount_error").textContent = "";
            amount.classList.remove("error-border");
        }

        if (date.value.trim() === "") {
            document.getElementById("date_error").textContent = "Date is required";
            date.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("date_error").textContent = "";
            date.classList.remove("error-border");
        }

        if (!isValid) {
            event.preventDefault();
            return false;
        }
    });
});
</script>

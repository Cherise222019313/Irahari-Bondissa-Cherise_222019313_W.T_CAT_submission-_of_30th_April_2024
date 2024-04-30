<?php 
include_once("./connection/connection.php");

$hostelId = "Auto";
$host_name = "";
$host_rooms = "";
$hostel_status = "";

if(isset($_GET['id'])) {
    $hostelId = $_GET['id'];
    $sql = "SELECT * FROM hostels WHERE id = $hostelId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $host_name = $row['host_name'];
        $host_rooms = $row['host_rooms'];
        $hostel_status = $row['hostel_status'];
    }
}
?>
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
        <h1><?php echo isset($_GET['id']) ? 'Edit Hostel' : 'Add New Hostel'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Hostel</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Hostel' : 'Add New Hostel'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="hostelForm" action="insert_hostel.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="hostelId">Hostel ID:</label>
            <input type="text" id="hostelId" name="hostelId" class="form-control" value="<?php echo $hostelId; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="host_name">Hostel Name:</label>
            <input type="text" id="host_name" name="host_name" class="form-control" value="<?php echo $host_name; ?>">
            <div id="host_name_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="availability">Availability:</label>
            <select id="availability" name="availability" class="form-control">
                <option value="available" <?php if($hostel_status == 'available') echo 'selected'; ?>>Available</option>
                <option value="not_available" <?php if($hostel_status == 'not_available') echo 'selected'; ?>>Not available</option>
            </select>
        </div>
        <div class="form-group">
            <label for="host_rooms">Hostel Rooms:</label>
            <input type="text" id="host_rooms" name="host_rooms" class="form-control" value="<?php echo $host_rooms; ?>">
            <div id="host_rooms_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="hostel_gender">Hostel Gender:</label>
            <select id="hostel_gender" name="hostel_gender" class="form-control">
                <option value="male" <?php if($hostel_status == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if($hostel_status == 'female') echo 'selected'; ?>>Female</option>
            </select>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit">Submit</button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("hostelForm").addEventListener("submit", function(event) {
        var hostelName = document.getElementById("host_name");
        var hostelRooms = document.getElementById("host_rooms");
        var isValid = true;

        if (hostelName.value.trim() === "") {
            document.getElementById("host_name_error").textContent = "Hostel Name is required";
            hostelName.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("host_name_error").textContent = "";
            hostelName.classList.remove("error-border");
        }

        if (hostelRooms.value.trim() === "") {
            document.getElementById("host_rooms_error").textContent = "Hostel Rooms is required";
            hostelRooms.classList.add("error-border");
            isValid = false;
        } else if (isNaN(hostelRooms.value.trim())) {
            document.getElementById("host_rooms_error").textContent = "Hostel Rooms must be a number";
            hostelRooms.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("host_rooms_error").textContent = "";
            hostelRooms.classList.remove("error-border");
        }

        if (!isValid) {
            event.preventDefault();
            return false;
        }
    });
});
</script>

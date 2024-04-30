<?php 
include_once("./connection/connection.php");

$studentId = "Auto";
$stud_name = "";
$stud_email = "";
$stud_phone = "";
$stud_reg_nmbr = "";
$stud_gender = "";
$stud_address = "";

if(isset($_GET['id'])) {
    $studentId = $_GET['id'];
    $sql = "SELECT * FROM students WHERE id = $studentId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stud_name = $row['stud_name'];
        $stud_email = $row['stud_email'];
        $stud_phone = $row['stud_phone'];
        $stud_reg_nmbr = $row['stud_reg_nmbr'];
        $stud_gender = $row['stud_gender'];
        $stud_address = $row['stud_address'];
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
        <h1><?php echo isset($_GET['id']) ? 'Edit Student' : 'Add New Student'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Students</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Student' : 'Add New Student'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="studentForm" action="insert_student.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="studentId">Student ID:</label>
            <input type="text" id="studentId" name="studentId" class="form-control" value="<?php echo $studentId; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="stud_name">Student Name:</label>
            <input type="text" id="stud_name" name="stud_name" class="form-control" value="<?php echo $stud_name; ?>">
            <div id="stud_name_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="stud_email">Email:</label>
            <input type="email" id="stud_email" name="stud_email" class="form-control" value="<?php echo $stud_email; ?>">
            <div id="stud_email_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="stud_phone">Phone:</label>
            <input type="text" id="stud_phone" name="stud_phone" class="form-control" value="<?php echo $stud_phone; ?>">
            <div id="stud_phone_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="stud_reg_nmbr">Registration Number:</label>
            <input type="text" id="stud_reg_nmbr" name="stud_reg_nmbr" class="form-control" value="<?php echo $stud_reg_nmbr; ?>">
            <div id="stud_reg_nmbr_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="stud_gender">Gender:</label>
            <select id="stud_gender" name="stud_gender" class="form-control">
                <option value="male" <?php if($stud_gender == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if($stud_gender == 'female') echo 'selected'; ?>>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="stud_address">Address:</label>
            <input type="text" id="stud_address" name="stud_address" class="form-control" value="<?php echo $stud_address; ?>">
            <div id="stud_address_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="stud_image">Image:</label>
            <input type="file" id="stud_image" name="stud_image" class="form-control">
            <div id="stud_image_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit">Submit</button>
            <button type="button" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("studentForm").addEventListener("submit", function(event) {
        var studName = document.getElementById("stud_name");
        var studEmail = document.getElementById("stud_email");
        var studPhone = document.getElementById("stud_phone");
        var studRegNumber = document.getElementById("stud_reg_nmbr");
        var studAddress = document.getElementById("stud_address");
        var studImage = document.getElementById("stud_image");
        var isValid = true;

        if (studName.value.trim() === "") {
            document.getElementById("stud_name_error").textContent = "Student Name is required";
            studName.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("stud_name_error").textContent = "";
            studName.classList.remove("error-border");
        }

        if (studEmail.value.trim() === "") {
            document.getElementById("stud_email_error").textContent = "Email is required";
            studEmail.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("stud_email_error").textContent = "";
            studEmail.classList.remove("error-border");
        }

        if (studPhone.value.trim() === "") {
            document.getElementById("stud_phone_error").textContent = "Phone is required";
            studPhone.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("stud_phone_error").textContent = "";
            studPhone.classList.remove("error-border");
        }

        if (studRegNumber.value.trim() === "") {
            document.getElementById("stud_reg_nmbr_error").textContent = "Registration Number is required";
            studRegNumber.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("stud_reg_nmbr_error").textContent = "";
            studRegNumber.classList.remove("error-border");
        }

        if (studAddress.value.trim() === "") {
            document.getElementById("stud_address_error").textContent = "Address is required";
            studAddress.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("stud_address_error").textContent = "";
            studAddress.classList.remove("error-border");
        }

        if (studImage.value.trim() !== "") {
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(studImage.value)) {
                document.getElementById("stud_image_error").textContent = "Only image files are allowed (JPEG, JPG, PNG, GIF)";
                isValid = false;
            } else {
                document.getElementById("stud_image_error").textContent = "";
            }
        }

        if (!isValid) {
            event.preventDefault();
            return false;
        }
    });

    document.querySelector(".btn-reset").addEventListener("click", function() {
        document.getElementById("studentForm").reset();
        var errorMessages = document.querySelectorAll(".error-message");
        var errorBorders = document.querySelectorAll(".error-border");

        errorMessages.forEach(function(message) {
            message.textContent = "";
        });

        errorBorders.forEach(function(border) {
            border.classList.remove("error-border");
        });
    });
});
</script>

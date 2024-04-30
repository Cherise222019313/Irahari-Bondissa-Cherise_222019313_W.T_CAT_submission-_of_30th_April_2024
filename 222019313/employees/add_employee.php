<?php 
include_once("./connection/connection.php");

$employeeId = "Auto";
$emp_name = "";
$emp_email = "";
$emp_phone = "";
$emp_address = "";
$emp_salary = "";
$emp_gender = "";

if(isset($_GET['id'])) {
    $employeeId = $_GET['id'];
    $sql = "SELECT * FROM employees WHERE id = $employeeId";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $emp_name = $row['emp_name'];
        $emp_email = $row['emp_email'];
        $emp_phone = $row['emp_phone'];
        $emp_address = $row['emp_address'];
        $emp_salary = $row['emp_salary'];
        $emp_gender = $row['emp_gender'];
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
        <h1><?php echo isset($_GET['id']) ? 'Edit Employee' : 'Add New Employee'; ?></h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Employees</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#"><?php echo isset($_GET['id']) ? 'Edit Employee' : 'Add New Employee'; ?></a>
            </li>
        </ul>
    </div>
</div>

<div class="container2">
    <form id="employeeForm" action="insert_employee.php" method="POST" enctype="multipart/form-data">
        <div class="form-group">
            <label for="employeeId">Employee ID:</label>
            <input type="text" id="employeeId" name="employeeId" class="form-control" value="<?php echo $employeeId; ?>" readonly>
        </div>
        <div class="form-group">
            <label for="emp_name">Employee Name:</label>
            <input type="text" id="emp_name" name="emp_name" class="form-control" value="<?php echo $emp_name; ?>">
            <div id="emp_name_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="emp_email">Email:</label>
            <input type="email" id="emp_email" name="emp_email" class="form-control" value="<?php echo $emp_email; ?>">
            <div id="emp_email_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="emp_phone">Phone:</label>
            <input type="text" id="emp_phone" name="emp_phone" class="form-control" value="<?php echo $emp_phone; ?>">
            <div id="emp_phone_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="emp_address">Address:</label>
            <input type="text" id="emp_address" name="emp_address" class="form-control" value="<?php echo $emp_address; ?>">
            <div id="emp_address_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="emp_salary">Salary:</label>
            <input type="text" id="emp_salary" name="emp_salary" class="form-control" value="<?php echo $emp_salary; ?>">
            <div id="emp_salary_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <label for="emp_gender">Gender:</label>
            <select id="emp_gender" name="emp_gender" class="form-control">
                <option value="male" <?php if($emp_gender == 'male') echo 'selected'; ?>>Male</option>
                <option value="female" <?php if($emp_gender == 'female') echo 'selected'; ?>>Female</option>
            </select>
        </div>
        <div class="form-group">
            <label for="emp_image">Image:</label>
            <input type="file" id="emp_image" name="emp_image" class="form-control">
            <div id="emp_image_error" class="error-message"></div>
        </div>
        <div class="form-group">
            <button type="submit" class="btn-submit">Submit</button>
            <button type="reset" class="btn-reset">Reset</button>
        </div>
    </form>
</div>

<script>
document.addEventListener("DOMContentLoaded", function() {
    document.getElementById("employeeForm").addEventListener("submit", function(event) {
        var empName = document.getElementById("emp_name");
        var empEmail = document.getElementById("emp_email");
        var empPhone = document.getElementById("emp_phone");
        var empAddress = document.getElementById("emp_address");
        var empSalary = document.getElementById("emp_salary");
        var empImage = document.getElementById("emp_image");
        var isValid = true;

        if (empName.value.trim() === "") {
            document.getElementById("emp_name_error").textContent = "Employee Name is required";
            empName.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("emp_name_error").textContent = "";
            empName.classList.remove("error-border");
        }

        if (empEmail.value.trim() === "") {
            document.getElementById("emp_email_error").textContent = "Email is required";
            empEmail.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("emp_email_error").textContent = "";
            empEmail.classList.remove("error-border");
        }

        if (empPhone.value.trim() === "") {
            document.getElementById("emp_phone_error").textContent = "Phone is required";
            empPhone.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("emp_phone_error").textContent = "";
            empPhone.classList.remove("error-border");
        }

        if (empAddress.value.trim() === "") {
            document.getElementById("emp_address_error").textContent = "Address is required";
            empAddress.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("emp_address_error").textContent = "";
            empAddress.classList.remove("error-border");
        }

        if (empSalary.value.trim() === "") {
            document.getElementById("emp_salary_error").textContent = "Salary is required";
            empSalary.classList.add("error-border");
            isValid = false;
        } else {
            document.getElementById("emp_salary_error").textContent = "";
            empSalary.classList.remove("error-border");
        }

        if (empImage.value.trim() !== "") {
            var allowedExtensions = /(\.jpg|\.jpeg|\.png|\.gif)$/i;
            if (!allowedExtensions.exec(empImage.value)) {
                document.getElementById("emp_image_error").textContent = "Only image files are allowed (JPEG, JPG, PNG, GIF)";
                isValid = false;
            } else {
                document.getElementById("emp_image_error").textContent = "";
            }
        }

        if (!isValid) {
            event.preventDefault();
            return false;
        }
    });
});
</script>

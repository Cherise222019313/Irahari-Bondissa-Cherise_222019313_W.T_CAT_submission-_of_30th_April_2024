<?php include_once("./connection/connection.php"); ?>

<?php 
function validate_image($file){
    $ex_file = explode("?",$file)[0];
    if(!empty($ex_file)){
        if(is_file('myImages/'.$ex_file)){
            return 'myImages/'.$file;
        } else {
            return 'myImages/noImage.png';
        }
    } else {
        return 'myImages/noImage.png';
    }
}
?>

<div class="loader-container">
    <img src="myImages/loading.gif" alt="Loading...">
</div>

<script>
    // JavaScript to hide loader after 3 seconds
    setTimeout(function() {
        var loaderContainer = document.querySelector('.loader-container');
        if (loaderContainer) {
            loaderContainer.style.display = 'none';
        }
    }, 3000);
</script>

<div class="page">
    <div class="left">
        <h1> Students</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Students</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
    <a href="./?page=add_student" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Add New Student</span>
    </a>
</div>

<?php if(isset($_GET['message']) && ($_GET['message'] == 'edit' || $_GET['message'] == 'insert')): ?>
    <div id="successMessage" class="success-message">Record <?php echo $_GET['message']; ?>ed successfully!</div>
<?php elseif(isset($_GET['message']) && $_GET['message'] == 'delete'): ?>
    <div id="successMessage" class="success-message">Record deleted successfully!</div>
<?php endif; ?>

<div class="DataTable">
    <div class="cardHeader">
        <h2>All Students</h2>
        <a href="#" class="btn">View All</a>
    </div>

    <table>
        <thead>
            <tr>
                <td>Cnt</td>
                <td>Name</td>
                <td>Email</td>
                <td>Phone</td>
                <td>Registration Number</td>
                <td>Gender</td>
                <td>Address</td>
                <td>Image</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
            <?php
            // Fetch data from the students table
            $sql = "SELECT * FROM students";
            $result = $conn->query($sql);
            $x = 0;

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $x++;
                    echo "<tr>";
                    echo "<td>".$x."</td>";
                    echo "<td>".$row["stud_name"]."</td>";
                    echo "<td>".$row["stud_email"]."</td>";
                    echo "<td>".$row["stud_phone"]."</td>";
                    echo "<td>".$row["stud_reg_nmbr"]."</td>";
                    echo "<td>".$row["stud_gender"]."</td>";
                    echo "<td>".$row["stud_address"]."</td>";
                    echo "<td><div class='image-container'><img src='".validate_image($row["image"])."' alt='Student Image'></div></td>";
                    echo "<td><a href='./?page=add_student&id=".$row["id"]."'>Update</a> | <a href='delete.php?table=students&id=".$row["id"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; // Action buttons
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<style>
    .success-message {
        opacity: 1;
        background-color: lightgreen;
        padding: 10px;
        margin-bottom: 10px;
        border-radius: 5px;
    }
    .image-container img {
        border-radius: 50%;
        width: 50px; /* Adjust size as needed */
        height: 50px; /* Adjust size as needed */
    }
    .loader-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .loader-container img {
        width: 100px; /* Adjust size as needed */
        height: 100px; /* Adjust size as needed */
    }
</style>

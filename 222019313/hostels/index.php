<?php include_once("./connection/connection.php"); ?>

<?php 
function validate_image($file){
    $ex_file = explode("?",$file)[0];
    if(!empty($ex_file)){
        if(is_file('allImages/'.$ex_file)){
            return 'allImages/'.$file;
        } else {
            return 'allImages/no-image-available.png';
        }
    } else {
        return 'allImages/no-image-available.png';
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
        <h1> Hostels</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Hostels</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
    <?php if($_SESSION['role']=='admin'){ ?>    <a href="./?page=add_hostel" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Add New Hostels</span>
    </a>
    <?php } ?>
</div>

<?php if(isset($_GET['message']) && ($_GET['message'] == 'edit' || $_GET['message'] == 'insert')): ?>
    <div id="successMessage" class="success-message">Record <?php echo $_GET['message']; ?>ed successfully!</div>
<?php elseif(isset($_GET['message']) && $_GET['message'] == 'delete'): ?>
    <div id="successMessage" class="success-message">Record deleted successfully!</div>
<?php endif; ?>

<div class="DataTable">
    <div class="cardHeader">
        <h2>All Hostels</h2>
        <a href="#" class="btn">View All</a>
    </div>

    <table>
        <thead>
            <tr>
                <td>Cnt</td>
                <td>Hostel Name</td>
                <td>Hostel rooms</td>
                <td>Hostel status</td>
                <td>Hostel availaility</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
            <?php
            // Fetch data from the employee table
            $sql = "SELECT * FROM hostels";
            $result = $conn->query($sql);
            $x = 0;

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $x++;
                    echo "<tr>";
                    echo "<td>".$x."</td>";
                    echo "<td>".$row["host_name"]."</td>";
                    echo "<td>".$row["host_rooms"]."</td>";
                    echo "<td>".$row["hostel_status"]."</td>";
                    echo "<td>".$row["available"]."</td>";
         if($_SESSION['role']=='admin'){             echo "<td><a href='./?page=add_hostel&id=".$row["id"]."'>Update</a> | <a href='delete.php?table=hostels&id=".$row["id"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; // Action buttons
            }    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No records found</td></tr>";
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
    .available {
        background-color: #28a745;
        color: #fff;
    }
    .not-available {
        background-color: #dc3545;
        color: #fff;
    }
    .loader-container {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
    }
    .loader-container img {
        width: 100px; 
        height: 100px; 
    }
</style>

<script>
    // JavaScript to hide success message after 3 seconds
    setTimeout(function() {
        var successMessage = document.getElementById('successMessage');
        if (successMessage) {
            successMessage.style.opacity = '0';
            setTimeout(function() {
                successMessage.style.display = 'none';
            }, 1000);
        }
    }, 3000);
</script>

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
<style>
    .pending {
        color: green; /* Green color for pending status */
    }
    
    .approved {
        color: blue; /* Blue color for approved status */
    }
</style>

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
        <h1> Orders</h1>
        <ul class="breadcrumb">
            <li>
                <a href="#">Manage Orders</a>
            </li>
            <li><i class='bx bx-chevron-right'></i></li>
            <li>
                <a class="active" href="#">Home</a>
            </li>
        </ul>
    </div>
    <?php if($_SESSION['role']!='admin'){ ?>     <a href="./?page=add_order" class="btn-download">
        <i class='bx bxs-cloud-download'></i>
        <span class="text">Add New Order</span>
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
        <h2>All Orders</h2>
        <a href="#" class="btn">View All</a>
    </div>

    <table>
        <thead>
            <tr>
                <td>Cnt</td>
                <td>Student ID</td>
                <td>Hostel Name</td>
                <td>Amount</td>
                <td>Status</td>
                <td>Date</td>
                <td>Action</td>
            </tr>
        </thead>

        <tbody>
            <?php
            // Fetch data from the orders table
            $sql = "SELECT * FROM orders";
            $result = $conn->query($sql);
            $x = 0;

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $x++;
                    echo "<tr>";
                    echo "<td>".$x."</td>";
                    echo "<td>".$row["student_id"]."</td>";
                    echo "<td>".$row["hostel_id"]."</td>";
                    echo "<td>".$row["amount"]."</td>";
                    echo "<td class='".($row["status"] == 0 ? 'pending' : 'approved')."'>";
                    // Output text based on status
                    echo $row["status"] == 0 ? 'Pending' : 'Approved';
                    echo "</td>";
                    echo "<td>".$row["date"]."</td>";
                    echo "<td><a href='delete.php?tables=orders&ids=".$row["id"]."'>approve</a> |<a href='./?page=add_order&id=".$row["id"]."'>Update</a> | <a href='delete.php?table=orders&id=".$row["id"]."' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>"; // Action buttons
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No records found</td></tr>";
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

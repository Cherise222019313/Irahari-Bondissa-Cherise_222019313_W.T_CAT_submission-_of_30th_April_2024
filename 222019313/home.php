<main>
            
            <div class="page-header">
                <h1>you are welcome  <?php echo $_SESSION['role']; ?> <b><?php echo $_SESSION['full_name']; ?></h1>
                <small>Home / Dashboard</small>
            </div>
            
            <div class="page-content">
            
                <div class="analytics">

                <?php 
                include_once("./connection/connection.php");
                include_once("./pageSection/card.php");

     $hostels = "SELECT COUNT(*) AS hostels FROM hostels";
    $hostels = $conn->query($hostels);
    $hostels = $hostels->fetch_assoc();
    $hostels = $hostels['hostels'];
    $students = "SELECT COUNT(*) AS students FROM students";
    $students = $conn->query($students);
    $students = $students->fetch_assoc();
    $students = $students['students'];
    $employees = "SELECT COUNT(*) AS employees FROM employees";
    $employees = $conn->query($employees);
    $employees = $employees->fetch_assoc();
    $employees = $employees['employees'];

 
    generateCard($hostels, 'All Hostels');
    generateCard($hostels, 'All students');
    generateCard($employees, 'All employees');



?>

                </div>


                <div class="records table-responsive">

                    <div class="record-header">
                        <div class="add">
                             
                            <button>All hostels</button>
                        </div>
 
                    </div>

                    <div>
                    <table>
        <thead>
            <tr>
                <td>Cnt</td>
                <td>Hostel Name</td>
                <td>Hostel rooms</td>
                <td>Hostel status</td>
                <td>Hostel availaility</td>
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
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>                    </div>

                </div>
            
            </div>
            
        </main>
        
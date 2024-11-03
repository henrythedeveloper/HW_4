<!-- /*
 * index.php: This file lists employees from the database and provides options 
 * to update or delete employee records. It also includes a link to add a new employee.
 *
 * It retrieves employee details from the 'Employee' table and job information from 
 * the 'Job' table using a SQL JOIN query. The data is displayed in an HTML table 
 * with actions for updating and deleting records, each accompanied by confirmation prompts.
 *
 * Features:
 *  - Displays a list of employees with details like Employee ID, Name, Hire Date, and Job Description.
 *  - Provides links to update or delete employee records, with a confirmation prompt for deletion.
 *  - Includes an option to add a new employee.
 *
 * Author: Henry Le
 * Version: 20241001
 */ -->



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Manager</title>
    <link rel="stylesheet" type="text/css" href="main.css">
    <script language="JavaScript" type="text/javascript">
    function checkDelete(){
        return confirm('Are you sure?');
    }
</script>
</head>
<body>
<h1>List of Employees</h1>
<?php
    // Include the database connection
    include 'db_connect.php';

    $sql = "SELECT EMP_NUM, EMP_LNAME, EMP_FNAME, EMP_INITIAL, EMP_HIREDATE, JOB_DESCRIPTION, JOB_CHARGE_HOUR 
            FROM Employee
            JOIN Job ON Employee.JOB_CODE = Job.JOB_CODE";

    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Start the table before the loop
        echo "<table>";
        echo "<tr><th>Emp ID</th><th>Last Name</th><th>First Name</th><th>Initial</th><th>Hire Date</th><th>Job Description</th><th>Charge Per Hour</th><th>Action</th></tr>";

        // Fetch and display each row
        while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['EMP_NUM'] . "</td>";
            echo "<td>" . $row['EMP_LNAME'] . "</td>";
            echo "<td>" . $row['EMP_FNAME'] . "</td>";
            echo "<td>" . $row['EMP_INITIAL'] . "</td>";
            echo "<td>" . $row['EMP_HIREDATE'] . "</td>";
            echo "<td>" . $row['JOB_DESCRIPTION'] . "</td>";
            echo "<td>" . $row['JOB_CHARGE_HOUR'] . "</td>";
            echo "<td><a href='update_employee/update_employee.php?id=" . $row['EMP_NUM'] . "'>Update</a> | <a href='delete_employee/delete_employee.php?id=" . $row['EMP_NUM'] . "' onclick='return checkDelete()'>Delete</a></td>";
            echo "</tr>";
        }
        
        // End the table after the loop
    } else {
        echo "0 results";
    }
    echo "<tr>";
    echo "<td colspan='8'><a href='add_employee/add_employee.php'>Add New Employee</a></td>";
    echo "</tr>";
    echo "</table>";

    // Close the connection
    $conn->close();
?>

</body>
</html>

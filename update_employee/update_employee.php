<!-- /*
 * update_employee.php: This file allows users to update the details of an existing employee.
 * 
 * It retrieves the employee's current data based on the employee ID passed via the URL. 
 * The data is then displayed in a form for the user to modify. Upon submission, the updated
 * information is sent to 'update_employee_process.php' for processing.
 *
 * Features:
 *  - Retrieves employee details based on the provided employee ID.
 *  - Populates a form with existing employee data to allow updates.
 *  - Includes a dropdown to select a new job code from the 'Job' table.
 *  - Submits updated data for processing.
 * 
 * Author: Henry Le
 * Version: 20241001
 */ -->


<?php
include '../db_connect.php';  // Include your database connection file

// Check if an employee ID is provided in the URL
if (isset($_GET['id'])) {
    $emp_num = $_GET['id'];

    // Fetch the current employee data based on the employee ID
    $sql = "SELECT * FROM Employee WHERE EMP_NUM = '$emp_num'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc(); // Fetch the employee data
    } else {
        echo "No employee found with this ID.";
        exit();
    }
} else {
    echo "Invalid request. No employee ID provided.";
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Employee</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body class="bodyForm">

    <div class="top">
        <nav>
            <a href="../index.php"><img class="home" src="../assets/home.svg"></a></img>
        </nav>
        <h1>Update Employee</h1>
    </div>

<form action="update_employee_process.php" method="POST">
    <input type="hidden" name="emp_num" value="<?php echo $row['EMP_NUM']; ?>">
    
    <label>Last Name:</label>
    <input type="text" name="emp_lname" value="<?php echo $row['EMP_LNAME']; ?>" required><br>

    <label>First Name:</label>
    <input type="text" name="emp_fname" value="<?php echo $row['EMP_FNAME']; ?>" required><br>

    <label>Initial:</label>
    <input type="text" name="emp_initial" value="<?php echo $row['EMP_INITIAL']; ?>" required><br>

    <label>Hire Date:</label>
    <input type="date" name="hire_date" value="<?php echo $row['EMP_HIREDATE']; ?>" required><br>

    <label>Job Code:</label>
    <select name="job_code" required>
        <?php
        // Fetch all job codes to populate the dropdown
        $sql_jobs = "SELECT JOB_CODE, JOB_DESCRIPTION FROM Job";
        $result_jobs = $conn->query($sql_jobs);

        while ($job = $result_jobs->fetch_assoc()) {
            $selected = ($job['JOB_CODE'] == $row['JOB_CODE']) ? 'selected' : '';
            echo "<option value='" . $job['JOB_CODE'] . "' $selected>" . $job['JOB_DESCRIPTION'] . "</option>";
        }
        ?>
    </select><br>
    
    <input type="submit" value="Update Employee">
</form>

</body>
</html>

<?php $conn->close(); ?>

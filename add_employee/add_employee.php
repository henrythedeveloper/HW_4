<!-- /*
 * add_employee.php: This file provides a form for adding a new employee to the database.
 * 
 * It displays an input form where users can enter details such as employee number, last name,
 * first name, initial, hire date, and job code. The available job codes are fetched from the 
 * 'Job' table to populate a dropdown. Upon submission, the form data is sent to 'insert_employee.php' 
 * for processing and insertion into the database.
 *
 * Features:
 *  - Form for adding a new employee with fields for employee number, name, hire date, and job code.
 *  - Dynamically populates the job code dropdown with data from the 'Job' table.
 *  - Submits form data to 'insert_employee.php' for processing.
 * 
 * Author: Henry Le
 * Version: 20241001
 */ -->


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" type="text/css" href="../main.css">
</head>
<body class="bodyForm">
    <div class="top">
        <nav>
            <a href="../index.php"><img class="home" src="../assets/home.svg"></a></img>
        </nav>
        <h1>Add Employee</h1>
    </div>
    <form action="insert_employee.php" method="POST">
        
        <label>Employee Number: </label>
        <input type="text" name="emp_num" required><br>
        
        <label>Last Name: </label>
        <input type="text" name="emp_lname"required><br>
        
        <label>First Name: </label>
        <input type="text" name="emp_fname"required><br>
        
        <label>Initial: </label>
        <input type="text" name="emp_initial"required><br>
        
        <label>Hire Date: </label>
        <input type="date" name="hire_date"required><br>
        
        <label>Job Code: </label>
        <select name="job_code" required>
            <?php
                // Include the database connection
                include '../db_connect.php';
                $sql = "SELECT JOB_CODE, JOB_DESCRIPTION FROM Job";
                $result = $conn->query($sql);
                while($row = $result->fetch_assoc()) {
                    echo "<option value='" . $row['JOB_CODE'] . "'>" . $row['JOB_DESCRIPTION'] . "</option>";
                }
            ?>
        </select><br>
        <input type="submit" value="Add Employee">
        <?php
            // Close the connection
            $conn->close();
        ?>
    </form>
</body>
</html>

<!-- /*
 * update_employee_process.php: This file processes the form submission to update 
 * an employee's details in the database.
 * 
 * It retrieves the data submitted from the form in 'update_employee.php' and updates 
 * the corresponding employee record in the 'Employee' table. The SQL UPDATE statement 
 * is prepared and executed using parameterized queries to prevent SQL injection.
 *
 * Features:
 *  - Handles form submission via POST to update employee details.
 *  - Uses prepared statements to prevent SQL injection.
 *  - Updates employee information like last name, first name, initial, hire date, and job code.
 *  - Redirects to the employee list page upon successful update.
 * 
 * Author: Henry Le
 * Version: 20241001
 */ -->


<?php
// Include the database connection file
include '../db_connect.php';

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the data from the POST request
    $emp_num = $_POST['emp_num'];
    $emp_lname = $_POST['emp_lname'];
    $emp_fname = $_POST['emp_fname'];
    $emp_initial = $_POST['emp_initial'];
    $hire_date = $_POST['hire_date'];
    $job_code = $_POST['job_code'];

    // Prepare the SQL statement to update the employee's data
    $sql = "UPDATE Employee 
            SET EMP_LNAME = ?, EMP_FNAME = ?, EMP_INITIAL = ?, EMP_HIREDATE = ?, JOB_CODE = ?
            WHERE EMP_NUM = ?";

    // Prepare the statement
    if ($stmt = $conn->prepare($sql)) {
        // Bind the parameters to the SQL statement (i = integer, s = string)
        $stmt->bind_param("sssssi", $emp_lname, $emp_fname, $emp_initial, $hire_date, $job_code, $emp_num);
        
        // Execute the query
        if ($stmt->execute()) {
            echo "Employee updated successfully.";
            // Redirect back to the main page or employee list page
            header("Location: ../index.php");
            exit();
        } else {
            echo "Error updating record: " . $stmt->error;
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "Error preparing statement: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

// Close the database connection
$conn->close();
?>

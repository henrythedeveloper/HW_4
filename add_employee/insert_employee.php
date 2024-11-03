<!-- /*
 * insert_employee.php: This file processes the form submission to add a new employee to the database.
 * 
 * It retrieves the form data submitted from 'add_employee.php' and inserts a new employee record into the 'Employee' table.
 * After successfully adding the employee, it redirects the user back to the main employee list page.
 *
 * Features:
 *  - Handles form submission via POST to insert a new employee into the database.
 *  - Inserts employee details such as employee number, last name, first name, initial, hire date, and job code.
 *  - Redirects to the employee list page upon successful insertion.
 *  - Displays an error message if the insertion fails.
 * 
 * Author: Henry Le
 * Version: 20241001
 */ -->


<?php
    // Include the database connection
    include '../db_connect.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $emp_num = $_POST['emp_num'];
        $emp_lname = $_POST['emp_lname'];
        $emp_fname = $_POST['emp_fname'];
        $emp_initial = $_POST['emp_initial'];
        $hire_date = $_POST['hire_date'];
        $job_code = $_POST['job_code'];

        $sql = "INSERT INTO Employee (EMP_NUM, EMP_LNAME, EMP_FNAME, EMP_INITIAL, EMP_HIREDATE, JOB_CODE) 
                VALUES ('$emp_num', '$emp_lname', '$emp_fname', '$emp_initial', '$hire_date', '$job_code')";
        if ($conn->query($sql) === TRUE) {
            echo "New employee added successfully";
            header('Location: ../index.php'); // Redirect back to index
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
}

$conn->close();
?>

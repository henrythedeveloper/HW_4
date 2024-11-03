<!-- /*
 * delete_employee.php: This file deletes an employee record from the database.
 * 
 * It retrieves the employee ID from the URL and deletes the corresponding record from the 'Employee' table.
 * After the deletion, it redirects the user back to the main employee list page.
 *
 * Features:
 *  - Retrieves the employee ID from the URL.
 *  - Executes a DELETE query to remove the employee record from the database.
 *  - Redirects to the employee list page after a successful deletion.
 *  - Displays an error message if the deletion fails.
 * 
 * Author: Henry Le
 * Version: 20241001
 */ -->


<?php
    // Include the database connection
    include '../db_connect.php';
    if (isset($_GET['id'])) {
        $emp_num = $_GET['id'];
        $sql = "DELETE FROM Employee WHERE EMP_NUM = '$emp_num'";
        if ($conn->query($sql) === TRUE) {
            header('Location: ./index.php'); // Redirect back to index
        } else {
            echo "Error deleting record: " . $conn->error;
        }
    }
    // Close the connection
    $conn->close();
?>

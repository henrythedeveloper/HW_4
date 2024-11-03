<!-- /*
 * db_connect.php: This file establishes a connection to the MySQL database 
 * for the Employee Manager system.
 *
 * It uses the MySQLi object-oriented approach to connect to the database server 
 * hosted locally, with the specified username, password, and database name. 
 * If the connection fails, it outputs an error message and terminates the script.
 *
 * Features:
 *  - Connects to the 'payroll' database using the MySQLi extension.
 *  - Checks the connection and handles connection errors.
 *
 * Author: Henry Le
 * Version: 20241001
 */ -->


<?php
    $servername = "localhost";
    $username = "employee_manager";
    $password = "";
    $dbname = "payroll";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname); 
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
?>
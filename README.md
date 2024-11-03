# Employee Manager

## Overview
The **Employee Manager** is a web-based application designed to manage employee records. It allows users to add, update, and delete employees, as well as view a list of employees from a MySQL database. The application is built using PHP for server-side logic, MySQL for the database, and HTML/CSS for the frontend design.

## Features
- **List Employees**: View a table of employees with details such as employee number, name, hire date, and job role.
- **Add Employees**: Fill out a form to add new employees to the database.
- **Update Employees**: Update existing employee information such as name, hire date, and job code.
- **Delete Employees**: Remove employees from the system with a confirmation prompt.

## Directory Structure
```bash
.
├── add_employee/
│   ├── add_employee.php          # Form to add a new employee
│   ├── insert_employee.php       # Process to insert new employee data into the database
├── update_employee/
│   ├── update_employee.php       # Form to update an existing employee's data
│   ├── update_employee_process.php # Process to update the employee's data in the database
├── delete_employee/
│   ├── delete_employee.php       # Deletes the selected employee from the database
├── assets/                       
│   ├── home.svg                  # Home icon used in the navigation
├── db_connect.php                # Database connection script
├── index.php                     # Main page that lists all employees and provides links for actions
├── main.css                      # Stylesheet for the application
└── README.md                     # Project documentation
```
## Technologies Used

- PHP: Server-side scripting
- MySQL: Database for storing employee and job data
- HTML/CSS: Frontend design and layout
- JavaScript: Used for confirmation prompts during deletions

## Notes

This project is a homework assignment created to demonstrate basic CRUD (Create, Read, Update, Delete) operations in a web application using PHP and MySQL. It includes form handling, database interactions, and dynamic content display.

## Author

Henry Le
Version: 20241001


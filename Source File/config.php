<?php
$DB_HOST = '127.0.0.1';      // use 127.0.0.1 to avoid socket issues
$DB_USER = 'final_user';     // change to your MariaDB username
$DB_PASS = 'StrongPassword123!';  // change to the password you created
$DB_NAME = 'dcbs_db';        // your database name

// create connection
$conn = new mysqli($DB_HOST, $DB_USER, $DB_PASS, $DB_NAME);

// check connection
if ($conn->connect_errno) {
    http_response_code(500);
    die("Database connection failed: " . $conn->connect_error);
}

// set charset
$conn->set_charset('utf8mb4');
?>

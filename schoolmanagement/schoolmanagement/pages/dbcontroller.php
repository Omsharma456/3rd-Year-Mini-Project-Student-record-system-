<?php
$DB_host = "localhost";
$DB_user = "root";
$DB_pass = "";
$DB_name = "schoolmanagement";
$conn = mysqli_connect("$DB_host", "$DB_user", "$DB_pass", "$DB_name");
if (!($conn)) {
    echo "Failed to connect";
}
?>
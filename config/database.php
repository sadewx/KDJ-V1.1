// config/database.php
<?php
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';
$db_name = 'kdj_website';

$conn = mysqli_connect($db_host, $db_user, $db_pass, $db_name);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
<?php
// Get the requested page from the URL
$page = isset($_GET['page']) ? $_GET['page'] : 'home';

// Allowed pages for security (Only valid pages can be accessed)
$allowed_pages = ['home', 'tools', 'education', 'forum'];

// If the requested page exists, include it. Otherwise, show 404.
if (in_array($page, $allowed_pages) && file_exists("$page.php")) {
    include "$page.php"; 
} else {
    http_response_code(404); // Set 404 status code
    include "404.php"; // Load 404 error page
}
?>

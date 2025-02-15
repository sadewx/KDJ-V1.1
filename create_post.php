<?php
// Database connection
$host = 'localhost';
$dbname = 'tech_forum';
$username = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Handle AJAX request
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $data = json_decode(file_get_contents('php://input'), true);

        $title = trim($data['title']);
        $content = trim($data['content']);
        $author = trim($data['author']);
        $category = trim($data['category']);

        if (empty($title) || empty($content) || empty($author) || empty($category)) {
            echo json_encode(['success' => false, 'message' => 'All fields are required.']);
            exit();
        }

        // Insert the new post into the database
        $stmt = $conn->prepare("INSERT INTO posts (title, content, author, category, created_at) VALUES (:title, :content, :author, :category, NOW())");
        $stmt->bindParam(':title', $title);
        $stmt->bindParam(':content', $content);
        $stmt->bindParam(':author', $author);
        $stmt->bindParam(':category', $category);

        if ($stmt->execute()) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to create the post.']);
        }
    }
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Database error: ' . $e->getMessage()]);
}
?>
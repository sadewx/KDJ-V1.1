<?php
$page_title = 'Tech Forum - Share & Learn';
$current_page = 'forum';
include 'components/header.php';

// Database connection
$host = 'localhost';
$dbname = 'tech_forum';
$username = 'root'; // Replace with your MySQL username
$password = ''; // Replace with your MySQL password

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch posts from the database
    $stmt = $conn->query("SELECT * FROM posts ORDER BY created_at DESC");
    $posts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}

// Function to generate consistent random color based on user's name
function getUserColor($name) {
    $hash = md5($name); // Generate a hash of the name
    $r = hexdec(substr($hash, 0, 2)) % 256; // Extract first two characters for red
    $g = hexdec(substr($hash, 2, 2)) % 256; // Extract next two characters for green
    $b = hexdec(substr($hash, 4, 2)) % 256; // Extract next two characters for blue
    return "rgb($r, $g, $b)";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        /* Custom CSS for enhanced styling */
        .custom-modal {
            font-family: 'Inter', sans-serif;
            border-radius: 16px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .custom-modal-title {
            color: #FF4D4D;
            font-size: 1.5rem;
            font-weight: 700;
        }
        .custom-modal-input {
            border: 2px solid #FF4D4D;
            border-radius: 12px;
            padding: 0.75rem;
            transition: border-color 0.3s ease;
        }
        .custom-modal-input:focus {
            border-color: #FF4D94;
            outline: none;
        }
        .custom-modal-button-primary {
            background: linear-gradient(90deg, #FF4D4D, #FF4D94);
            color: white;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            transition: transform 0.2s ease;
        }
        .custom-modal-button-primary:hover {
            transform: scale(1.05);
        }
        .custom-modal-button-secondary {
            background: #F3F4F6;
            color: #374151;
            font-weight: 600;
            border: none;
            border-radius: 12px;
            padding: 0.75rem 1.5rem;
            transition: transform 0.2s ease;
        }
        .custom-modal-button-secondary:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="bg-gray-50">
    <div class="container mx-auto px-4 py-8">
        <!-- Page Header -->
        <div class="flex justify-between items-center mb-12 mt-20">
            <h1 class="text-5xl font-bold text-red-600">KDJ - Forum</h1>
            <button id="createPostBtn" class="px-6 py-2 bg-gradient-to-r from-red-500 to-pink-500 text-white font-semibold rounded-lg shadow-md hover:shadow-lg">Create New Post</button>
        </div>

        <!-- Search and Filter Section -->
        <div class="flex justify-between items-center mb-8">
            <input type="text" id="searchInput" placeholder="Search posts..." class="w-1/2 px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500">
            <select id="categoryFilter" class="px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:border-red-500">
                <option value="all">All Categories</option>
                <option value="Programming">Programming</option>
                <option value="AI & ML">AI & ML</option>
                <option value="Cybersecurity">Cybersecurity</option>
                <option value="Cloud">Cloud</option>
                <option value="Hardware">Hardware</option>
            </select>
        </div>

        <!-- Grid of Cards -->
        <div id="postGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php if (!empty($posts)): ?>
                <?php foreach ($posts as $post): ?>
                    <div class="card bg-white p-6 rounded-lg shadow-md border border-gray-200" data-category="<?php echo htmlspecialchars($post['category']); ?>">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 rounded-full flex items-center justify-center text-white font-bold" style="background-color: <?php echo getUserColor($post['author']); ?>;">
                                <?php echo strtoupper(substr($post['author'], 0, 1)); ?>
                            </div>
                            <div class="ml-3">
                                <p class="text-gray-800 font-medium"><?php echo htmlspecialchars($post['author']); ?></p>
                                <p class="text-gray-500 text-sm"><?php echo date('M d, Y', strtotime($post['created_at'])); ?></p>
                            </div>
                        </div>
                        <h3 class="text-xl font-semibold text-red-600 mb-2"><?php echo htmlspecialchars($post['title']); ?></h3>
                        <p class="text-gray-600 mb-4"><?php echo substr(htmlspecialchars($post['content']), 0, 100) . '...'; ?></p>
                        <div class="flex items-center justify-start">
                            <span class="px-3 py-1 bg-red-100 text-red-600 text-sm rounded-full"><?php echo htmlspecialchars($post['category']); ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="text-gray-600">No posts found.</p>
            <?php endif; ?>
        </div>
    </div>

    
  <!-- Include Scroll to Top and Popup -->
  <?php include 'includes/scroll-to-top.php'; ?>

    <script>
        // Function to generate consistent random color based on user's name
        function getUserColor(name) {
            const hash = md5(name); // Generate a hash of the name
            const r = parseInt(hash.substr(0, 2), 16) % 256;
            const g = parseInt(hash.substr(2, 2), 16) % 256;
            const b = parseInt(hash.substr(4, 2), 16) % 256;
            return `rgb(${r}, ${g}, ${b})`;
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', function () {
            const searchTerm = this.value.toLowerCase();
            const posts = document.querySelectorAll('#postGrid .card');

            posts.forEach(post => {
                const title = post.querySelector('h3').innerText.toLowerCase();
                const content = post.querySelector('p').innerText.toLowerCase();
                if (title.includes(searchTerm) || content.includes(searchTerm)) {
                    post.style.display = 'block';
                } else {
                    post.style.display = 'none';
                }
            });
        });

        // Category filter functionality
        document.getElementById('categoryFilter').addEventListener('change', function () {
            const selectedCategory = this.value.toLowerCase();
            const posts = document.querySelectorAll('#postGrid .card');

            posts.forEach(post => {
                const postCategory = post.getAttribute('data-category').toLowerCase();
                if (selectedCategory === 'all' || postCategory === selectedCategory) {
                    post.style.display = 'block';
                } else {
                    post.style.display = 'none';
                }
            });
        });

        // Create Post Modal with Modern UI
        document.getElementById('createPostBtn').addEventListener('click', function () {
            Swal.fire({
                title: 'Create New Post',
                html:
                    '<input id="swal-title" class="custom-modal-input w-full mb-4" placeholder="Title">' +
                    '<textarea id="swal-content" class="custom-modal-input w-full mb-4" placeholder="Content" rows="4"></textarea>' +
                    '<input id="swal-author" class="custom-modal-input w-full mb-4" placeholder="Author">' +
                    '<select id="swal-category" class="custom-modal-input w-full mb-4">' +
                    '<option value="Programming">Programming</option>' +
                    '<option value="AI & ML">AI & ML</option>' +
                    '<option value="Cybersecurity">Cybersecurity</option>' +
                    '<option value="Cloud">Cloud</option>' +
                    '<option value="Hardware">Hardware</option>' +
                    '</select>',
                customClass: {
                    popup: 'custom-modal',
                    title: 'custom-modal-title',
                    confirmButton: 'custom-modal-button-primary',
                    cancelButton: 'custom-modal-button-secondary'
                },
                buttonsStyling: false,
                showCancelButton: true,
                confirmButtonText: 'Create',
                cancelButtonText: 'Cancel',
                focusConfirm: false,
                preConfirm: () => {
                    const title = document.getElementById('swal-title').value.trim();
                    const content = document.getElementById('swal-content').value.trim();
                    const author = document.getElementById('swal-author').value.trim();
                    const category = document.getElementById('swal-category').value;

                    if (!title || !content || !author) {
                        Swal.showValidationMessage('All fields are required.');
                        return false;
                    }

                    return { title, content, author, category };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    const postData = result.value;

                    // Send data to server via AJAX
                    fetch('create_post.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(postData)
                    })
                        .then(response => response.json())
                        .then(data => {
                            if (data.success) {
                                Swal.fire({
                                    icon: 'success',
                                    title: 'Success!',
                                    text: 'Your post has been created.',
                                    confirmButtonColor: '#FF4D4D',
                                    confirmButtonText: 'OK'
                                }).then(() => {
                                    location.reload(); // Reload the page to reflect the new post
                                });
                            } else {
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Error!',
                                    text: data.message,
                                    confirmButtonColor: '#FF4D4D',
                                    confirmButtonText: 'OK'
                                });
                            }
                        })
                        .catch(error => {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error!',
                                text: 'An unexpected error occurred.',
                                confirmButtonColor: '#FF4D4D',
                                confirmButtonText: 'OK'
                            });
                        });
                }
            });
        });
    </script>
</body>
</html>
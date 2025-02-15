<?php
$page_title = 'KDJ - Tech Solutions for Your Productivity';
$current_page = 'education';
include 'components/header.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

        <!-- Hero Section Text Gradient Animation -->
<style>

    body {
            font-family: 'Inter', sans-serif;
        }
        
    @keyframes gradient-animation {
      0% {
        background-position: 0% 50%;
      }
      50% {
        background-position: 100% 50%;
      }
      100% {
        background-position: 0% 50%;
      }
    }
    .gradient-text {
      background-image: linear-gradient(45deg, #ff6a00, #ee0979, #ffb400);
      background-size: 400% 400%;
      color: transparent;
      background-clip: text;
      animation: gradient-animation 4s ease infinite;
    }

        @keyframes gradient-animation {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        .gradient-text {
            background-image: linear-gradient(45deg, #ff6a00, #ee0979, #ffb400);
            background-size: 400% 400%;
            color: transparent;
            -webkit-background-clip: text;
            background-clip: text;
            animation: gradient-animation 4s ease infinite;
        }
        .card-hover {
            transition: transform 0.3s ease-in-out;
        }
        .card-hover:hover {
            transform: translateY(-10px);
        }
    </style>


</head>
<body>
<header class="pt-32 pb-16 bg-gradient-to-br from-red-50 to-white">
    <h1 class="gradient-text font-bold text-5xl font-bold mb-6 flex justify-center" id="hero-title">KDJ - EDUCATION</h1>
    </header>

    <main class="container mx-auto px-4 py-12">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- LMS Card -->
            <div class="card-hover bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="relative h-48">
                    <img src="https://files.oaiusercontent.com/file-G9r9xpLTzgCfZmd3qpEZzY?se=2025-02-15T13%3A36%3A11Z&sp=r&sv=2024-08-04&sr=b&rscc=max-age%3D604800%2C%20immutable%2C%20private&rscd=attachment%3B%20filename%3Dfcdf6bf0-0bc4-42f6-b41d-1db20c046a40.webp&sig=oVtHH%2BX5/K7dv2BBOcw/1maqIfRXKWh8Gbp5KPUJDoc%3D" alt="LMS Platform" class="w-full h-full object-cover"/>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2">LMS</h3>
                    <p class="text-gray-600 mb-4">Comprehensive learning platform for course management and student engagement.</p>
                    <a href="#" class="inline-block bg-gradient-to-r from-orange-500 to-pink-500 text-white font-semibold px-6 py-2 rounded-lg hover:opacity-90 transition-opacity">
                        Learn More
                    </a>
                </div>
            </div>

            <!-- NAS/KDJ Card -->
            <div class="card-hover bg-white rounded-xl shadow-lg overflow-hidden">
                <div class="relative h-48">
                    <img src="https://yt3.ggpht.com/2XNw0qitYV1xGzLEdXH60WO79ZM4KaQAe0G_DrS4zCbQJRPnLrnoCDNE4DZXSBOZ6wzKb6iECs3z=s640-c-fcrop64=1,000005c6fffffa39-rw-nd-v1" alt="NAS/KDJ System" class="w-full h-full object-cover"/>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2">NAS/KDJ System</h3>
                    <p class="text-gray-600 mb-4">Advanced storage and knowledge management solution for educational institutions.</p>
                    <a href="https://nas.io/kdj/" class="inline-block bg-gradient-to-r from-orange-500 to-pink-500 text-white font-semibold px-6 py-2 rounded-lg hover:opacity-90 transition-opacity cursor-pointer">
                        Explore Now
                    </a>
                </div>
            </div>

            <!-- Coming Soon Card -->
            <div class="card-hover bg-white rounded-xl shadow-lg overflow-hidden relative">
                <div class="relative h-48">
                    <img src="https://png.pngtree.com/thumb_back/fh260/background/20190221/ourmid/pngtree-coming-soon-opening-opening-of-the-mall-opening-image_21550.jpg" alt="Coming Soon" class="w-full h-full object-cover opacity-50"/>
                    <div class="absolute inset-0 flex items-center justify-center">
                        <span class="text-3xl font-bold text-gray-800">Coming Soon</span>
                    </div>
                </div>
                <div class="p-6">
                    <h3 class="text-2xl font-bold mb-2">New Option</h3>
                    <p class="text-gray-600 mb-4">Stay tuned for our exciting new educational solution.</p>
                    <button disabled class="inline-block bg-gray-400 text-white font-semibold px-6 py-2 rounded-lg cursor-not-allowed">
                        Coming Soon
                    </button>
                </div>
            </div>
        </div>
    </main>

      <!-- Include Scroll to Top and Popup -->
  <?php include 'includes/scroll-to-top.php'; ?>

    <script>
        gsap.from(".card-hover", {
            y: 0,
            opacity: 0,
            duration: 1,
            stagger: 0.2,
            scrollTrigger: {
                trigger: ".card-hover",
                start: "top bottom-=100",
                toggleActions: "play none none reverse"
            }
        });
    </script>
</body>
</html>
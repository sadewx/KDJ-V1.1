<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'KDJ - Tech Solutions'; ?></title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="/assets/css/styles.css">
    <script src="/assets/js/main.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="./icons/favicon_16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="./icons/favicon_32x32.png">
    <link rel="icon" type="image/png" sizes="128x128" href="./icons/favicon_128x128.png">
    <link rel="icon" type="image/png" sizes="192x192" href="./icons/favicon_192x192.png">
    <link rel="icon" type="image/png" sizes="512x512" href="./icons/favicon_512x512.png">
</head>
<body class="bg-gradient-to-br from-blue-50 to-white">
    <!-- Loading Screen -->
    <!-- <div class="loading-screen fixed inset-0 bg-red-600 z-50 flex items-center justify-center">
        <div class="text-white text-4xl font-bold">KDJ</div>
    </div> -->

    <!-- Navigation -->
    <nav class="fixed w-full bg-white shadow-sm z-40">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <a href="index.php" class="flex items-center space-x-2">
                    <img src="https://kdj.lk/logo/kdjcolorlogo.png" width="60" alt="">
                </a>
                
                <div class="hidden md:flex space-x-6">
                    <a href="index.php" class="<?php echo $current_page === 'home' ? 'text-red-600 font-medium' : 'text-gray-700 hover:text-red-600 transition-colors'; ?>">Home</a>
                    <a href="tools.php" class="<?php echo $current_page === 'tools' ? 'text-red-600 font-medium' : 'text-gray-700 hover:text-red-600 transition-colors'; ?>">Tools</a>
                    <a href="education.php" class="<?php echo $current_page === 'education' ? 'text-red-600 font-medium' : 'text-gray-700 hover:text-red-600 transition-colors'; ?>">Education</a>
                    <a href="forum.php" class="<?php echo $current_page === 'forum' ? 'text-red-600 font-medium' : 'text-gray-700 hover:text-red-600 transition-colors'; ?>">Forum</a>
                </div>

                <div class="flex items-center space-x-4">
                    <button class="text-gray-700 hover:text-red-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </button>
                    <button onclick="showLoginModal()" class="bg-red-600 text-white px-6 py-2 rounded-full hover:bg-red-700 transition-colors">
                        Sign In
                    </button>
                </div>
            </div>
        </div>
    </nav>

    <!-- Login Modal -->
    <div id="loginModal" class="fixed inset-0 z-50 hidden">
        <div class="modal-backdrop absolute inset-0 bg-black bg-opacity-30" onclick="hideLoginModal()"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md">
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold mb-2">Welcome Back</h2>
                    <p class="text-gray-600">Sign in to access all tools</p>
                </div>

                <form id="loginForm" class="space-y-6">
                    <div class="input-group">
                        <input type="email" id="email" placeholder=" " required>
                        <label for="email">Email</label>
                    </div>

                    <div class="input-group">
                        <input type="password" id="password" placeholder=" " required>
                        <label for="password">Password</label>
                    </div>

                    <button type="submit" class="w-full bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition-colors">
                        Sign In
                    </button>
                </form>

                <div class="relative my-6">
                    <div class="absolute inset-0 flex items-center">
                        <div class="w-full border-t border-gray-300"></div>
                    </div>
                    <div class="relative flex justify-center text-sm">
                        <span class="px-2 bg-white text-gray-500">Or continue with</span>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4 mb-6">
                    <button class="social-login-btn flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg hover:border-gray-400 transition-colors">
                        <img src="https://w7.pngwing.com/pngs/730/456/png-transparent-google-logo-computer-icons-google-logo-google-angle-logo-monochrome.png" alt="Google" class="w-5 h-5 mr-2">
                        Google
                    </button>
                    <button class="social-login-btn flex items-center justify-center px-4 py-2 border border-gray-300 rounded-lg hover:border-gray-400 transition-colors">
                        <img src="https://cdn-icons-png.flaticon.com/512/15/15476.png" alt="Apple" class="w-5 h-5 mr-2">
                        Apple
                    </button>
                </div>

                <p class="text-center text-gray-600">
                    Not registered yet? 
                    <button onclick="showRegisterModal()" class="text-red-600 font-medium hover:text-red-700">Create an account</button>
                </p>
            </div>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="fixed inset-0 z-50 hidden">
        <div class="modal-backdrop absolute inset-0 bg-black bg-opacity-30" onclick="hideRegisterModal()"></div>
        <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md">
            <div class="bg-white rounded-2xl shadow-2xl p-8">
                <div class="text-center mb-8">
                    <h2 class="text-2xl font-bold mb-2">Create Account</h2>
                    <p class="text-gray-600">Join our community today</p>
                </div>

                <form id="registerForm" class="space-y-6">
                    <div class="input-group">
                        <input type="text" id="username" placeholder=" " required>
                        <label for="username">Username with @</label>
                    </div>

                    <div class="input-group">
                        <input type="email" id="registerEmail" placeholder=" " required>
                        <label for="registerEmail">Email</label>
                    </div>

                    <div class="input-group">
                        <input type="password" id="registerPassword" placeholder=" " required>
                        <label for="registerPassword">Password</label>
                    </div>

                    <div class="input-group">
                        <input type="password" id="confirmPassword" placeholder=" " required>
                        <label for="confirmPassword">Confirm Password</label>
                    </div>

                    <button type="submit" class="w-full bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition-colors">
                        Create Account
                    </button>
                </form>

                <p class="text-center mt-6 text-gray-600">
                    Already have an account? 
                    <button onclick="showLoginModal()" class="text-red-600 font-medium hover:text-red-700">Sign in</button>
                </p>
            </div>
        </div>
    </div>

    <script>
        module.exports = {
  theme: {
    extend: {
      fontFamily: {
        rubik: ['Rubik', 'sans-serif'],
      },
    },
  },
}
    </script>
<?php
$page_title = 'KDJ - Tech Solutions for Your Productivity';
$current_page = 'tools';
include 'components/header.php';
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KDJ - Digital Tools</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        .modal-backdrop {
            backdrop-filter: blur(5px);
        }
        
        .tool-card {
            transition: transform 0.3s ease;
        }
        
        .tool-card:hover {
            transform: translateY(-5px);
        }
        
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.2);
        }

        .category-pill.active {
            background-color: rgb(239, 68, 68);
            color: white;
        }

        .social-login-btn {
            transition: transform 0.2s ease;
        }

        .social-login-btn:hover {
            transform: scale(1.02);
        }

        .tool-card[data-category] {
            display: none;
        }

        .tool-card.show {
            display: block;
        }

        @keyframes float {
            0% { transform: translateY(0px); }
            50% { transform: translateY(-10px); }
            100% { transform: translateY(0px); }
        }

        .input-group {
            position: relative;
            margin-bottom: 1.5rem;
        }

        .input-group input {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 2px solid #e5e7eb;
            border-radius: 0.5rem;
            outline: none;
            transition: all 0.3s;
        }

        .input-group input:focus {
            border-color: #ef4444;
        }

        .input-group label {
            position: absolute;
            left: 1rem;
            top: 50%;
            transform: translateY(-50%);
            background-color: white;
            padding: 0 0.25rem;
            color: #6b7280;
            transition: all 0.3s;
        }

        .input-group input:focus + label,
        .input-group input:not(:placeholder-shown) + label {
            top: 0;
            font-size: 0.875rem;
            color: #ef4444;
        }
    </style>

    <!-- Hero Section Text Gradient Animation -->
<style>
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
</style>

    
</head>
<body class="bg-gray-50">
    <!-- Loading Screen
    <div class="loading-screen fixed inset-0 bg-red-600 z-50 flex items-center justify-center">
        <div class="text-white text-4xl font-bold">KDJ</div>
    </div> -->

<!-- Navigation - New -->
    <!-- <nav class="fixed w-full bg-white shadow-sm z-40">
        <div class="container mx-auto px-4">
            <div class="flex justify-between items-center h-16">
                <a href="index.html" class="flex items-center space-x-2">
                    <span class="text-2xl font-bold">
                        <span class="text-black">K</span>
                        <span class="text-red-600">D</span>
                        <span class="text-black">J</span>
                    </span>
                </a>
                
                <div class="hidden md:flex space-x-6">
                    <a href="index.php" class="text-gray-700 hover:text-red-600 transition-colors">Home</a>
                    <a href="#" class="text-red-600 font-medium">Tools</a>
                    <a href="Education.php" class="text-gray-700 hover:text-red-600 transition-colors">Education</a>
                    <a href="forum.php" class="text-gray-700 hover:text-red-600 transition-colors">Forum</a>
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
    </nav> -->

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

    
    <!-- Tools Section (Previous content remains the same) -->
    <header class="pt-32 pb-16 bg-gradient-to-br from-red-50 to-white">
    <h1 class="gradient-text font-bold text-5xl font-bold mb-6 flex justify-center" id="hero-title">DIGITAL TOOLS</h1>
    </header>

    

    <!-- Categories -->
<div class="container mx-auto px-4 mb-12">
    <div class="flex flex-wrap justify-center gap-4">
        <!-- Button for All Tools -->
        <button id="all-tools" onclick="filterTools('all')" class="category-pill px-6 py-2 rounded-full bg-gray-100 hover:bg-red-600 hover:text-white transition-colors border-2">
            All Tools
        </button>
        
        <!-- Button for AI Tools -->
        <button id="ai-tools" onclick="filterTools('ai')" class="category-pill px-6 py-2 rounded-full bg-gray-100 hover:bg-red-600 hover:text-white transition-colors border-2">
            AI Tools
        </button>

        <!-- Button for Sinhala Tools -->
        <button id="sinhala-tools" onclick="filterTools('sinhala')" class="category-pill px-6 py-2 rounded-full bg-gray-100 hover:bg-red-600 hover:text-white transition-colors border-2">
            Sinhala Tools
        </button>

        <!-- Button for Games -->
        <button id="games-tools" onclick="filterTools('games')" class="category-pill px-6 py-2 rounded-full bg-gray-100 hover:bg-red-600 hover:text-white transition-colors border-2">
            Games
        </button>

        <!-- Button for Other Tools -->
        <button id="other-tools" onclick="filterTools('other')" class="category-pill px-6 py-2 rounded-full bg-gray-100 hover:bg-red-600 hover:text-white transition-colors border-2">
            Other Tools
        </button>
    </div>
</div>

    <!-- Tools Grid -->
    <div class="container mx-auto px-8 pb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            
            <!-- Sinhala Typing -->
            <div class="tool-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer border-2 border-transparent hover:border-purple-600 hover:scale-105 transition-transform duration-300 ease-in-out">
                <div class="p-6">
                    <div class="bg-purple-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Sinhala Typing (Voice
                    Powered)</h3>
                    <p class="text-gray-600 mb-4">Sinhala Voice Typing and Singlish to Sinhala Support</p>
                    <span class="inline-block px-3 py-1 bg-purple-100 text-purple-600 rounded-full text-sm">
                        Sinhala Tools
                    </span>
                </div>
            </div>

            <!-- KDJ Connect -->
            <div class="tool-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer border-2 border-transparent hover:border-blue-600 hover:scale-105 transition-transform duration-300 ease-in-out">
                <div class="p-6">
                    <div class="bg-blue-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">KDJ Connect</h3>
                    <p class="text-gray-600 mb-4">Quick and secure file sharing between devices</p>
                    <span class="inline-block px-3 py-1 bg-blue-100 text-blue-600 rounded-full text-sm">
                        Transfer Tools
                    </span>
                </div>
            </div>

            <!-- Minio -->
            <div class="tool-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer border-2 border-transparent hover:border-red-600 hover:scale-105 transition-transform duration-300 ease-in-out">
                <div class="p-6">
                    <div class="bg-red-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Minio</h3>
                    <p class="text-gray-600 mb-4">Mini Car with Stones</p>
                    <span class="inline-block px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">
                        Games
                    </span>
                </div>
            </div>

            <!-- Invoice Generator (Al) -->
            <div class="tool-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer border-2 border-transparent hover:border-yellow-600 hover:scale-105 transition-transform duration-300 ease-in-out">
                <div class="p-6">
                    <div class="bg-yellow-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Invoice Generator (Al)</h3>
                    <p class="text-gray-600 mb-4">Al Powered Human Level Invoice
                    Generator</p>
                    <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm">
                        AI Tools
                    </span>
                </div>
            </div>

            <!-- TV -->
            <div class="tool-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer border-2 border-transparent hover:border-red-600 hover:scale-105 transition-transform duration-300 ease-in-out">
                <div class="p-6">
                    <div class="bg-red-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">TV</h3>
                    <p class="text-gray-600 mb-4">All the TV Channels in Sri Lanka</p>
                    <span class="inline-block px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">
                        Other Tools
                    </span>
                </div>
            </div>

            <!-- PNG to JPG Converter -->
            <div class="tool-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer border-2 border-transparent hover:border-green-600 hover:scale-105 transition-transform duration-300 ease-in-out">
                <div class="p-6">
                    <div class="bg-green-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                    </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">PNG to JPG Converter</h3>
                    <p class="text-gray-600 mb-4">KDJ - New tools section</p>
                    <span class="inline-block px-3 py-1 bg-green-100 text-green-600 rounded-full text-sm">
                        Other Tools
                    </span>
                </div>
            </div>

            <!-- AI Teacher -->
            <div class="tool-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer border-2 border-transparent hover:border-yellow-600 hover:scale-105 transition-transform duration-300 ease-in-out">
                <div class="p-6">
                    <div class="bg-yellow-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">AI Teacher</h3>
                    <p class="text-gray-600 mb-4">Your Al Powered English-Speaking
                    Teacher</p>
                    <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm">
                        AI Tools
                    </span>
                </div>
            </div>

            <!-- Spy Mic -->
            <div class="tool-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer border-2 border-transparent hover:border-red-600 hover:scale-105 transition-transform duration-300 ease-in-out">
                <div class="p-6">
                    <div class="bg-red-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Spy Mic</h3>
                    <p class="text-gray-600 mb-4">Hear your earbuds live as a spy</p>
                    <span class="inline-block px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">
                        Other Tools
                    </span>
                </div>
            </div>

            <!-- CV Generator (AI) -->
            <div class="tool-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer border-2 border-transparent hover:border-yellow-600 hover:scale-105 transition-transform duration-300 ease-in-out">
                <div class="p-6">
                    <div class="bg-yellow-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                        <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">CV Generator (AI)</h3>
                    <p class="text-gray-600 mb-4">AI Powered CV Generator for Your Next Job</p>
                    <span class="inline-block px-3 py-1 bg-yellow-100 text-yellow-600 rounded-full text-sm">
                        AI Tools
                    </span>
                </div>
            </div>

            

             <!-- KDJ Vision -->
             <div class="tool-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer border-2 border-transparent hover:border-red-600 hover:scale-105 transition-transform duration-300 ease-in-out">
                <div class="p-6">
                    <div class="bg-red-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">KDJ Vision</h3>
                    <p class="text-gray-600 mb-4">Face Recognition Based Attendance
                    System</p>
                    <span class="inline-block px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">
                        Other Tools
                    </span>
                </div>
            </div>

            <!-- Mini Racer -->
            <div class="tool-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer border-2 border-transparent hover:border-red-600 hover:scale-105 transition-transform duration-300 ease-in-out">
                <div class="p-6">
                    <div class="bg-red-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 00-2 2v3a2 2 0 110 4v3a2 2 0 002 2h14a2 2 0 002-2v-3a2 2 0 110-4V7a2 2 0 00-2-2H5z" />
                    </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Mini Racer</h3>
                    <p class="text-gray-600 mb-4">Racing Car Came which has Slide
                    Right and Left to Win</p>
                    <span class="inline-block px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">
                        Games
                    </span>
                </div>
            </div>

            

            <!-- Focus Booster -->
            <div class="tool-card bg-white rounded-xl overflow-hidden shadow-lg cursor-pointer border-2 border-transparent hover:border-red-600 hover:scale-105 transition-transform duration-300 ease-in-out">
                <div class="p-6">
                    <div class="bg-red-100 w-12 h-12 rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" 
                            d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10" />
                    </svg>
                    </div>
                    <h3 class="text-xl font-semibold mb-2">Focus Booster</h3>
                    <p class="text-gray-600 mb-4">Help you to improve the focus for your
                    tasks load</p>
                    <span class="inline-block px-3 py-1 bg-red-100 text-red-600 rounded-full text-sm">
                        Other Tools
                    </span>
                </div>
            </div>

            

            <!-- More tools can be added here following the same pattern -->
        </div>
    </div>

    <!-- Tool cards with data-category attributes -->
    <div class="container mx-auto px-4 pb-20">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Tools with categories -->
            <div class="tool-card show" data-category="sinhala">
                <!-- Sinhala Typing content -->
            </div>
            <div class="tool-card show" data-category="other">
                <!-- KDJ Connect content -->
            </div>
            <div class="tool-card show" data-category="ai">
                <!-- CV Generator content -->
            </div>
            <!-- Add more tool cards with appropriate data-category attributes -->
        </div>
    </div>

      <!-- Include Scroll to Top and Popup -->
  <?php include 'includes/scroll-to-top.php'; ?>
</body>

<script>
        // Loading Animation
        window.addEventListener('load', () => {
            gsap.to('.loading-screen', {
                clipPath: 'polygon(0 0, 100% 0, 100% 0, 0 0)',
                duration: 2,
                ease: 'power4.inOut',
                onComplete: () => {
                    document.querySelector('.loading-screen').style.display = 'none';
                }
            });
        });

        // Scroll Animation for Tools
        gsap.from('.tool-card', {
            scrollTrigger: {
                trigger: '#tools',
                start: 'top center'
            },
            y: 0,
            opacity: 0,
            duration: 0.8,
            stagger: 0.2
        });

        // Modal Functions
        function showLoginModal() {
            document.getElementById('registerModal').classList.add('hidden');
            document.getElementById('loginModal').classList.remove('hidden');
            gsap.from('#loginModal .bg-white', {
                y: -50,
                opacity: 0,
                duration: 0.5
            });
        }

        function hideLoginModal() {
            document.getElementById('loginModal').classList.add('hidden');
        }

        function showRegisterModal() {
            document.getElementById('loginModal').classList.add('hidden');
            document.getElementById('registerModal').classList.remove('hidden');
            gsap.from('#registerModal .bg-white', {
                y: -50,
                opacity: 0,
                duration: 0.5
            });
        }

        function hideRegisterModal() {
            document.getElementById('registerModal').classList.add('hidden');
        }

        // Form Validation and Submission
        document.getElementById('loginForm').addEventListener('submit', function(e) {
            e.preventDefault();
            // Add your login logic here
            console.log('Login submitted');
        });

        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();
            const username = document.getElementById('username').value;
            const password = document.getElementById('registerPassword').value;
            const confirmPassword = document.getElementById('confirmPassword').value;

            if (!username.includes('@')) {
                alert('Username must include @');
                return;
            }

            if (password !== confirmPassword) {
                alert('Passwords do not match');
                return;
            }

            // Add your registration logic here
            console.log('Registration submitted');
        });

        // Tool Filtering
        function filterTools(category) {
            // Update active state of category buttons
            document.querySelectorAll('.category-pill').forEach(button => {
                button.classList.remove('active');
            });
            event.target.classList.add('active');

            // Filter tools
            const tools = document.querySelectorAll('.tool-card');
            tools.forEach(tool => {
                if (category === 'all' || tool.dataset.category === category) {
                    tool.classList.add('show');
                } else {
                    tool.classList.remove('show');
                }
            });

            // Animate filtered tools
            gsap.from('.tool-card.show', {
                y: 30,
                opacity: 0,
                duration: 0.5,
                stagger: 0.1
            });
        }

        // Initialize tools display
        filterTools('all');

        module.exports = {
  theme: {
    extend: {
      fontFamily: {
        rubik: ['Rubik', 'sans-serif'],
      },
    },
  },
}

//Active Buttons
// JavaScript function to filter tools and handle active state
function filterTools(category) {
    // Remove the 'active' class from all buttons
    const buttons = document.querySelectorAll('.category-pill');
    buttons.forEach(button => {
        button.classList.remove('bg-red-600', 'text-white', 'border-red-600');
        button.classList.add('bg-gray-100', 'text-black'); // Reset to default state
    });

    // Add 'active' class to the clicked button
    const activeButton = document.getElementById(`${category}-tools`);
    activeButton.classList.add('bg-red-600', 'text-white', 'border-red-600');
    activeButton.classList.remove('bg-gray-100', 'text-black'); // Reset other buttons to default
}

    </script>

</html>

<?php include 'components/footer.php'; ?>
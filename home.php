<?php
$page_title = 'KDJ - Tech Solutions for Your Productivity';
$current_page = 'home';
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
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

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


        /* Tools Section */
        #tools1 {
            background: #f8f9fa;
        }

        .tools-grid1 {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
            max-width: 1200px;
            width: 100%;
        }

        .tool1-card {
            background: white;
            padding: 30px;
            border-radius: 10px;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }

        .tool-card1:hover {
            transform: translateY(-5px);
        }

        .tool1-icon {
            font-size: 40px;
            color: #6366f1;
            margin-bottom: 15px;
        }

        /* About Section */
        #about1 {
            background: white;
        }

        .about-content1 {
            max-width: 800px;
            text-align: center;
        }

        .about-grid 1{
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 30px;
            margin-top: 40px;
        }

        .about-item1 {
            text-align: center;
        }

        .about-icon1 {
            font-size: 36px;
            color: #6366f1;
            margin-bottom: 15px;
        }

        /* Navigation */
        .nav-buttons {
            position: fixed;
            right: 20px;
            top: 50%;
            transform: translateY(-50%);
            z-index: 1000;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 10px;
            border-radius: 25px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }

        .nav-button {
            display: block;
            width: 40px;
            height: 40px;
            margin: 10px 0;
            border: none;
            background: transparent;
            color: #333;
            font-size: 20px;
            cursor: pointer;
            transition: all 0.3s ease;
        }

        .nav-button.active {
            color: #ef4444;
            transform: scale(1.2);
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

    <!-- Navigation Buttons -->
    <div class="nav-buttons">
        <button class="nav-button active" data-section="hero">
            <i class="fas fa-home"></i>
        </button>
        <button class="nav-button" data-section="tools">
            <i class="fas fa-tools"></i>
        </button>
        <button class="nav-button" data-section="about">
            <i class="fas fa-user"></i>
        </button>
    </div>




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

<!-- Hero Section -->
<section id="hero" class="h-screen pt-32 pb-20 flex flex-col items-center justify-center relative bg-cover bg-center" style="background-image: url('https://images.unsplash.com/photo-1619252584172-a83a949b6efd?fm=jpg&q=60&w=3000&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OHx8d2hpdGUlMjB3YWxscGFwZXJ8ZW58MHx8MHx8fDA%3D');">
    <div class="container mx-auto px-4">
        <div class="text-center max-w-3xl mx-auto">
            <!-- <h1 class="text-5xl font-bold mb-6 opacity-0" id="hero-title">
                Free and Paid Tech Solutions for Your Productivity
            </h1> -->

            <h1 class="gradient-text font-bold text-5xl font-bold mb-6 opacity-0" id="hero-title">FREE & PAID Tech Solutions for Your PRODUCTIVITY</h1>


            <p class="text-xl text-gray-600 mb-8 opacity-0" id="hero-subtitle">
                Discover our comprehensive suite of digital tools designed to enhance your workflow
            </p>
            <div class="flex justify-center space-x-4 opacity-0" id="hero-buttons">
                <a href="tools.php" class="bg-red-600 text-white px-8 py-3 rounded-full hover:bg-red-700 transition-colors">
                    Explore Tools
                </a>
                <button class="border-2 border-red-600 text-red-600 px-8 py-3 rounded-full hover:bg-red-50 transition-colors">
                    Learn More
                </button>
            </div>
        </div>
    </div>
</section>

<!-- Tools Section -->
<section class="py-20 bg-gray-50 vw-100" id="tools">
    <div class="container mx-auto px-4">
        <h2 class="text-3xl font-bold text-center mb-12">Our Tools</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Sinhala Typing Tool -->
            <div class="tool-card bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow cursor-pointer">
                <div class="tool-icon bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 transition-transform duration-300">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">Sinhala Typing</h3>
                <p class="text-gray-600">Voice-powered Sinhala typing tool with Singlish support</p>
                <a href="#" class="mt-4 text-red-600 font-medium hover:text-red-700 inline-block">Learn More →</a>
            </div>

            <!-- KDJ Connect -->
            <div class="tool-card bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow cursor-pointer">
                <div class="tool-icon bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 transition-transform duration-300">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">KDJ Connect</h3>
                <p class="text-gray-600">Seamlessly connect and share across devices</p>
                <a href="#" class="mt-4 text-red-600 font-medium hover:text-red-700 inline-block">Learn More →</a>
            </div>

            <!-- CV Generator -->
            <div class="tool-card bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow cursor-pointer">
                <div class="tool-icon bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 transition-transform duration-300">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">CV Generator</h3>
                <p class="text-gray-600">AI-powered CV Generator for your next job application</p>
                <a href="#" class="mt-4 text-red-600 font-medium hover:text-red-700 inline-block">Learn More →</a>
            </div>

            <!-- QR Code Generator -->
            <div class="tool-card bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow cursor-pointer">
                <div class="tool-icon bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 transition-transform duration-300">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">QR Code Generator</h3>
                <p class="text-gray-600">Create your high-quality & unique QR code</p>
                <a href="#" class="mt-4 text-red-600 font-medium hover:text-red-700 inline-block">Learn More →</a>
            </div>

            <!-- PDF Generator -->
            <div class="tool-card bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow cursor-pointer">
                <div class="tool-icon bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 transition-transform duration-300">
                    <svg class="w-8 h-8 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">PDF Generator</h3>
                <p class="text-gray-600">AI-powered PDF Generator for your next job application</p>
                <a href="#" class="mt-4 text-red-600 font-medium hover:text-red-700 inline-block">Learn More →</a>
            </div>

            <!-- English Typing Tool -->
            <div class="tool-card bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-shadow cursor-pointer">
                <div class="tool-icon bg-red-100 w-16 h-16 rounded-full flex items-center justify-center mb-4 transition-transform duration-300">
                <svg class="w-6 h-6 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"/>
                        </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2">English Typing</h3>
                <p class="text-gray-600">Voice-powered English typing tool</p>
                <a href="#" class="mt-4 text-red-600 font-medium hover:text-red-700 inline-block">Learn More →</a>
            </div>
        </div>
    </div>
    <a href="tools.php" class="bg-red-600 text-white mt-10 m-auto w-40 py-3 rounded-full flex items-center justify-center hover:bg-red-700 transition-colors cursor-pointer">
                    More Tools
                </a>
</section>

<section class="py-20 bg-gray-50 h-screen flex items-center justify-center m-auto" id="about">

    <img class="h-auto mx-10 max-w-lg transition-all duration-300 rounded-3xl cursor-pointer filter     grayscale hover:grayscale-0" src="./img/kd.jpeg" alt="image description"KD Jayakody" alt="">
    <div>
        <h1 class="font-bold text-5xl font-bold text-black pb-5 flex items-center   justify-center m-auto" id="hero-title">ඔව් මම</h1>
        <h1 class="gradient-text font-bold text-5xl font-bold opacity-0 flex items-center justify-center m-auto" id="hero-title">@KD JAYAKODY</h1>
    </div>
</section>


  <!-- Include Scroll to Top and Popup -->
  <?php include 'includes/scroll-to-top.php'; ?>


<!-- Custom JavaScript for this page -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Hero Section Animation
    gsap.to('#hero-title', {
        opacity: 1,
        y: 0,
        duration: 1,
        delay: 0.5
    });

    gsap.to('#hero-subtitle', {
        opacity: 1,
        y: 0,
        duration: 1,
        delay: 0.7
    });

    gsap.to('#hero-buttons', {
        opacity: 1,
        y: 0,
        duration: 1,
        delay: 0.9
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

    // Tool Card Hover Animation
    document.querySelectorAll('.tool-card').forEach(card => {
        card.addEventListener('mouseenter', () => {
            const icon = card.querySelector('.tool-icon');
            gsap.to(icon, {
                y: -5,
                duration: 0.3
            });
        });

        card.addEventListener('mouseleave', () => {
            const icon = card.querySelector('.tool-icon');
            gsap.to(icon, {
                y: 0,
                duration: 0.3
            });
        });
    });
});

module.exports = {
  theme: {
    extend: {
      fontFamily: {
        rubik: ['Rubik', 'sans-serif'],
      },
    },
  },
}

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
</script>

<script>
        document.addEventListener('DOMContentLoaded', function() {
            const sections = document.querySelectorAll('section');
            const navButtons = document.querySelectorAll('.nav-button');

            // Smooth scroll on button click
            navButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const sectionId = button.getAttribute('data-section');
                    document.getElementById(sectionId).scrollIntoView({ behavior: 'smooth' });
                });
            });

            // Update active button on scroll
            window.addEventListener('scroll', () => {
                let current = '';
                
                sections.forEach(section => {
                    const sectionTop = section.offsetTop;
                    const sectionHeight = section.clientHeight;
                    if (pageYOffset >= (sectionTop - sectionHeight / 3)) {
                        current = section.getAttribute('id');
                    }
                });

                navButtons.forEach(button => {
                    button.classList.remove('active');
                    if (button.getAttribute('data-section') === current) {
                        button.classList.add('active');
                    }
                });
            });
        });
    </script>

<?php include 'components/footer.php'; ?>
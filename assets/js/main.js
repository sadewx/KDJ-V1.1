// assets/js/main.js
// Loading Animation
window.addEventListener('load', () => {
    gsap.to('.loading-screen', {
        clipPath: 'polygon(0 0, 100% 0, 100% 0, 0 0)',
        duration: 1,
        ease: 'power4.inOut',
        onComplete: () => {
            document.querySelector('.loading-screen').style.display = 'none';
        }
    });
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

// Form handling
document.getElementById('loginForm').addEventListener('submit', async function(e) {
    e.preventDefault();
    const formData = new FormData(this);
    
    try {
        const response = await fetch('/auth/login.php', {
            method: 'POST',
            body: formData
        });
        const data = await response.json();
        
        if (data.success) {
            window.location.reload();
        } else {
            alert(data.message);
        }
    } catch (error) {
        console.error('Error:', error);
    }
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




        // JavaScript for Scroll to Top and Auto Popup
const scrollToTopBtn = document.getElementById('scrollToTop');
const scrollPopup = document.getElementById('scrollPopup');

// Show or hide the Scroll to Top button and Popup based on scroll position
window.addEventListener('scroll', () => {
  if (window.scrollY > 300) { // Show button and popup after scrolling 300px
    scrollToTopBtn.classList.add('show');
    scrollPopup.classList.add('show');
  } else {
    scrollToTopBtn.classList.remove('show');
    scrollPopup.classList.remove('show');
  }
});

// Scroll to Top functionality
scrollToTopBtn.addEventListener('click', () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
});

// Optional: Hide the popup after a few seconds
setTimeout(() => {
  scrollPopup.classList.remove('show');
}, 5000); // Hide popup after 5 seconds
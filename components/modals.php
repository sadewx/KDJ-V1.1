<!-- Login Modal -->
<div id="loginModal" class="fixed inset-0 z-50 hidden">
    <div class="modal-backdrop absolute inset-0 bg-black bg-opacity-30" onclick="hideLoginModal()"></div>
    <div class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-full max-w-md">
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <div class="text-center mb-8">
                <h2 class="text-2xl font-bold mb-2">Welcome Back</h2>
                <p class="text-gray-600">Sign in to access all tools</p>
            </div>

            <form id="loginForm" action="auth/login.php" method="POST" class="space-y-6">
                <div class="input-group">
                    <input type="email" name="email" id="email" placeholder=" " required>
                    <label for="email">Email</label>
                </div>

                <div class="input-group">
                    <input type="password" name="password" id="password" placeholder=" " required>
                    <label for="password">Password</label>
                </div>

                <button type="submit" class="w-full bg-red-600 text-white py-3 rounded-lg hover:bg-red-700 transition-colors">
                    Sign In
                </button>
            </form>

            <!-- Social login and register link -->
        </div>
    </div>
</div>
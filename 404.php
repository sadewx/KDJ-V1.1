<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>404 - Page Not Found</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">

    <div class="bg-white shadow-lg rounded-lg p-6 text-center">
        <h1 class="text-6xl font-bold text-red-500">404</h1>
        <p class="text-lg text-gray-700 mt-2">Oops! The page you're looking for doesn't exist.</p>
        
        <!-- Back Button -->
        <a href="./home" class="mt-4 inline-flex items-center bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
            🔙 Back to Home
        </a>

        <!-- Dinosaur Game -->
        <div class="mt-6">
            <canvas id="gameCanvas" width="600" height="200" class="border border-gray-300 bg-white"></canvas>
            <p class="text-sm text-gray-500 mt-2">Press SPACE to jump</p>
        </div>
    </div>

    <!-- Game Over / Win Popup -->
    <div id="gamePopup" class="fixed inset-0 bg-gray-900 bg-opacity-75 flex items-center justify-center hidden">
        <div class="bg-white p-6 rounded-lg shadow-lg text-center">
            <h2 id="gameMessage" class="text-2xl font-bold"></h2>
            <button onclick="restartGame()" class="mt-4 bg-blue-500 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 transition">
                🔄 Play Again
            </button>
        </div>
    </div>

    <script>
        const canvas = document.getElementById("gameCanvas");
        const ctx = canvas.getContext("2d");

        const dinoImg = new Image();
        dinoImg.src = "img/dino.png"; // Make sure to place this image in the same folder

        const obstacleImg = new Image();
        obstacleImg.src = "img/cactus.png"; // Place cactus image in the same folder

        let dino = { x: 50, y: 150, width: 40, height: 40, velocityY: 0, gravity: 1.5, jumpPower: -15 };
        let obstacle = { x: 600, y: 160, width: 30, height: 40, speed: 5 };
        let isJumping = false;
        let gameOver = false;

        function drawDino() {
            ctx.drawImage(dinoImg, dino.x, dino.y, dino.width, dino.height);
        }

        function drawObstacle() {
            ctx.drawImage(obstacleImg, obstacle.x, obstacle.y, obstacle.width, obstacle.height);
        }

        function update() {
            if (gameOver) return;
            
            ctx.clearRect(0, 0, canvas.width, canvas.height);
            drawDino();
            drawObstacle();

            dino.velocityY += dino.gravity;
            dino.y += dino.velocityY;

            if (dino.y > 150) {
                dino.y = 150;
                dino.velocityY = 0;
                isJumping = false;
            }

            obstacle.x -= obstacle.speed;
            if (obstacle.x < -obstacle.width) {
                obstacle.x = canvas.width;
            }

            if (
                dino.x < obstacle.x + obstacle.width &&
                dino.x + dino.width > obstacle.x &&
                dino.y < obstacle.y + obstacle.height &&
                dino.y + dino.height > obstacle.y
            ) {
                showPopup("Game Over! Try Again.");
                gameOver = true;
            }

            if (obstacle.x === 50) {
                showPopup("🎉 You Win! Great Jump!");
                gameOver = true;
            }

            requestAnimationFrame(update);
        }

        function jump() {
            if (!isJumping) {
                dino.velocityY = dino.jumpPower;
                isJumping = true;
            }
        }

        function showPopup(message) {
            document.getElementById("gameMessage").innerText = message;
            document.getElementById("gamePopup").classList.remove("hidden");
        }

        function restartGame() {
            gameOver = false;
            dino.y = 150;
            obstacle.x = 600;
            document.getElementById("gamePopup").classList.add("hidden");
            update();
        }

        document.addEventListener("keydown", function(event) {
            if (event.code === "Space") {
                jump();
            }
        });

        update();
    </script>
</body>
</html>

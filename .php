<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Milkdairy - Home</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body { background-color: #f8f9fa; }
        .navbar { background-color: #007bff; }
        .navbar-brand, .nav-link { color: white !important; }
        .hero { padding: 50px; text-align: center; background-color: white; border-radius: 10px; }
        .review-card { background-color: white; padding: 20px; border-radius: 10px; margin-top: 20px; }
        .login-form { max-width: 400px; margin: auto; padding: 20px; background: white; border-radius: 10px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); }
        .map-container { width: 100%; height: 300px; border-radius: 10px; overflow: hidden; }
    </style>
    <script>
        let isLoggedIn = false;
        
        function showSuccessMessage() {
            alert("Order successfully placed! 😊🥛");
            setTimeout(() => {
                document.getElementById("ratingModalTrigger").click();
            }, 1000);
        }
        
        function checkLogin(event) {
            if (!isLoggedIn) {
                event.preventDefault();
                alert("Please log in first to place an order.");
            }
        }
        
        function loginUser() {
            isLoggedIn = true;
            alert("Login successful!");
            document.getElementById("inboxButton").innerText = "Inbox (User)";
        }
        
        function showDairyInfo() {
            document.getElementById("dairyInfo").style.display = "block";
        }
    </script>
</head>
<body>
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <a class="navbar-brand" href="#">Milkdaily</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="#" onclick="showDairyInfo()">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#orderModal" data-bs-toggle="modal" onclick="checkLogin(event)">Orders</a></li>
                    <li class="nav-item"><a class="nav-link" href="#loginModal" data-bs-toggle="modal" onclick="loginUser()">Login</a></li>
                    <li class="nav-item"><a id="inboxButton" class="nav-link" href="#">Inbox</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container mt-5">
        <div class="hero">
            <h1>Welcome to Milkdaily</h1>
            <p>Fresh milk delivered to your doorstep every day.</p>
            <a href="#" class="btn btn-primary">Subscribe Now</a>
        </div>
        <div id="dairyInfo" class="mt-4" style="display: none;">
            <h2>About Our Dairy</h2>
            <p>We provide the highest quality milk, sourced from organic farms. Our services include doorstep delivery, fresh dairy products, and a commitment to health and hygiene.</p>
            <ul>
                <li>🥛 100% Pure and Fresh Milk</li>
                <li>📦 Daily Delivery Service</li>
                <li>🧼 Hygienic and Quality Assurance</li>
                <li>🌱 Sourced from Healthy Cows</li>
            </ul>
        </div>
    </div>

    <!-- Order Modal -->
    <div class="modal fade" id="orderModal" tabindex="-1" aria-labelledby="orderModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="orderModalLabel">Place an Order</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="order.php" method="POST" onsubmit="showSuccessMessage()">
                        <div class="mb-3">
                            <label class="form-label">Customer Name:</label>
                            <input type="text" name="customer_name" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Milk Type:</label>
                            <select name="milk_type" class="form-control">
                                <option value="Full Cream Milk">🥛 Full Cream Milk</option>
                                <option value="Toned Milk">🥛 Toned Milk</option>
                                <option value="Skimmed Milk">🥛 Skimmed Milk</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Quantity (Liters):</label>
                            <input type="number" name="quantity" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Delivery Location:</label>
                            <input type="text" name="location" class="form-control" placeholder="Enter your location" required>
                        </div>
                        <div class="map-container">
                            <iframe src="https://www.openstreetmap.org/export/embed.html?bbox=-0.09,51.505,-0.08,51.515&layer=mapnik" width="100%" height="100%" style="border:0;"></iframe>
                        </div>
                        <button type="submit" class="btn btn-success w-100 mt-3">Place Order</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

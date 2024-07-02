<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Barbershop Queue</title>
</head>

<body>
    <div class="container">
        <header class="banner">
            <nav class="navbar">
                <div class="logo">
                    <h1>Barbershop</h1>
                </div>
                <div class="login-btn">
                    <a href="login.php" class="btn">Login</a>
                </div>
            </nav>
            <div class="banner-content">
                <h1>Welcome to Our Barbershop</h1>
                <p>Experience the best haircut with us</p>
            </div>
        </header>
        <main>
            <section id="catalog">
                <h2>Haircut Models</h2>
                <div class="catalog-container">
                    <div class="card">
                        <img src="images/model1.jpg" alt="Model 1">
                        <div class="card-content">
                            <h3>Model 1</h3>
                            <p>Price: $50</p>
                        </div>
                        <button onclick="selectModel('Model 1', 50)">Select</button>
                    </div>
                    <div class="card">
                        <img src="images/model2.jpg" alt="Model 2">
                        <div class="card-content">
                            <h3>Model 2</h3>
                            <p>Price: $60</p>
                        </div>
                        <button onclick="selectModel('Model 2', 60)">Select</button>
                    </div>
                    <!-- Tambahkan lebih banyak model sesuai kebutuhan -->
                </div>
            </section>
        </main>
        <footer>
            <p>&copy; 2024 Barbershop Queue. All rights reserved.</p>
        </footer>
    </div>
    <script src="js/scripts.js"></script>
</body>

</html>

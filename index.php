<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbershop Queue</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <div class="container">
        <header class="banner">
            <nav class="navbar">
                <div class="logo">
                    <h1>Barbershop</h1>
                </div>
                <div class="menu">
                    <a href="login.php" class="btn login-btn">Login</a>
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
                        <img src="images/curtain.jpg" alt="Model 1">
                        <div class="card-content">
                            <h3>Curtain Haircut</h3>
                            <p>Price: Rp. 50.000</p>
                        </div>
                        <a href="pemesanan.php?model=curtain" class="select">Select</a>
                    </div>
                    <div class="card">
                        <img src="images/fringe.jpg" alt="Model 2">
                        <div class="card-content">
                            <h3>Fringe Haircut</h3>
                            <p>Price: Rp. 50.000</p>
                        </div>
                        <a href="pemesanan.php?model=fringe" class="select">Select</a>
                    </div>
                    <div class="card">
                        <img src="images/comma.jpg" alt="Model 2">
                        <div class="card-content">
                            <h3>Comma Hair</h3>
                            <p>Price: Rp. 70.000</p>
                        </div>
                        <a href="pemesanan.php?model=comma" class="select">Select</a>
                    </div>
                    <div class="card">
                        <img src="images/undercut.jpg" alt="Model 2">
                        <div class="card-content">
                            <h3>Undercut</h3>
                            <p>Price: Rp. 70.000</p>
                        </div>
                        <a href="pemesanan.php?model=undercut" class="select">Select</a>
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
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Game Shop</title>
    <link rel="icon" type="image/png" href="./assets/logo.png">
</head>

<body>
    <?php include "includes/header.php"; ?>

    <!-- Main page content -->
    <main>
        <h1>Game Shop</h1>
        <p>Welcome to Game Shop!</p>
        
        <!-- Store introduction -->
        <section id="home">
            <h2>About Game Shop</h2>
            <p>Game Shop is a video game store where you can discover and buy your next favorite games.</p>
        </section>

        <!-- Available games -->
        <section id="products">
            <h2>Our Games</h2>
            <div id="product-list">
                <div class="product">
                    <h3>Sekiro</h3>
                    <img src="./assets/sekiro/Sekiro.webp" alt="Sekiro"><br>
                    <a href="detail.php#sekiro" class="button">View</a>
                </div>
            </div>
        </section>

        <!-- Ordering instructions -->
        <h3>How to Order</h3>
        <ol>
            <li>Choose a game</li>
            <li>Fill out the order form</li>
            <li>A game code will be sent to your email address within 24 hours.</li>
        </ol>
    </main>

    <?php include "includes/footer.php"; ?>

    <a href="#home" class="button">&larr; Back to top</a>
</body>

</html>
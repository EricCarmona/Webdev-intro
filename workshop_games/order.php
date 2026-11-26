<?php
require_once "data.php";
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id < 1) {
    http_response_code(400);
    exit("ID de producto no válido.");
}

$statement = $pdo->prepare("SELECT id, name, price, img FROM producten WHERE id = ?");
$statement->execute([$id]);
$product = $statement->fetch();

if (!$product) {
    http_response_code(404);
    exit("Producto no encontrado.");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order: <?= htmlspecialchars($product["name"], ENT_QUOTES, "UTF-8") ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="detail-page">
    <?php include "includes/header.php"; ?>

    <a href="index.php#products" class="button">&larr; Back to all games</a>

    <div id="product-info">
        <div class="info">
            <div class="game-image">
                <img src="<?= htmlspecialchars($product["img"], ENT_QUOTES, "UTF-8") ?>"
                    alt="<?= htmlspecialchars($product["name"], ENT_QUOTES, "UTF-8") ?>">
            </div>
            <div class="game-content">
                <form class="formulier" method="post">
                    <h2>Bestellen: <?= htmlspecialchars($product["name"], ENT_QUOTES, "UTF-8") ?></h2>
                    <?php if ($product["price"] !== null): ?>
                        <p class="price">&euro; <?= number_format((float) $product["price"], 2) ?></p>
                    <?php endif; ?>
                    <input type="hidden" name="product_id" value="<?= (int) $product["id"] ?>">
                    <div class="veld">
                        <label for="voornaam">Voornaam</label>
                        <input type="text" id="voornaam" name="voornaam" required>
                    </div>
                    <div class="veld">
                        <label for="achternaam">Achternaam</label>
                        <input type="text" id="achternaam" name="achternaam" required>
                    </div>
                    <div class="veld">
                        <label for="email">E-mailadres</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                    <div class="veld">
                        <label for="aantal">Aantal</label>
                        <input type="number" id="aantal" name="aantal" min="1" max="10" value="1" required>
                    </div>
                    <div class="veld">
                        <label for="editie">Editie</label>
                        <select id="editie" name="editie">
                            <option value="standard">Standard</option>
                            <option value="support">Support</option>
                            <option value="collector">Collector</option>
                        </select>
                    </div>
                    <div class="veld checkbox-veld">
                        <input type="checkbox" id="voorwaarden" name="voorwaarden" required>
                        <label for="voorwaarden">Ik ga akkoord met de voorwaarden</label>
                    </div>
                    <button type="submit" class="button">Bestelling plaatsen</button>
                </form>
            </div>
        </div>
    </div>
    <?php include "includes/footer.php"; ?>
</body>

</html>
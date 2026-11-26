<?php
require_once "data.php";
$id = filter_input(INPUT_GET, "id", FILTER_VALIDATE_INT);

if ($id === false || $id === null || $id < 1) {
    http_response_code(400);
    exit("ID de producto no válido.");
}

$statement = $pdo->prepare("SELECT id, name, price, description, img FROM producten WHERE id = ?");
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
    <title><?= htmlspecialchars($product["name"], ENT_QUOTES, "UTF-8") ?></title>
    <link rel="stylesheet" href="style.css">
</head>

<body class="detail-page">
    <?php include "includes/header.php"; ?>

    <!-- Return to the game catalog -->
    <a href="index.php#products" class="button">&larr; Back to all games</a>

    <div id="product-info">
        <div class="info">
            <div class="game-image">
                <img src="<?= htmlspecialchars($product["img"], ENT_QUOTES, "UTF-8") ?>"
                    alt="<?= htmlspecialchars($product["name"], ENT_QUOTES, "UTF-8") ?>">
            </div>
            <div class="game-content">
                <h2><?= htmlspecialchars($product["name"], ENT_QUOTES, "UTF-8") ?></h2>
                <?php if ($product["price"] !== null): ?>
                    <p class="price">&euro; <?= number_format((float) $product["price"], 2) ?></p>
                <?php endif; ?>
                <?php if (!empty($product["description"])): ?>
                    <p><?= nl2br(htmlspecialchars($product["description"], ENT_QUOTES, "UTF-8")) ?></p>
                <?php endif; ?>
                <a href="order.php?id=<?= (int) $product["id"] ?>" class="button">Order</a>
            </div>
        </div>
    </div>

    <?php include "includes/footer.php"; ?>
</body>

</html>
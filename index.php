<?php
include 'db.php';
include 'component.php';

$artworks = $conn->query("SELECT id, title, artist_name, price, availability, image_url, description FROM artworks")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Art Marketplace</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
</head>
<body>
    
<div class="container">
<div class="text-center my-4">
        <h1 class="display-4">
        <i class="bi bi-palette"></i> <span class="bold-text">Art Marketplace</span> <i class="bi bi-brush"></i>
</h1>
        </div>
        <div class="form-box">
            <form action="operation.php" method="POST">
                <div class="form-row">
                    <input type="text" name="artist" placeholder="Artist Name" required>
                    <input type="text" name="title" placeholder="Artwork Title" required>
                    <input type="number" name="price" placeholder="Price" step="0.01" required>
                </div>
                <div class="form-row">
                    <textarea name="description" placeholder="Description" required></textarea>
                    <input type="text" name="image_url" placeholder="Image URL" required>
                </div>
                <button type="submit" name="create">Add Artwork</button>
            </form>
        </div>

        <div class="artwork-list">
            <?php foreach ($artworks as $artwork) {
                artworkCard($artwork['id'], $artwork['title'], $artwork['artist_name'], $artwork['price'], $artwork['availability'], $artwork['image_url'], $artwork['description']);
            } ?>
        </div>
    </div>
    <script src="main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
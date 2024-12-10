<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM artworks WHERE id=?");
    $stmt->execute([$id]);
    $artwork = $stmt->fetch(PDO::FETCH_ASSOC);
}

if (!$artwork) {
    die('Artwork not found.');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Artwork</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
<body>
    <div class="container">
        <div class="text-center my-4">
            <h1 class="display-4">
            <i class="bi bi-pencil-square"></i> Edit Artwork
            </h1>
        </div>
        <div class="form-box">
            <form action="operation.php" method="POST">
                <div class="form-row">
                    <input type="hidden" name="id" value="<?php echo $artwork['id']; ?>">
                    <input type="text" name="artist" value="<?php echo $artwork['artist_name']; ?>" placeholder="Artist Name" required>
                    <input type="text" name="title" value="<?php echo $artwork['title']; ?>" placeholder="Artwork Title" required>
                    <input type="number" name="price" value="<?php echo $artwork['price']; ?>" placeholder="Price" step="0.01" required>
                </div>
                <div class="form-row">
                    <textarea name="description" placeholder="Description" required><?php echo $artwork['description']; ?></textarea>
                    <input type="text" name="image_url" value="<?php echo $artwork['image_url']; ?>" placeholder="Image URL" required>
                </div>
                <div class="form-row">
                    <select name="availability" required>
                        <option value="Available" <?php echo $artwork['availability'] == 'Available' ? 'selected' : ''; ?>>Available</option>
                        <option value="Sold" <?php echo $artwork['availability'] == 'Sold' ? 'selected' : ''; ?>>Sold</option>
                    </select>
                </div>
                <button type="submit" name="update">Update Artwork</button>
            </form>
        </div>
    </div>
</body>
</html>

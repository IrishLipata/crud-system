<?php
include 'db.php';

// Handle Artwork Creation (Add new artwork)
if (isset($_POST['create'])) {
    $artist = $_POST['artist'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $image_url = $_POST['image_url'];

    $stmt = $conn->prepare("INSERT INTO artworks (artist_name, title, description, price, image_url) VALUES (?, ?, ?, ?, ?)");
    $stmt->execute([$artist, $title, $description, $price, $image_url]);

    header('Location: index.php');
    exit();
}

// Handle Artwork Update (Edit artwork)
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $artist = $_POST['artist'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $availability = $_POST['availability'];
    $image_url = $_POST['image_url'];

    $stmt = $conn->prepare("UPDATE artworks SET artist_name=?, title=?, description=?, price=?, availability=?, image_url=? WHERE id=?");
    $stmt->execute([$artist, $title, $description, $price, $availability, $image_url, $id]);

    header('Location: index.php');
    exit();
}

// Handle Artwork Deletion
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];  // Retrieve the ID from the 'delete' parameter in the URL

    // Prepare and execute the DELETE statement
    $stmt = $conn->prepare("DELETE FROM artworks WHERE id = ?");
    $stmt->execute([$id]);

    // Redirect to the main marketplace page after deletion
    header('Location: index.php');
    exit();  // Don't forget to exit after the redirect to avoid further code execution
}
?>

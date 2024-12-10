<?php
include 'db.php'; // Siguraduhing ang db.php ay naglalaman ng tamang database connection

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // I-prepare ang SQL statement upang i-delete ang artwork
    $stmt = $conn->prepare("DELETE FROM artworks WHERE id = ?");
    $stmt->execute([$id]);

    // Pagkatapos mag-delete, i-redirect pabalik sa index.php
    header('Location: index.php');
    exit;
} else {
    echo 'No artwork ID provided.';
}
?>

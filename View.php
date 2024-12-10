<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $conn->prepare("SELECT * FROM artworks WHERE id = ?");
    $stmt->execute([$id]);
    $artwork = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$artwork) {
        echo '<div class="alert alert-danger">Artwork not found.</div>';
        exit;
    }
} else {
    echo '<div class="alert alert-danger">No artwork ID provided.</div>';
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Artwork</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f9f9f9;
            font-family: Arial, sans-serif;
        }

        .container {
            margin-top: 50px;
            padding: 20px;
            width: 850px;
            border: 3px solid #fd0883;
            border-radius: 40px;
            background-color: rgba(255, 228, 225, 0.9); /* Semi-transparent white background */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        .text-center h1 {
            font-weight: bold;
            color: #fd0883;
        }

        .artwork-detail {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .artwork-image img {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            border: 3px solid #fd0883;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        }

        .artwork-info {
            text-align: center;
            padding: 20px;
            background-color: #fff0f3;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 500px;
        }

        .artwork-info h2 {
            font-size: 2rem;
            color: #333;
        }

        .artwork-info p {
            font-size: 1.2rem;
            margin: 5px 0;
        }

        .back-button {
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #fd0883;
            color: #fff;
            text-decoration: none;
            border-radius: 50px;
            transition: background-color 0.3s ease;
            font-weight: bold;
        }

        .back-button:hover {
            background-color: #fb6f92;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="text-center my-4">
            <h1 class="display-4">
            <i class="bi bi-card-image"></i> View Artwork
            </h1>
        </div>
        <div class="artwork-detail">
            <div class="artwork-image">
                <img src="<?php echo $artwork['image_url']; ?>" alt="<?php echo $artwork['title']; ?>">
            </div>
            <div class="artwork-info">
                <h2><?php echo $artwork['title']; ?></h2>
                <p><strong>Artist:</strong> <?php echo $artwork['artist_name']; ?></p>
                <p><strong>Price:</strong> $<?php echo $artwork['price']; ?></p>
                <p><strong>Availability:</strong> <?php echo $artwork['availability']; ?></p>
                <p><strong>Description:</strong> <?php echo $artwork['description']; ?></p>
            </div>
            
            <a href="index.php" class="back-button">Back to Marketplace</a>
        </div>
    </div>
</body>
</html>

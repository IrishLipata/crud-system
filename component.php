<?php
function artworkCard($id, $title, $artist, $price, $availability, $image_url, $description) {
    echo "
    <div class='artwork-card'>
        <img src='$image_url' alt='$title'> 
        <h3>$title</h3>
        <p>by $artist</p>
        <p>\$$price</p>
        <p>Status: $availability</p>
        <p>Description: $description</p> 
        <a href='view.php?id=$id'>View</a> |
        <a href='edit.php?id=$id'>Edit</a> | 
        <a href='operation.php?delete=$id' onclick='return confirm(\"Are you sure you want to delete this item?\")'>Delete</a>
    </div>
    ";
}
?>
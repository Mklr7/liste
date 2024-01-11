<?php
// functions.php

function getProducts($db) {
    $sql = "SELECT id, nom, description, image, prix FROM article";
    $result = $db->query($sql);

    $products = [];

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $products[] = $row;
        }
    }

    return $products;
}
?>
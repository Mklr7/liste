<?php
// ajouter_au_panier.php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['id'];
    $product_name = $_POST['name'];
    $product_price = $_POST['prix'];

    // Ajouter le produit au panier
    $cart_item = [
        'id' => $product_id,
        'nom' => $product_name,
        'prix' => $product_price,
        'quantite' => 1
    ];

    // Si le panier existe, mettez à jour ou ajoutez le produit
    if (isset($_SESSION['cart']) && is_array($_SESSION['cart'])) {
        $product_exists = false;

        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] === $product_id) {
                $item['quantite']++;
                $product_exists = true;
                break;
            }
        }

        if (!$product_exists) {
            $_SESSION['cart'][] = $cart_item;
        }
    } else {
        // Si le panier n'existe pas, créez-le
        $_SESSION['cart'] = [$cart_item];
    }

    // Redirection vers la page d'origine ou une page de panier
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit();
}
?>
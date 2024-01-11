<?php
require 'asset/header.php';

// index.php
require_once 'mysql/connect.php';
require_once 'function.php';

$products = getProducts($db);
?>




<div class="bg-white">
  <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
    <h2 class="sr-only">Products</h2>

    <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
      <?php foreach ($products as $product) : ?>
        <form method="post" action="ajouter_panier.php">
          <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
          <input type="hidden" name="name" value="<?php echo $product['nom']; ?>">
          <input type="hidden" name="prix" value="<?php echo $product['prix']; ?>">

          <a href="#" class="group" onclick="this.closest('form').submit(); return false;">
            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
              <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['nom']; ?>" class="h-full w-full object-cover object-center group-hover:opacity-75">
            </div>
            <h3 class="mt-4 text-sm text-gray-700"><?php echo $product['nom']; ?></h3>
            <p class="mt-1 text-lg font-medium text-gray-900">$<?php echo $product['prix']; ?></p>
          </a>
        </form>
      <?php endforeach; ?>
    </div>
  </div>
</div>
      

<?php
require 'asset/footer.php';
?>
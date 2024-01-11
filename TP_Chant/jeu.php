<?php
// Checkbox
$parfums = [
    'Fraise' => 4,
    'Chocolat' => 5,
    'Vanille' => 3
];
// radio
$cornets = [
    'Pot' => 2,
    'Cornet' => 3
];
// Checkbox
$supplements = [
    'Pépite de chocolat' => 1,
    'Chantilly' => 0,5
];
$title = "Composer votre glace";
require 'header.php';
?>

<h1>Composer votre glace <h1>

<section class="py-5 text-center container">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto">
     <form action="jeu.php" method="GET">
        <?php foreach($parfums as $parfum => $prix): ?> 
            <div class="checkbox">
                <label>
            <input type="checkbox" name="parfum[]" value="<?= $parfum  ?>">
            <?= $parfum ?> - <?= $prix ?> €
            <label>
            </div>
        <?php endforeach; ?>
        <button type="submit">Composer ma glace</button>
     </form>


<h2>$_POST</h2>
<pre>
    <?php var_dump($_GET)?>
</pre>
<h2>$_POST</h2>
<pre>
    <?php var_dump($_POST)?>
</pre>
      </div>
    </div>
  </section>
<br>


<?php require 'footer.php'?>
<?php
  $curpage =  basename($_SERVER['PHP_SELF']);
?>

<link rel="stylesheet" href="css/navigation.css">

<div class="sidebar card" style="display:none" id="mySidebar">
  <button id="closeSidebar" class="bar-item blue hover-green large">Close &times;</button>
  <a href="index.php" class="<?php if ($curpage == "index.php") { echo 'active'; } ?> >bar-item blue hover-green">Home</a>
  <a href="entertainment.php" class="<?php if ($curpage == "entertainment.php") { echo 'active'; } ?> bar-item blue hover-green">Archive of Entertainment</a>
  <a href="gallery.php" class="<?php if ($curpage == "gallery.php") { echo 'active'; } ?> bar-item blue hover-green">Galleries</a>
  <a href="trivia.php" class="<?php if ($curpage == "trivia.php") { echo 'active'; } ?> bar-item blue hover-green">Hall of Trivia</a>
  <a href="quotes.php" class="<?php if ($curpage == "quotes.php") { echo 'active'; } ?> bar-item blue hover-green">Heroic Quotes</a>
  <a href="placeholder.php" style='display: none;' class="<?php if ($curpage == "index.php") { echo 'active'; } ?> bar-item blue hover-green">Registration</a>
</div>

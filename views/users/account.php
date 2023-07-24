<?php

require "middlewares/is-authenticated.php";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  require "code.php";
}

$site_lang = "bg";
$page_title = "Моят профил";
$page_desc = null;

$email = isset($_POST["email"]) ? $_POST["email"] : null;
?>
<?php require "inc/header.php" ?>
<?php require "inc/navbar.php" ?>

<div class="container mx-auto pt-4">
  <?php require "messages/success.php" ?>
  <?php require "messages/error.php" ?>
  <h1><?= $page_title ?></h1>
</div>

<?php require "inc/footer.php" ?>
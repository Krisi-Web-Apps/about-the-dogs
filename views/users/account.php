<?php

require "middlewares/is-authenticated.php";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  require "code.php";
}

global $db;
$user = $db->select("SELECT * FROM `users` WHERE id = :id;", array(":id" => $_SESSION["user_id"]))[0];

$site_lang = "bg";
$page_title = "Моят профил";
$page_desc = null;
?>
<?php require "inc/header.php" ?>
<?php require "inc/navbar.php" ?>

<div class="auth-container mx-auto pt-4">
  <div class="mx-4 bg-light p-4 p-sm-5 border shadow rounded">
    <?php require "messages/success.php" ?>
    <?php require "messages/error.php" ?>
    <h1 class="text-center"><?= $page_title ?></h1>
  
    <form method="post">
      <div class="mb-3">
        <label for="email" class="form-label">E-mail address</label>
        <input type="email" class="form-control" name="email" id="email" value="<?= $user["email"] ?>" disabled>
      </div>
      <div class="mb-3">
        <label for="fullname" class="form-label">Име</label>
        <input type="text" class="form-control" name="fullname" id="fullname" value="<?= $user["fullname"] ?>">
      </div>
      <div class="text-center">
        <button name="type-form" value="save" type="submit" class="btn btn-primary">Запазване</button>
      </div>
    </form>
  </div>
</div>

<?php require "inc/footer.php" ?>

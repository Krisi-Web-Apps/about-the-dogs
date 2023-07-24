<?php

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  require "code.php";
}

$site_lang = "bg";
$page_title = "Влизане в системата";
$page_desc = "Влезане в системата за потребителски достъп.";

$email = isset($_POST["email"]) ? $_POST["email"] : null;
?>
<?php require "inc/header.php" ?>
<?php require "inc/navbar.php" ?>

<div class="auth-container mx-auto my-4">
  <?php require "messages/success.php" ?>
  <?php require "messages/error.php" ?>
  <div class="mx-4 bg-light p-4 p-sm-5 border shadow rounded">
    <div class="text-center display-4 pb-2 pb-sm-4">
      <i class="fa-solid fa-right-to-bracket"></i>
    </div>
    <h1 class="text-center">
      <?= $page_title ?>
    </h1>
    <form method="post">
      <div class="mb-3">
        <label for="email" class="form-label">E-mail address</label>
        <input type="email" class="form-control" name="email" id="email" value="<?= $email ?>" aria-describedby="email-help" required>
        <div id="email-help" class="form-text">Въведете валиден e-mail адрес.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Парола</label>
        <input type="password" class="form-control" name="password" id="password" required>
      </div>
      <div class="text-center">
        <button name="type-form" value="login" type="submit" class="btn btn-primary"><?= $page_title ?></button>
      </div>
      <div class="mt-3 text-center">
        <a href="/auth/register">Отидете към регистрация</a>
      </div>
    </form>
  </div>
</div>

<?php require "inc/footer.php" ?>
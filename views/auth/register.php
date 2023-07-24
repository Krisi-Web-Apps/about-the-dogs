<?php

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  require "code.php";
}

$site_lang = "bg";
$page_title = "Нов потребител";
$page_desc = "Тук можете да се регистрирате в системата.";
?>
<?php require "inc/header.php" ?>
<?php require "inc/navbar.php" ?>
<?php require "messages/success.php" ?>
<?php require "messages/error.php" ?>

<div class="bg-light auth-container mx-auto mt-4 shadow rounded">
  <div class="p-5 border">
    <h1 class="text-center"><?= $page_title ?></h1>
    <form method="post">
      <div class="mb-3">
        <label for="email" class="form-label">E-mail address</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="email-help">
        <div id="email-help" class="form-text">Въведете валиден e-mail адрес.</div>
      </div>
      <div class="mb-3">
        <label for="password" class="form-label">Парола</label>
        <input type="password" class="form-control" name="password" id="password">
      </div>
      <div class="mb-3">
        <label for="cpassword" class="form-label">Повторете паролата</label>
        <input type="password" class="form-control" name="cpassword" id="cpassword">
      </div>
      <div class="mb-3">
        <label for="fullname" class="form-label">Име</label>
        <input type="text" class="form-control" name="fullname" id="fullname">
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="remember" id="remember">
        <label class="form-check-label" for="remember">Запомни ме</label>
      </div>
      <div class="text-center">
        <button name="type-form" value="register" type="submit" class="btn btn-primary">Регистрация</button>
      </div>
    </form>
  </div>
</div>

<?php require "inc/footer.php" ?>
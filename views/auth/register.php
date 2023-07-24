<?php

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  require "code.php";
}

$site_lang = "bg";
$page_title = "Нов потребител";
$page_desc = "Тук можете да се регистрирате в системата.";

$email = isset($_POST["email"]) ? $_POST["email"] : null;
$fullname = isset($_POST["fullname"]) ? $_POST["fullname"] : null;
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
      <div class="mb-3">
        <label for="cpassword" class="form-label">Повторете паролата</label>
        <input type="password" class="form-control" name="cpassword" id="cpassword" required>
      </div>
      <div class="mb-3">
        <label for="fullname" class="form-label">Име</label>
        <input type="text" class="form-control" name="fullname" value="<?= $fullname ?>" id="fullname" required>
      </div>
      <div class="mb-3 form-check">
        <input type="checkbox" class="form-check-input" name="accept" id="accept">
        <label class="form-check-label" for="accept">
          Съгласен/а съм
          <span>Съгласен/а съм</span>
          <a href="/terms-of-use">Общите условия</a>
          <span> и </span>
          <a href="/privacy-policy">Политиката на поверителност</a>.
        </label>
      </div>
      <div class="text-center">
        <button name="type-form" value="register" type="submit" class="btn btn-primary">Регистрация</button>
      </div>
      <div class="mt-3 text-center">
        <a href="/auth/login">Влизане в системата</a>
      </div>
    </form>
  </div>
</div>

<?php require "inc/footer.php" ?>

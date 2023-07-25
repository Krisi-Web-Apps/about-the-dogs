<?php

require "../middlewares/is-admin.php";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  require "code.php";
}

$site_lang = "bg";
$page_title = "Създаване на страница";
?>
<?php require "inc/header.php" ?>
<?php require "inc/offcanvas.php" ?>

<div class="container mx-auto">
  <h1 class="text-center my-4"><?= $page_title ?></h1>

  <div class="bg-white mx-4 mb-4 p-4 p-sm-5 border shadow rounded">
    <?php require "../messages/success.php" ?>
    <?php require "../messages/error.php" ?>
    
    <form method="post">
      <div class="mb-3">
        <label for="title" class="form-label">Заглавие</label>
        <input type="text" class="form-control" name="title" id="title" value="<?= isset($title) ? $title : null ?>" autofocus required>
      </div>
      <div class="mb-3">
        <label for="meta_title" class="form-label">Мета заглавие</label>
        <input type="text" class="form-control" name="meta_title" id="meta_title">
      </div>
      <div class="mb-3">
        <label for="meta_description" class="form-label">Мета описание</label>
        <textarea class="form-control" name="meta_description" id="meta_description" rows="4"></textarea>
      </div>
      <div class="mb-3">
        <label for="meta_keywords" class="form-label">Мета ключови думи</label>
        <textarea class="form-control" placeholder="Пример: програмиране, компютърни науки, компютъри..." name="meta_keywords" id="meta_keywords" rows="2"></textarea>
        <div class="text-secondary">Въведете ключови думи разделени със запетая и празно пространство.</div>
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Език</label>
        <select name="lang" class="form-control" id="lang">
          <option value="bg">Български език</option>
        </select>
      </div>
      <div class="mb-3">
        <label for="slug" class="form-label">Слъг</label>
        <input type="text" class="form-control" name="slug" id="slug">
      </div>
      <div class="d-flex align-items-center gap-4 mt-4">
        <div class="text-center">
          <button name="type-form" value="create" type="submit" class="btn btn-primary"><?= $page_title ?></button>
        </div>
      </div>
    </form>
  </div>

</div>

<?php require "inc/footer.php" ?>
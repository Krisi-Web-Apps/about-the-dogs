<?php

require "../middlewares/is-admin.php";

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  require "code.php";
}

$id = $_SESSION["params"]["id"];
global $db;
$params = array(":id" => $id);
$page = $db->select("SELECT * FROM `pages` WHERE id = :id", $params)[0];

$site_lang = $page["lang"];
$page_title = "Редактиране на страница";
?>
<?php require "inc/header.php" ?>
<?php require "inc/offcanvas.php" ?>

<div class="container mx-auto">
  <h1 class="text-center my-4">
    <span>Редактиране на страница - </span>
    <span>
      <?= $page["title"] ?>
    </span>
  </h1>

  <div class="bg-white mx-4 mb-4 p-4 p-sm-5 border shadow rounded">
    <?php require "../messages/success.php" ?>
    <?php require "../messages/error.php" ?>

    <form method="post">
      <div class="mb-3">
        <label for="title" class="form-label">Заглавие</label>
        <input type="text" class="form-control" name="title" id="title"
          value="<?= $page["title"] ? $page["title"] : null ?>" autofocus required>
      </div>
      <div class="mb-3">
        <label for="meta_title" class="form-label">Мета заглавие</label>
        <input type="text" class="form-control" name="meta_title"
          value="<?= $page["meta_title"] ? $page["meta_title"] : null ?>" id="meta_title">
      </div>
      <div class="mb-3">
        <label for="meta_description" class="form-label">Мета описание</label>
        <textarea class="form-control" name="meta_description" id="meta_description"
          rows="4"><?= $page["meta_description"] ? $page["meta_description"] : null ?></textarea>
      </div>
      <div class="mb-3">
        <label for="meta_keywords" class="form-label">Мета ключови думи</label>
        <textarea class="form-control" placeholder="Пример: програмиране, компютърни науки, компютъри..."
          name="meta_keywords" id="meta_keywords"
          rows="6"><?= $page["meta_keywords"] ? $page["meta_keywords"] : null ?></textarea>
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
        <input type="text" class="form-control" name="slug" value="<?= $page["slug"] ?>" id="slug">
      </div>
      <input type="hidden" name="id" value="<?= $page["id"] ?>">
      <div class="d-flex align-items-center gap-4 mt-4">
          <button name="type-form" value="edit" type="submit" class="btn btn-primary">
            <?= $page_title ?>
          </button>
          <a href="/admin/pages" class="btn btn-warning">Преглед на всички</a>
      </div>
    </form>
  </div>

</div>

<?php require "inc/footer.php" ?>
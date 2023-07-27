<?php

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  require "code.php";
}

global $db;

$pageId = $_SESSION["params"]["pageId"];
$params = array(":id" => $pageId);
$resArray = $db->select("SELECT * FROM `pages` WHERE id = :id;", $params);
if ($resArray == FALSE) {
  $_SESSION["error_message"] = "Тази страница не съществува.";
  header("Location: /admin/pages");
  return;
}
$page = $resArray[0];

$site_lang = $page["lang"];
$page_title = "Управление на съдържанието на страницата";

$name = isset($_POST["name"]) ? $_POST["name"] : null;
$text = isset($_POST["text"]) ? $_POST["text"] : null;
$comment = isset($_POST["comment"]) ? $_POST["comment"] : null;
?>

<?php require "inc/header.php" ?>
<?php require "inc/offcanvas.php" ?>

<div class="container mx-auto">
  <h1 class="text-center my-4">
    <span>
      <?= $page_title ?> -
    </span>
    <span>
      <?= $page["title"] ?>
    </span>
  </h1>
</div>

<div class="container">
  <div class="bg-white mb-4 p-4 p-sm-5 border shadow rounded">
    <?php require "../messages/success.php" ?>
    <?php require "../messages/error.php" ?>

    <form method="post">
      <div class="mb-3">
        <label for="name" class="form-label">Име</label>
        <input type="text" class="form-control" name="name" id="name" value="<?= $name ?>"
          autofocus required>
      </div>
      <div class="mb-3">
        <label for="text" class="form-label">Текст</label>
        <textarea name="text" class="form-control" id="text" rows="10"><?= $text ?></textarea>
      </div>
      <div class="mb-3">
        <label for="comment" class="form-label">Коментар</label>
        <textarea name="comment" class="form-control" id="text" rows="4"><?= $comment ?></textarea>
      </div>
      <input type="hidden" name="page_id" value="<?= $pageId ?>">
      <div class="d-flex align-items-center gap-4 mt-4">
        <div class="text-center">
          <button name="type-form" value="create" type="submit" class="btn btn-primary">
            Добавяне към страницата
          </button>
        </div>
      </div>
    </form>

  </div>
</div>

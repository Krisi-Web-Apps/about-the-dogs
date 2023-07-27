<?php

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  require dirname(__FILE__)."/../code.php";
}

$name = isset($_POST["name"]) ? $_POST["name"] : null;
$text = isset($_POST["text"]) ? $_POST["text"] : null;
$comment = isset($_POST["comment"]) ? $_POST["comment"] : null;
?>

<form method="post">
  <div class="mb-3">
    <label for="name" class="form-label">Име *</label>
    <input type="text" class="form-control" name="name" id="name" value="<?= $name ?>" autofocus required>
  </div>
  <div class="mb-3">
    <label for="text" class="form-label">Текст *</label>
    <textarea name="text" class="form-control" id="text" rows="10"><?= $text ?></textarea>
  </div>
  <div class="mb-3">
    <label for="comment" class="form-label">Коментар</label>
    <textarea name="comment" class="form-control" id="text" rows="4"><?= $comment ?></textarea>
  </div>
  <input type="hidden" name="page_id" value="<?= $pageId ?>">
  <p class="text-muted">Полетата със '*' за зъдължителни!</p>
  <div class="d-flex align-items-center gap-4 mt-4">
    <div class="text-center">
      <button name="type-form" value="create" type="submit" class="btn btn-primary">
        Добавяне към страницата
      </button>
      <a class="btn btn-warning" href="/admin/pages/view/<?= $page["id"] ?>">Преглед на страницата</a>
    </div>
  </div>
</form>

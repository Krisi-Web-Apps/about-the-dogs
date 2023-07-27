<?php

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  require "code.php";
}

global $db;

$id = $_SESSION["params"]["id"];
$parasm = array(":id" => $id);
$resArray = $db->select("SELECT * FROM `pages` WHERE id = :id;", $parasm);
if ($resArray == FALSE) {
  $_SESSION["error_message"] = "Тази страница не съществува.";
  header("Location: /admin/pages");
  return;
}
$page = $resArray[0];

$site_lang = $page["lang"];
$page_title = "Редактиране на страница";
?>

<?php require "inc/header.php" ?>
<?php require "inc/offcanvas.php" ?>

<div class="container mx-auto">
  <h1 class="text-center my-4">
    <span>Преглед на страница - </span>
    <span>
      <?= $page["title"] ?>
    </span>
  </h1>
</div>

<div class="container">
  <div class="bg-white mb-4 p-4 p-sm-5 border shadow rounded">
    <?php require "../messages/success.php" ?>
    <?php require "../messages/error.php" ?>

    <ul>
      <li>
        <span class="text-bold">Мета заглавие</span>
        <p>
          <?= $page["title"] ?>
        </p>
      </li>
      <hr />
      <li>
        <span class="text-bold">Мета залавие</span>
        <p>
          <?= $page["meta_title"] ?>
        </p>
      </li>
      <hr />
      <li>
        <span class="text-bold">Мета описание</span>
        <p>
          <?= $page["meta_description"] ?>
        </p>
      </li>
      <hr />
      <li>
        <span class="text-bold">Език на страницата</span>
        <p>
          <?= $page["lang"] ?>
        </p>
      </li>
    </ul>
  </div>

  <div class="d-flex flex-column gap-2">
    <a href="/admin/pages/edit/<?= $page["id"] ?>" class="btn btn-primary">Редактиране</a>
    <a href="/admin/manage-page-content/<?= $page["id"] ?>" class="btn btn-primary">Управление на съдържанието на страницата</a>
    <a href="/admin/pages" class="btn btn-warning">Преглед на всички</a>
  </div>
</div>

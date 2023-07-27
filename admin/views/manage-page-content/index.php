<?php

$pageId = $_SESSION["params"]["pageId"];

global $db;
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

    <div class="row">
      <div class="col-12 col-md-6">
        <?php require "inc/create.php" ?>
      </div>
      <div class="col-12 col-md-6 overflow-scroll">
        <?php require "inc/index.php" ?>
      </div>
    </div>

  </div>
</div>
<?php require "inc/footer.php" ?>

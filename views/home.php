<?php

global $db;
$params = array(":slug" => "/");
$page = $db->select("SELECT * FROM `pages` WHERE slug = :slug", $params)[0];

$params = array(":page_id" => $page["id"]);
$pageContents = $db->select("SELECT * FROM `manage_page_content` WHERE page_id = :page_id", $params);

$site_lang = $page["lang"];
$page_title = $page["meta_title"];
$page_desc = $page["meta_description"];
$meta_keywords = $page["meta_keywords"];
?>
<?php require "inc/header.php" ?>
<?php require "inc/navbar.php" ?>

<div>
  <div class="bg-light-gray text-center p-5">
    <div class="container">
      <h1><?= $page["title"] ?></h1>
      <p class="home-header-content mx-auto"><?= $pageContents[0]["text"] ?></p>
    </div>
  </div>

  <div class="container">
    <ul>
      <li>
        <h4><?= $pageContents[1]["text"] ?></h4>
        <p><?= $pageContents[2]["text"] ?></p>
      </li>
      <li>
        <h4><?= $pageContents[3]["text"] ?></h4>
        <p><?= $pageContents[4]["text"] ?></p>
      </li>
    </ul>
  </div>

</div>

<?php require "inc/footer.php" ?>
<?php

$pageId = $_SESSION["params"]["pageId"];

global $db;
$params = array(":page_id" => $pageId);
$page_contents = $db->select("SELECT * FROM `manage_page_content` WHERE page_id = :page_id ORDER BY id DESC;", $params);
?>

<div class="accordion" id="accordion-manage-page-contents">
  <?php if (count($page_contents)): ?>
    <?php foreach ($page_contents as $page_content): ?>
      <div class="accordion-item">
        <h2 class="accordion-header">
          <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
            data-bs-target="#panelsStayOpen-collapse-<?= $page_content["id"] ?>" aria-expanded="false"
            aria-controls="panelsStayOpen-collapse-<?= $page_content["id"] ?>">
            <?= $page_content["name"] ?>
          </button>
        </h2>
        <div id="panelsStayOpen-collapse-<?= $page_content["id"] ?>" class="accordion-collapse collapse">
          <div class="accordion-body">
            <?= nl2br($page_content["text"]) ?>
          </div>
        </div>
      </div>
    <?php endforeach; ?>
  <?php endif; ?>
</div>
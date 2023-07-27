<?php

if ($_POST["type-form"] == "create") {
  $name = htmlspecialchars($_POST["name"]);
  $text = htmlspecialchars($_POST["text"]);
  $comment = htmlspecialchars($_POST["comment"]);
  $pageId = $_POST["page_id"];

  if (empty($pageId)) {
    $_SESSION["error_message"] = "Полето `pageId` е зъдължително.";
    return;
  }

  if (empty($name) || empty($text)) {
    $_SESSION["error_message"] = "Всички полета са зъдължителни.";
    return;
  }

  global $db;

  $params = array(":id" => $pageId);
  $isPageExists = $db->select("SELECT * FROM `pages` WHERE id = :id", $params);

  if ($isPageExists == FALSE) {
    $_SESSION["error_message"] = "Тази страница вече съществува.";
    return;
  }

  $data = array(
    "name" => $name,
    "text" => $text,
    "page_id" => $pageId,
    "comment" => $comment,
  );
  $db->insert("manage_page_content", $data);
  $_SESSION["success_message"] = "Полето е добавено успешно.";
  header("Location: /admin/manage-page-content/$pageId");
  exit;
}

<?php

if ($_POST["type-form"] == "create") {
  $title = htmlspecialchars($_POST["title"]);
  $meta_title = htmlspecialchars($_POST["meta_title"]);
  $meta_description = htmlspecialchars($_POST["meta_description"]);
  $meta_keywords = htmlspecialchars($_POST["meta_keywords"]);
  $slug = htmlspecialchars($_POST["slug"]);
  $lang = htmlspecialchars($_POST["lang"]);

  if (empty($title) || empty($meta_title) || empty($meta_description) || empty($meta_keywords) || empty($slug) || empty($lang)) {
    $_SESSION["error_message"] = "Всички полета са зъдължителни.";
    return;
  }

  global $db;
  
  $params = array("slug" => $slug);
  $isPageExists = $db->select("SELECT * FROM `pages` WHERE slug = :slug", $params);

  if ($isPageExists != FALSE) {
    $_SESSION["error_message"] = "Тази страница вече съществува.";
    return;
  }

  $data= array(
    "title" => $title,
    "meta_title" => $meta_title,
    "meta_description" => $meta_description,
    "meta_keywords" => $meta_keywords,
    "slug" => $slug,
    "lang" => $lang,
  );
  $db->insert("pages", $data);
  $_SESSION["success_message"] = "Страницата бе създадена успешно.";
  header("Location: /admin/pages");
  exit;
}

if ($_POST["type-form"] == "delete") {
  $id = $_POST["id"];

  if (empty($id)) {
    $_SESSION["error_message"] = "Невалидно id на страница.";
    return;
  }

  global $db;

  $params = array(":id" => $id);
  $isPageExists = $db->select("SELECT id FROM `pages` WHERE id = :id", $params);

  if ($isPageExists == FALSE) {
    $_SESSION["error_message"] = "Подаденото id на страница не съществува.";
    return;
  }

  $params = array(":id" => $id);
  $db->delete("pages", "id = :id", $params);
  $_SESSION["success_message"] = "Страницата бе изтрите успешно.";
  header("Location: /admin/pages");
  exit;
}

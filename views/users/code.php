<?php

if ($_POST["type-form"] == "save") {
  $fullname = htmlspecialchars($_POST["fullname"]);

  if (empty($fullname)) {
    $_SESSION["error_message"] = "Полето име е задължителни.";
    return;
  }

  global $db;
  $id = $_SESSION["user_id"];
  $params = array(
    ":id" => $id,
  );
  $data = array(
    "fullname" => $fullname,
  );
  $db->update("users", $data, "id = $id");
  $_SESSION["success_message"] = "Промените са запазени.";
}

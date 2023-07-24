<?php

if ($_POST["type-form"] == "register") {
  $email = htmlspecialchars($_POST["email"]);
  $password = htmlspecialchars($_POST["password"]);
  $cpassword = htmlspecialchars($_POST["cpassword"]);
  $fullname = htmlspecialchars($_POST["fullname"]);
  $remember = isset($_POST["remember"]) ? $_POST["remember"] : FALSE;

  if (empty($email) || empty($password) || empty($cpassword) || empty($fullname)) {
    $_SESSION["error_message"] = "Всички полета са задължителни.";
    return;
  }

  if (filter_var($email, FILTER_VALIDATE_EMAIL) == FALSE) {
    $_SESSION["error_message"] = "Въведете валиден e-mail адрес.";
    return;
  }

  if ($password != $cpassword) {
    $_SESSION["error_message"] = "Паролите не съвпадат.";
    return;
  }

  $password = password_hash($password, PASSWORD_BCRYPT);

  $data = array(
    "email" => "$email",
    "password" => "$password",
    "fullname" => "$fullname",
  );

  $_SESSION["success_message"] = "Вие се регистрирахте успешно.";
  global $db;
  $db->insert("users", $data);
  header("Location: /");
}

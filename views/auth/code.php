<?php

if ($_POST["type-form"] == "register") {
  $email = htmlspecialchars($_POST["email"]);
  $password = htmlspecialchars($_POST["password"]);
  $cpassword = htmlspecialchars($_POST["cpassword"]);
  $fullname = htmlspecialchars($_POST["fullname"]);
  $accept = isset($_POST["accept"]) ? $_POST["accept"] : FALSE;

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

  if (empty($accept)) {
    $_SESSION["error_message"] = "Трябва да се съгласите с Общите условия и Политиката за поверителност.";
    return;
  }

  global $db;

  $params = array(":email" => $email);
  $isEmailExists = $db->select("SELECT id, email FROM `users` WHERE email = :email;", $params);

  if ($isEmailExists) {
    $_SESSION["error_message"] = "Този e-mail адрес вече е зает.";
    return;
  }

  $password = password_hash($password, PASSWORD_BCRYPT);

  $data = array(
    "email" => "$email",
    "password" => "$password",
    "fullname" => "$fullname",
  );

  $_SESSION["success_message"] = "Вие се регистрирахте успешно.";
  $db->insert("users", $data);
  header("Location: /");
}

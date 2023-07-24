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

  if ($accept == FALSE) {
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
  header("Location: /auth/login");
}

if ($_POST["type-form"] == "login") {
  $email = htmlspecialchars($_POST["email"]);
  $password = htmlspecialchars($_POST["password"]);

  if (empty($email) || empty($password)) {
    $_SESSION["error_message"] = "Всички полета са задължителни.";
    return;
  }
  
  global $db;

  $params = array(":email" => $email);
  $user = $db->select("SELECT id, email, `password` FROM `users` WHERE email = :email;", $params);

  if ($user == FALSE) {
    $_SESSION["error_message"] = "E-mail адреса или паролата са невавидни.";
    return;
  }

  $isValidPassword = password_verify($password, $user[0]["password"]);

  if ($isValidPassword == FALSE) {
    $_SESSION["error_message"] = "E-mail адреса или паролата са невавидни.";
    return;
  }

  $params = array(
    ":user_id" => $user[0]["id"],
  );
  $isSessionExists = $db->select("SELECT * FROM `sessions` WHERE user_id = :user_id;", $params);

  if ($isSessionExists) {
    logout($isSessionExists[0]["user_id"]);
  }

  $token = generateToken();
  $tokenExpiry = time() + 3600; // 60 minutes

  $db->insert("sessions", array(
    "user_id" => $user[0]["id"],
    "token" => $token,
    "token_expiry" => $tokenExpiry,
  ));

  afterLogin(array(
    "user_id" => $user[0]["id"],
    "user_password" => $user[0]["password"],
    "token" => $token,
  ));
}
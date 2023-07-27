<?php

function url_match($url) {
  return $_SERVER["REQUEST_URI"] == $url;
}

function view($templateName, $data = array())
{
  extract($data);
  require 'views/' . $templateName . '.php';
}

function afterLogin($auth)
{
  setSession($auth);
  $_SESSION["success_message"] = "Влязохте в системата.";
  header("Location: /");
}

function generateToken()
{
  $token_length = 64;
  $random_bytes = bin2hex(random_bytes($token_length));
  $token = base64_encode($random_bytes);
  $token = str_replace(['+', '/', '='], ['-', '_', ''], $token);
  return $token;
}

function logout($userId = NULL) {
  if ($userId != NULL) {
    $_SESSION["worning_message"] = "Вие вече сте изван системата.";
    $_SESSION["user_id"] = $userId;
  }
  global $db;
  $params = array(
    ":user_id" => $_SESSION["user_id"],
  );
  $db->delete("sessions", "user_id = :user_id", $params);
  unsetSession();
}

function isAuthenticated() {
  global $db;

  if (isset($_SESSION["user_id"]) == FALSE) {
    return FALSE;
  }

  $params = array(
    ":user_id" => $_SESSION["user_id"],
  );
  $session = $db->select("SELECT * FROM `sessions` WHERE user_id = :user_id;", $params);
  return $session != FALSE;
}

function isAdmin() {
  global $db;

  if (isset($_SESSION["user_id"]) == FALSE) {
    return FALSE;
  }

  $params = array(
    ":id" => $_SESSION["user_id"],
    ":role_as" => "admin"
  );
  $user = $db->select("SELECT * FROM `users` WHERE id = :id AND role_as = :role_as;", $params);
  return $user != FALSE;
}

function setSession($auth) {
  $_SESSION["user_id"] = $auth["user_id"];
  $_SESSION["user_password"] = $auth["user_password"];
  $_SESSION["token"] = $auth["token"];
  $_SESSION["role_as"] = $auth["role_as"];
}

function unsetSession() {
  unset($_SESSION["user_id"]);
  unset($_SESSION["user_password"]);
  unset($_SESSION["token"]);
  unset($_SESSION["role_as"]);
}

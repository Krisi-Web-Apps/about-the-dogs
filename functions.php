<?php

function view($templateName, $data = array())
{
  extract($data);
  require 'views/' . $templateName . '.php';
}

function afterLogin($auth)
{
  $_SESSION["auth"] = array(
    "id" => $auth["id"],
    "password" => $auth["password"],
  );
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
  if (isset($_SESSION["auth"]) == FALSE) {
    $_SESSION["worning_message"] = "Вие вече сте изван системата.";
    $_SESSION["auth"] = array(
      "user_id" => $userId,
    );
  }
  global $db;
  $params = array(
    ":user_id" => $_SESSION["auth"]["user_id"],
  );
  $db->delete("sessions", "user_id = :user_id", $params);
  unset($_SESSION["auth"]);
}
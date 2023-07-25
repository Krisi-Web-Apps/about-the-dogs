<?php

if (isAdmin() == FALSE) {
  $_SESSION["error_message"] = "Нямате достъп до този ресурс.";
  $URL = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : "/admin";
  header("Location: $URL");
  exit;
}

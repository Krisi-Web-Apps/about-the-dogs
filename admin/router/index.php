<?php

require "../middlewares/is-authenticated.php";

$BASE_PATH = "/admin";

$router = new Router();

$router->addRoute("$BASE_PATH/", function () {
  view("dashboard");
});

require "pages/index.php";
require "users/index.php";
require "settings/index.php";

$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->handleRequest($currentPath);

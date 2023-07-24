<?php

$router = new Router();

$router->addRoute("/", function () {
  view("home");
});

$router->addRoute("/about", function () {
  view("about");
});

$router->addRoute("/locations", function () {
  view("locations");
});

$router->addRoute("/gallery", function () {
  view("gallery");
});

$router->addRoute("/terms-of-use", function () {
  view("terms-of-use");
});

$router->addRoute("/privacy-policy", function () {
  view("privacy-policy");
});

require "auth/router.php";
require "users/router.php";

$currentPath = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$router->handleRequest($currentPath);

<?php

$router->addRoute("/auth/register", function () {
  view("/auth/register");
});

$router->addRoute("/auth/login", function () {
  view("/auth/login");
});

$router->addRoute("/auth/logout", function () {
  view("/auth/logout");
});

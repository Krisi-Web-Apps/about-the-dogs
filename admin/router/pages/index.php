<?php

global $BASE_PATH;
$router->addRoute("$BASE_PATH/pages", function () {
  view("pages/index");
});

$router->addRoute("$BASE_PATH/pages/create", function () {
  view("pages/create");
});

$router->addRoute("$BASE_PATH/pages/edit/:id", function ($params) {
  $_SESSION["params"] = $params;
  view("pages/edit");
});

$router->addRoute("$BASE_PATH/pages/view/:id", function ($params) {
  $_SESSION["params"] = $params;
  view("pages/view");
});
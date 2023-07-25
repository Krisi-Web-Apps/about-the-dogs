<?php

$router->addRoute("$BASE_PATH/pages", function () {
  view("pages/index");
});

$router->addRoute("$BASE_PATH/pages/create", function () {
  view("pages/create");
});

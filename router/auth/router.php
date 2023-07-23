<?php

$BASE_PATH = "/auth";

$router->addRoute("$BASE_PATH/register", function () {
  global $BASE_PATH;
  view("$BASE_PATH/register");
});

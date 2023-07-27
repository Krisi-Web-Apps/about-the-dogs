<?php

global $BASE_PATH;
$router->addRoute("$BASE_PATH/manage-page-content/:pageId", function ($params) {
  $_SESSION["params"] = $params;
  view("manage-page-content/index");
});
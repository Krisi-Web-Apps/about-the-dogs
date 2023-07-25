<?php

$router->addRoute("$BASE_PATH/users", function () {
  view("users/index");
});

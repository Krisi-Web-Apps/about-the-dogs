<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'classes/Autoloader.php';
Autoloader::register();

require "functions.php";
require "router/index.php";
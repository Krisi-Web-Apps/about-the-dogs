<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

define("HOST", "localhost");
define("DATABASE_USER", "root");
define("DATABASE_PASSWORD", "root");
define("DATABASE_NAME", "capybara");
define("CHARSET", "utf8");

error_reporting(E_ALL);
ini_set('display_errors', 1);

$db = new Database(HOST, DATABASE_USER, DATABASE_PASSWORD, DATABASE_NAME, CHARSET);

session_start();
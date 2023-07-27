<?php

if ($_SERVER["REQUEST_METHOD"] === "DELETE") {
  // Проверка дали "id" параметърът е подаден в POST заявката
  if (isset($_SESSION["params"]) && !empty($_SESSION["params"]["id"])) {
    $id = $_SESSION["params"]["id"];
    // Тук можете да извършите нужните действия с "id" параметъра
    // Например, извличане на информация от база данни или друга обработка

    deletePageContentById($id);

    // Задаване на правилния Content-Type хедър за JSON отговор
    header("Content-Type: application/json");
    
    // Връщане на JSON отговор
    echo json_encode($data);
    exit;
  } else {
    // Ако "id" параметърът липсва или е празен, върнете грешка
    http_response_code(400); // Неправилна заявка
    echo json_encode(array("error" => "Missing or empty 'id' parameter in the POST request."));
    exit;
  }
} else {
  // Връщане на грешка, ако не сте получили POST заявка
  http_response_code(405); // Методът на заявката не е позволен
  echo json_encode(array("error" => "Only POST requests are allowed."));
  exit;
}

function deletePageContentById($id) {
  global $db;
  $params = array(":id" => $id);
  $db->delete("manage_page_content", "id = :id", $params);
}

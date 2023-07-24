<?php
$site_lang = "bg";
$page_title = "Страници";
?>
<?php require "inc/header.php" ?>
<?php require "inc/offcanvas.php" ?>

<div class="container mx-auto">
  <div class="d-flex justify-content-between align-items-center py-4">
    <h1><?= $page_title ?></h1>
    <a class="btn btn-primary d-flex align-items-center gap-2" href="pages/create">
      <i class="fas fa-plus"></i>
      <span>Създаване на нова</span>
    </a>
  </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Заглавие</th>
        <th scope="col">Мета заглавие</th>
        <th scope="col">Мета описание</th>
        <th scope="col">Ключови думи</th>
        <th scope="col">Език</th>
        <th scope="col">Слъг</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">1</th>
        <td>Mark</td>
        <td>Otto</td>
        <td>@mdo</td>
      </tr>
      <tr>
        <th scope="row">2</th>
        <td>Jacob</td>
        <td>Thornton</td>
        <td>@fat</td>
      </tr>
      <tr>
        <th scope="row">3</th>
        <td colspan="2">Larry the Bird</td>
        <td>@twitter</td>
      </tr>
    </tbody>
  </table>
</div>

<?php require "inc/footer.php" ?>
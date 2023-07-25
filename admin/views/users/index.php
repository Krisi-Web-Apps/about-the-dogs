<?php

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  require "code.php";
}

require "helper/constants.php";

$site_lang = "bg";
$page_title = "Потребители";

global $db;

$users = $db->select("SELECT * FROM `users`;");
?>
<?php require "inc/header.php" ?>
<?php require "inc/offcanvas.php" ?>

<?php require "inc/footer.php" ?>

<div class="container mx-auto">
  <div class="d-flex justify-content-between align-items-center py-4">
    <h1>
      <span>
        <?= $page_title ?>
      </span>
      <?php if (count($users)): ?>
        <span>(
          <?= count($users) ?>)
        </span>
      <?php endif; ?>
    </h1>
  </div>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Име</th>
        <th scope="col">E-mail</th>
        <th scope="col">Град</th>
        <th scope="col">Роля</th>
        <th scope="col">Регистриран на</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($users)): ?>
        <?php foreach ($users as $user): ?>
          <tr>
            <th scope="row">
              <?= $user["fullname"] ?>
            </th>
            <td>
              <?= $user["email"] ?>
            </td>
            <td>
              <?= $user["city"] ?>
            </td>
            <td>
              <?= $rolesArray[$user["role_as"]] ?>
            </td>
            <td>
              <?= $user["created_at"] ?>
            </td>
          </tr>
        <?php endforeach; ?>
      <?php else: ?>
        <tr>
          <td class="text-center" colspan="7">Все още няма създадени записи.</td>
        </tr>
      <?php endif; ?>
    </tbody>
  </table>

</div>
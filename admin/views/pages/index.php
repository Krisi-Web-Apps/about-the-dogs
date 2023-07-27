<?php

if (isset($_SERVER["REQUEST_METHOD"]) && $_SERVER["REQUEST_METHOD"] == "POST") {
  require "code.php";
}

$site_lang = "bg";
$page_title = "Страници";

global $db;

$pages = $db->select("SELECT * FROM `pages`;");
?>
<?php require "inc/header.php" ?>
<?php require "inc/offcanvas.php" ?>

<div class="container mx-auto">
  <div class="d-flex justify-content-between align-items-center py-4">
    <h1>
      <span>
        <?= $page_title ?>
      </span>
      <?php if (count($pages)): ?>
        <span>(
          <?= count($pages) ?>)
        </span>
      <?php endif; ?>
    </h1>
    <?php if ($_SESSION["role_as"] == "admin"): ?>
      <a class="btn btn-primary d-flex align-items-center gap-2" href="pages/create">
        <i class="fas fa-plus"></i>
        <span>Създаване на нова</span>
      </a>
    <?php endif; ?>
  </div>

  <?php require "../messages/success.php" ?>
  <?php require "../messages/error.php" ?>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th scope="col">Заглавие</th>
        <th scope="col">Мета заглавие</th>
        <th scope="col">Мета описание</th>
        <th scope="col">Ключови думи</th>
        <th scope="col">Слъг</th>
        <th scope="col">Език</th>
        <th scope="col">Действия</th>
      </tr>
    </thead>
    <tbody>
      <?php if (count($pages)): ?>
        <?php foreach ($pages as $page): ?>
          <tr>
            <th scope="row">
              <?= $page["title"] ?>
            </th>
            <td>
              <?= $page["meta_title"] ?>
            </td>
            <td>
              <?= $page["meta_description"] ?>
            </td>
            <td>
              <?= substr($page["meta_keywords"], 0, 100) . "..." ?>
            </td>
            <td>
              <?= $page["slug"] ?>
            </td>
            <td>
              <?= $page["lang"] ?>
            </td>
            <td>
              <div class="dropdown">
                <button class="border rounded-circle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="fa-solid fa-ellipsis"></i>
                </button>
                <ul class="dropdown-menu">
                  <li>
                    <ul class="p-0">
                      <li class="dropdown-item">
                        <a href="/admin/pages/view/<?= $page["id"] ?>" class="dropdown-item">Преглед</a>
                      </li>
                      <?php if ($_SESSION["role_as"] == "admin"): ?>
                        <li class="dropdown-item">
                          <a href="/admin/pages/edit/<?= $page["id"] ?>" class="dropdown-item">Редактиране</a>
                        </li>
                      <?php endif; ?>
                      <li class="dropdown-item">
                        <a href="/admin/manage-page-content/<?= $page["id"] ?>" class="dropdown-item">Управление на
                          съдържанието на страницата</a>
                      </li>
                      <?php if ($_SESSION["role_as"] == "admin"): ?>
                        <li class="dropdown-item">
                          <form method="post">
                            <input type="hidden" name="id" value="<?= $page["id"] ?>">
                            <button type="submit" name="type-form" value="delete"
                              class="dropdown-item text-danger">Изтриване</button>
                          </form>
                        </li>
                      <?php endif; ?>
                    </ul>
                  </li>
                </ul>
              </div>
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

<?php require "inc/footer.php" ?>

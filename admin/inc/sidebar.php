<div class="bg-white">
  <div class="pb-4">
    <div>
      <a class="<?= url_match("/admin/") ? "active" : "" ?> d-block py-3 px-4 sidebar-item rounded my-2" href="/admin">Табло</a>
    </div>
    <hr />
    <div>
      <a class="<?= url_match("/admin/pages") ? "active" : "" ?> d-block py-3 px-4 sidebar-item rounded my-2" href="/admin/pages">Страници</a>
    </div>
    <div>
      <a class="<?= url_match("/admin/users") ? "active" : "" ?> d-block py-3 px-4 sidebar-item rounded my-2" href="/admin/users">Потребители</a>
    </div>
    <hr />
    <div>
      <a class="<?= url_match("/admin/settings") ? "active" : "" ?> d-block py-3 px-4 sidebar-item rounded my-2" href="/admin/settings">Настройки</a>
    </div>
    <div>
      <a class="d-block py-3 px-4 sidebar-item rounded my-2 text-white bg-danger" aria-current="page" href="/auth/logout">Изход</a>
    </div>
  </div>
</div>

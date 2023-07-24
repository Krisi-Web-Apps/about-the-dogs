<nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand d-flex align-items-center gap-2" href="/">
      <img width="40" height="40" class="rounded-circle" src="/assets/images/капибара.jpg" alt="Капибара">
      <span>Капибара</span>
    </a>
    <button data-navbar-toggler class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-items" aria-controls="navbar-items" aria-expanded="false" aria-label="Отваряне на менюто">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbar-items">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/locations">Локации</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="/gallery">Галерия</a>
        </li>
      </ul>
      
      <?php if (isAuthenticated() == FALSE): ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/auth/login">Вход</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/auth/register">Регистрация</a>
            <!-- <a class="nav-link" aria-current="page" href="/admin">Администрация</a> -->
          </li>
        </ul>
      <?php else: ?>
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/users/account">Профил</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" aria-current="page" href="/auth/logout">Изход</a>
          </li>
        </ul>
      <?php endif; ?>
    </div>
  </div>
</nav>

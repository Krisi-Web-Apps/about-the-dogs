<button class="offcanvas-button" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-button">
  <i class="fa-solid fa-bars"></i>
</button>

<div class="offcanvas offcanvas-start" data-bs-scroll="true" tabindex="-1" id="offcanvas-button"
  aria-labelledby="offcanvas-label">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvas-label">Админ панел</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <div class="bg-white">
      <div class="shadow px-4">
        <?php require "inc/sidebar.php" ?>
      </div>
    </div>
  </div>
</div>

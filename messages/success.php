<?php if (isset($_SESSION["success_message"])): ?>
  <div class="alert alert-success">
    <?= $_SESSION["success_message"] ?>
  </div>
  <?php unset($_SESSION["success_message"]) ?>
<?php endif; ?>

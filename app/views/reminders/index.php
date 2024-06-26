<?php require_once '/home/runner/cosc-4806-4/app/views/templates/header.php'; ?>

<div class="container">
  <div class="page-header" id="banner">
    <div class="row">
      <div class="col-lg-12">
        <h1>Reminders</h1>
      </div>
    </div>
  </div>

  <?php
    // Check if $data['reminders'] is set before printing
      print_r($data['reminders']);
  ?>
</div>

<?php require_once '/home/runner/cosc-4806-4/app/views/templates/footer.php'; ?>

<?php
// Retrieve the username from the URL parameter
$username = isset($_GET['username']) ? htmlspecialchars($_GET['username']) : '';

require_once '/home/runner/cosc-4806-4/app/views/templates/header.php';
?>

<div class="container" >
  <div class="page-header" id="banner">
    <div class="row">
      <div class="col-lg-12">
        <h1>Reminders</h1>
        <p>
          <a href="/reminders/create" class="btn btn-primary">Create a new reminder</a>
        </p>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-12">
      <h2>All Reminders</h2>

      <ul>
          <?php foreach ($data['reminders'] as $reminder): ?>
              <li><?php echo htmlspecialchars($reminder['reminders']); ?></li>
          <?php endforeach; ?>
      </ul>

    </div>
  </div>

</div>

<?php require_once '/home/runner/cosc-4806-4/app/views/templates/footer.php'; ?>

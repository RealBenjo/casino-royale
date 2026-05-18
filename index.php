<?php
// index.php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Player Entry</title>
  <link rel="stylesheet" href="css/classes.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<h1>Casino Royale</h1>

<!-- Secret Credits Area (invisible clickable zone top-left) -->
<div id="credits-area" style="position: fixed; top: 0; left: 0; width: 20px; height: 20px; cursor: pointer; z-index: 9999;"></div>

<div class="container">

  <form method="POST" action="play.php">
    <div class="player-form-container">
      <?php for ($i = 1; $i <= 3; $i++): ?>
        <div class="player-form">
          <h3>Player <?php echo $i; ?></h3>
          <input type="text" name="nickname<?php echo $i; ?>" maxlength="15" required>
        </div>
      <?php endfor; ?>
    </div>

    <input type="submit" name="play" class="btn" value="Roll Dice!">
  </form>
</div>

<script src="js/credits.js"></script>

<script>
document.getElementById('credits-area').addEventListener('click', showCredits);
</script>

</body>
</html>
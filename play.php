<?php
// play.php
session_start();

// 1. Handle coming from index.php (Initialize Players)
if (isset($_POST['play'])) {
  $_SESSION['players'] = [];
  for ($i = 1; $i <= 3; $i++) {
    $_SESSION['players'][] = [
      'nickname' => htmlspecialchars($_POST["nickname$i"]),
      'rolls' => [],
      'total' => 0
    ];
  }
  // Clear any residual game-state flags
  unset($_SESSION['dice_rolled']);
  $_SESSION['players_submitted'] = true;
}

// 2. Handle the Dice Rolling Submission (Process scores before checking view logic)
if (isset($_POST['roll_dice']) && isset($_SESSION['players'])) {
  $dice_count = isset($_POST['dice_count']) ? (int)$_POST['dice_count'] : 3;
  $dice_count = max(1, min(10, $dice_count));
  $_SESSION['dice_count'] = $dice_count;

  for ($i = 0; $i < count($_SESSION['players']); $i++) {
    $rolls = [];
    $total = 0;

    for ($j = 0; $j < $dice_count; $j++) {
      $die = rand(1, 6);
      $rolls[] = $die;
      $total += $die;
    }

    $_SESSION['players'][$i]['rolls'] = $rolls;
    $_SESSION['players'][$i]['total'] = $total;
  }
  $_SESSION['dice_rolled'] = true;
}

// Security Check: If no players exist in session, kick back to lobby
if (!isset($_SESSION['players'])) {
  header("Location: index.php");
  exit;
}
?>

<?php 
// 3. View Routing Control
if (!isset($_SESSION['dice_rolled'])): 
  // VIEW A: Select Dice Count
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Select Dice</title>
  <link rel="stylesheet" href="css/classes.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h1>Choose Number of Dice</h1>

    <form method="POST" action="play.php">
      <div class="dice-selector-form">
        <label for="dice_count">How many dice should each player roll? (1-10)</label>
        <input type="number" id="dice_count" name="dice_count" min="1" max="10" value="3" required>
      </div>
      <input type="submit" name="roll_dice" class="btn" value="Roll Dice!">
    </form>
  </div>
</body>
</html>

<?php else: ?>
<?php // VIEW B: Display Dice Roll Results ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Game Results</title>
  <link rel="stylesheet" href="css/classes.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
  <div class="container">
    <h1>Game Results</h1>

    <div class="dice-info">
      <p>Each player rolled <strong><?php echo $_SESSION['dice_count'] ?? 3; ?></strong> dice.</p>
    </div>

    <?php foreach ($_SESSION['players'] as $player): ?>
      <div class='player-result'>
        <h2><?php echo $player['nickname']; ?></h2>
        <p>
          <?php foreach ($player['rolls'] as $die): ?>
            <img
              class='dice-img animated-dice'
              src='images/dice-anim.gif' alt='Die'
              data-result='images/dice<?php echo $die; ?>.gif'
            >
          <?php endforeach; ?>
        </p>
        <p class="total-score" style="display: none;">
          <strong>Total Score:</strong> <?php echo $player['total']; ?>
        </p>
      </div>
    <?php endforeach; ?>

    <p class="smooth-box big-text">
      Revealing winners in <span id="seconds">10</span> seconds...
    </p>

    <a href="winners.php" class="btn">Skip to Podium!</a>
  </div>

  <script src="js/play.js"></script>
</body>
</html>
<?php endif; ?>
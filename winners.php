<?php
// winners.php
session_start();

if (!isset($_SESSION['players']) || !isset($_SESSION['dice_rolled'])) {
  session_destroy();
  header("Location: index.php");
  exit;
}

// Collect all scores
$all_scores = [];
foreach ($_SESSION['players'] as $player) {
  $all_scores[] = $player['total'];
}

// Get unique scores sorted descending (highest first)
$unique_scores = array_unique($all_scores);
rsort($unique_scores);

// Gold is 1st place, silver is 2nd, bronze is 3rd
$gold_score = isset($unique_scores[0]) ? $unique_scores[0] : 0;
$silver_score = isset($unique_scores[1]) ? $unique_scores[1] : null;
$bronze_score = isset($unique_scores[2]) ? $unique_scores[2] : null;

$winners_1st = [];
$winners_2nd = [];
$winners_3rd = [];

// Sort players cleanly using strict comparison values
foreach ($_SESSION['players'] as $player) {
  if ($player['total'] === $gold_score) {
    $winners_1st[] = $player['nickname'];
  } elseif ($silver_score !== null && $player['total'] === $silver_score) {
    $winners_2nd[] = $player['nickname'];
  } elseif ($bronze_score !== null && $player['total'] === $bronze_score) {
    $winners_3rd[] = $player['nickname'];
  }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Winners</title>
  <link rel="stylesheet" href="css/classes.css">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.9.0/dist/confetti.browser.min.js"></script>
</head>
<body>

<div class="container">
  <h1 class="smooth-box">Podium</h1>

  <div class="podium-container">

    <?php if ($silver_score !== null && count($winners_2nd) > 0): ?>
      <div class="podium podium-2">
        <div class="podium-name">
          <?php echo implode("<br>and<br>", $winners_2nd); ?>
        </div>
        <div class="podium-score">
          <?php echo $silver_score; ?> points
        </div>
      </div>
    <?php endif; ?>

    <div class="podium podium-1">
        <div class="podium-name">
          <?php echo implode("<br>and<br>", $winners_1st); ?>
        </div>
        <div class="podium-score">
          <?php echo $gold_score; ?> points
        </div>
    </div>

    <?php if ($bronze_score !== null && count($winners_3rd) > 0): ?>
      <div class="podium podium-3">
        <div class="podium-name">
          <?php echo implode("<br>and<br>", $winners_3rd); ?>
        </div>
        <div class="podium-score">
          <?php echo $bronze_score; ?> points
        </div>
      </div>
    <?php endif; ?>

  </div>

  <p class="smooth-box big-text">
    Returning to lobby in <span id="timer">20</span> seconds...
  </p>

  <a href="index.php" class="btn btn-back">Back to Entry (New Game)</a>
</div>

<script src="js/winners.js"></script>

</body>
</html>
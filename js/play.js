// Integrated interactive logic for play.php
document.addEventListener("DOMContentLoaded", function () {
  var secondsLeft = 10;
  const secondsElement = document.getElementById('seconds');

  // After 2.5 seconds, swap animated gifs out for the true rolled results & reveal totals
  setTimeout(function() {
    const diceImages = document.querySelectorAll('.dice-img');
    diceImages.forEach(img => {
      const realSrc = img.getAttribute('data-result');
      if (realSrc) img.src = realSrc;
    });

    const scores = document.querySelectorAll('.total-score');
    scores.forEach(score => {
      score.style.display = 'block';
    });
  }, 2500);

  // Countdown clock handling auto-redirection
  const timerInterval = setInterval(function () {
    secondsLeft--;
    if (secondsElement) {
      secondsElement.innerText = secondsLeft;
    }
    if (secondsLeft <= 0) {
      clearInterval(timerInterval);
      window.location.href = 'winners.php';
    }
  }, 1000);
});
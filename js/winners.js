// Configuration for a moderate, steady confetti shower from the top
const showerDuration = 20 * 1000; // Match your 20-second page timer
const animationEnd = Date.now() + showerDuration;

const confettiInterval = setInterval(function() {
  const timeLeft = animationEnd - Date.now();

  if (timeLeft <= 0) {
    return clearInterval(confettiInterval);
  }

  // Shoot small, moderate bursts from random horizontal positions at the top
  confetti({
    particleCount: 10,
    angle: 270,
    spread: 60,
    origin: { 
      x: Math.random(),
      y: -0.1
    },
    startVelocity: 20,
    gravity: 0.9,
    ticks: 300
  });
}, 50); // Fires every 50ms for a continuous trickle

// Auto-redirect after 20 seconds
var secondsLeft = 20;
const timerElement = document.getElementById('timer');

const timerInterval = setInterval(function () {
  secondsLeft--;
  if (timerElement) {
    timerElement.innerText = secondsLeft;
  }
  if (secondsLeft <= 0) {
    clearInterval(timerInterval);
    clearInterval(confettiInterval); // Clean up the confetti loop just in case
    window.location.href = 'index.php';
  }
}, 1000);
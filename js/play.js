var preostaliCas = 10;
const element = document.getElementById('sekunde');
console.log(element);

setTimeout(function () {
  var kocke = document.querySelectorAll('.animirana-kocka');
  kocke.forEach(function (kocka) {
    var pravaSlika = kocka.getAttribute('data-rezultat');
    kocka.src = pravaSlika;
  });

  var vsote = document.querySelectorAll('.skupna-vsota');
  vsote.forEach(function (vsota) {
    vsota.style.display = 'block';
  });
}, 2000);

setInterval(function () {
  preostaliCas--;
  if (preostaliCas > 0) {
    element.innerText = preostaliCas;
  }
}, 1000);

setTimeout(function () {
  window.location.href = 'zmagovalci.php';
}, 10000);
/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!***************************************!*\
  !*** ./resources/js/bottleCounter.js ***!
  \***************************************/
document.querySelectorAll('.card-bouteille-qt').forEach(function (counter) {
  var card = counter.closest('.card-bouteille');
  var input = counter.querySelector('input');
  var decrementButton = counter.querySelector('.btn-decrement');
  var incrementButton = counter.querySelector('.btn-increment');
  var deleteButton = document.createElement('button');

  // SVG pour le bouton supprimer
  deleteButton.innerHTML = '<svg width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M22.3334 11.6666V24.2C22.3334 24.6418 21.9753 25 21.5334 25H4.46675C4.02492 25 3.66675 24.6418 3.66675 24.2V11.6666" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M10.3335 19.6666V11.6666" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M15.6665 19.6666V11.6666" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/><path d="M25 6.33333H18.3333M18.3333 6.33333V1.8C18.3333 1.35817 17.9752 1 17.5333 1H8.46667C8.02484 1 7.66667 1.35817 7.66667 1.8V6.33333M18.3333 6.33333H7.66667M1 6.33333H7.66667" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/></svg>';
  deleteButton.classList.add('btn-delete');
  card.appendChild(deleteButton);

  // Masquer initialement le bouton supprimer
  deleteButton.style.display = 'none';
  decrementButton.addEventListener('click', function () {
    var currentValue = parseInt(input.value, 10);
    if (currentValue > 0) {
      input.value = currentValue - 1;
    }
    checkValue();
  });
  incrementButton.addEventListener('click', function () {
    var currentValue = parseInt(input.value, 10);
    input.value = currentValue + 1;
    checkValue();
  });
  function checkValue() {
    var currentValue = parseInt(input.value, 10);
    if (currentValue === 0) {
      card.classList.add('card-transparent');
      deleteButton.style.display = 'block';
    } else {
      card.classList.remove('card-transparent');
      deleteButton.style.display = 'none';
    }
  }

  // Vérifier initialement la valeur du compteur
  checkValue();
});
/******/ })()
;
/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*****************************!*\
  !*** ./resources/js/all.js ***!
  \*****************************/
$(document).ready(function () {
  fillMonths();
});

function fillMonths() {
  for (var m = 0; m < 12; m++) {
    var month = formattedShortDate(m);
    var lowerMonth = month.toLowerCase();
    $('.checkbox-months').append("\n                    <li class=\"shadow-md\">\n                        <input type=\"checkbox\" name=\"months[]\" id=\"flower-months\" value=\"".concat(lowerMonth, "\">\n                        <span class=\"text-center\">").concat(month, "</span>\n                    </li>"));
  }
}

function formattedShortDate() {
  var month = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 0;
  var shortDate = new Date(1970, month, 1).toLocaleString('pt-PT', {
    month: 'short'
  }).replace(/\W+/, ''); // This code search the first letter in a text and change the capitalization to upper case

  return shortDate.replace(/\b[a-z]/, "".concat(shortDate.match(/\b[a-z]/)[0].toUpperCase()));
}
/******/ })()
;
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
//                                                             //
//                                                             //
// Andrea Grandieri andreagrandieri.github.io                  //
// Copiloted by Copilot@GitHub                                 //
//                                                             //
//                                                             //
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////

// This is a module. The globalThis export is used. The globalThis export can also be used with variables.

// Global variables
var thirdOrderBrowserArray = [];

function appendToThirdOrderBrowserArray(string) {
  thirdOrderBrowserArray.push(string);
}
globalThis.appendToThirdOrderBrowserArray = appendToThirdOrderBrowserArray;

function injectHMTLToThirdOrderBrowserDiv() {
  var toInject = "<li class=\"aux-nav-list-item\"><a href=\"" + thirdOrderBrowserArray[1] + "\"" + "class=\"site-button\"";
  if (thirdOrderBrowserArray[2] == "true") {
    toInject += " target=\"_blank\" rel=\"noopener noreferrer\"";
  }
  toInject += ">" + thirdOrderBrowserArray[0] + "</a></li>";

  document.getElementById("thirdOrderBrowserDiv").innerHTML += toInject;
}
globalThis.injectHMTLToThirdOrderBrowserDiv = injectHMTLToThirdOrderBrowserDiv;

function flushThirdOrderBrowserArray() {
  thirdOrderBrowserArray = [];
}
globalThis.flushThirdOrderBrowserArray = flushThirdOrderBrowserArray;

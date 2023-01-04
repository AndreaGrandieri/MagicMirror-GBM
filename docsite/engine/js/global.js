/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
//                                                             //
//                                                             //
// Andrea Grandieri andreagrandieri.github.io                  //
//                                                             //
//                                                             //
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////

// This is a module. The globalThis export is used. The globalThis export can also be used with variables.

// Global variables
var light_name = "custom_light";
var dark_name = "custom_dark";
var thirdOrderBrowserArray = [];
globalThis.thirdOrderBrowserArray = thirdOrderBrowserArray;

// Function to switch between light and dark mode
// The function should be called within a button
function themeModeSwitcher() {
  // If theme is dark, switch to light
  // If theme is light, switch to dark
  // Default theme is "light"
  // It implements the continuity of the theme between pages, using sessionStorage
  // Fallback is implemented if sessionStorage is not supported by the browser

  // Checks if the "sessionStorage" object is supported by the browser
  if (typeof (Storage) !== "undefined") {
    if (sessionStorage.theme) {
      if (sessionStorage.theme == light_name) {
        toggleDarkMode();
      } else {
        toggleLightMode();
      }
    } else {
      sessionStorage.theme = light_name;
      toggleDarkMode();
    }
  } else {
    // Continuity won't work
    if (themeModeSwitcher.theme !== "undefined") {
      if (themeModeSwitcher.theme == light_name) {
        toggleDarkMode();
      } else {
        toggleLightMode();
      }
    } else {
      themeModeSwitcher.theme = light_name;
      toggleDarkMode();
    }
  }
}
globalThis.themeModeSwitcher = themeModeSwitcher;

function toggleDarkMode() {
  document.getElementById("lightdarkSwitcherButton").innerHTML = "<i class=\"fa-solid fa-sun fa-3x\"></i>";

  // Checks if the "sessionStorage" object is supported by the browser
  if (typeof (Storage) !== "undefined") {
    sessionStorage.theme = dark_name;
    jtd.setTheme(sessionStorage.theme);
  } else {
    // Continuity won't work
    themeModeSwitcher.theme = dark_name;
    jtd.setTheme(themeModeSwitcher.theme);
  }
}
globalThis.toggleDarkMode = toggleDarkMode;

function toggleLightMode() {
  document.getElementById("lightdarkSwitcherButton").innerHTML = "<i class=\"fa-solid fa-moon fa-3x\"></i>";

  // Checks if the "sessionStorage" object is supported by the browser
  if (typeof (Storage) !== "undefined") {
    sessionStorage.theme = light_name;
    jtd.setTheme(sessionStorage.theme);
  } else {
    // Continuity won't work
    themeModeSwitcher.theme = light_name;
    jtd.setTheme(themeModeSwitcher.theme);
  }
}
globalThis.toggleLightMode = toggleLightMode;

function retrieveTheme() {
  // Checks if the "sessionStorage" object is supported by the browser
  if (typeof (Storage) !== "undefined") {
    if (sessionStorage.theme) {
      if (sessionStorage.theme == light_name) {
        toggleLightMode();
      } else {
        toggleDarkMode();
      }
    }
  } else {
    // Continuity won't work
    if (themeModeSwitcher.theme !== "undefined") {
      if (themeModeSwitcher.theme == light_name) {
        toggleLightMode();
      } else {
        toggleDarkMode();
      }
    }
  }
}
globalThis.retrieveTheme = retrieveTheme;

function appendToThirdOrderBrowserArray(string) {
  thirdOrderBrowserArray.push(string);
}
globalThis.appendToThirdOrderBrowserArray = appendToThirdOrderBrowserArray;

function injectHMTLToThirdOrderBrowserDiv() {
  var toInject = "<li class=\"aux-nav-list-item\"><a href=\"" + thirdOrderBrowserArray[1] + "\"" + "class=\"site-button\"";
  if (thirdOrderBrowserArray[2] == true) {
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

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
var light_name = "custom_light";
var dark_name = "custom_dark";

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
        toggleDarkMode(true);
      } else {
        toggleLightMode(true);
      }
    } else {
      sessionStorage.theme = light_name;
      toggleDarkMode(true);
    }
  } else {
    // Continuity won't work
    if (themeModeSwitcher.theme !== "undefined") {
      if (themeModeSwitcher.theme == light_name) {
        toggleDarkMode(true);
      } else {
        toggleLightMode(true);
      }
    } else {
      themeModeSwitcher.theme = light_name;
      toggleDarkMode(true);
    }
  }
}
globalThis.themeModeSwitcher = themeModeSwitcher;

// Toggle the dark mode
function toggleDarkMode(injectFlag) {
  if (injectFlag) {
    // Check if element of id "lightdarkSwitcherButton" exists.
    if (document.getElementById("lightdarkSwitcherButton")) {
      document.getElementById("lightdarkSwitcherButton").innerHTML = "<i class=\"fa-solid fa-sun fa-3x\"></i>";
    }
  }

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

// Toggle the light mode
function toggleLightMode(injectFlag) {
  // Check if element of id "lightdarkSwitcherButton" exists.
  if (document.getElementById("lightdarkSwitcherButton")) {
    if (injectFlag) {
      document.getElementById("lightdarkSwitcherButton").innerHTML = "<i class=\"fa-solid fa-moon fa-3x\"></i>";
    }
  }

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

// Retrieve the current theme, if exists
function retrieveTheme() {
  // Checks if the "sessionStorage" object is supported by the browser
  if (typeof (Storage) !== "undefined") {
    if (sessionStorage.theme) {
      if (sessionStorage.theme == light_name) {
        toggleLightMode(false);
      } else {
        toggleDarkMode(false);
      }
    }
  } else {
    // Continuity won't work
    if (themeModeSwitcher.theme !== "undefined") {
      if (themeModeSwitcher.theme == light_name) {
        toggleLightMode(false);
      } else {
        toggleDarkMode(false);
      }
    }
  }
}
globalThis.retrieveTheme = retrieveTheme;

// It changes the icon of the button to switch between light and dark mode accordingly to the ALREADY retrieved theme
// It should be called after the function "retrieveTheme()"
function syncRetrieveTheme() {
  // Check if element of id "lightdarkSwitcherButton" exists. If not, return. This is probably due to the not inserted button to switch between light and dark mode: in this case, this is not an error
  if (!document.getElementById("lightdarkSwitcherButton")) {
    return;
  }

  // Checks if the "sessionStorage" object is supported by the browser
  if (typeof (Storage) !== "undefined") {
    if (sessionStorage.theme == dark_name) {
      document.getElementById("lightdarkSwitcherButton").innerHTML = "<i class=\"fa-solid fa-sun fa-3x\"></i>";
    }
    else {
      document.getElementById("lightdarkSwitcherButton").innerHTML = "<i class=\"fa-solid fa-moon fa-3x\"></i>";
    }
  } else {
    if (themeModeSwitcher.theme == dark_name) {
      document.getElementById("lightdarkSwitcherButton").innerHTML = "<i class=\"fa-solid fa-sun fa-3x\"></i>";
    } else {
      document.getElementById("lightdarkSwitcherButton").innerHTML = "<i class=\"fa-solid fa-moon fa-3x\"></i>";
    }
  }
}
globalThis.syncRetrieveTheme = syncRetrieveTheme;

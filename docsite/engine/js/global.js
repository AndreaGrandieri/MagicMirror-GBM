/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////
//                                                             //
//                                                             //
// Andrea Grandieri andreagrandieri.github.io                  //
//                                                             //
//                                                             //
/////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////

// This is a module. The globalThis export is used.

// Global variables
var light_name = "customlight"
var dark_name = "customdark"

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
        toggleDarkMode()
      } else {
        toggleLightMode()
      }
    } else {
      sessionStorage.theme = light_name
      toggleDarkMode()
    }
  } else {
    // Continuity won't work
    if (themeModeSwitcher.theme !== "undefined") {
      if (themeModeSwitcher.theme == light_name) {
        toggleDarkMode()
      } else {
        toggleLightMode()
      }
    } else {
      themeModeSwitcher.theme = light_name
      toggleDarkMode()
    }
  }
}
globalThis.themeModeSwitcher = themeModeSwitcher

function toggleDarkMode() {
  document.getElementById("lightdarkSwitcherButton").innerHTML = "<i class=\"fa-solid fa-sun fa-3x\"></i>"

  // Checks if the "sessionStorage" object is supported by the browser
  if (typeof (Storage) !== "undefined") {
    sessionStorage.theme = dark_name
    jtd.setTheme(sessionStorage.theme)
  } else {
    // Continuity won't work
    themeModeSwitcher.theme = dark_name
    jtd.setTheme(themeModeSwitcher.theme)
  }
}
globalThis.toggleDarkMode = toggleDarkMode

function toggleLightMode() {
  document.getElementById("lightdarkSwitcherButton").innerHTML = "<i class=\"fa-solid fa-moon fa-3x\"></i>"

  // Checks if the "sessionStorage" object is supported by the browser
  if (typeof (Storage) !== "undefined") {
    sessionStorage.theme = light_name
    jtd.setTheme(sessionStorage.theme)
  } else {
    // Continuity won't work
    themeModeSwitcher.theme = light_name
    jtd.setTheme(themeModeSwitcher.theme)
  }
}
globalThis.toggleLightMode = toggleLightMode

function retrieveTheme() {
  // Checks if the "sessionStorage" object is supported by the browser
  if (typeof (Storage) !== "undefined") {
    if (sessionStorage.theme) {
      if (sessionStorage.theme == light_name) {
        toggleLightMode()
      } else {
        toggleDarkMode()
      }
    }
  } else {
    // Continuity won't work
    if (themeModeSwitcher.theme !== "undefined") {
      if (themeModeSwitcher.theme == light_name) {
        toggleLightMode()
      } else {
        toggleDarkMode()
      }
    }
  }
}
globalThis.retrieveTheme = retrieveTheme

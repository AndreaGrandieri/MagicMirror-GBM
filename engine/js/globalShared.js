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

// Here are contained the global variables and functions shared between the different modules (js files).

import { availableLanguagesArray } from "./languageEngine.js";
import * as SimpleMutex from "./SimpleMutex.js";
import * as vars_languageEngine from "./vars_languageEngine.js";

export var engine_fetching_inErrorState = false;

export function toggle_engine_fetching_inErrorState() {
  if (engine_fetching_inErrorState == false) {
    engine_fetching_inErrorState = true;
    act_engine_fetching_inErrorState();
  }
}

export async function act_engine_fetching_inErrorState() {
  // Display on the page a warning message. To be done iff it has not been done yet.

  // Should wait for the language engine to have completed the compilation of "availableLanguagesArray"
  try {
    await SimpleMutex.activeWaitEvent(function () {
      // Return false if "availableLanguagesArray" is null or undefined, otherwise return true
      return (
        availableLanguagesArray != null && availableLanguagesArray != undefined
      );
    }, 250);
  } catch (e) {
    // Internal error not to be broadcasted.
    globalShared.toggle_engine_SimpleMutex_inErrorState();
    return;
  }

  // Retrieve the text based on the current language. The language is stored in "availableLanguagesArray[0]" and the text is stored in "translationDictionaryFor_broadcastTarget_engine_fetching_inErrorState[availableLanguagesArray[0]]"
  var toInject =
    "<blockquote class='warning'> <p>" +
    vars_languageEngine
      .translationDictionaryFor_broadcastTarget_engine_fetching_inErrorState[
      availableLanguagesArray[0]
    ] +
    "</p> </blockquote><br>";

  // Inject in div with id="broadcastTarget_engine_fetching_inErrorState"
  document.getElementById(
    "broadcastTarget_engine_fetching_inErrorState"
  ).innerHTML = toInject;
}

export var engine_SimpleMutex_inErrorState = false;

export function toggle_engine_SimpleMutex_inErrorState() {
  if (engine_SimpleMutex_inErrorState == false) {
    engine_SimpleMutex_inErrorState = true;
    act_engine_SimpleMutex_inErrorState();
  }
}

export function act_engine_SimpleMutex_inErrorState() {
  // Nothing to do (for now)
  return;
}

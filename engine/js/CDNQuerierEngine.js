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

import * as globalShared from "./globalShared.js";
import * as SimpleMutex from "./SimpleMutex.js";
import * as vars_CDNQuerierEngine from "./vars_CDNQuerierEngine.js";

// Lo scopo di questa funzione è quello di interrogare l'url specificato e, se la risposta è valida, chiamare la funzione callback con la risposta come parametro. La funzione non sarà pubblica "globalThis.queryCDN = queryCDN;" per questioni di sicurezza.
export function queryCDN(url, callback) {
  return new Promise((resolve, reject) => {
    // Query the CDN at the given URL. Expect the URL to point to a JSON file.
    // When the query is complete, call the callback function with the JSON
    // object as the argument.
    try {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", url, true);
      xhr.onreadystatechange = function () {
        try {
          if (xhr.readyState == 4) {
            var data = JSON.parse(xhr.responseText);
            callback(data);

            resolve();
            return;
          }
        } catch (e) {
          // Error. Handling:
          reject(e);
          return;
        }
      };
      xhr.send();
    } catch (e) {
      // Error. Handling:
      reject(e);
      return;
    }
  });
}

export function queryCDNOnlyHTTPResponseCode(url, callback) {
  // Just like the "queryCDN" function, but it only returns the HTTP response code
  return new Promise((resolve, reject) => {
    // Query the CDN at the given URL. Expect the URL to point to a JSON file.
    // When the query is complete, call the callback function with the JSON
    // object as the argument.
    try {
      var xhr = new XMLHttpRequest();
      xhr.open("GET", url, true);
      xhr.onreadystatechange = function () {
        try {
          if (xhr.readyState == 4) {
            callback(xhr.status);

            resolve();
            return;
          }
        } catch (e) {
          // Error. Handling:
          reject(e);
          return;
        }
      };
      xhr.send();
    } catch (e) {
      // Error. Handling:
      reject(e);
      return;
    }
  });
}

// Declare am empty dictionary
var labels_states_map = null;

// Compiles the "labels_states_map" variable
// Exception handling: OK
function queryCDN_map_labels_states() {
  return new Promise(async (resolve, reject) => {
    if (labels_states_map != null || labels_states_map != undefined) {
      // Querying the CDN is not necessary
      resolve();
      return;
    }

    // Iterate over the "glob_cdnProfile_map_labels_states" variable and work on each URL
    for (
      var i = 0;
      i < vars_CDNQuerierEngine.glob_cdnProfile_map_labels_states.length;
      i++
    ) {
      var url = vars_CDNQuerierEngine.glob_cdnProfile_map_labels_states[i];

      // Callback
      function callback(response) {
        // Check if the "labels_states_map" variable is null or undefined. In that case, initialize it to be an array
        if (labels_states_map == null || labels_states_map == undefined) {
          labels_states_map = [];
        }

        // Append the "response" to the "labels_states_map" variable
        labels_states_map = labels_states_map.concat(response);
      }

      // Query the CDN. Manage a possible exception
      try {
        await queryCDN(url, callback);
      } catch (e) {
        // Error. Handling:
        globalShared.toggle_engine_fetching_inErrorState();
        reject(e);
        return;
      }
    }

    resolve();
    return;
  });
}

// labels_states
var labels_states = null;

// Compiles the "labels_states" variable
// Exception handling: OK
function queryCDN_labels_states() {
  return new Promise(async (resolve, reject) => {
    if (labels_states != null || labels_states != undefined) {
      // Querying the CDN is not necessary
      resolve();
      return;
    }

    // Iterate over the "glob_cdnProfile_labels_states" variable and work on each URL
    for (
      var i = 0;
      i < vars_CDNQuerierEngine.glob_cdnProfile_labels_states.length;
      i++
    ) {
      var url = vars_CDNQuerierEngine.glob_cdnProfile_labels_states[i];

      // Callback
      function callback(response) {
        // Check if the "labels_states" variable is null or undefined. In that case, initialize it to be an array
        if (labels_states == null || labels_states == undefined) {
          labels_states = [];
        }

        // Append the "labels_states" the "response"
        labels_states = labels_states.concat(response);
      }

      // Query the CDN
      try {
        await queryCDN(url, callback);
      } catch (e) {
        // Error. Handling:
        globalShared.toggle_engine_fetching_inErrorState();
        reject(e);
        return;
      }
    }

    resolve();
    return;
  });
}

// Map the "labels_states" variable to the "labels_states_map" variable
function mapStateToHTMLContent_labels(state) {
  // Check if the "labels_states_map" variable is null or undefined
  if (labels_states_map == null || labels_states_map == undefined) {
    // The CDN with the required informations should have alredy been queried. Thus, there's something wrong. Filling won't be performed.
    return;
  }

  // Note the structure of the "labels_states_map" variable: an array of objects; each object has the following structure:
  /*
  {
    "labels": [
        {
            "state": "",
            "htmlContent": ""
        }
    ]
  }
  */

  // Retrive the "htmlContent" from the "labels_states_map" variable based on the "state" parameter
  var htmlContent = null;
  for (var i = 0; i < labels_states_map.length; i++) {
    var labels = labels_states_map[i].labels;
    for (var j = 0; j < labels.length; j++) {
      if (labels[j].state == state) {
        htmlContent = labels[j].htmlContent;
        break;
      }
    }
  }

  return htmlContent;
}

// Given the "id" of a "<div></div>", it will inject in that "<div></div>" the corresponding label with its textual content. To be called foreach label with "<script></script>" in the HTML (aka: MD) file.
function fill_labels_state(id) {
  // Check if the "labels_states_map" variable and the variable "labels_states" is null or undefined
  if (
    labels_states_map == null ||
    labels_states_map == undefined ||
    labels_states == null ||
    labels_states == undefined
  ) {
    // The CDN with the required informations should have alredy been queried. Thus, there's something wrong. Filling won't be performed.
    return;
  }

  // Note the structure of the "labels_states" variable: an array of objects; each object has the following structure:
  /*
  {
      "labels": [
          {
              "id": "",
              "description": "",
              "state": "",
              "content": ""
          }
      ]
  }
  */

  // Retrive the "state" from the "labels_states" variable based on the "id" parameter
  var state = null;
  for (var i = 0; i < labels_states.length; i++) {
    var labels = labels_states[i].labels;
    for (var j = 0; j < labels.length; j++) {
      if (labels[j].id == id) {
        state = labels[j].state;
        break;
      }
    }
  }

  // Retrive the "htmlContent" from the "labels_states_map" variable based on the "state" parameter
  var htmlContent = mapStateToHTMLContent_labels(state);

  // Retrive the "content" from the "labels_states" variable based on the "id" parameter
  var content = null;
  for (var i = 0; i < labels_states.length; i++) {
    var labels = labels_states[i].labels;
    for (var j = 0; j < labels.length; j++) {
      if (labels[j].id == id) {
        content = labels[j].content;
        break;
      }
    }
  }

  // The "htmlContent" is of type: "<p 'some other stuff'></p>": put the "content" inside the "<p 'some other stuff'></p>"
  htmlContent = htmlContent.replace("></p>", ">" + content + "</p>");

  var elms = document.querySelectorAll(`[id=${id}]`);

  // Iterate over the elements with the given "id"
  for (var i = 0; i < elms.length; i++) {
    // Check if the "<div></div>" is "filled". To do this, check its "filled" attribute
    var filled = elms[i].getAttribute("filled");

    // If the "<div></div>" is not "filled", fill it
    if (filled == null || filled == undefined || filled == "false") {
      // Inject the "htmlContent" beforebegin the "<div></div>" element. The "<div></div>" will remain empty, but that's not a problem.
      elms[i].insertAdjacentHTML("beforebegin", htmlContent);

      // Tag the "<div></div>" as "filled"
      elms[i].setAttribute("filled", "true");
    }
  }
}

// Using a "mutex" approach.
/*
The mutex is needed to avoid parallel invocations of this function, that will lead to the parallel execution of "queryCDN_map_labels_states" and "queryCDN_labels_states"; this will probably cause a race condition where the CDN profiles get hit multiple times: this must not happen. A mutex solves this, by allowing only one execution of the function at a time: the other invocations will be blocked until the first one is completed.

Note: JavaScript is single-threaded, but funtions (same and different) called with multiple <script></script> tags in HTML can be executed in parallel!!!
*/
// Exception handling: OK
async function selfsustainable_fill_labels_state(id) {
  // Acquire the mutex
  try {
    await SimpleMutex.acquire(
      SimpleMutex.selfsustainable_fill_labels_state_mutex,
      250
    );
  } catch (e) {
    // Internal error not to be broadcasted.
    globalShared.toggle_engine_SimpleMutex_inErrorState();
    return;
  }

  try {
    // Critical section
    await queryCDN_map_labels_states();
    await queryCDN_labels_states();
    fill_labels_state(id);
  } catch (e) {
    // Error. Handling:
    globalShared.toggle_engine_fetching_inErrorState();
    return;
  }

  // Release the mutex
  SimpleMutex.release(SimpleMutex.selfsustainable_fill_labels_state_mutex);
}
globalThis.selfsustainable_fill_labels_state =
  selfsustainable_fill_labels_state;

import * as CDNQuerierEngine from "./CDNQuerierEngine.js";
import * as globalShared from "./globalShared.js";
import * as vars_languageEngine from "./vars_languageEngine.js";

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
// All in the code below, if "availableLanguagesArray" being null or undefined is not checked, it is because it is guaranteed it will exist (assumed YAML variables are being used correctly!!! Bad management of YAML variables is not handled)
// After successful compilation, availableLanguagesArray[0] is the current language of the page
export var availableLanguagesArray = null;
var disambiguationLang = null;

// Function to go the same page with a different language
function changeLanguage(currentLanguage, newLanguage) {
  // Surround the currentLanguage with "/"
  currentLanguage = "/" + currentLanguage + "/";

  // Surround the newLanguage with "/"
  newLanguage = "/" + newLanguage + "/";

  // currentLanguage is in the following format: "/langauge/"
  // newLanguage is in the following format: "/language/"
  // In the current web page URL replace the current language with the new one
  // This reloads the page with the new URL
  window.location.href = window.location.href.replace(
    currentLanguage,
    newLanguage
  );
}
globalThis.changeLanguage = changeLanguage;

function antiDisambigURL(toAppend) {
  // Get the current URL and append "toAppend" to it. Then set this new URL as the current URL
  window.location.href = window.location.href + toAppend;
}

// We should have access to the variable "availableLanguagesArray"
function compileDropdownLanguageChoicer() {
  // The "availableLanguagesArray" is an array containing the languages available for the current page. With these languages (that are strings) compile the elements of the dropdown menu with id: "dropdownLanguageChoicer".
  var toInject = "";

  for (var i = 0; i < availableLanguagesArray.length; i++) {
    var currentLanguage = availableLanguagesArray[0];

    // Highlight the current language
    if (i == 0) {
      // // toInject += `<a class="active" href='javascript:changeLanguage("${currentLanguage}", "${availableLanguagesArray[i]}");'>` + mappingDictionaryForLanguages[availableLanguagesArray[i]] + "</a>";

      toInject +=
        `<li class="nav-list-item"><a class="nav-list-link active" href='javascript:changeLanguage("${currentLanguage}", "${availableLanguagesArray[i]}");'>` +
        vars_languageEngine.mappingDictionaryForLanguages[
          availableLanguagesArray[i]
        ] +
        "</a></li>";

      continue;
    }

    // Check if availableLanguagesArray[i] is not null or undefined
    if (availableLanguagesArray[i]) {
      // // toInject += `<a href='javascript:changeLanguage("${currentLanguage}", "${availableLanguagesArray[i]}");'>` + mappingDictionaryForLanguages[availableLanguagesArray[i]] + "</a>";

      toInject +=
        `<li class="nav-list-item "><a class="nav-list-link" href='javascript:changeLanguage("${currentLanguage}", "${availableLanguagesArray[i]}");'>` +
        vars_languageEngine.mappingDictionaryForLanguages[
          availableLanguagesArray[i]
        ] +
        "</a></li>";
    }
  }

  document.getElementById("dropdown-content").innerHTML = toInject;
}
globalThis.compileDropdownLanguageChoicer = compileDropdownLanguageChoicer;

function assignVariable_availableLanguagesArray(content) {
  availableLanguagesArray = content;
}
globalThis.assignVariable_availableLanguagesArray =
  assignVariable_availableLanguagesArray;

function assignVariable_disambiguationLang(content) {
  disambiguationLang = content;
}
globalThis.assignVariable_disambiguationLang =
  assignVariable_disambiguationLang;

function handleDisambiguationPage() {
  // A disambiguation page is detected if it is not placed in a language directory. These pages SHOULD REALLY BE disambiguation pages, that is pages that are bare and should redirect to the correct page with a well-defined language. The language should be deduced by previous well-defined language pages; if a deduction is not possible, fallback to a default language.

  // Now disambiguation lang should be set
  antiDisambigURL(disambiguationLang + "/");
}

function isDisambiguationPage() {
  // The 404 page is not a disambiguation page
  // Check if it doesn't exist a div with id "compile_universal404_target"
  if (document.getElementById("compile_universal404_target") == null) {
    // Test the URL of the page to check if it is a disambiguation page: it is a disambiguation page if "/language/" is not present in the URL, with "language" iterating over the keys of the "mappingDictionaryForLanguages" object
    for (var key in vars_languageEngine.mappingDictionaryForLanguages) {
      if (window.location.href.indexOf("/" + key + "/") > -1) {
        return false;
      }
    }

    return true;
  }

  return false;
}
globalThis.isDisambiguationPage = isDisambiguationPage;

function syncLanguage() {
  // Checks if the "sessionStorage" object is supported by the browser
  if (typeof Storage !== "undefined") {
    if (sessionStorage.lang == null || sessionStorage.lang == undefined) {
      handleDisambiguationPage();
    } else {
      if (disambiguationPageTestCompatibility()) {
        // Vai alla pagina corretta in base all'ultimo linguaggio usato
        antiDisambigURL(sessionStorage.lang + "/");
      } else {
        handleDisambiguationPage();
      }
    }
  } else {
    if (syncLanguage.lang == null || syncLanguage.lang == undefined) {
      handleDisambiguationPage();
    } else {
      if (disambiguationPageTestCompatibility()) {
        // Vai alla pagina corretta in base all'ultimo linguaggio usato
        antiDisambigURL(syncLanguage.lang + "/");
      } else {
        handleDisambiguationPage();
      }
    }
  }
}
globalThis.syncLanguage = syncLanguage;

function setLastUsedLanguage() {
  // Checks if the "sessionStorage" object is supported by the browser
  if (typeof Storage !== "undefined") {
    sessionStorage.lang = availableLanguagesArray[0];
  } else {
    syncLanguage.lang = availableLanguagesArray[0];
  }
}
globalThis.setLastUsedLanguage = setLastUsedLanguage;

function disambiguationPageTestCompatibility() {
  // Check if "availableLanguagesArray" is null or undefined
  if (availableLanguagesArray == null || availableLanguagesArray == undefined) {
    return false;
  }

  // Checks if the "sessionStorage" object is supported by the browser
  if (typeof Storage !== "undefined") {
    // Check that "sessionStorage.lang" is in the array "availableLanguagesArray"
    if (availableLanguagesArray.indexOf(sessionStorage.lang) > -1) {
      // The language is supported
      return true;
    } else {
      // The language is not supported
      return false;
    }
  } else {
    // Check that "syncLanguage.lang" is in the array "availableLanguagesArray"
    if (availableLanguagesArray.indexOf(syncLanguage.lang) > -1) {
      // The language is supported
      return true;
    } else {
      // The language is not supported
      return false;
    }
  }
}

function compileLINGUA() {
  var currentLanguage = availableLanguagesArray[0];

  // Get the translation of the word "Lingua" in the current language
  var linguaTranslation =
    vars_languageEngine.translationDictionaryForLINGUA[currentLanguage];

  // Inject "linguaTranslation" into the element with id "idForInjection"
  document.getElementById("LINGUA").innerHTML = linguaTranslation;
}
globalThis.compileLINGUA = compileLINGUA;

var supportedLanguages_poweredbyahref = [];

// Exception Handling: OK
async function compile_poweredbyahref() {
  // <a href="https://andreagrandieri.github.io/pages/grn-deploy-webstatic">More here info.</a>

  // Retrieve the current language
  var currentLanguage = availableLanguagesArray[0];

  var referenceLink = "";

  // Check if the current language is supported by the reference link. To do this, a CDN link stored in the following variable is queried.
  try {
    await CDNQuerierEngine.queryCDN(
      vars_languageEngine.linkToQuery,
      function (response) {
        // The response is a JSON of this form:
        // {
        //  "supportedLanguages": []
        // }

        // Parse the response, saving the supported languages in the variable "supportedLanguages_poweredbyahref". The response is already in JSON format
        supportedLanguages_poweredbyahref = response.supportedLanguages;
      }
    );
  } catch (e) {
    // Error. Handling:
    globalShared.toggle_engine_fetching_inErrorState();
    return;
  }

  // Check if the currentLanguage is in the array "supportedLanguages_poweredbyahref"
  if (supportedLanguages_poweredbyahref.indexOf(currentLanguage) > -1) {
    // Supported
    // The reference link is stored in the variable: "vars_languageEngine.referenceLink". The current language is already stored in the variable "currentLanguage". Put the value of "currentLanguage" after "pages/" in the variable "vars_languageEngine.referenceLink" and save the result in the variable "referenceLink".
    referenceLink = vars_languageEngine.referenceLink.replace(
      "pages/",
      "pages/" + currentLanguage + "/"
    );
  } else {
    // Not supported
    // Fall back to the default language. Check the variable "vars_languageEngine.defaultReferenceLink_poweredbyahref"
    referenceLink = vars_languageEngine.defaultReferenceLink_poweredbyahref;
  }

  // Inject the reference link
  document.getElementById("powered-by-a-href").innerHTML =
    '<a href="' + referenceLink + '">More here info.</a>';
}
globalThis.compile_poweredbyahref = compile_poweredbyahref;

var exists_in = [];
var erroneus = null;

/*
Scopo della funzione: una volta raggiunta la pagina 404 (della propria lingua se disponibile o della lingua di default), questa funzione entra in gioco presentando nella pagina 404 una tabella contenente la lista di tutte le lingue disponibili per la pagina richiesta che ha causato il raggiungimento della pagina 404. Questa tabella deve solo e solamente entrare in gioco quando la pagina 404 viene raggiunta a causa della richiesta di una pagina VALIDA ma che non esiste nella lingua richiesta.
*/
// Exception Handling: OK
function universal404() {
  return new Promise(async (resolve, reject) => {
    // Get the current page URL
    var currentPageURL = window.location.href;

    /*
    Metodo utilizzato: si interrogano tutte le possibili combinazioni di URL partendo, come base, dall'URL che ha portato alla pagina 404. A questo URL si sostituisce la lingua erroneamente specificata con tutte le lingue presenti nell'array "vars_languageEngine.mappingDictionaryForLanguages"; questo array contiene tutte le lingue utilizzate (almeno una volta in qualsiasi collocamento possibile) nel sito.

    1. L'interrogazione è sicura: non si può in alcun modo ottenere un URL che punti esternamente al dominio del sito: ergo, si rimane sempre nel dominio del sito che è considerato sicuro. NON vi possono essere casi di interrogazione di URL di siti esterni e potenzialmente pericolosi (soprattutto se vengono generati URL strani con manipolazioni di stringhe!).

    2. L'interrogazione non è troppo invasiva: non vi è il rischio concreto di un "autoDOS", in quanto ci si aspetta che l'array "vars_languageEngine.mappingDictionaryForLanguages" sia piuttosto contenuto in termini di elementi; inoltre, la pagina 404 non dovrebbe essere una pagina raggiunta troppe volte.
    */

    var lang = null;

    // Normalization step
    // If multiple "/" are found anywhere in "currentPageURL", replace them with a single "/"
    currentPageURL = currentPageURL.replace(/\/+/g, "/");

    // Check the type of URL
    if (currentPageURL.indexOf("/pages/") > -1) {
      // Type 1
      // URL of type: "https:/DOMAIN/BASEURL/pages/lang/POST"

      // Split the URL using "/" as the delimiter
      var urlParts = currentPageURL.split("/");

      // Check if "baseurl" is empty
      if (vars_languageEngine.baseurl == "") {
        // If "baseurl" is empty, then the URL is of type: "https:/DOMAIN/pages/lang/POST". "lang" is guaranteed to be in the 3 position of the array.
        lang = [3, urlParts[3], urlParts[4] != undefined];
      } else {
        // If "baseurl" is not empty, then the URL is of type: "https:/DOMAIN/BASEURL/pages/lang/POST". "lang" is guaranteed to be in the 4 position of the array.
        lang = [4, urlParts[4], urlParts[5] != undefined];
      }
    } else {
      // Type 2
      // URL of type: "https:/DOMAIN/BASEURL/lang/POST"

      // Split the URL using "/" as the delimiter
      var urlParts = currentPageURL.split("/");

      // Check if "baseurl" is empty
      if (vars_languageEngine.baseurl == "") {
        // If "baseurl" is empty, then the URL is of type: "https:/DOMAIN/lang/POST". "lang" is guaranteed to be in the 2 position of the array.
        lang = [2, urlParts[2], urlParts[3] != undefined];
      } else {
        // If "baseurl" is not empty, then the URL is of type: "https:/DOMAIN/BASEURL/lang/POST". "lang" is guaranteed to be in the 3 position of the array.
        lang = [3, urlParts[3], urlParts[4] != undefined];
      }
    }

    // Check if "lang[1]" is not null or undefined
    if (lang[1]) {
      erroneus = lang[1];

      for (var language in vars_languageEngine.mappingDictionaryForLanguages) {
        var response_out = null;
        currentPageURL = window.location.href;


        // CRITICAL to ensure point 1 of (*)
        // Check if "lang[2]" is false. This means "lang" is the ending of the URL
        if (!lang[2]) {
          // Check if "currentPageURL" ends with "/". If not, add it
          if (currentPageURL[currentPageURL.length - 1] != "/") {
            currentPageURL += "/";
          }
        }

        // Note (really important note!):
        /*
        1. The URL must not be "the language itself" (la sigla!)
        2. If the same pattern "/lang/" appears in the URL more than once, the first apparence will be treated as the language specification. Be sure to manage your directories well!
        3. The folder "pages" should only appear once in the intended way. Do not use "pages" as the name of a "personal folder" you are using in your website! 
        */
        var newURL = currentPageURL.replace(
          "/" + lang[1] + "/",
          "/" + language + "/"
        );

        // Query the new URL expecting a 200 response
        try {
        await CDNQuerierEngine.queryCDNOnlyHTTPResponseCode(
          newURL,
          function (response) {
            response_out = response;
          }
        );
        } catch (e) {
          // Error. Handling:
          globalShared.toggle_engine_fetching_inErrorState();
          reject(e);    
          return;    
        }

        // Check the response
        if (response_out == 200) {
          exists_in.push([language, newURL]);
        }
      }
    }

    resolve();
    return;
  });
}

// Exception Handling: OK
async function compile_universal404() {
  // Check if exists a div with id "compile_universal404_target"
  if (document.getElementById("compile_universal404_target") != null) {
    // Compile "exists_in" calling the function "universal404"
    // Note that "universal404" returns a "Promise": if not called with the "await" keyword, there won't be waiting for the function to complete its execution: I may work on an unfinished version of "exists_in" array!
    try {
      await universal404();
    } catch (e) {
      // Error. Handling:
      globalShared.toggle_engine_fetching_inErrorState();
      return;
    }

    // Now "exists_in" contains the list of languages in which the page exists. Compile the table.
    if (exists_in.length > 0) {
      var toInject =
        "Supposing you requested the page in the following unavailable language: <code class='language-plaintext highlighter-rouge'>" +
        erroneus +
        "</code>, you can find the page in the following languages:<br>";

      // Table header. These use CSS schemas from the theme
      toInject +=
        "<div class='table-wrapper'><table><thead><tr><th>Language</th><th>Link</th></tr></thead><tbody>";

      // Traverse the array "exists_in" and compile "toInject"
      for (var i = 0; i < exists_in.length; i++) {
        // Add a row. In the language section, add the language name. In the link section, add a link to the page
        toInject +=
          "<tr><td>" +
          vars_languageEngine.mappingDictionaryForLanguages[exists_in[i][0]] +
          "</td>";
        toInject +=
          "<td><a class='btn' href=\"" +
          exists_in[i][1] +
          '">' +
          "Go" +
          "</a></td></tr>";
      }

      // Close the table
      toInject += "</tbody></table></div>";

      // Inject "toInject" into the corresponding element
      document.getElementById("compile_universal404_target").innerHTML =
        toInject;
    }

    // Flush the array "exists_in". This way, manually recalling the function "compile_universal404" will not cause the table to be compiled again presenting duplicates.
    exists_in = [];
  }
}
globalThis.compile_universal404 = compile_universal404;

// Reload the current page
function reloadPage() {
  window.location.reload();
}
globalThis.reloadPage = reloadPage;

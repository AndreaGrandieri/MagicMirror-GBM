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

import * as CDNQuerierEngine from "./CDNQuerierEngine.js";
import * as globalShared from "./globalShared.js";
import { availableLanguagesArray } from "./languageEngine.js";
import * as SimpleMutex from "./SimpleMutex.js";
import { baseurl } from "./vars_languageEngine.js";
import * as vars_universalBroadcast from "./vars_universalBroadcast.js";

// News are in the following format:
/*
{
    "news": [
        {
            "validityURL": "",
            "birthday": "",
            "TTL": "",
            "callout_level": "",
            "title": "",
            "content": "",
            "lang": [],
            "perfectMatch": true
        }
    ]
}
*/

// News schema is in the following format:
/*
{
    "callout_levels": [
        {
            "callout_level": "",
            "content": ""
        }
    ]
}
*/

var newsObj = null;
var newsSchema = null;

// Query the CDN for news to be broadcasted
async function getNewsFromCDN() {
  // Check if "news" is not null or undefined: if so, the news have already been fetched and there is no need to fetch them again
  if (newsObj == null || newsObj == undefined) {
    try {
      // "queryCDN" uses "JSON.parse" already
      await CDNQuerierEngine.queryCDN(
        vars_universalBroadcast.news,
        function (data) {
          newsObj = data;
        }
      );
    } catch (e) {
      // Error. Handling:
      globalShared.toggle_engine_fetching_inErrorState();
      return;
    }
  }
}

async function getNewsSchemaFromCDN() {
  // Check if "newsSchema" is not null or undefined: if so, the news schema have already been fetched and there is no need to fetch them again
  if (newsSchema == null || newsSchema == undefined) {
    try {
      // "queryCDN" uses "JSON.parse" already
      await CDNQuerierEngine.queryCDN(
        vars_universalBroadcast.newsSchema,
        function (data) {
          newsSchema = data;
        }
      );
    } catch (e) {
      // Error. Handling:
      globalShared.toggle_engine_fetching_inErrorState();
      return;
    }
  }
}

async function compileBroadcastPayload(i) {
  // Parse the date in "birthday". Example format: "1.Jan.2021"
  var date = new Date(newsObj.news[i].birthday);

  // Add to "date" the "TTL"; the "TTL" is in # of hours
  date.setHours(date.getHours() + newsObj.news[i].TTL);

  // Get the current date
  var currentDate = new Date();

  // Check if "date" falls after "currentDate": if so, the news SHOULD NOT be displayed
  if (currentDate <= date) {
    // Get the language of the page
    // Should wait for the language engine to have completed the compilation of "availableLanguagesArray"
    try {
      await SimpleMutex.activeWaitEvent(function () {
        // Return false if "availableLanguagesArray" is null or undefined, otherwise return true
        return (
          availableLanguagesArray != null &&
          availableLanguagesArray != undefined
        );
      }, 250);
    } catch (e) {
      // Internal error not to be broadcasted.
      globalShared.toggle_engine_SimpleMutex_inErrorState();
      throw new Error(e);
    }

    // Check if the language of the page is in the "lang" array of the news: if so, the news SHOULD be displayed. The news should also be displayed if the "lang" array is empty
    if (
      newsObj.news[i].lang.length == 0 ||
      newsObj.news[i].lang.includes(availableLanguagesArray[0])
    ) {
      // News to be displayed
      var toInject = "";

      // From "newsSchema", get the "content" based on "callout_level" from "news"
      for (var j = 0; j < newsSchema.callout_levels.length; j++) {
        if (
          newsSchema.callout_levels[j].callout_level ==
          newsObj.news[i].callout_level
        ) {
          toInject += newsSchema.callout_levels[j].content;
          break;
        }
      }

      // A title is present if "title" is not null or undefined
      if (newsObj.news[i].title != null && newsObj.news[i].title != undefined) {
        // Append the title to "toInject", the close the "p" tag
        toInject += newsObj.news[i].title + "</p>";
      }

      // Open the "p" tag and append the content to "toInject"
      toInject += "<p>" + newsObj.news[i].content + "</p>";

      // Close "blockquote"
      toInject += "</blockquote>";

      return toInject;
    }
  }

  return "";
}

// Broadcast the news
async function broadcastNews() {
  var toInject = "";

  // First of all, get the news and the schema
  // // try {
    await getNewsSchemaFromCDN();
    await getNewsFromCDN();

    // Now, "news" contains all the news to be broadcasted.
    // Traverse all the news following the format above
    for (var i = 0; i < newsObj.news.length; i++) {
      // Check the "validityURL" of the news: the news should only be displayed if "validityURL" matches the current URL of the page

      // Check if the "validityURL" is the current URL of the page, regardless of the presence of ".html" at the end of the URL of the current page
      if (
        newsObj.news[i].validityURL == window.location.href.replace(".html", "")
      ) {
        // Append to "toInject" the result of "compileBroadcastPayload"
        toInject += await compileBroadcastPayload(i);

        continue;
      }

      // Get "perfectMatch" from "news"
      var perfectMatch = newsObj.news[i].perfectMatch;

      if (perfectMatch == false) {
        var origin =
          baseurl != "" && baseurl != null && baseurl != undefined
            ? window.location.origin + ("/" + baseurl)
            : window.location.origin + "";

        // Check the "validityURL" of the news: check if the URL is the base URL of the website.
        // Check if the "validityURL" is a substring of the current URL of the page
        if (origin == newsObj.news[i].validityURL) {
          // Append to "toInject" the result of "compileBroadcastPayload"
          toInject += await compileBroadcastPayload(i);
        }
      }
    }

    if (toInject != "" && toInject != null && toInject != undefined) {
      // Append br tag to "toInject"
      toInject += "<br>";

      // "toInject" is now ready to be injected into the DOM. Inject in the div with id "broadcastTarget_universalBroadcast"
      document.getElementById("broadcastTarget_universalBroadcast").innerHTML =
        toInject;
    }
  // // } catch (e) {
  // //   console.log(e);

  // //   // Error. Handling:
  // //   globalShared.toggle_engine_fetching_inErrorState();
  // //   return;
  // // }
}
globalThis.broadcastNews = broadcastNews;

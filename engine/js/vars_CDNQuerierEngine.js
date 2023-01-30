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

// Variables to be used by "CDNQuerierEngine.js"
export const glob_cdnProfile_map_labels_states = ["https://raw.githubusercontent.com/AndreaGrandieri/andreagrandieri.github.io/cdn/labels_states_map.json"];
export const glob_cdnProfile_labels_states = ["https://raw.githubusercontent.com/AndreaGrandieri/andreagrandieri.github.io/cdn/labels_states.json"];

/*
SAFERY ENSURANCE: make sure you, the website owner, have assigned all the above variables with a valid or even invalid string value (e.g: ""). You must be sure none of the above variables is left undefined or null. This way, there won't be exceptions for encountering non-string values and the CDN profiles won't be able to be redefined: this is critical, otherwise malicious URLs could be injected in the website! So, even if you don't have in plan to use the CDN profiles, do assign all the above variables! Note: invalid assignments will break the "selfsustainable_fill_labels_state" function, if planned to be used.
*/

/*
Questo approcio, in sostituzione all'approcio con la funzione "setCDNProfiles", risolve l'exploit di cui "setCDNProfiles" era affetto: l'exploit della "Clessidra Critica": questo exploit semplicemente descriveva la possibilità di battere sul tempo il primo richiamo della funzione "setCDNProfiles", anche se questo richiamo era collocato nel file "head_custom.html"; questo exploit è soprattutto sfruttabile con connessione lente. Ergo, era in passato possibile definire "glob_cdnProfile_map_labels_states" e "glob_cdnProfile_labels_states" prima della prima invocazione legittima della funzione "setCDNProfiles", andando quindi ad aprire possibilità di iniezione di codice malevolo.
*/

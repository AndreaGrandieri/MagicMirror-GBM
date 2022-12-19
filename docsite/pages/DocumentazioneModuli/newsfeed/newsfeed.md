---
# Specifies the "filament" HTML page to be used. The HTML page must be located in the "_layouts" folder.
# (should always be this)
layout: alwaysnaviffamily

# Page title
# If omitted, the page will not be included in the navbar
title: newsfeed

# Specifies the order of the current page from the point of view of the navbar
# Can have repetition in the numbers, for parent-child hierarchies
nav_order: 3

# Let exclude the page from the navbar
nav_exclude: false

# If this page represents the parent page of a section that, therefore, has children, specify it in the following way
has_children: false

# If this page represents the child page of a section that, therefore, has ONE parent page, specify it in the following way
parent: Documentazione Moduli
grand_parent: MagicMirror-GBM

# If this page is a parent page, a Table Of Contents will be automatically generated containing all related child pages. Use the option below to disable this functionality.
has_toc: false

# If a child page has more children, add again
# # has_children: true

# To the children page(s) add
# # parent: NOME_PAGINA_GENITORE
# # grand_parent: NOME_PAGINA_NONNO__GENITORE_DEL_GENITORE

# Let exclude the page from the search engine (client-side)
search_exclude: false
---

# newsfeed
{: .no_toc }

---

<!-- Table of contents -->
<details open markdown="block">
  <summary>
    Table of contents
  </summary>
  {: .text-delta }
1. TOC
{:toc}
</details>

---

## tl;dr

Questo modulo visualizza i titoli delle notizie in base a un feed RSS.

---

## Config JSON Fragment

```json
{
    "module": "newsfeed",
    "position": "bottom_bar",
    "config": {
        "feeds": [
            {
                "title": "Il Giornale",
                "url": "https://www.ilgiornale.it/feed.xml"
            },
            {
                "title": "Corriere della sera",
                "url": "http://xml2.corriereobjects.it/rss/homepage.xml"
            },
            {
                "title": "La Gazzetta dello Sport",
                "url": "https://www.gazzetta.it/rss/home.xml"
            }
        ],
        "showSourceTitle": true,
        "showPublishDate": true,
        "broadcastNewsFeeds": true,
        "broadcastNewsUpdates": true
    }
}
```

---

## Proprietà (Config Section)

| Proprietà              | Tipo      | Valori                                                                                    | Valore Default                                                                                                     | Inderogabilità | Descrizione                                                                                                                                                                                         |
| ---------------------- | --------- | ----------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------ | -------------- | --------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `feeds`                | `Object`  | `---`                                                                                     | `[{ title: "New York Times", url: "http://www.nytimes.com/services/xml/rss/nyt/HomePage.xml", encoding: "UTF-8"}]` | `REQUIRED`     | Un array di URL da cui prendere le notizie che verrà utilizzato come origine.<br> Si può aggiungere l'opzione `reloadInterval` per impostare un particolare reloadInterval su un feed.              |
| `showSourceTitle`      | `Boolean` | `true`: è attivo. <br> `false`: non è attivo.                                             | `true`                                                                                                             | `OPTIONAL`     | Visualizza il titolo della fonte.                                                                                                                                                                   |
| `showPublishDate`      | `Boolean` | `true`: è attivo. <br> `false`: non è attivo.                                             | `true`                                                                                                             | `OPTIONAL`     | Visualizza la data di pubblicazione di un titolo.                                                                                                                                                   |
| `broadcastNewsFeeds`   | `Boolean` | `true`: utilizza `sendNotification()`. <br> `false`: utilizza `sendSocketNotification()`. | `true`                                                                                                             | `OPTIONAL`     | Offre la possibilità di trasmettere feed di notizie a tutti i moduli.                                                                                                                               |
| `broadcastNewsUpdates` | `Boolean` | `true`: è attivo. <br> `false`: non è attivo.                                             | `true`                                                                                                             | `OPTIONAL`     | Offre la possibilità di trasmettere gli aggiornamenti dei feed di notizie a tutti i moduli.                                                                                                         |
| `showDescription`      | `Boolean` | `true`: è attivo. <br> `false`: non è attivo.                                             | `false`                                                                                                            | `OPTIONAL`     | Permette di visualizzare la descrizione di un articolo.                                                                                                                                             |
| `wrapTitle`            | `Boolean` | `true`: è attivo <br> `false`: non è attivo                                               | `true`                                                                                                             | `OPTIONAL`     | Permette di disporre il titolo dell'articolo su più righe.                                                                                                                                          |
| `wrapDescription`      | `Boolean` | `true`: è attivo <br> `false`: non è attivo                                               | `true`                                                                                                             | `OPTIONAL`     | Permette di disporre la descrizione dell'articolo su più righe.                                                                                                                                     |
| `truncDescription`     | `Boolean` | `true`: è attivo <br> `false`: non è attivo                                               | `true`                                                                                                             | `OPTIONAL`     | Permette di troncare la descrizione.                                                                                                                                                                |
| `lengthDescription`    | `Number`  | `1 - 500`                                                                                 | `400`                                                                                                              | `OPTIONAL`     | Permette di definire la lunghezza delle descrizioni troncate, espressa in numero di caratteri.                                                                                                      |
| `hideLoading`          | `Boolean` | `true`: è attivo <br> `false`: non è attivo                                               | `false`                                                                                                            | `OPTIONAL`     | Permette di nascondere il modulo invece di mostrarne lo stato di caricamento.                                                                                                                       |
| `reloadInterval`       | `Number`  | `1000 - 86400000`                                                                         | `300000 (5 minuti)`                                                                                                | `OPTIONAL`     | Permette di definire, in millisecondi, la frequenza con la quale recuperare il contenuto.                                                                                                           |
| `updateInterval`       | `Number`  | `1000 - 60000`                                                                            | `10000 (10 secondi)`                                                                                               | `OPTIONAL`     | Permette di definire, in millisecondi, la frequenza con la quale visualizzare un nuovo titolo.                                                                                                      |
| `animationSpeed`       | `Number`  | `0 - 5000`                                                                                | `2500 (2.5 secondi)`                                                                                               | `OPTIONAL`     | Permette di definire, in millisecondi, la durata dell'animazione dell'aggiornamento.                                                                                                                |
| `maxNewsItems`         | `Number`  | `0 - ...`                                                                                 | `0`                                                                                                                | `OPTIONAL`     | Permette di definire la quantità totale di notizie da scorrere. (0 per illimitato).                                                                                                                 |
| `ignoreOldItems`       | `Boolean` | `true`: è attivo <br> `false`: non è attivo                                               | `false`                                                                                                            | `OPTIONAL`     | Permette di ignorare le notizie obsolete.                                                                                                                                                           |
| `ignoreOlderThan`      | `Number`  | `1 - ...`                                                                                 | `86400000 (1 giorno)`                                                                                              | `OPTIONAL`     | Permette di definire, in millisceondi, la quantità di tempo che deve trascorrere affinché le notizie vengano considerate obsolete.                                                                  |
| `removeStartTags`      | `String`  | `"title"` <br> `"description"` <br> `"both"`                                              | `---`                                                                                                              | `OPTIONAL`     | Permette la rimozione di tag specificati dall'inizio della descrizione e / o del titolo di un elemento.                                                                                             |
| `startTags`            | `Object`  | `[TAG]` <br> `[TAG1, TAG2,...]`                                                           | `---`                                                                                                              | `OPTIONAL`     | Permette di definire quali tag rimuovere all'inizio dell'elemento del feed.                                                                                                                         |
| `removeEndTags`        | `String`  | `"title"` <br> `"description"` <br> `"both"`                                              | `---`                                                                                                              | `OPTIONAL`     | Permette di rimuovere i tag specificati alla fine della descrizione e / o del titolo di un articolo.                                                                                                |
| `endTags`              | `Object`  | `[TAG]` <br> `[TAG1, TAG2,...]`                                                           | `---`                                                                                                              | `OPTIONAL`     | Permette di definire quali tag rimuovere alla fine dell'elemento del feed.                                                                                                                          |
| `prohibitedWords`      | `Object`  | `[word]` <br> `[word11, word2,...]`                                                       | `---`                                                                                                              | `OPTIONAL`     | Permette di rimuovere un elemento del feed di notizie se una di queste parole si trova ovunque nel titolo, senza distinzione tra maiuscole e minuscole.                                             |
| `scrollLength`         | `Number`  | `1 - 10000`                                                                               | `500`                                                                                                              | `OPTIONAL`     | Permette di scorrere l'intera pagina dell'articolo di notizie di un determinato numero di pixel quando viene ricevuta una notifica `ARTICLE_MORE_DETAILS` e l'articolo completo è già visualizzato. |
| `logFeedWarnings`      | `Boolean` | `true`: è attivo <br> `false`: non è attivo                                               | `false`                                                                                                            | `OPTIONAL`     | Permette di registrare avvisi quando si verifica un errore durante l'analisi di un articolo.                                                                                                        |

La proprietà `feeds` contiene un array con più oggetti. Essi hanno le seguenti proprietà:

| Proprietà  | Tipo     | Valori                                    | Valore Default                                               | Inderogabilità | Descrizione                                                    |
| ---------- | -------- | ----------------------------------------- | ------------------------------------------------------------ | -------------- | -------------------------------------------------------------- |
| `title`    | `String` | `---`                                     | `"New York Times"`                                           | `OPTIONAL`     | Il nome della fonte del feed da visualizzare sopra le notizie. |
| `url`      | `String` | `---`                                     | `"http://www.nytimes.com/services/xml/rss/nyt/HomePage.xml"` | `REQUIRED`     | L'URL del feed utilizzato per i titoli.                        |
| `encoding` | `String` | `"UTF-8"`<br>`"ISO-8859-1"`<br>`"ecc..."` | `"UTF-8"`                                                    | `OPTIONAL`     | La codifica del feed di notizie.                               |

---

## Notifiche

Le notifiche sono uno strumento utilizzato dai moduli per comunicare con:

- L'OS del MagicMirror
- Altri moduli
- Attori umani

| Notifica               | Direzione | Trigger | Payload _(inline js)_                                                                                                                       | Descrizione                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                       |
| ---------------------- | --------- | ------- | ------------------------------------------------------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `ARTICLE_NEXT`         | `IN`      | `---`   | `---`                                                                                                                                       | Mostra il titolo della notizia successiva.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        |
| `ARTICLE_PREVIOUS`     | `IN`      | `---`   | `---`                                                                                                                                       | Mostra il titolo della notizia precedente.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        |
| `ARTICLE_MORE_DETAILS` | `IN`      | `---`   | `---`                                                                                                                                       | 1. Quando viene ricevuto per la prima volta, mostra la descrizione corrispondente del titolo della notizia attualmente visualizzato.<br> Il modulo si aspetta che l'opzione di configurazione `showDescription` sia impostata su `false` (valore predefinito).<br>2. Quando viene ricevuto una seconda volta consecutiva, mostra l'articolo completo in un IFRAME.<br> Ciò richiede che la pagina delle notizie possa essere incorporata in un IFRAME, ad es. non ha l'intestazione della risposta HTTP [X-Frame-Options](https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/X-Frame-Options) impostata ad es. `DENY`. <br> 3. Quando viene ricevuto le successive volte consecutive, ricarica la pagina e scorre verso il basso di pixel pari a `scrollLength` per impaginare l'articolo. |
| `ARTICLE_LESS_DETAILS` | `IN`      | `---`   | `---`                                                                                                                                       | Nasconde il riepilogo o l'articolo completo delle notizie e ne visualizza solo il titolo.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         |
| `ARTICLE_TOGGLE_FULL`  | `IN`      | `---`   | `---`                                                                                                                                       | Attiva / disattiva l'articolo a schermo intero.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   |
| `ARTICLE_INFO_REQUEST` | `IN`      | `---`   | `[{<br>title: "TITOLO_NOTIZIA", fonte: "FONTE_NOTIZIA", data: "DATA_NOTIZIA", descrizione: "DESCRIZIONE_NOTIZIA", url: "URL_NOTIZIA"<br>}]` | Fa sì che il `newsfeed` risponda con la notifica `ARTICLE_INFO_RESPONSE`, il cui payload fornisce il `titolo`, la  `fonte`, la `data`, la `descrizione` e l'`url` della notizia corrente.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         |
| `NEWS_FEED`            | `OUT`     | `---`   | `---`                                                                                                                                       | Condivide l'elenco corrente delle notizie.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        |
| `NEWS_FEED_UPDATE`     | `OUT`     | `---`   | `---`                                                                                                                                       | Condivide l'elenco delle notizie aggiornato.                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                      |

---

## Screenshots

_News Feed Screenshot usando come giornale il "Corriere della sera"._

[![NFScreenshot](../../../assets/newsfeed/NFScreenshot.png)](../../../assets/newsfeed/NFScreenshot.png)

---

## RSS Tutorial
Per aggiungere una sorgente di notizie o News Feed occorre:

1. Cercare su internet la sorgente rss del giornale interessato:
   
    [![ricerca](../../../assets/newsfeed/ricerca.png)](../../../assets/newsfeed/ricerca.png)

2. Selezionare tra i risultati proposti quello più opportuno:

    [![risultati](../../../assets/newsfeed/risultati.png)](../../../assets/newsfeed/risultati.png)

3. La pagina che si aprirà deve essere tipo:

    [![rsss](../../../assets/newsfeed/rsss.png)](../../../assets/newsfeed/rsss.png)

4. Selezionare la voce che più ci interessa ad esempio _Corriere home – tutte le notizie_ (la prima voce della colonna Notizie) e si aprirà una pagina del tipo:
       
    [![rss](../../../assets/newsfeed/rss.png)](../../../assets/newsfeed/rss.png)

5. Copiare l’URL della pagina es: http://xml2.corriereobjects.it/rss/homepage.xml
6. Aggiungere l’URL con relativo nome all’array _feeds_:
   
    [![add](../../../assets/newsfeed/add.png)](../../../assets/newsfeed/add.png)

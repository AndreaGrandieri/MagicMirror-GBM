---
# Front matter of "classic" page

# Theme to use. Resides in the "_layouts" folder.
layout: default

# Page title. If omitted, the page will not be included in the navbar.
title: MMM-Online-State

#################################################################

# Specifies the order of the current page from the point of view of the navbar. Can have repetition in the numbers, for parent-child hierarchies.
nav_order: 12

# Let exclude the page from the navbar
nav_exclude: false

# Let exclude the page from the built-in search engine
search_exclude: false

#################################################################

# Set "true" if this page has childrens, "false" otherwise.
has_children: false

# If this page is some page's child, specify the parent's name, otherwise comment out the option. If this page is some page's grandchild, specify grandparent's name, otherwise comment out the option.
parent: Documentazione Moduli
grand_parent: MagicMirror-GBM

# If this page is a parent page, a Table Of Contents will be automatically generated containing all related child pages. Use the option below to disable this functionality. Should always be set to "false".
has_toc: false

#################################################################

# Specify the current language of this page
lang: it

# Specify all other available languages in which this page is available. If there's no other language in addition to "lang", comment out this option.
# # availableLanguages:
# #   - 
---

# MMM-Online-State
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

Il seguente modulo visualizza lo stato di connessione Internet del MagicMirror.

---

## Config JSON Fragment

```json
{
    "module": "MMM-Online-State",
    "position": "top_right",
    "config": {
        "displaySymbol": true,
        "symbolOnline": "fas fa-globe",
        "symbolOffline": "fas fa-globe",
        "colored": true,
        "colorOnline": "#FFFFFF",
        "colorOffline": "#FF0000"
    }
}
```

---

## Proprietà (Config Section)

| Proprietà       | Tipo      | Valori                                                                                                           | Valore Default | Inderogabilità | Descrizione                                                                       |
| --------------- | --------- | ---------------------------------------------------------------------------------------------------------------- | -------------- | -------------- | --------------------------------------------------------------------------------- |
| `displaySymbol` | `Boolean` | `true`: Visualizzazione stato con simbolo attiva. <br> `false`: Visualizzazione stato con simbolo disattiva.     | `true`         | `OPTIONAL`     | Abilita la visualizzazione dello stato della connessione con un simbolo grafico.  |
| `displayText`   | `Boolean` | `true`: Visualizzazione stato con testo attiva. <br> `false`: Visualizzazione stato con testo disattiva.         | `false`        | `OPTIONAL`     | Abilita la visualizzazione dello stato della connessione con testo.               |
| `symbolOnline`  | `String`  | Visita [http://fontawesome.io/icons/](http://fontawesome.io/icons/) per tutte le opzioni _(utilizza solo free)_. | `"wifi"`       | `OPTIONAL`     | Simbolo da visualizzare per stato della connessione: ONLINE.                      |
| `symbolOffline` | `String`  | Visita [http://fontawesome.io/icons/](http://fontawesome.io/icons/) per tutte le opzioni _(utilizza solo free)_. | `"wifi"`       | `OPTIONAL`     | Simbolo da visualizzare per stato della connessione: OFFLINE.                     |
| `colored`       | `Boolean` | `true`: Visualizzazione simboli colorati attiva. <br> `false`: Visualizzazione simboli colorati disattiva.       | `true`         | `OPTIONAL`     | Abilita la visualizzazione dei simboli in _modo colorato_.                        |
| `colorOnline`   | `String`  | Tonalità di colore espressa in valore esadecimale [https://htmlcolorcodes.com/](https://htmlcolorcodes.com/)     | `"#fff"`       | `OPTIONAL`     | Gestisce il colore del simbolo visualizzato per stato della connessione: ONLINE.  |
| `colorOffline`  | `String`  | Tonalità di colore espressa in valore esadecimale [https://htmlcolorcodes.com/](https://htmlcolorcodes.com/)     | `"red"`        | `OPTIONAL`     | Gestisce il colore del simbolo visualizzato per stato della connessione: OFFLINE. |

---

## Notifiche

Le notifiche sono uno strumento utilizzato dai moduli per comunicare con:

- L'OS del MagicMirror
- Altri moduli
- Attori umani

_Niente da segnalare._

---

## Screenshots

Stato della connessione: `ONLINE`:

[![connection is ok](../../../../assets/MMM-Online-State/connection_is_ok.PNG)](../../../../assets/MMM-Online-State/connection_is_ok.PNG)

Stato della connessione: `OFFLINE`:

[![connection is not ok](../../../../assets/MMM-Online-State/connection_is_not_ok.PNG)](../../../../assets/MMM-Online-State/connection_is_not_ok.PNG)

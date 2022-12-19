---
# Specifies the "filament" HTML page to be used. The HTML page must be located in the "_layouts" folder.
# (should always be this)
layout: alwaysnaviffamily

# Page title
# If omitted, the page will not be included in the navbar
title: MMM-Online-State

# Specifies the order of the current page from the point of view of the navbar
# Can have repetition in the numbers, for parent-child hierarchies
nav_order: 1

# Let exclude the page from the navbar
nav_exclude: false

# If this page represents the parent page of a section that, therefore, has children, specify it in the following way
has_children: false

# If this page represents the child page of a section that, therefore, has ONE parent page, specify it in the following way
# # parent: Namespace

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

![connection is ok](../../../assets/MMM-Online-State/connection_is_ok.PNG)

Stato della connessione: `OFFLINE`:

![connection is not ok](../../../assets/MMM-Online-State/connection_is_not_ok.PNG)

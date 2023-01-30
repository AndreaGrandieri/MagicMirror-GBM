---
# Front matter of "classic" page

# Theme to use. Resides in the "_layouts" folder.
layout: default

# Page title. If omitted, the page will not be included in the navbar.
title: clock

#################################################################

# Specifies the order of the current page from the point of view of the navbar. Can have repetition in the numbers, for parent-child hierarchies.
nav_order: 5

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

# clock
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

Il seguente modulo mostra la data e l'ora correnti.

---

## Config JSON Fragment

```json
{
    "module": "clock",
    "position": "top_left",
    "config": {
        "timeFormat": 24,
        "displaySeconds": true,
        "showDate": true,
        "displayType": "digital",
        "timezone": "Europe/Rome"
    }
}
```

---

## Proprietà (Config Section)

| Proprietà        | Tipo      | Valori                                                                                       | Valore Default        | Inderogabilità | Descrizione                                                         |
| ---------------- | --------- | -------------------------------------------------------------------------------------------- | --------------------- | -------------- | ------------------------------------------------------------------- |
| `timeFormat`     | `Number`  | `12` <br> `24`                                                                               | _`config.timeFormat`_ | `OPTIONAL`     | Formato dell'ora (12 o 24 ore)                                      |
| `displaySeconds` | `Boolean` | `true`: visualizzazione secondi attivato. <br> `false`: visualizzazione secondi disattivato. | `true`                | `OPTIONAL`     | Attiva / disattiva visualizzazione secondi.                         |
| `showDate`       | `Boolean` | `true`: visualizzazione data attivato. <br> `false`: visualizzazione data disattivato.       | `true`                | `OPTIONAL`     | Attiva / disattiva visualizzazione data.                            |
| `displayType`    | `String`  | `"digital"` <br> `"analog"` <br> `"both"`                                                    | `"digital"`           | `OPTIONAL`     | Visualizzazione orario come orologio analogico, digitale o entrambi |
| `timezone`       | `String`  | Qui puoi trovare / cercare tutte le possibili zone: https://momentjs.com/timezone/.          | `---`                 | `REQUIRED`     | Zona di cui mostrare l'ora                                          |

---

## Notifiche

Le notifiche sono uno strumento utilizzato dai moduli per comunicare con:

- L'OS del MagicMirror
- Altri moduli
- Attori umani

| Notifica       | Direzione | Trigger               | Payload _(inline js)_ | Descrizione |
| -------------- | --------- | --------------------- | --------------------- | ----------- |
| `CLOCK_SECOND` | `OUT`     | Ogni secondo passato. | `second_value`        | ---         |
| `CLOCK_MINUTE` | `OUT`     | Ogni munuto passato.  | `minute_value`        | ---         |

---

## Screenshots

Questa è la visualizzazione del modulo in situazione di funzionamento corretto:

[![clock.png](../../../assets/clock/clock.png)](../../../assets/clock/clock.png)

---

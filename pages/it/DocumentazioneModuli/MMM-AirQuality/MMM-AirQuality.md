---
# Front matter of "classic" page

# Theme to use. Resides in the "_layouts" folder.
layout: default

# Page title. If omitted, the page will not be included in the navbar.
title: MMM-AirQuality

#################################################################

# Specifies the order of the current page from the point of view of the navbar. Can have repetition in the numbers, for parent-child hierarchies.
nav_order: 1

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

# MMM-AirQuality
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

Il seguente modulo fornisce dati relativi all'indice di qualità
dell'aria nella zona desiderata specificata.

---

## Config JSON Fragment

```json
{
    "module": "MMM-AirQuality",
    "position": "top_center",
    "config": {
        "location": "milan",
        "lang": "eng",
        "updateInterval": 30,
        "showLocation": true,
        "showIndex": true
    }
}
```

---

## Proprietà (Config Section)

| Proprietà        | Tipo      | Valori                                                                                                                                                                                       | Valore Default | Inderogabilità | Descrizione                                                                         |
| ---------------- | --------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------- | -------------- | ----------------------------------------------------------------------------------- |
| `location`       | `String`  | Qui puoi trovare / cercare tutte le possibili zone: [http://aqicn.org/city/](http://aqicn.org/city/).                                                                                        | `---`          | `REQUIRED`     | Zona da analizzare.                                                                 |
| `lang`           | `String`  | Qui puoi trovare tutte le lingue disponibii: [http://aqicn.org/faq/2015-07-28/air-quality-widget-new-improved-feed/](http://aqicn.org/faq/2015-07-28/air-quality-widget-new-improved-feed/). | `"en"`         | `OPTIONAL`     | Lingua di visualizzazione del modulo.                                               |
| `updateInterval` | `Number`  | Qualsiasi valore `> 0`.                                                                                                                                                                      | `30`           | `OPTIONAL`     | Periodo di aggiornamento dati (in minuti).                                          |
| `showLocation`   | `Boolean` | `true`: Visualizzazione (nome) zona analizzata attiva. <br> `false`: Visualizzazione (nome) zona analizzata disattiva.                                                                       | `true`         | `OPTIONAL`     | Attiva / disattiva la visualizzazione (del nome) della zona analizzata.             |
| `showIndex`      | `Boolean` | `true`: Visualizzazione indice numerico qualità dell'aria attiva. <br> `false`: Visualizzazione indice numerico qualità dell'aria disattiva.                                                 | `true`         | `OPTIONAL`     | Attiva / disattiva la visualizzazione dell'indice numerico della qualità dell'aria. |

---

## Notifiche

Le notifiche sono uno strumento utilizzato dai moduli per comunicare con:

- L'OS del MagicMirror
- Altri moduli
- Attori umani

_Niente da segnalare._

---

## Screenshots

Questa è la visualizzazione del modulo in situazione di funzionamento corretto:

[![MMM-AirQuality_correct_workflow.PNG](../../../../assets/MMM-AirQuality/MMM-AirQuality_correct_workflow.PNG)](../../../../assets/MMM-AirQuality/MMM-AirQuality_correct_workflow.PNG)

Se il modulo rimane sulla seguente schermata, probabilmente la zona da analizzare
specificata __non__ è supportata o è presente un'altra forma di
errore nelle proprietà specificate nel file `config.js`:

[![loading_air_quality_index_hang.PNG](../../../../assets/MMM-AirQuality/loading_air_quality_index_hang.PNG)](../../../../assets/MMM-AirQuality/loading_air_quality_index_hang.PNG)

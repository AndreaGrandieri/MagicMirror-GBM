---
# Specifies the "filament" HTML page to be used. The HTML page must be located in the "_layouts" folder.
# (should always be this)
layout: alwaysnaviffamily

# Page title
# If omitted, the page will not be included in the navbar
title: MMM-AirQuality

# Specifies the order of the current page from the point of view of the navbar
# Can have repetition in the numbers, for parent-child hierarchies
nav_order: 1

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

![MMM-AirQuality_correct_workflow.PNG](../../../assets/MMM-AirQuality/MMM-AirQuality_correct_workflow.PNG)

Se il modulo rimane sulla seguente schermata, probabilmente la zona da analizzare
specificata __non__ è supportata o è presente un'altra forma di
errore nelle proprietà specificate nel file `config.js`:

![loading_air_quality_index_hang.PNG](../../../assets/MMM-AirQuality/loading_air_quality_index_hang.PNG)

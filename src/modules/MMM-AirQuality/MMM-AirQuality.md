# MMM-AirQuality

## tl;dr

Il seguente modulo fornisce dati relativi all'indice di qualità
dell'aria nella zona desiderata specificata.

---

## config.js fragment

```js
{
    module: 'MMM-AirQuality',
    position: 'top_center',
    config: {
        location: 'milan',
        lang: 'eng',
        updateInterval: 30,
        showLocation: true,
        showIndex: true 
    }
}
```

---

## Proprietà (config section)

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

![resources/MMM-AirQuality_correct_workflow.PNG](resources/MMM-AirQuality_correct_workflow.PNG)

Se il modulo rimane sulla seguente schermata, probabilmente la zona da analizzare
specificata __non__ è supportata o è presente un'altra forma di
errore nelle proprietà specificate nel file `config.js`:

![resources/loading_air_quality_index_hang.PNG](resources/loading_air_quality_index_hang.PNG)

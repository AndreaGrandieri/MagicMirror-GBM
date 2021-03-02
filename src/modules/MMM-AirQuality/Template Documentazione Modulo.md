# MMM-AirQuality

## tl;dr

Il seguente modulo fornisce dati relativi all'indice di qualità
dell'aria nella zona desiderata specificata.

---

## config.js fragment

```js
{
    module: 'MMM-AirQuality',
    // you may choose any location
    position: 'top_center',
    config: {
        // the location to check the index for
        location: 'como',
        lang: 'eng',
        updateInterval: '30',
        showLocation: 'true',
        showIndex: 'true' 
    }
}
```

---

## Proprietà (config section)

| Proprietà        | Valori                                                                                                                                                                                       | Valore Default | Inderogabilità | Descrizione                                                                         |
| ---------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | -------------- | -------------- | ----------------------------------------------------------------------------------- |
| `location`       | Qui puoi trovare / cercare tutte le possibili zone: [http://aqicn.org/city/](http://aqicn.org/city/).                                                                                        | `---`          | `REQUIRED`     | Zona da analizzare.                                                                 |
| `lang`           | Qui puoi trovare tutte le lingue disponibii: [http://aqicn.org/faq/2015-07-28/air-quality-widget-new-improved-feed/](http://aqicn.org/faq/2015-07-28/air-quality-widget-new-improved-feed/). | `en`           | `OPTIONAL`     | Lingua di visualizzazione del modulo.                                               |
| `updateInterval` | Qualsiasi valore `> 0`.                                                                                                                                                                      | `30`           | `OPTIONAL`     | Periodo di aggiornamento dati (in minuti).                                          |
| `showLocation`   | `true`: Visualizzazione (nome) zona analizzata attiva. <br> `false`: Visualizzazione (nome) zona analizzata disattiva.                                                                       | `true`         | `OPTIONAL`     | Attiva / disattiva la visualizzazione (del nome) della zona analizzata.             |
| `showIndex`      | `true`: Visualizzazione indice numerico qualità dell'aria attiva. <br> `false`: Visualizzazione indice numerico qualità dell'aria disattiva.                                                 | `true`         | `OPTIONAL`     | Attiva / disattiva la visualizzazione dell'indice numerico della qualità dell'aria. |

---

## Screenshots (se presenti)

_Qui._
__DA AGGIUNGERE__ [https://github.com/AndreaGrandieri/MagicMirror-GBM/issues/84](https://github.com/AndreaGrandieri/MagicMirror-GBM/issues/84).

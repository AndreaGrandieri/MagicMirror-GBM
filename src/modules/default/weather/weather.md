# weather

## tl;dr

Visualizza il meteo per la settimana corrente,
con enfasi per il giorno corrente.

---

## config.js fragment

```js
{
    module: "weather",
    position: "top_right",
    config: {
        weatherProvider: "openweathermap",
        type: "current",
        units: config.units,
        degreeLabel: true,
        updateInterval: 600000,
        lang: config.language,
        initialLoadDelay: 1000,
        onlyTemp: false,
        showHumidity: true,
        showIndoorTemperature: true,
        showIndoorHumidity: true,
        showSun: true,
        colored: true,
        showPrecipitationAmount: true,
        maxNumberOfDays: 5,
        locationID: "",
        apiKey: "YOUR_OPENWEATHERMAP_APIKEY"
    }
}
```

---

## Proprietà (config section)

| Proprietà                 | Tipo      | Valori                                                                                                                       | Valore Default     | Inderogabilità | Descrizione                                                                                                  |
| ------------------------- | --------- | ---------------------------------------------------------------------------------------------------------------------------- | ------------------ | -------------- | ------------------------------------------------------------------------------------------------------------ |
| `weatherProvider`         | `String`  |                                                                                                                              | `"openweathermap"` | `OPTIONAL`     | API.                                                                                                         |
| `type`                    | `String`  |                                                                                                                              | `"current"`        | `OPTIONAL`     |                                                                                                              |
| `units`                   | `String`  |                                                                                                                              | `config.units`     | `OPTIONAL`     | Unità di misura per i gradi.                                                                                 |
| `degreeLabel`             | `Boolean` |                                                                                                                              | `false`            | `OPTIONAL`     | Attiva la visualizzazione dell'unità di misura _(etichetta)_ per i gradi in uso.                             |
| `updateInterval`          | `Number`  |                                                                                                                              | `600000`           | `OPTIONAL`     | Frequenza di aggiornamento / richiesta contenuti aggiornati.                                                 |
| `lang`                    | `String`  |                                                                                                                              | `config.language`  | `OPTIONAL`     | Lingua per la visualizzazione del nome dei giorni della settimana.                                           |
| `initialLoadDelay`        | `Number`  |                                                                                                                              | `0`                | `OPTIONAL`     | Delay di sicurezza prima di avviare il caricamento di questo modulo durante la fase di boot del MagicMirror. |
| `onlyTemp`                | `Boolean` |                                                                                                                              | `false`            | `OPTIONAL`     | Attiva la visualizzazione limitata alla solo temperatura.                                                    |
| `showHumidity`            | `Boolean` |                                                                                                                              | `false`            | `OPTIONAL`     | Attiva la visualizzazione dell'umidità.                                                                      |
| `showIndoorTemperature`   | `Boolean` |                                                                                                                              | `false`            | `OPTIONAL`     | Attiva la visualizzazione della temperatura interna _(locale di collocamento MagicMirror)_.                  |
| `showIndoorHumidity`      | `Boolean` |                                                                                                                              | `false`            | `OPTIONAL`     | Attiva la visualizzazione dell'umidità interna _(locale di collocamento MagicMirror)_.                       |
| `showSun`                 | `Boolean` |                                                                                                                              | `true`             | `OPTIONAL`     | Attiva la visualizzazione dei cicli del Sole (Alba, Tramonto).                                               |
| `colored`                 | `Boolean` |                                                                                                                              | `false`            | `OPTIONAL`     | Attiva la visualizzazione delle temperatura __MIN__ & __MAX__ in tonalità colorata.                          |
| `showPrecipitationAmount` | `Boolean` |                                                                                                                              | `false`            | `OPTIONAL`     | Attiva la visualizzazione della quantità di precipitazioni (neve, pioggia).                                  |
| `maxNumberOfDays`         | `Number`  |                                                                                                                              | `5`                | `OPTIONAL`     | Rappresenta il numero di giorni futuri di cui richiedere le informazioni meteo.                              |
| `locationID`              | `String`  | Visita [https://openweathermap.org/](https://openweathermap.org/) per ottenere l'ID zona _(segui istruzioni sotto)_.         | `---`              | `REQUIRED`     | ID rappresentante univocamente la zona da analizzare per le informazioni meteo.                              |
| `apiKey`                  | `String`  | Visita [https://openweathermap.org/](https://openweathermap.org/) per ottenere la tua API KEY __(ad uso GRATUITO privata)__. | `---`              | `REQUIRED`     |                                                                                                              |

---

## Screenshots

_Qui (se presenti, consigliati)._

---

## \<Altro\>

_Qui altre informazioni, se necessarie. Denominare il paragrafo a dovere._

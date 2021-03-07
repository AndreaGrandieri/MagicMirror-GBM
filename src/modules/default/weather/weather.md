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

| Proprietà                 | Tipo      | Valori | Valore Default     | Inderogabilità | Descrizione |
| ------------------------- | --------- | ------ | ------------------ | -------------- | ----------- |
| `weatherProvider`         | `String`  |        | `"openweathermap"` | `OPTIONAL`     |             |
| `type`                    | `String`  |        | `"current"`        | `OPTIONAL`     |             |
| `units`                   | `String`  |        | `config.units`     | `OPTIONAL`     |             |
| `degreeLabel`             | `Boolean` |        | `false`            | `OPTIONAL`     |             |
| `updateInterval`          | `Number`  |        | `600000`           | `OPTIONAL`     |             |
| `lang`                    | `String`  |        | `config.language`  | `OPTIONAL`     |             |
| `initialLoadDelay`        | `Number`  |        | `0`                | `OPTIONAL`     |             |
| `onlyTemp`                | `Boolean` |        | `false`            | `OPTIONAL`     |             |
| `showHumidity`            | `Boolean` |        | `false`            | `OPTIONAL`     |             |
| `showIndoorTemperature`   | `Boolean` |        | `false`            | `OPTIONAL`     |             |
| `showIndoorHumidity`      | `Boolean` |        | `false`            | `OPTIONAL`     |             |
| `showSun`                 | `Boolean` |        | `true`             | `OPTIONAL`     |             |
| `colored`                 | `Boolean` |        | `false`            | `OPTIONAL`     |             |
| `showPrecipitationAmount` | `Boolean` |        | `false`            | `OPTIONAL`     |             |
| `maxNumberOfDays`         | `Number`  |        | `5`                | `OPTIONAL`     |             |
| `locationID`              | `String`  |        | `---`              | `REQUIRED`     |             |
| `apiKey`                  | `String`  |        | `---`              | `REQUIRED`     |             |

---

## Screenshots

_Qui (se presenti, consigliati)._

---

## \<Altro\>

_Qui altre informazioni, se necessarie. Denominare il paragrafo a dovere._

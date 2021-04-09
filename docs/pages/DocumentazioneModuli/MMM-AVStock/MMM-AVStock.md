# MMM-AVStock

## tl;dr

Visualizza gli aggiornamenti relativi alle quotazioni in borsa.

---

## Config JSON Fragment

```json
{
    "module": "MMM-AVStock",
    "position": "top_left",
    "config": {
        "apiKey": "YOUR_ALPHAVANTAGE_KEY",
        "mode": "table",
        "chartType": "line",
        "symbols": ["AAPL", "GOOGL", "TSLA"],
        "alias": ["APPLE", "GOOGLE", "TESLA"]
    }
}
```

---

## Proprietà (Config Section)

| Proprietà         | Tipo              | Valori                                                                                                                                                               | Valore Default              | Inderogabilità | Descrizione                                                                                                              |
| ----------------- | ----------------- | -------------------------------------------------------------------------------------------------------------------------------------------------------------------- | --------------------------- | -------------- | ------------------------------------------------------------------------------------------------------------------------ |
| `api_key`         | `String`          | Valore valido API KEY.                                                                                                                                               | `---`                       | `REQUIRED`     | La tua API KEY gratuita per l'utilizzo del servizio. _Vedi sotto per maggiori dettagli._                                 |
| `mode`            | `String`          | `"table"` Visualizzazione __table__. <br> `"ticker"` Visualizzazione __ticker__. <br> `"grid"` Visualizzazione __griglia__.                                          | `"table"`                   | `OPTIONAL`     | _Vedi sotto_ per confrontare i diversi aspetti di visualizzazione.                                                       |
| `timeFormat`      | `String`          | Qui sono riportati tutti i valori validi: [https://momentjs.com/](https://momentjs.com/).                                                                            | `"DD-MM HH:mm"`             | `OPTIONAL`     | Formato di visualizzazione del tempo (Data e / o Ora).                                                                   |
| `symbols`         | `Array -> String` | Qui sono riportati tutti i simboli di mercato validi e aggiornati: [https://stockanalysis.com/stocks/](https://stockanalysis.com/stocks/).                           | `["AAPL", "GOOGL", "TSLA"]` | `OPTIONAL`     | Simboli di mercato di cui tenere traccia. __Questa proprietà è parallela alla proprietà `alias`__.                       |
| `alias`           | `Array -> String` | Qualsiasi valore di stringa.                                                                                                                                         | `[]`                        | `OPTIONAL`     | Alias per (sostituire) il _vero_ nome dei simboli di mercato. __Questa proprietà è parallela alla proprietà `symbols`__. |
| `chartType`       | `String`          | `"line"` Visualizzazione __line__ nel grafico. <br> `"candlestick"` Visualizzazione __candlestick__ nel grafico. <br> `"ohlc"` Visualizzazione __OHLC__ nel grafico. | `"line"`                    | `OPTIONAL`     | _Vedi sotto_ per confrontare i diversi aspetti di visualizzazione.                                                       |
| `chartLineColor`  | `String`          | Qualsiasi valore HEX (esadecimale) di colore valido [https://htmlcolorcodes.com/](https://htmlcolorcodes.com/).                                                      | `"#eee"`                    | `OPTIONAL`     | Colore delle linee del grafico.                                                                                          |
| `chartLabelColor` | `String`          | Qualsiasi valore HEX (esadecimale) di colore valido [https://htmlcolorcodes.com/](https://htmlcolorcodes.com/).                                                      | `"#eee"`                    | `OPTIONAL`     | Colore delle etichette del grafico.                                                                                      |
| `coloredCandles`  | `Boolean`         | `true` Attiva la colorazione delle _barre a candele_ o _barre OHLC_. <br> `false` Disattiva la colorazione delle _barre a candele_ o _barre OHLC_.                   | `true`                      | `OPTIONAL`     | Attiva la colorazione delle _barre a candele_ o _barre OHLC_ _(la differenza è dettata dalla proprietà `chartType`)_.    |

---

## Notifiche

Le notifiche sono uno strumento utilizzato dai moduli per comunicare con:

- L'OS del MagicMirror
- Altri moduli
- Attori umani

_Nulla da segnalare._

---

## Screenshots

_Qui (se presenti, consigliati)._

---

## \<Altro\>

_Qui altre informazioni, se necessarie. Denominare il paragrafo a dovere._

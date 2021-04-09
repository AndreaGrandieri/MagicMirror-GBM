# MMM-AVStock
Modulo MagicMirror per la visualizzazione del prezzo delle azioni.

## config.js fragment

```js
{
    module: "MMM-AVStock",
    position: "top_left", //"bottom_bar" is better for `mode:ticker`
    config: {
        apiKey : "",
        timeFormat: "DD-MM HH:mm",
        width: null,
        symbols : ["AAPL", "GOOGL", "TSLA"],
        alias: ["APPLE", "GOOGLE", "TESLA"],
        locale: config.language,
        tickerDuration: 20,
        chartDays: 90,
        maxTableRows: null,
        mode : "table",                  // "table" or "ticker"
        showChart: true,
        pureLine: false,
        chartWidth: null,
        showVolume: true,
        chartInterval: "daily",          // choose from ["intraday", "daily", "weekly", "monthly"]
        movingAverage: {
            type: 'SMA',
            periods: [200]
        },
        decimals : 2,
        chartType: 'line',                // 'line', 'candlestick', or 'ohlc'
        chartLineColor: '#eee',
        chartLabelColor: '#eee',
        coloredCandles: true,
        debug: false
    }
},
```

### modalità con i propri prezzi di acquisto

```js
{
    module: "MMM-AVStock",
    position: "bottom_bar",
    config: {
        apiKey : "",{
        mode : "ticker",
        symbols : ["TL0.F","AMZN","MSFT"],
        alias: ["Tesla","Amazon","Microsoft"],
        purchasePrice: [123.45, 1234.56, 12.34],
        decimals: 0,
        tickerDuration: 20,
        showChart: false,
        showVolume: false,
        showPurchasePrices: true,
        showPerformance2Purchase: true,
    }
},
```
---

## Proprietà (config section)

| Proprietà                  | Tipo      | Valori                                                                                   | Valore Default                   | Inderogabilità                                                                       | Descrizione                                                                                                                                                                                                              |
| -------------------------- | --------- | ---------------------------------------------------------------------------------------- | -------------------------------- | ------------------------------------------------------------------------------------ | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------ |
| `api_key`                  | `String`  | Ottieni l'API Key da qui: <https://www.alphavantage.co/> (max 500 richieste giornaliere) | `''`                             | `REQUIRED`                                                                           | API key per poter utilizzare il modulo                                                                                                                                                                                   |
| `mode`                     | `String`  | `table`, `ticker`, `grid`                                                                | `table`                          | `OPTIONAL`                                                                           | Modalità di visualizzazione                                                                                                                                                                                              |
| `width`                    | `Number`  | Qualsiasi valore intero                                                                  | `null`                           | `OPTIONAL`                                                                           | Imposta la larghezza di ogni elemento del modulo. Se lo mantieni invariato, la larghezza verrà impostata al 100%                                                                                                         |
| `classes`                  | `String`  | `xsmall`, `small`, `bright`, `dimmed` ecc.                                               | `small`                          | `OPTIONAL`                                                                           | Imposta le classi note dalle classi dei moduli                                                                                                                                                                           |
| `direction`                | `String`  | `row`, `column`                                                                          | `row`                            | `OPTIONAL`                                                                           | Puoi impostare `row` o `colonna`. `row` posizionerà il grafico accanto alla tabella / griglia / ticker fino a quando lo spazio disponibile è sufficiente. **Funziona solo con l'opzione `width` impostata su un valore** |
| `timeFormat`               | `String`  | Formati di date                                                                          | `DD-MM HH:mm`                    | `OPTIONAL`                                                                           | Formato della data                                                                                                                                                                                                       |
| `symbols`                  | `array`   | Simboli delle varie azioni                                                               | `["AAPL", "GOOGL", "TSLA"]`      | `REQUIRED`                                                                           | Arrey di azioni symbols                                                                                                                                                                                                  |
| `alias`                    | `array`   | Siglificati dei simboli                                                                  | `[]`                             | `REQUIRED`                                                                           | Arrey di alias per sostituire il simbolo di borsa                                                                                                                                                                        |
| `maxTableRows`             | `Number`  | Qualsiasi valore intero                                                                  | `null`                           | `OPTIONAL`                                                                           | Imposta il numero massimo di righe della tabella.                                                                                                                                                                        |
| `purchasePrice`            | `array`   | Arrey di valori interi                                                                   | `[]`                             | `OPTIONAL`                                                                           | Arrey dei propri prezzi di acquisto.                                                                                                                                                                                     |
| `showPurchasePrices`       | `boolean` | `true`, `false`                                                                          | `false`                          | `OPTIONAL`                                                                           | Mostrare / non mostrare i propri prezzi di acquisto.                                                                                                                                                                     |
| `showPerformance2Purchase` | `boolean` | `true`, `false`                                                                          | `false`                          | Mostrare / non mostrare la performance totale rispetto ai propri prezzi di acquisto. |
| `locale`                   | `String`  |                                                                                          | `config.locale`                  | `OPTIONAL`                                                                           | Impostazioni locali per convertire i numeri nel rispettivo formato numerico.                                                                                                                                             |
| `tickerDuration`           | `Number`  | Qualsiasi valore intero                                                                  | `20`                             | `OPTIONAL`                                                                           | Determina la velocità del ticker.                                                                                                                                                                                        |
| `chartDays`                | `Number`  | Qualsiasi valore intero < 90                                                             | `90`                             | `OPTIONAL`                                                                           | Numero di giorni da mostrare nel grafico. (Max 90 giorni).                                                                                                                                                               |
| `showChart`                | `boolean` | `true`, `false`                                                                          | `true`                           | `OPTIONAL`                                                                           | Mostrare / non mostrare il grafico.                                                                                                                                                                                      |
| `pureLine`                 | `boolean` | `true`, `false`                                                                          | `false`                          | `OPTIONAL`                                                                           | Rimuovere / lasciare gli assi e le linee della griglia.                                                                                                                                                                  |
| `chartWidth`               | `Number`  | Qualsiasi valore intero                                                                  | `null`                           | `OPTIONAL`                                                                           | Determina la larghezza del grafico, diversa dalla larghezza complessiva sopra indicata.                                                                                                                                  |
| `chartInterval`            | `String`  | `daily`                                                                                  | `daily`                          | `OPTIONAL`                                                                           | Intervallo grafico, supportato solo giornalmente.                                                                                                                                                                        |
| `showVolume`               | `boolean` | `true`, `false`                                                                          | `true`                           | `OPTIONAL`                                                                           | Mostrare / non mostrare le barre del volume nel grafico.                                                                                                                                                                 |
| `movingAverage`            | `object`  | `EMA`/`SMA`, qualsiasi valore intero                                                     | `{ type: "SMA", periods: [200]}` | `OPTIONAL`                                                                           | movingAverages da includere nel grafico.                                                                                                                                                                                 |
| `decimals`                 | `Number`  | Qualsiasi valore intero                                                                  |                                  | `OPTIONAL`                                                                           | Numero di decimali.                                                                                                                                                                                                      |
| `chartType`                | `String`  | `line`, `candlestick`, `ohlc`                                                            | `line`                           | `OPTIONAL`                                                                           |                                                                                                                                                                                                                          |
| `chartLineColor`           | `String`  | Scegli il tuo colore qui: <https://www.w3schools.com/colors/colors_picker.asp>           | `#eee`                           | `OPTIONAL`                                                                           | Colore delle linee. chart                                                                                                                                                                                                |
| `chartLabelColor`          | `String`  | Scegli il tuo colore qui: <https://www.w3schools.com/colors/colors_picker.asp>           | `#eee`                           | `OPTIONAL`                                                                           | Colore dei caratteri labels                                                                                                                                                                                              |
| `coloredCandles`           | `boolean` | `true`, `false`                                                                          | `true`                           | `OPTIONAL`                                                                           | Se usare candele colorate / barre OHLC.                                                                                                                                                                                  |
| `debug`                    | `boolean` | `true`, `false`                                                                          | `false`                          | `OPTIONAL`                                                                           | Abilita / disabilita la modalità debug.                                                                                                                                                                                  |

---

## Screenshot
- `mode:table`  
![ScreenShot for Table](https://raw.githubusercontent.com/lavolp3/MMM-AVStock/master/avstock-table.PNG)

- `mode:ticker`  
![ScreenShot for Ticker](https://raw.githubusercontent.com/lavolp3/MMM-AVStock/master/avstock-ticker.PNG)

- `mode:grid` with `direction:'row'`   
![ScreenShot for Ticker](https://raw.githubusercontent.com/lavolp3/MMM-AVStock/master/avstock-grid.PNG)

- `mode:ticker with own purchase prices`  
![ScreenShot for Ticker](https://raw.githubusercontent.com/lavolp3/MMM-AVStock/master/avstock-ticker-purchasePrices.jpg) 

- `mode:ticker with own purchase prices and total performance compared to the purchase price`  
![ScreenShot for Ticker](https://raw.githubusercontent.com/lavolp3/MMM-AVStock/master/avstock-ticker-purchase-performace.jpg) 

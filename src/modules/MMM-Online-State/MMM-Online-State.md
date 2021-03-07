# MMM-Online-State

## tl;dr

Il seguente modulo visualizza lo stato di connessione Internet del MagicMirror.

---

## config.js fragment

```js
{
    module: 'MMM-Online-State',
    // you may choose any location
    position: 'top_right',
    config: {
        displaySymbol: true,
        symbolOnline: "fas fa-wifi",
        symbolOffline: "fas fa-wifi-slash",
        colored: true,
        colorOnline: "#FFFFFF",
        colorOffline: "#FF0000"
    }
}
```

---

## Proprietà (config section)

| Proprietà       | Tipo      | Valori                                                                                                       | Valore Default | Inderogabilità | Descrizione                                                                       |
| --------------- | --------- | ------------------------------------------------------------------------------------------------------------ | -------------- | -------------- | --------------------------------------------------------------------------------- |
| `displaySymbol` | `Boolean` | `true`: Visualizzazione stato con simbolo attiva. <br> `false`: Visualizzazione stato con simbolo disattiva. | `true`         | `OPTIONAL`     | Abilita la visualizzazione dello stato della connessione con un simbolo grafico.  |
| `displayText`   | `Boolean` | `true`: Visualizzazione stato con testo attiva. <br> `false`: Visualizzazione stato con testo disattiva.     | `false`        | `OPTIONAL`     | Abilita la visualizzazione dello stato della connessione con testo.               |
| `symbolOnline`  | `String`  | Visita [http://fontawesome.io/icons/](http://fontawesome.io/icons/) per tutte le opzioni.                    | `"wifi"`       | `OPTIONAL`     | Simbolo da visualizzare per stato della connessione: ONLINE.                      |
| `symbolOffline` | `String`  | Visita [http://fontawesome.io/icons/](http://fontawesome.io/icons/) per tutte le opzioni.                    | `"wifi"`       | `OPTIONAL`     | Simbolo da visualizzare per stato della connessione: OFFLINE.                     |
| `colored`       | `Boolean` | `true`: Visualizzazione simboli colorati attiva. <br> `false`: Visualizzazione simboli colorati disattiva.   | `true`         | `OPTIONAL`     | Abilita la visualizzazione dei simboli in _modo colorato_.                        |
| `colorOnline`   | `String`  | Tonalità di colore espressa in valore esadecimale [https://htmlcolorcodes.com/](https://htmlcolorcodes.com/) | `"#fff"`       | `OPTIONAL`     | Gestisce il colore del simbolo visualizzato per stato della connessione: ONLINE.  |
| `colorOffline`  | `String`  | Tonalità di colore espressa in valore esadecimale [https://htmlcolorcodes.com/](https://htmlcolorcodes.com/) | `"red"`        | `OPTIONAL`     | Gestisce il colore del simbolo visualizzato per stato della connessione: OFFLINE. |

---

## Screenshots

_Qui (se presenti, consigliati)._

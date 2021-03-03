# MMM-Screencast

## tl;dr

Permette di effettuare il cast di contenuti multimediali da
di diversi dispositivi al MagicMirror.

---

## config.js fragment

```js
{
    module: 'MMM-Screencast',
    // This position is for a hidden <div /> and not the screencast window
    position: 'bottom_right', 
    config: {
        position: 'center',
        height: 300,
        width: 500,
        castName: "MagicMirror-GBM-cast"
    }
}
```

---

## Proprietà (config section)

| Proprietà  | Tipo     | Valori                                                                                                            | Valore Default  | Inderogabilità                            | Descrizione                                                                                                  |
| ---------- | -------- | ----------------------------------------------------------------------------------------------------------------- | --------------- | ----------------------------------------- | ------------------------------------------------------------------------------------------------------------ |
| `position` | `String` | `bottomRight` <br> `bottomCenter` <br> `bottomLeft` <br> `center` <br> `topRight` <br> `topCenter` <br> `topLeft` | `---`           | `REQUIRED`                                | Posizione finestra del riproduttore multimediale (in azione).                                                |
| `x`        | `Number` | Qualsiasi valore in `pixel`                                                                                       | `---`           | `OPTIONAL` (richiesto se specificato `y`) | Offset finestra del riproduttore multimediale dal `LATO SINISTRO` dello schermo _(traslazione orizzontale)_. |
| `y`        | `Number` | Qualsiasi valore in `pixel`                                                                                       | `---`           | `OPTIONAL` (richiesto se specificato `x`) | Offset finestra del riproduttore multimediale dal `LATO SINISTRO` dello schermo _(traslazione verticale)_.   |
| `height`   | `Number` | Qualsiasi valore in `pixel` `> 0`                                                                                 | `---`           | `REQUIRED`                                | Altezza della finestra del riproduttore multimediale.                                                        |
| `width`    | `Number` | Qualsiasi valore in `pixel` `> 0`                                                                                 | `---`           | `REQUIRED`                                | Larghezza della finestra del riproduttore multimediale.                                                      |
| `castName` | `String` | Qualsiasi valore                                                                                                  | `"os.hostname"` | `OPTIONAL`                                | Nome da visualizzare nella lista di dispositivi abilitati al cast.                                           |
| `port`     | `Number` | Qualsiasi valore di porta valido (`1024 < PORT < 65 536`)                                                         | `8569`          | `OPTIONAL`                                | Porta per eseguire il _dialserver_.                                                                          |

---

## Screenshots

_Qui (in attesa... [https://github.com/AndreaGrandieri/MagicMirror-GBM/issues/89](https://github.com/AndreaGrandieri/MagicMirror-GBM/issues/89))._

---

## Servizi Compatibili

- Youtube

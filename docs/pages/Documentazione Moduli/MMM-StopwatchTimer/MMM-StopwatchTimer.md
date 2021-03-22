# MMM-StopwatchTimer

## tl;dr

Con questo modulo MagicMirror puoi visualizzare un timer o un cronometro in stile avviso sullo specchio. Il timer e il cronometro possono essere controllati tramite notifiche o utilizzando la [MM-Remote android app](https://github.com/Klettner/MM-Remote).

---

## config.js fragment

```js
{
    module: 'MMM-StopwatchTimer',
    config: {
      animation: true
    }
}
```

---

## Proprietà (config section)

| Proprietà   | Tipo      | Valori                                                                                                         | Valore Default | Inderogabilità | Descrizione                                            |
| ----------- | --------- | -------------------------------------------------------------------------------------------------------------- | -------------- | -------------- | ------------------------------------------------------ |
| `animation` | `Boolean` | `true`: Animazioni per timer / cronometro attivate <br> `false`: Animazioni per timer / cronometro disattivate | `true`         | `REQUIRED`     | Attiva / disattiva l'animazione per timer / cronometro |

---

## Notifiche

Le notifiche sono uno strumento utilizzato dai moduli per comunicare con:

- L'OS del MagicMirror
- Altri moduli
- Attori umani

| Notifica                   | Direzione | Trigger                                             | Payload _(inline js)_ | Descrizione                                                                                                                                             |
| -------------------------- | --------- | --------------------------------------------------- | --------------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------- |
| `START_TIMER`              | `IN`      | Avvio del timer con `x` secondi.                    | `x`                   | ---                                                                                                                                                     |
| `PAUSE_STOPWATCHTIMER`     | `IN`      | Mette in pausa il timer o cronometro.               | `---`                 | Il timer o cronometro rimane in pausa (fermo) visualizzato sullo schermo del MagicMirror.                                                               |
| `UNPAUSE_TIMER`            | `IN`      | Toglie dallo stato di pausa un timer in pausa.      | `---`                 | Il timer riprende a scorrere.                                                                                                                           |
| `START_STOPWATCH`          | `IN`      | Avvio del cronometro.                               | `---`                 | ---                                                                                                                                                     |
| `UNPAUSE_STOPWATCH`        | `IN`      | Toglie dallo stato di pausa un cronometro in pausa. | `---`                 | Il cronometro riprende a scorrere.                                                                                                                      |
| `INTERRUPT_STOPWATCHTIMER` | `IN`      | Arresta l'esecuzione di un timer o cronometro.      | `---`                 | Questo causa la perdità dello stato di attività del timer o cronometro e l'arresto della visualizzazione di quest'ultimo sullo schermo del MagicMirror. |

---

## Screenshots

![Timer.gif](../../../assets/MMM-StopwatchTimer/Timer.gif)

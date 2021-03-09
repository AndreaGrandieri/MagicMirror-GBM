# MMM-StopwatchTimer

## tl;dr

Con questo modulo MagicMirror puoi visualizzare un timer o un cronometro in stile avviso sullo specchio. Il timer e il cronometro possono essere controllati tramite notifiche o utilizzando la [MM-Remote android app](https://github.com/Klettner/MM-Remote).

---

## config.js fragment

```js
{
    module: 'MMM-StopwatchTimer',
    config: {
      animation: true,
    }
}
```

---

## Proprietà (config section)

| Proprietà   | Tipo      | Valori                                                                                                         | Valore Default | Inderogabilità | Descrizione                                            |
| ----------- | --------- | -------------------------------------------------------------------------------------------------------------- | -------------- | -------------- | ------------------------------------------------------ |
| `animation` | `Boolean` | `true`: Animazioni per timer / cronometro attivate <br> `false`: Animazioni per timer / cronometro disattivate | `true`         | `REQUIRED`     | Attiva / disattiva l'animazione per timer / cronometro |

---

## Screenshots

![resources/Timer.gif](resources/Timer.gif)


---

## \<Altro\>
Provvisorio (guarda [https://github.com/AndreaGrandieri/MagicMirror-GBM/issues/90](https://github.com/AndreaGrandieri/MagicMirror-GBM/issues/90))

Le seguenti notifiche possono essere utilizzate per controllare questo modulo

| Notifiche                | Descrizione                                                                                              |
| ------------------------ | -------------------------------------------------------------------------------------------------------- |
| START_TIMER              | Avvia un timer di N secondi. È necessario specificare la quantità di secondi                             |
| PAUSE_STOPWATCHTIMER     | Mette in pausa il timer / cronometro attualmente in esecuzione. Sarà comunque visualizzato sullo schermo |
| UNPAUSE_TIMER            | Se il timer è stato messo in pausa in precedenza, riprenderà l'esecuzione                                |
| START_STOPWATCH          | Il cronometro inizia a funzionare                                                                        |
| UNPAUSE_STOPWATCH        | Se il cronometro è stato messo in pausa in precedenza, riprenderà l'esecuzione                           |
| INTERRUPT_STOPWATCHTIMER | Lo specchio smetterà di visualizzare il timer o il cronometro attualmente visualizzati                   |

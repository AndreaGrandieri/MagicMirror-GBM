# MMM-DHT-Sensor

## tl;dr

Il seguente modulo visualizza i valori di temperatura
e umidità locali letti dal sensore interno del MagicMirror.

---

## Config JSON Fragment

```json
{
    "module": "MMM-DHT-Sensor",
    "position": "",
    "config": {
        "sensorPin": 2,
        "sensorType": 22,
        "units": "metric",
        "updateInterval": 1000
    }
}
```

La proprietà `position`, con valore `""`, indica che il modulo non verrà visualizzato (non avrà
una schermata di proprietà). Comunque, il modulo __E' IN FUNZIONE__.

---

## Proprietà (Config Section)

| Proprietà        | Tipo      | Valori                                                                                                                                                                                                                          | Valore Default   | Inderogabilità | Descrizione                                                                                                           |
| ---------------- | --------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------- | ---------------- | -------------- | --------------------------------------------------------------------------------------------------------------------- |
| `sensorPin`      | `Integer` | Qualsiasi valore numerico di pin GPIO valido. Qui maggiori dettagli: [https://www.raspberrypi.org/documentation/usage/gpio/](https://www.raspberrypi.org/documentation/usage/gpio/), [https://pinout.xyz/](https://pinout.xyz/) | `---`            | `REQUIRED`     | Pin GPIO al quale il sensore interno del MagicMirror è connesso. __E' sconsigliata la modifica di questa proprietà.__ |
| `sensorType`     | `Integer` | `11` per il sensore `DHT11`. <br> `22` per il sensore `DHT22` o `AM2302`.                                                                                                                                                       | `---`            | `REQUIRED`     | Tipologia di sensore. __E' sconsigliata la modifica di questa proprietà.__                                            |
| `units`          | `String`  | `config.units` Valore specificato nel file _config.js_. <br> `"metric"` Celsius. <br> `"imperial"` Fahrenheit.                                                                                                                  | `config.units`   | `OPTIONAL`     | Unità per la visualizzazione della temperatura.                                                                       |
| `updateInterval` | `Integer` | Qualsiasi valore `> 0` in millisecondi.                                                                                                                                                                                         | `3.6e+6` (1 ora) | `OPTIONAL`     | Tempo di aggiornamento dei valori visualizzati con le letture dal sensore.                                            |

---

## Notifiche

Le notifiche sono uno strumento utilizzato dai moduli per comunicare con:

- L'OS del MagicMirror
- Altri moduli
- Attori umani

| Notifica             | Direzione | Trigger                                                                   | Payload _(inline js)_        | Descrizione                                                                                                                            |
| -------------------- | --------- | ------------------------------------------------------------------------- | ---------------------------- | -------------------------------------------------------------------------------------------------------------------------------------- |
| `INDOOR_TEMPERATURE` | `OUT`     | Ad ogni aggiornamento dei valori visualizzati con le letture dal sensore. | `{indoor_temperature_value}` | Fornisce ai moduli che accettano in `IN` questa notifica il valore della temperatura locale letta dal sensore interno del MagicMirror. |
| `INDOOR_HUMIDITY`    | `OUT`     | Ad ogni aggiornamento dei valori visualizzati con le letture dal sensore. | `{indoor_humidity_value}`    | Fornisce ai moduli che accettano in `IN` questa notifica il valore della umidità locale letta dal sensore interno del MagicMirror.     |

---

## Screenshots

Schermata del modulo funzionante correttamente. Il modulo è configurato per la visualizzazione
con una propria schermata (ownshow):

![working_module_ownshow](../../../assets/MMM-DHT-Sensor/working_module_ownshow.png)

Schermata del modulo funzionante correttamente. Il modulo è configurato per la visualizzazione
delegando la visualizzazione ad un'altra schermata (di un altro modulo) (delegateshow):

![working_module_delegateshow]() ???????????

---

## MagicMirror Default Hardware

Il sensore interno del MagicMirror è il `DHT22`.
Il pin GPIO utilizzato dal sensore è il `?????????????????????`.

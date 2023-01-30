---
# Front matter of "classic" page

# Theme to use. Resides in the "_layouts" folder.
layout: default

# Page title. If omitted, the page will not be included in the navbar.
title: MMM-DHT-Sensor

#################################################################

# Specifies the order of the current page from the point of view of the navbar. Can have repetition in the numbers, for parent-child hierarchies.
nav_order: 2

# Let exclude the page from the navbar
nav_exclude: false

# Let exclude the page from the built-in search engine
search_exclude: false

#################################################################

# Set "true" if this page has childrens, "false" otherwise.
has_children: false

# If this page is some page's child, specify the parent's name, otherwise comment out the option. If this page is some page's grandchild, specify grandparent's name, otherwise comment out the option.
parent: Documentazione Moduli
grand_parent: MagicMirror-GBM

# If this page is a parent page, a Table Of Contents will be automatically generated containing all related child pages. Use the option below to disable this functionality. Should always be set to "false".
has_toc: false

#################################################################

# Specify the current language of this page
lang: it

# Specify all other available languages in which this page is available. If there's no other language in addition to "lang", comment out this option.
# # availableLanguages:
# #   - 
---

# MMM-DHT-Sensor
{: .no_toc }

---

<!-- Table of contents -->
<details open markdown="block">
  <summary>
    Table of contents
  </summary>
  {: .text-delta }
1. TOC
{:toc}
</details>

---

## tl;dr

Il seguente modulo visualizza i valori di temperatura
e umidità locali letti dal sensore interno del MagicMirror.

---

## Config JSON Fragment

```json
{
    "module": "MMM-DHT-Sensor",
    "config": {
        "sensorPin": 16,
        "sensorType": 22,
        "units": "metric",
        "updateInterval": 10000
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
| `updateInterval` | `Integer` | Qualsiasi valore `>= 2000` in millisecondi _(vedi anche paragrafo `updateInterval Sensore`)_.                                                                                                                                   | `3.6e+6` (1 ora) | `OPTIONAL`     | Tempo di aggiornamento dei valori visualizzati con le letture dal sensore.                                            |

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

[![working_module_ownshow](../../../../assets/MMM-DHT-Sensor/working_module_ownshow.png)](../../../../assets/MMM-DHT-Sensor/working_module_ownshow.png)

Schermata del modulo funzionante correttamente. Il modulo è configurato per la visualizzazione
delegando la visualizzazione ad un'altra schermata (di un altro modulo) (delegateshow):

[![working_module_delegateshow](../../../../assets/MMM-DHT-Sensor/working_module_delegateshow.jpg)](../../../../assets/MMM-DHT-Sensor/working_module_delegateshow.jpg)

---

## MagicMirror Default Hardware

Il sensore interno del MagicMirror è il `DHT22`.
Il pin GPIO utilizzato dal sensore è il `GPIO/BCM 16` [https://pinout.xyz/pinout/pin36_gpio16](https://pinout.xyz/pinout/pin36_gpio16).

## updateInterval Sensore

Le specifiche tecniche per il sensore `DHT22` raccomandano un valore
di campionamento __non__ inferiore a `2000 ms`.

## pin GPIO

__Presta Attenzione:__ i pin GPIO del Raspberry Pi possono essere riferiti
seguendo (molti) diversi standard. La proprietà `sensorPin` del modulo utilizza
lo standard evidenziato in giallo:

[![pin_GPIO_ref](../../../../assets/MMM-DHT-Sensor/pin_GPIO_ref.PNG)](../../../../assets/MMM-DHT-Sensor/pin_GPIO_ref.PNG)

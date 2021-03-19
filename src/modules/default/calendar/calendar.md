# calendar

## tl;dr

Visualizza eventi da uno o più calendari.

---

## config.js fragment

```js
// Qui frammento di configurazione da inserire nel file globale "config.js"
```

---

## Proprietà (config section)

| Proprietà                    | Tipo              | Valori                                                                                                                                                                   | Valore Default | Inderogabilità | Descrizione                                                                     |
| ---------------------------- | ----------------- | ------------------------------------------------------------------------------------------------------------------------------------------------------------------------ | -------------- | -------------- | ------------------------------------------------------------------------------- |
| `showLocation`               | `Boolean`         | `true`: Visualizzazione della zona di svolgimento dell'evento attiva. <br> `false`: Visualizzazione della zona di svolgimento dell'evento disattiva.                     | `false`        | `OPTIONAL`     | Attiva la visualizzazione della zona di svolgimento dell'evento attiva.         |
| `maxTitleLength`             | `Number`          | `10 <= x <= 50`                                                                                                                                                          | `25`           | `OPTIONAL`     | Valore limite oltre il quale entra in azione `wrapEvents`, se previsto.         |
| `wrapEvents`                 | `Boolean`         | `true`: Multilinea per nomi degli eventi attiva. <br> `false`: Multilinea per nomi degli eventi disattiva.                                                               | `false`        | `OPTIONAL`     | Attiva il wrapping multilinea per nomi degli eventi.                            |
| `maxLocationTitleLength`     | `Number`          | `10 <= x <= 50`                                                                                                                                                          | `25`           | `OPTIONAL`     | Valore limite oltre il quale entra in azione `wrapLocationEvents`, se previsto. |
| `wrapLocationEvents`         | `Boolean`         | `true`: Multilinea per nomi delle zone di svolgimento degli eventi attiva. <br> `false`: Multilinea per nomi delle zone di svolgimento degli eventi disattiva.           | `false`        | `OPTIONAL`     | Attiva il wrapping multilinea per nomi delle zone di svolgimento degli eventi.  |
| `fetchInterval`              | `Number`          | `1000 <= x <= 86400000` millisecondi.                                                                                                                                    | `300000`       | `OPTIONAL`     | Periodo di fetch per scaricare aggiornamenti dei contenuti del calendario.      |
| `fade`                       | `Boolean`         | `true`: Oscuramento sfumato degli eventi _sempre più_ futuri attivo. <br> `false`: Oscuramento sfumato degli eventi _sempre più_ futuri disattivo.                       | `true`         | `OPTIONAL`     | Attiva l'oscuramento sfumato degli eventi _sempre più_ futuri.                  |
| `displayRepeatingCountTitle` | `Boolean`         | `true`: Visualizzazione contatore autoincrementante per eventi ripetuti attiva. <br> `false`: Visualizzazione contatore autoincrementante per eventi ripetuti disattiva. | `false`        | `OPTIONAL`     | Attiva la visualizzazione contatore autoincrementante per eventi ripetuti.      |
| ??? `dateFormat`             | `String`          | Valori possibili elencati qui: [https://momentjs.com/docs/#/parsing/string-format/](https://momentjs.com/docs/#/parsing/string-format/).                                 | `"MMM Do"`     | `OPTIONAL`     | Formato di visualizzazione della data di inizio di un evento.                   |
| ??? `dateEndFormat`          | `String`          | Valori possibili elencati qui: [https://momentjs.com/docs/#/parsing/string-format/](https://momentjs.com/docs/#/parsing/string-format/).                                 | `"HH:mm"`      | `OPTIONAL`     | Formato di visualizzazione dell'ora di fine di un evento.                       |
| ??? `timeFormat`             | `???`             | ???                                                                                                                                                                      | `???`          | `???`          | ???                                                                             |
| `calendars`                  | `Array -> String` | _Regole di compilazione riportate sotto_.                                                                                                                                | `---`          | `REQUIRED`     | Lista di calendari dai quali prelevare gli eventi.                              |

`calendars`:

| Proprietà | Tipo     | Valori                                                                                                      | Valore Default | Inderogabilità | Descrizione                                                                                                                                 |
| --------- | -------- | ----------------------------------------------------------------------------------------------------------- | -------------- | -------------- | ------------------------------------------------------------------------------------------------------------------------------------------- |
| `url`     | `String` | _Regole per ottenere il valore riportate sotto_.                                                            | `---`          | `REQUIRED`     | URL ___.ical___ che identifica il calendario dal quale prelevare gli eventi. Può essere ad accesso __libero__ o __previa autenticazione__.  |
| `color`   | `String` | Tonalità di colore espressa in valore esadecimale [https://htmlcolorcodes.com](https://htmlcolorcodes.com). | `---`          | `OPTIONAL`     | Tonalità di colore che identifica il calendario corrente.                                                                                   |
| `name`    | `String` | Qualsiasi stringa.                                                                                          | `---`          | `OPTIONAL`     | Nome per identificare il calendario corrente.                                                                                               |
| `auth`    | `Object` | _Regole di compilazione riportate sotto_.                                                                   | `---`          | `OPTIONAL`     | Opzioni di autenticazione per utilizzare il calendario. __Necessario solo se il tipo di accesso al calendario è: "previa autenticazione"__. |

`auth`:

| Proprietà    | Tipo     | Valori    | Valore Default | Inderogabilità | Descrizione                         |
| ------------ | -------- | --------- | -------------- | -------------- | ----------------------------------- |
| `user`       | `String` | Username. | `---`          | `REQUIRED`     | Username per l'autenticazione HTTP. |
| `pass`       | `String` | Password. | `---`          | `REQUIRED`     | Password per l'autenticazione HTTP. |
| ??? `method` | `???`    | ???       | `???`          | `???`          | ???                                 |

---

## Notifiche

Le notifiche sono uno strumento utilizzato dai moduli per comunicare con:

- L'OS del MagicMirror
- Altri moduli
- Attori umani

| Notifica        | Direzione     | Trigger                                                                                    | Payload _(inline js)_              | Descrizione                                                   |
| --------------- | ------------- | ------------------------------------------------------------------------------------------ | ---------------------------------- | ------------------------------------------------------------- |
| `Nome-Notifica` | `IN` or `OUT` | _Che azione causa l'`OUT` della notifica._ or _Che azione segue dall'`IN` della notifica._ | `JS PAYLOAD QUI se presente o ---` | _Qui breve descrizione del significato della notifica o ---._ |

---

## Screenshots

_Qui (se presenti, consigliati)._

---

## \<Altro\>

_Qui altre informazioni, se necessarie. Denominare il paragrafo a dovere._

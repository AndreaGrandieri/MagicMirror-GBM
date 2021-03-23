# MMM-Mail

## tl;dr

Il seguente modulo permette la visione delle ultime N mail ricevute.

---

## config.js fragment

```js
{
	module: 'MMM-Mail',
	position: 'bottom_left',
	header: 'Email',
	config:{
		user: 'YOUR_EMAIL_ADDRESS_HERE',
		pass: 'YOUR_EMAIL_PASSWORD_HERE',
		host: 'imap.gmail.com',
		port: 993,
		numberOfEmails: 5,
		fade: true,
		subjectlength: 50
	}
},

```

---

## Proprietà (config section)


| Proprietà        | Tipo      | Valori                                                                                                               | Valore Default | Inderogabilità | Descrizione                                                      |
| ---------------- | --------- | -------------------------------------------------------------------------------------------------------------------- | -------------- | -------------- | ---------------------------------------------------------------- |
| `user`           | `String`  | Indirizzo email di cui si vogliono vedere le mail.                                                                   | `---`          | `REQUIRED`     | Indirizzo email di cui si vogliono vedere le ultime N mail.      |
| `pass`           | `String`  | Password della mail                                                                                                  | `---`          | `REQUIRED`     | Password della email precedentemente inserita.                   |
| `host`           | `String`  | Nome host IMAP.                                                                                                      | `---`          | `REQUIRED`     | Nome host IMAP.                                                  |
| `port`           | `Number`  | Valore > 0                                                                                                           | `933`          | `REQUIRED`     | Numero della porta che l'IMAP utilizza.                          |
| `numberOfEmails` | `Number`  | Valore > 0                                                                                                           | `5`            | `OPTIONAL`     | Numero di mail da visualizzare.                                  |
| `fade`           | `Boolean` | `true`: Effetto dissolvenza mail più vecchie attivato <br> `false`: Effetto dissolvenza mail più vecchie disattivato | `true`         | `OPTIONAL`     | Attiva / Disattiva l'effetto dissolvenza delle mail più vecchie. |
| `subjectlength`  | `Number`  | Valore > 0                                                                                                           | `---`          | `OPTIONAL`     | Lunchezza massima per la visualizzazione di una mail.            |

---

## Screenshots

Questa è la visualizzazione del modulo in situazione di funzionamento corretto:

![screenshot.PNG](../../../assets/MMM-Mail/screenshot.PNG)

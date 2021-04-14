---
layout: noheader
---

# MMM-MD

## tl;dr

Scrivi Markdown, renderizzalo e visualizzalo direttamente sullo schermo del MagicMirror!

Hai solamente bisogno di:

- Consocenza base di Markdown [https://guides.github.com/features/mastering-markdown/](https://guides.github.com/features/mastering-markdown/)
- Creatività

Tutte le sintassi MD sono supportate. Assets multimediali sono supportati. Autoscroll (dall'alto verso il basso con ripetizione)
se il contenuto eccede lo spazio a disposizione del modulo per il rendering.

---

## Config JSON Fragment

```json
{
    "module": "MMM-MD",
    "position": "center",
    "config": {
    }
}
```

---

## Proprietà (Config Section)

| Proprietà  | Tipo      | Valori                                                                                                                                        | Valore Default         | Inderogabilità | Descrizione                                                                                                                    |
| ---------- | --------- | --------------------------------------------------------------------------------------------------------------------------------------------- | ---------------------- | -------------- | ------------------------------------------------------------------------------------------------------------------------------ |
| `interval` | `Integer` | Qualsiasi valore `>= 45` (ms)                                                                                                                 | `50` (ms)              | `OPTIONAL`     | Velocità dell'autoscroll.                                                                                                      |
| `staller`  | `Integer` | Qualsiasi valore `>= 0` (ms)                                                                                                                  | `100` (ms)             | `OPTIONAL`     | Lasso di tempo prima di ripartire dal __TOP__ (dall'alto) dopo che l'autoscroll ha raggiunto il limite __BOTTOM__ (dal basso). |
| `width`    | `String`  | Qualsiasi stringa rappresentante CSS valido                                                                                                   | `"calc(100 % - 25 %)"` | `OPTIONAL`     | Larghezza della finestra del modulo.                                                                                           |
| `height`   | `String`  | Qualsiasi stringa rappresentante CSS valido                                                                                                   | `"500px"`              | `OPTIONAL`     | Altezza della finestra del modulo.                                                                                             |
| `docname`  | `String`  | Path (Percorso) di localizzazione di un valido documento. __Il documento deve essere localizzato all'interno di: `./modules/MMM-MD/public/`__ | `"content.md"`         | `OPTIONAL`     | Documento MD dal quale prelevare il contenuto MD da renderizzare.                                                              |

---

## Notifiche

Le notifiche sono uno strumento utilizzato dai moduli per comunicare con:

- L'OS del MagicMirror
- Altri moduli
- Attori umani

_Nulla da segnalare._

---

## Screenshots

Interfaccia del modulo funzionante (1):

![module_focus](../../../assets/MMM-MD/module_focus.PNG)

Interfaccia del modulo funzionante (2):

![module_overview](../../../assets/MMM-MD/module_overview.PNG)

---

## Localizzazione dei Documenti

Tutti i documenti MD e gli assets (multimedia) devono essere localizzati all'interno di: __`./modules/MMM-MD/public/`__
per essere rilevati e utilizzati dal modulo. Solo un documento alla volta può essere eletto al rendering.

Per puntare ed utilizzare un asset all'interno del documento MD, segui il seguente _path pattern_:

```md
![{assetName}](modules/MMM-MD/public/{assetName.extension})
```

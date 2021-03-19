# Database settings - Progettazione Logica

## Progettazione Concettuale

[Progettazione Concettuale](../Progettazione%20Concettuale/Progettazione%20Concettuale.md)

---
---
---

## Note

Piattaforma: `SQLite`

---

Classificazione `Tipo` Attributi `SEMPLICE`:

`PRIMARY KEY`: Specificazione da aggiungere ad uno qualsiasi tra i tipi di dato sottoriportati
per indicare la __Chiave Primaria__.

| Tipo                  | Utilizzo                                                          |
| --------------------- | ----------------------------------------------------------------- |
| `INTEGER PRIMARY KEY` | Chiave primaria rappresentata da numero intero autoincrementante. |
| `NULL`                | Rappresenta un valore `NULL`.                                     |
| `INTEGER`             | Numero intero con segno.                                          |
| `REAL`                | Numero decimale con segno.                                        |
| `TEXT`                | Stringa di caratteri.                                             |
| `BLOB`                | Salva input grezzi di simboli binari.                             |

---

Tipologie Vincoli:

| Tipologia Vincolo | Utilizzo                                                                        |
| ----------------- | ------------------------------------------------------------------------------- |
| `RANGE`           | Limita il range del valore di un attributo.                                     |
| `LIST`            | Limita la scelta del valore di un attributo ad una lista di valori predefiniti. |
| `UNIQUE`          | Indica che il valore di un attributo deve essere univoco.                       |

---
---
---

## Entità

### module

```
module(NomeModulo, Active, RenderIndex, JsonFragment, JsonStableFragment)
```

| Attributi                                            | Tipo                | NULL     |
| ---------------------------------------------------- | ------------------- | -------- |
| NomeModulo ![primary_key](resources/primary_key.png) | `TEXT PRIMARY KEY`  | `CANNOT` |
| Active                                               | `INTEGER (BOOLEAN)` | `CANNOT` |
| RenderIndex                                          | `INTEGER`           | `CANNOT` |
| JsonFragment                                         | `TEXT`              | `CANNOT` |
| JsonStableFragment                                   | `TEXT`              | `CANNOT` |

| Attributi Vincolati | Tipologia Vincolo | Vincolo |
| ------------------- | ----------------- | ------- |
| RenderIndex         | `UNIQUE`          | ---     |

---
---

### global

```
global(NomeGlobale, JsonFragment, JsonStableFragment)
```

| Attributi                                             | Tipo               | NULL     |
| ----------------------------------------------------- | ------------------ | -------- |
| NomeGlobale ![primary_key](resources/primary_key.png) | `TEXT PRIMARY KEY` | `CANNOT` |
| JsonFragment                                          | `TEXT`             | `CANNOT` |
| JsonStableFragment                                    | `TEXT`             | `CANNOT` |

MagicMirror-GBM

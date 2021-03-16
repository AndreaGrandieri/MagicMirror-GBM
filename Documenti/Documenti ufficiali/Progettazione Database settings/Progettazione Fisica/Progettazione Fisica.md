# Database settings - Progettazione Fisica

## Progettazione Logica

[Progettazione Logica](../Progettazione%20Logica/Progettazione%20Logica.md)

---
---
---

## Note

Piattaforma: `SQLite`

---

String delimiter: `'`

Escaped: `"`

---
---
---

## Sequenza Costruzione

1. Creazione Database

La creazione del Database consiste nella creazione del file
`settings.sqlite`.

Creazione Unix:

```shell
touch settings.sqlite
```

Creazione Windows:

```shell
fsutil file createnew settings.sqlite 0
```

2. Creazione tabella `modules`

```sql
CREATE TABLE modules (
    NomeModulo TEXT NOT NULL PRIMARY KEY,
    Active INTEGER NOT NULL,
    RenderIndex INTEGER NOT NULL UNIQUE,
    JsonFragment TEXT NOT NULL,
    JsonStableFragment TEXT NOT NULL
    );
```

3. Creazione tabella `globals`

```sql
CREATE TABLE globals (
    NomeGlobale TEXT NOT NULL PRIMARY KEY,
    JsonFragment TEXT NOT NULL,
    JsonStableFragment TEXT NOT NULL
    );
```

4. Inserimento record default per la tabella `modules`

```sql
-- TODO
```

5. Inserimento record default per la tabella `globals`

```sql
INSERT INTO globals
    SELECT 'address' AS NomeGlobale, '\"localhost\"' AS JsonFragment, '\"localhost\"' AS JsonStableFragment
    UNION ALL SELECT 'port', '8080', '8080'
    UNION ALL SELECT 'basePath', '\"/\"', '\"/\"'
    UNION ALL SELECT 'ipWhitelist', '[
\"127.0.0.1\",
\"::ffff:127.0.0.1\",
\"::1\"
]', '[
\"127.0.0.1\",
\"::ffff:127.0.0.1\",
\"::1\"
]'
    UNION ALL SELECT 'useHttps', 'false', 'false'
    UNION ALL SELECT 'httpsPrivateKey', '\"\"', '\"\"'
    UNION ALL SELECT 'httpsCertificate', '\"\"', '\"\"'
    UNION ALL SELECT 'language', '\"en\"', '\"en\"'
    UNION ALL SELECT 'logLevel', '[
\"INFO\",
\"LOG\",
\"WARN\",
\"ERROR\"
]', '[
\"INFO\",
\"LOG\",
\"WARN\",
\"ERROR\"
]'
    UNION ALL SELECT 'timeFormat', '24', '24'
    UNION ALL SELECT 'units', '\"metric\"', '\"metric\"'
    UNION ALL SELECT 'serverOnly', 'false', 'false';
```

MagicMirror-GBM

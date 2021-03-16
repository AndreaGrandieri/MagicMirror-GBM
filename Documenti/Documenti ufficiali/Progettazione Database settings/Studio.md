# Studio Database

Una analisi accurata del funzionamento dell'interfaccia IP ha rilevato la necessità di adottare l'utilizzo di un Database locale,
per automatizzare, ottimizzare e rendere più sicure le operazioni effettuate su informazioni persistenti.

La piattaforma di implementazione richiesta è `SQLite`, in quanto rispetta il criterio di `Database Locale`, salvando digitalmente il Database come un singolo file, binario, direttamente nella directory di lavoro _(ricorda molto la logica dei "classici" file)_. Questo rende nulle configurazioni ulteriori che si potrebbero presentare con altre piattaforme.

Si ha la necessità di memorizzare informazioni riguardanti:

- Moduli
- Impostazioni Globali

Per quanto riguardi i moduli, essi sono caratterizzati da:

- Nome
- Stato di attivazione (moduli attivi oppure no)
- Ordine di render grafico
- Frammento JSON descrittore (del modulo stesso)
- Frammento JSON descrittore (del modulo stesso) stabile di default (per permettere ripristini in seguito a manipolazioni errate)

Per quanto riguarda le impostazioni globali, esse sono caratterizzate da:

- Nome
- Frammento JSON descrittore (della globale stessa)
- Frammento JSON descrittore (della globale stesa) stabile di default (per permettere ripristini in seguito a manipolazioni errate)

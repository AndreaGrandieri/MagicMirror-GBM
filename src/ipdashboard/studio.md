# studio DB (temp)

Una analisi accurata del funzionamento precario dell'interfaccia IP ha rilevato la necessità di adottare l'utilizzo DB locale per automatizzare e rendere più sicure le operazioni effettuate su informazioni persistenti.

La piattaforma di implementazione è SQLite, in quanto effettua il salvataggio del DB come un singolo file, binario, direttamente presente nella directory di lavoro (questa) (ricorda molto il lavoro con "classici" file).

## Tabelle

Il DB avrà le seguenti tabelle:

- modules

Qui vengono salvati TUTTI i moduli installati nel MagicMirror, con il proprio nome fungente da CHIAVE PRIMARIA. Ogni modulo vedrà indicato il proprio stato di attivazione grazie all'ausilio di un valore booleano.
Ogni modulo E' PROPRIO QUI che salverà il PROPRIO FRAMMENTO JSON! Esso verrà salvato come testo in un attributo del DB. Un altro attributo dello stesso tipo verrà utilizzato per il salvataggio del FRAMMENTO STABILE DI DEFAULT.
Ogni modulo, infine, vedrà indicata la propria POSIZIONE DI AVVIAMENTO, fondamentale per l'ordine di rendering elementare nell'interfaccia del MagicMirror.

- NomeModulo TEXT NOT NULL PRIMARY KEY
- Active INTEGER (BOOLEAN) NOT NULL
- RenderIndex INTEGER NOT NULL
- JsonFragment TEXT NOT NULL
- JsonStableFragment TEXT NOT NULL
  
_Possono (e lo faranno) seguire altre tabelle._

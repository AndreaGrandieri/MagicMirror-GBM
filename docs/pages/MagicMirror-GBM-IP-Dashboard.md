---
layout: noheader
permalink: /:path/:basename:output_ext
---

# MagicMirror-GBM IP Dashboard

Il MagicMirror-GBM può essere configurato grazie alla sua interfaccia web: `MagicMirror-GBM IP Dashboard`.
Essa mette a disposizione diversi strumenti per configurare diversi aspetti del MagicMirror-GBM.
Qui riportati e descritti:

> index.php

Home Page. Da qui puoi accedere le diverse funzionalità dell'interfaccia.

![index.php.PNG](../assets/Overview-GUI/ipdashboard-GUI/index.php.PNG)

---

> moduliSelector.php

Lista dei moduli presenti nel Database del MagicMirror-GBM.
Da qui puoi:

- Attivare / Disattivare modulo
- Cambiare ordine di render grafico del modulo
- Accedere all'embedded editor per modificare il frammento di configurazione del modulo

![moduliSelector.php.PNG](../assets/Overview-GUI/ipdashboard-GUI/moduliSelector.php.PNG)

---

> moduloSettings.php

Embedded editor JSON. Qui puoi modificare il frammento JSON di configurazione del modulo selezionato. __E' raccomandato seguire le indicazioni riportate nei documenti dedicati [https://andreagrandieri.github.io/MagicMirror-GBM/#indice-moduli](https://andreagrandieri.github.io/MagicMirror-GBM/#indice-moduli)__

![moduloSettings.php.PNG](../assets/Overview-GUI/ipdashboard-GUI/moduloSettings.php.PNG)

---

> WIFIConfigurator.php

Da qui puoi modificare le impostazioni relative alla configurazione della connettività WIFI (alla rete) per il MagicMirror-GBM. _Probabilmente ti troverai qui durante la fase di prime._

![WIFIConfigurator.php.PNG](../assets/Overview-GUI/ipdashboard-GUI/WIFIConfigurator.php.PNG)

---

> AudioConfigurator.php

Da qui puoi modificare le impostazioni relative alla configurazione dei dispositivi di output audio per il MagicMirror-GBM.

![AudioConfigurator.php.PNG](../assets/Overview-GUI/ipdashboard-GUI/AudioConfigurator.php.PNG)

---

> globalsSelector.php

Lista delle globali presenti nel Database del MagicMirror-GBM.
Da qui puoi:

- Accedere all'embedded editor per modificare il frammento di configurazione della globale

![globalsSelector.php.PNG](../assets/Overview-GUI/ipdashboard-GUI/globalsSelector.php.PNG)

---

> aggiornamentoSoftware.php

Da qui puoi aggiornare il software del MagicMirror-GBM.

![aggiornamentoSoftware.php.PNG](../assets/Overview-GUI/ipdashboard-GUI/aggiornamentoSoftware.php.PNG)

---

> doReboot.php

Riavvia il MagicMirror-GBM.

![doReboot.php.PNG](../assets/Overview-GUI/ipdashboard-GUI/doReboot.php.PNG)

---

> ripristinaDatabase.php

Da qui puoi ripristinare il Database interno del MagicMirror-GBM ad uno stato stabile sicuramente funzionale e corretto.

![ripristinaDatabase.php.PNG](../assets/Overview-GUI/ipdashboard-GUI/ripristinaDatabase.php.PNG)

---

> compila.php

Compila lo stato del Database, rendendo effettive le modifiche effettuate _(con le schermate precedenti)_.

![compila.php.PNG](../assets/Overview-GUI/ipdashboard-GUI/compila.php.PNG)

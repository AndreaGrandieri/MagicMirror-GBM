# MagicMirror-GBM

Documento dei requisiti

*ver. 1.0* 

16/02/2021

---

## Indice (automatico)

...

---

## 1 Premesse del progetto

### 1.1 Obiettivi e scopo del progetto

Il prodotto è stato appositamente studiato per fornire al cliente un'esperienza interattiva che integra i servizi di un assistente personale in uno specchio.

### 1.2 Contesto di business

Nella continua evoluzione tecnologica degli ultimi anni si è rilevata sempre più utile l'integrazione della domotica e della tecnologia in strumenti di uso quotidiano.

### 1.3 Stakeholders

Le figure che influenzano lo sviluppo del sistema software sono:

- Committente: **NonSoloTelefonia Lab**
- Clienti: **Human-Centered Design**
- Developers (analisti, progettisti)

---

## 2 Servizi del sistema

### 2.1 Requisiti funzionali

- 2.1.1  Il sistema dovrà consentire la modifica delle impostazioni del sistema software stesso

  - 2.1.1.1 Il sistema dovrà consentire la gestione delle impostazioni di connettività
  - 2.1.1.2 Il sistema dovrà consentire la gestione del microfono e della fotocamera
  - 2.1.1.3 Il sistema dovrà permettere il reset del sistema stesso
  - 2.1.1.4 Il sistema dovrà permettere una fase di configurazione iniziale
  - 2.1.1.6 Il sistema dovrà permettere la modifica della lingua
  - 2.1.1.7 Il sistema dovrà permettere la regolazione del volume
  - 2.1.1.8 Il sistema dovrà permettere la modifica delle suonerie
  - 2.1.1.9 Il sistema dovrà permettere la gestione delle notifiche
  - 2.1.1.10 Il sistema dovrà consentire la modifica dello sfondo

- 2.1.2 Il sistema dovrà integrare un modulo per il meteo
  
  - 2.1.2.1 Il sistema dovrà consentire la visualizzazione del meteo
  - 2.1.2.2 Il sistema dovrà consentire la modifica della zona interessata
  - 2.1.2.3 Il sistema dovrà consentire la modifica della scala termometrica

- 2.1.3 Il sistema dovrà integrare un modulo per le news
- 2.1.4 Il sistema dovrà integrare un modulo per il riconoscimento vocale
- 2.1.5 Il sistema dovrà integrare un modulo per un calendario interattivo
- 2.1.6 Il sistema dovrà integrare un modulo per data e ora
- 2.1.7 Il sistema dovrà integrare un modulo per un timer
- 2.1.8 Il sistema dovrà integrare un modulo per la navigazione web
- 2.1.9 <mark>Il sistema dovrà integrare un modulo per la messaggistica</mark>
- 2.1.10 Il sistema dovrà integrare un modulo per la riproduzione di contenuti multimediali
- 2.1.11 Il sistema dovrà integrare un modulo per le mappe
- 2.1.12 Il sistema dovrà integrare un modulo per le e-mail
- 2.1.13 Il sistema dovrà integrare un modulo per le note
- 2.1.14 Il sistema dovrà integrare un modulo per l'utilizzo della fotocamera

### 2.2 Requisiti informativi

Questa sezione è vuota (per ora).

---

## 3 Vincoli di sistema

### 3.1 Requisiti di interfaccia

L'interfaccia proposta dal sistema è stata appositamente studiata per garantire una fruizione di contenuti intuitiva ed immediata.

- 3.1.1 Interfaccia principale
  
  - 3.1.1.1 Visualizzazione della data e dell'ora corrente
  - 3.1.1.2 Visualizzazione del meteo
  - 3.1.1.3 Visualizzazione delle news
  - 3.1.1.4 Visualizzazione di un calendario interattivo
  - 3.1.1.5 Visualizzazione delle note
  - 3.1.1.6 Visualizzazione delle e-mail

- 3.1.2 Interfaccia browser
  
  - 3.1.2.1 Visualizzazione risultati navigazione web

- 3.1.3 Interfaccia timer

  - 3.1.3.1 Visualizzazione del timer

- 3.1.4 <mark>Interfaccia messaggistica</mark>

- 3.1.5 Interfaccia riproduzione di contenuti multimediali

- 3.1.6 Interfaccia mappe
  
  - 3.1.6.1 Visualizzazione delle mappe

### 3.2 Requisiti tecnologici
  
- 3.2.1 Raspberry Pi (modello?)
- 3.2.2 Microfono
- 3.2.3 Fotocamera
- 3.2.4 Casse audio
- 3.2.5 Schermo (tipo?)
- 3.2.6 Telaio specchio
- 3.2.7 Two-way mirror

### 3.3 Requisiti di prestazione
  
Non si registrano particolari esigenze in questo ambito.

### 3.4 Requisiti di sicurezza

Non si registrano particolari esigenze in questo ambito.

### 3.5 Requisiti operativi

L'intero progetto è stato realizzato utilizzando i seguenti linguaggi:

- JavaScript
- CSS
- HTML

Si relaziona con sistemi operativi Raspberry Pi OS e applicazione Android.

### 3.6 Requisiti politici e legali

Non si registrano particolari esigenze in questo ambito.

### 3.7 Altri vincoli

Questa sezione è vuota.

---

## 4 Appendici
### 4.1 Glossario

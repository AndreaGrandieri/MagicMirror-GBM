---
# Specifies the "filament" HTML page to be used. The HTML page must be located in the "_layouts" folder.
# (should always be this)
layout: default

# Page title
# If omitted, the page will not be included in the navbar
title: Emulazione

# Specifies the order of the current page from the point of view of the navbar
# Can have repetition in the numbers, for parent-child hierarchies
nav_order: 9

# Let exclude the page from the navbar
nav_exclude: false

# If this page represents the parent page of a section that, therefore, has children, specify it in the following way
has_children: false

# If this page represents the child page of a section that, therefore, has ONE parent page, specify it in the following way
parent: MagicMirror-GBM

# If this page is a parent page, a Table Of Contents will be automatically generated containing all related child pages. Use the option below to disable this functionality.
has_toc: false

# If a child page has more children, add again
# # has_children: true

# To the children page(s) add
# # parent: NOME_PAGINA_GENITORE
# # grand_parent: NOME_PAGINA_NONNO__GENITORE_DEL_GENITORE

# Let exclude the page from the search engine (client-side)
search_exclude: false
---

# Emulazione
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

Per motivi di facilitazione nella distribuzione del contenuto, il file di deploy
della VM è stato diviso in più volumi, __tutti necessari alla ricostruzione del file
originale__. Dunque, procedere al download di tutti i singoli volumi qui sottoriportati,
per poi collocarli insieme in una unica cartella e, infine, estrarre l'archivio ZIP.
Il risultato è una VM in formato OVF, facilmente importabile in un software di emulazione
(consigliato: `VMWare`).
Download:

- <i class="fa-solid fa-file-zipper fa-2x"></i> [MagicMirror-GBM-Emulation-VM.zip](https://api.onedrive.com/v1.0/shares/u!aHR0cHM6Ly8xZHJ2Lm1zL3UvcyFBbXN0V05uOEVrRXVoSjFBaDJZcXJaSzZfaXRxa1E_ZT13YmNzM0c/root/content)
- <i class="fa-solid fa-file-zipper fa-2x"></i> [MagicMirror-GBM-Emulation-VM.z01](https://api.onedrive.com/v1.0/shares/u!aHR0cHM6Ly8xZHJ2Lm1zL3UvcyFBbXN0V05uOEVrRXVoSjFEWkotU3FKRVpScVJ1cUE_ZT1vbmp3TnU/root/content)
- <i class="fa-solid fa-file-zipper fa-2x"></i> [MagicMirror-GBM-Emulation-VM.z02](https://api.onedrive.com/v1.0/shares/u!aHR0cHM6Ly8xZHJ2Lm1zL3UvcyFBbXN0V05uOEVrRXVoSjFCdXpUNUt5Y21EYldyR2c_ZT1Zb3UycXQ/root/content)
- <i class="fa-solid fa-file-zipper fa-2x"></i> [MagicMirror-GBM-Emulation-VM.z03](https://api.onedrive.com/v1.0/shares/u!aHR0cHM6Ly8xZHJ2Lm1zL3UvcyFBbXN0V05uOEVrRXVoSjFFXzhQVkw1ME1tcnVDblE_ZT14SnVTZWE/root/content)

A fini di testing individuale e decentralizzato (la centralizzazione richiede inderogabilmente l'accesso all'hardware
del MagicMirror (vedi _(ultima versione)_ [Documento dei Requisiti](ArchivioDocumentiDeiRequisiti))), può essere utilizzata una __Virtual Machine__ (macchina
virtuale), presentante le seguenti configurazioni (consigliate):

- OS: `Ubuntu 20.04.2 LTS (o superiore)`
- Disco Rigido: `minimo 32GB`
- RAM: `minimo 4GB`
- Nome Personale: `MagicMirror-GBM-Emulation-VM`
- Nome PC: `magicmirrogbmemulationvm`
- Note utente: `magic-mirror-gbm-emulation-vm`
- Password: `gbm`

La macchina virtuale, una volta installata e operativa, necessita di essere inizializzata sulla base delle istruzioni riportate in [MagicMirror-GBM-OS](MagicMirror-GBM-OS).

## Limitazioni

Il processo di emulazione riesce a ricoprire la maggior parte delle funzionalità del MagicMirror.
E' doveroso tener presente che l'hardware del MagicMirror presenta alcune caratteristiche imprescindibili
per il funzionamento di varie componentistiche HWSW, le quali, di conseguenza, potrebbero presentare limitazioni e / o
malfunzionamenti nell'ambiente emulativo.

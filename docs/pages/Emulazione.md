---
layout: noheader
permalink: /:path/:basename:output_ext
---

# Emulazione

Per motivi di facilitazione nella distribuzione del contenuto, il file di deploy
della VM è stato diviso in più volumi, __tutti necessari alla ricostruzione del file
originale__. Dunque, procedere al download di tutti i singoli volumi qui sottoriportati,
per poi collocarli insieme in una unica cartella e, infine, estrarre l'archivio ZIP.
Il risultato è una VM in formato OVF, facilmente importabile in un software di emulazione
(consigliato: `VMWare`).
Download:

- ![file-archive.svg](../assets/favicon/file-archive.svg) [MagicMirror-GBM-Emulation-VM.zip](https://api.onedrive.com/v1.0/shares/u!aHR0cHM6Ly8xZHJ2Lm1zL3UvcyFBbXN0V05uOEVrRXVoSjFES21OVHByQWhIemtmTlE_ZT10ZzVoa0k/root/content)
- ![file-archive.svg](../assets/favicon/file-archive.svg) [MagicMirror-GBM-Emulation-VM.z01](https://api.onedrive.com/v1.0/shares/u!aHR0cHM6Ly8xZHJ2Lm1zL3UvcyFBbXN0V05uOEVrRXVoSjFES21OVHByQWhIemtmTlE_ZT1BNVJUQWg/root/content)
- ![file-archive.svg](../assets/favicon/file-archive.svg) [MagicMirror-GBM-Emulation-VM.z02](https://api.onedrive.com/v1.0/shares/u!aHR0cHM6Ly8xZHJ2Lm1zL3UvcyFBbXN0V05uOEVrRXVoSjFCdXpUNUt5Y21EYldyR2c_ZT1Zb3UycXQ/root/content)
- ![file-archive.svg](../assets/favicon/file-archive.svg) [MagicMirror-GBM-Emulation-VM.z03](https://api.onedrive.com/v1.0/shares/u!aHR0cHM6Ly8xZHJ2Lm1zL3UvcyFBbXN0V05uOEVrRXVoSjFFXzhQVkw1ME1tcnVDblE_ZT14SnVTZWE/root/content)

A fini di testing individuale e decentralizzato (la centralizzazione richiede inderogabilmente l'accesso all'hardware
del MagicMirror (vedi _(ultima versione)_ [Documento dei Requisiti](ArchivioDocumentiDeiRequisiti.md))), può essere utilizzata una __Virtual Machine__ (macchina
virtuale), presentante le seguenti configurazioni (consigliate):

- OS: `Ubuntu 20.04.2 LTS (o superiore)`
- Disco Rigido: `minimo 32GB`
- RAM: `minimo 4GB`
- Nome Personale: `MagicMirror-GBM-Emulation-VM`
- Nome PC: `magicmirrogbmemulationvm`
- Note utente: `magic-mirror-gbm-emulation-vm`
- Password: `gbm`

La macchina virtuale, una volta installata e operativa, necessita di essere inizializzata sulla base delle istruzioni riportate in [MagicMirror-GBM-OS](MagicMirror-GBM-OS.md).

## Limitazioni

Il processo di emulazione riesce a ricoprire la maggior parte delle funzionalità del MagicMirror.
E' doveroso tener presente che l'hardware del MagicMirror presenta alcune caratteristiche imprescindibili
per il funzionamento di varie componentistiche HWSW, le quali, di conseguenza, potrebbero presentare limitazioni e / o
malfunzionamenti nell'ambiente emulativo.

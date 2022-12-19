---
# Specifies the "filament" HTML page to be used. The HTML page must be located in the "_layouts" folder.
# (should always be this)
layout: alwaysnaviffamily

# Page title
# If omitted, the page will not be included in the navbar
title: MMM-ip

# Specifies the order of the current page from the point of view of the navbar
# Can have repetition in the numbers, for parent-child hierarchies
nav_order: 13

# Let exclude the page from the navbar
nav_exclude: false

# If this page represents the parent page of a section that, therefore, has children, specify it in the following way
has_children: false

# If this page represents the child page of a section that, therefore, has ONE parent page, specify it in the following way
parent: Documentazione Moduli
grand_parent: MagicMirror-GBM

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

# MMM-ip
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

## tl;dr

Visualizza gli indirizzi IP __locali__ delle interfacce di rete attive nel __Raspberry Pi__.

---

## Config JSON Fragment

```json
{
    "module": "MMM-ip",
    "position": "bottom_right",
    "config": {
        "fontSize": 18,
        "families": [
            "IPv4"
        ],
        "types": [
            "wlan0"
        ]
    }
}
```

---

## Proprietà (Config Section)

| Proprietà  | Tipo                | Valori                                                                                          | Valore Default | Inderogabilità | Descrizione                                                                                 |
| ---------- | ------------------- | ----------------------------------------------------------------------------------------------- | -------------- | -------------- | ------------------------------------------------------------------------------------------- |
| `fontSize` | `Integer`           | Qualsiasi valore `> 0`. Unità di misura: `pixel`.                                               | `9`            | `OPTIONAL`     | Dimensione in pixel del font per la visualizzazione degli elementi renderizzati dal modulo. |
| `families` | `Array` -> `String` | `"IPv4"`: Visualizza indirizzi IPv4. <br> `"IPv6"`: Visualizza indirizzi IPv6 .                 | `---`          | `REQUIRED`     | Tipologia / Tipologie di indirizzi IP da visualizzare.                                      |
| `types`    | `Array` -> `String` | Nome interfaccia / interfacce di rete da monitorare. _Guarda sotto per ulteriori informazioni_. | `---`          | `REQUIRED`     | Interfaccia / Interfacce di rete da monitorare.                                             |

---

## Notifiche

Le notifiche sono uno strumento utilizzato dai moduli per comunicare con:

- L'OS del MagicMirror
- Altri moduli
- Attori umani

_Niente da segnalare._

---

## Screenshots

Schermata del modulo in esecuzione correttamente:

_In questo esempio `ens33` è il nome dell'interfaccia di rete._

[![working_module.PNG](../../../assets/MMM-ip/working_module.PNG)](../../../assets/MMM-ip/working_module.PNG)

---

## Interfaccia di Rete

Solitamente le interfacce di rete di default per un __Raspberry Pi__ in
_situazione normale_ (cioè senza modifiche alle impostazioni di default dell'OS)
sono le seguenti:

- Ethernet: `eth0`
- WIFI: `wlan0`

Questi sono i comandi per ottenere informazioni sulle interfacce di rete del
proprio __Raspberry Pi__. Essi vanno eseguiti nell'applicazione `Terminal`:

```shell
netstat -i
```

Output:

Il nostro interesse è sulla colonna `Iface`, che riporta i nomi delle interfacce.

```shell
Kernel Interface table
Iface      MTU    RX-OK RX-ERR RX-DRP RX-OVR    TX-OK TX-ERR TX-DRP TX-OVR Flg
eth0      1500        0      0      0 0             0      0      0      0 BMU
lo       65536        0      0      0 0             0      0      0      0 LRU
wlan0     1500      228      0      0 0            81      0      0      0 BMRU
```

> L'interfaccia `lo` sarà sempre presente. Essa rappresenta l'interfaccia di _loopback_.
> Per quanto riguarda il seguente modulo, essa __NON__ deve essere presa in considerazione.

Link per riferimenti utili: [https://www.cyberciti.biz/faq/linux-list-network-interfaces-names-command/](https://www.cyberciti.biz/faq/linux-list-network-interfaces-names-command/)

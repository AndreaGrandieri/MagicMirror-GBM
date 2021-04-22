---
layout: noheader
permalink: /:path/:basename:output_ext
---

# MagicMirror-GBM-OS

Il MagicMirror-GBM è reso funzionale dal suo sistema operativo: `MagicMirror-GBM-OS`.

Download: _QUI BOTTONE / LINK DOWNLOAD BINARIO_

---

## Specifiche

Ecco riportate le principali caratteristiche e requisiti essenziali:

- Distribuzione: `Raspberry Pi OS Full (32-bit)`
- Raspberry Pi: `3 o superiore`
- Storage Memory: `minimo 8GB`
- RAM: `minimo 1GB`

---

## Costruzione

Di seguito riportati i passaggi per costruire il `MagicMirror-GBM-OS` partendo da una distribuzione `Raspberry Pi OS Full (32-bit)` grezza:

1. Disattivare spegnimento automatico schermo Raspberry:

    ```shell
    # Accesso al file "autostart"
    sudo nano /etc/xdg/lxsession/LXDE-pi/autostart

    # Appendere (in coda) al contenuto del file:
    @xset s off
    @xset -dpms
    ```

2. Installare `nodejs`:

    ```shell
    sudo apt install nodejs
    ```

3. Installare `npm`:

    ```shell
    sudo apt install npm
    ```

4. Installare `npm-recursive-install`:

    ```shell
    sudo npm i -g recursive-install
    ```

5. Installare `electron` globalmente:

    ```shell
    sudo npm install -g electron --unsafe-perm=true --allow-root
    ```

6. Installare `bcm2835`:

    ```shell
    wget http://www.airspayce.com/mikem/bcm2835/bcm2835-1.52.tar.gz
    tar zxvf bcm2835-1.52.tar.gz
    cd bcm2835-1.52
    ./configure
    make
    sudo make check
    sudo make install
    ```

7. Installare `raspotify`:

    ```shell
    sudo curl -sL https://dtcooper.github.io/raspotify/install.sh | sh
    ```

_Qui gli altri step_

ultimo_step. Riavviare il Raspberry:

    ```shell
    sudo shutdown -r now
    ```

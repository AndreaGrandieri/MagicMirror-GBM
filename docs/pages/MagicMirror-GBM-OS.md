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
    ```

    Appendere (in coda) al contenuto del file:

    ```txt
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

8. Clonare repo `AndreaGrandieri/MagicMirror-GBM` nella dir `~`:

    ```shell
    git clone https://www.github.com/AndreaGrandieri/MagicMirror-GBM
    ```

9. Installazione LAMP (Linux, Apache, MySQL, PHP)

    ```shell
    sudo apt install apache2
    sudo apt install mysql-server
    sudo mysql_secure_installation
    sudo apt install php libapache2-mod-php php-mysql
    ```

    Modifica della root di serving per Apache

    ```shell
    cd /etc/apache2/sites-available

    # Accesso al file "000-default.conf"
    sudo nano 000-default.conf
    ```

    Modificare l'opzione `DocumentRoot` nel file:

    ```conf
    DocumentRoot /MagicMirror-GBM/src/ipdashboard
    ```

    Riavviare il servizio `apache2`:

    ```shell
    sudo service apache2 restart
    ```

_ultimo\_step_. Riavviare il Raspberry:

    ```shell
    sudo shutdown -r now
    ```

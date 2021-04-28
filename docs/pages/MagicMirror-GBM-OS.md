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

- Distribuzione: `Raspberry Pi OS (32-bit)`
- Raspberry Pi: `3 o superiore`
- Storage Memory: `minimo 8GB`
- RAM: `minimo 1GB`
- Username: `MagicMirror-GBM-User`
- Password: `magicmirrorgbm`
- Internet configurations: _none_

---

## Costruzione

Di seguito riportati i passaggi per costruire il `MagicMirror-GBM-OS` partendo da una distribuzione `Raspberry Pi OS Full (32-bit)` grezza.
Parte delle seguenti istruzioni sono compatibili per costruire la `MagicMirror-GBM-Emulation-VM`. Esse sono indicate con: ___(+VM)___:

1. __SOLO__ ___(+VM)___: Installare tools vmware:

    ```shell
    sudo apt install open-vm-tools-desktop open-vm-tools
    ```

2. Disattivare spegnimento automatico schermo Raspberry:

    ```shell
    # Accesso al file "autostart"
    sudo nano /etc/xdg/lxsession/LXDE-pi/autostart
    ```

    Appendere (in coda) al contenuto del file:

    ```txt
    @xset s off
    @xset -dpms
    ```

3. Installare `nodejs` ___(+VM)___:

    ```shell
    sudo apt install nodejs
    ```

4. Installare `npm` ___(+VM)___:

    ```shell
    sudo apt install npm
    ```

5. Installare `npm-recursive-install` ___(+VM)___:

    ```shell
    sudo npm i -g recursive-install
    ```

6. Installare `electron` globalmente ___(+VM)___:

    ```shell
    sudo npm install -g electron --unsafe-perm=true --allow-root
    ```

7. Installare `bcm2835`:

    ```shell
    wget http://www.airspayce.com/mikem/bcm2835/bcm2835-1.52.tar.gz
    tar zxvf bcm2835-1.52.tar.gz
    cd bcm2835-1.52
    ./configure
    make
    sudo make check
    sudo make install
    ```

8. Installare `raspotify`:

    ```shell
    sudo curl -sL https://dtcooper.github.io/raspotify/install.sh | sh
    ```

    Configurazione denominazione cast service:

    ```shell
    # Accesso al file "raspotify"
    sudo nano /etc/default/raspotify
    ```

    Modificare l'opzione `DEVICE_NAME` nel file:

    ```txt
    DEVICE_NAME="MagicMirror-GBM-spotify-cast"
    ```

9. __SOLO__ ___(+VM)___: Installare `git`:

    ```shell
    sudo apt install git
    ```

10. Clonare repo `AndreaGrandieri/MagicMirror-GBM` nella dir `~` ___(+VM)___:

    ```shell
    git clone https://www.github.com/AndreaGrandieri/MagicMirror-GBM
    ```

11. Installazione LAMP (Linux, Apache, MySQL, PHP) ___(+VM)___:

    ```shell
    sudo apt install apache2
    sudo apt install mysql-server
    sudo mysql_secure_installation
    ```

    mysql_secure_installation:

    ```shell
    VALIDATE PASSWORD COMPONENT: NO
    Password: gbm
    Remove anonymous users: NO
    Disallow root login remotely: NO
    Remove test database and access to it: YES
    Reload privilegies table now: YES
    ```

    ```shell
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

12. Imposto dispositivo di default per output audio (OS + Raspotify)
    [https://github.com/AndreaGrandieri/MagicMirror-GBM/issues/76#issuecomment-827711074](https://github.com/AndreaGrandieri/MagicMirror-GBM/issues/76#issuecomment-827711074)
    [https://github.com/AndreaGrandieri/MagicMirror-GBM/issues/228#issuecomment-828311332](https://github.com/AndreaGrandieri/MagicMirror-GBM/issues/228#issuecomment-828311332)

    ```shell
    # Accesso al file "raspotify" (riferimenti utili: https://github.com/AndreaGrandieri/MagicMirror-GBM/issues/76#issuecomment-827711074)
    sudo nano /etc/default/raspotify
    ```

    Modifica l'opzione `OPTIONS` nel file:

    ```txt
    OPTIONS="--device hw:1"
    ```

    ```shell
    # Accesso al file "default.pa" (riferimenti utili: https://github.com/AndreaGrandieri/MagicMirror-GBM/issues/228#issuecomment-828311332)
    sudo nano /etc/pulse/default.pa
    ```

    Modifica l'opzione `set-default-sink` nel file:

    ```pa
    set-default-sink alsa_output.platform-bcm2835_audio.analog-stereo
    ```

13. Riavviare il Raspberry ___(+VM)___:

    ```shell
    sudo shutdown -r now
    ```

14. Eseguire installazione ricorsiva nella dir `~/MagicMirror-GBM/src` con checkout del branch `main` ___(+VM)___:

    ```shell
    npm-recursive-install
    ```

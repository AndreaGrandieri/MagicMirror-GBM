# Istruzioni testing

## Note Preliminari

Per utilizzare i comandi relativi a `git`, installarlo prima con: `sudo apt install git`.

Per installare `nodejs`: `sudo apt install nodejs`.

Per utilizzare i comandi relativi a `npm`, installarlo prima con: `sudo apt install npm`.

Per utilizzare `npm-recursive-install`, installarlo prima con: `sudo npm i -g recursive-install`.

## Steps

La repository è clonata nella directory `Documents`.

Utilizzando il terminale, recarsi nella directory `Documents/MagicMirror-GBM` e selezionare il branch desiderato.

Il MagicMirrorOS + Moduli sono localizzati nella directory `./MagicMirror-GBM/src`.

In questa directory andrebbe eseguito il comando `npm-recursive-install` se mai effettuato prima e
ogni qualvolta si aggiorna la repository (*).

Per avviare il testing utilizzare il comando `npm run start`.

Per arrestare il testing, inviare il comando di alt `CTRL+C` nel terminale utilizzato per avviare il suddetto test.

Per aggiornare con le nuove modifiche dalla repository, utilizzare `git pull`.
(*) E' necessario effettuare nuovamente `npm-recursive-install` ad ogni `git pull`.

## Links

Documentazione relativa a `npm-recursive-install`:
[https://www.npmjs.com/package/recursive-install](https://www.npmjs.com/package/recursive-install)

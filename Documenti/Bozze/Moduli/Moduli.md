# Moduli

Lista di Moduli (aka: funzionalità) da inserire potenzialmente nello specchio.

---

## Moduli Sicuri

| Nome                                                                                | Descrizione                                                                                  | Link                                                                     |
| ----------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------ |
| MMM-AirQuality <p style="background-color:green;">NO API KEY</p>                    | Mostra la qualità dell'aria per la zona specificata                                          | [MMM-AirQuality](https://github.com/CFenner/MMM-AirQuality)              |
| MMM-DHT <p style="background-color:green;">NO API KEY</p>                           | Mostra temperatura e umidità locali (usa sensore: `DHT11`)                                   | [MMM-DHT](https://github.com/bernardpletikosa/MMM-DHT-Sensor)            |
| News Feed <p style="background-color:green;">NO API KEY</p>                         | Mostra le news più recenti                                                                   | [News Feed](https://docs.magicmirror.builders/modules/newsfeed.html)     |
| MMM-AVStock <p style="background-color:red;">API KEY</p>                            | Mostra gli aggiornamenti relativi alle quotazioni in borsa                                   | [MMM-AVStock](https://github.com/lavolp3/MMM-AVStock)                    |
| Clock <p style="background-color:green;">NO API KEY</p>                             | Mostra data e ora correnti                                                                   | [Clock](https://docs.magicmirror.builders/modules/clock.html)            |
| Weather Module <p style="background-color:green;">NO API KEY</p>                    | Mostra il meteo della settimana corrente                                                     | [Weather Module](https://docs.magicmirror.builders/modules/weather.html) |
| Calendar <p style="background-color:green;">NO API KEY</p>                          | Mostra un calendario interattivo                                                             | [Calendar](https://docs.magicmirror.builders/modules/calendar.html)      |
| Alert <p style="background-color:green;">NO API KEY</p>                             | Gestisce le notifiche del sistema                                                            | [Alert](https://docs.magicmirror.builders/modules/alert.html)            |
| MMM-StopwatchTimer <p style="background-color:green;">NO API KEY</p>                | Mostra un timer/cronometro                                                                   | [MMM-StopwatchTimer](https://github.com/Klettner/MMM-StopwatchTimer)     |
| MMM-Memo <p style="background-color:green;">NO API KEY</p>                          | Gestisce le annotazioni                                                                      | [MMM-Memo](https://github.com/schnibel/MMM-Memo)                         |
| Camera <p style="background-color:green;">NO API KEY</p>                            | Gestisce l'utilizzo di una fotocamera                                                        | [Camera](https://github.com/alexyak/camera)                              |
| MMM-Screencast <p style="background-color:green;">NO API KEY</p>                    | Permette di effettuare il cast di contenuti multimediali                                     | [MMM-Screencast](https://github.com/kevinatown/MMM-Screencast)           |
| MMM-Mail <p style="background-color:yellow;">MAIL, PSSW, LOW-LEVEL-SECURITY-APP</p> | Permette la visualizzazione delle email in entrata (sola lettura. Nessuna opzione di invio.) | [MMM-Mail](https://github.com/MMPieps/MMM-Mail)                          |
| annyang <p style="background-color:green;">NO API KEY</p>                           | Gestisce il riconoscimento vocale                                                            | [annyang](https://github.com/TalAter/annyang)                            |
| openlayers <p style="background-color:green;">NO API KEY</p>                        | Mostra mappe interattive                                                                     | [openlayers](https://github.com/openlayers/openlayers)                   |

---

## Music Streaming

__Beta__.

| Nome                    | Descrizione                                                                                              | Link                                                                        |
| ----------------------- | -------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------- |
| raspotify               | Abilità un dispositivo __Raspberry Pi__ al __Cast Spotify__.                                             | [raspotify](https://github.com/dtcooper/)                                   |
| MMM-NowPlayingOnSpotify | Visualizza informazioni riguardo ___Current Playing On Spotify___. _Non permette lo streaming musicale_. | [MMM-NowPlayingOnSpotify](https://github.com/raywo/MMM-NowPlayingOnSpotify) |

---

## Problemi

`Invio email`: sarebbe opportuno fornire un servizio di invio email, che fungerebbe da servizio di messaggistica direttamente dal Magic Mirror.
Una soluzione potrebbe essere riscontrata qui: [https://iotdesignpro.com/projects/sending-smtp-email-using-raspberry-pi](https://iotdesignpro.com/projects/sending-smtp-email-using-raspberry-pi).
__Per adesso è possibile solo la lettura di email__.
__Per adesso non è stato ancora individuato un modulo _MMM___.

`Streaming Musicale da Spotify`: moduli già individuati e riportati nella tabella `Music Streaming` sopra riportata. Questi, però, fanno affidamento alle
__Spotify API__, che richiedono un __ACCOUNT CON ABBONAMENTO PREMIUM__ per l'utilizzo. Questo può creare disagi!
_Potrebbe essere necessario e OPPORTUNO cambiare piattaforma di streaming musicale o __LIMITARSI ALL'USO DI__: [MMM-Screencast](https://github.com/kevinatown/MMM-Screencast)_.

## Link Utili

[https://github.com/MichMich/MagicMirror/wiki/3rd-party-modules](https://github.com/MichMich/MagicMirror/wiki/3rd-party-modules)
[https://www.youtube.com/watch?v=Mlb2EyzlZRE&ab_channel=misperry](https://www.youtube.com/watch?v=Mlb2EyzlZRE&ab_channel=misperry)

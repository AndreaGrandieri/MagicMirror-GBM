# Moduli

Lista di Moduli (aka: funzionalità) da inserire potenzialmente nello specchio.

---

## Moduli Sicuri

| Nome               | Descrizione                                                                                  | Link                                                                     |
| ------------------ | -------------------------------------------------------------------------------------------- | ------------------------------------------------------------------------ |
| MMM-AirQuality     | Mostra la qualità dell'aria per la zona specificata                                          | [MMM-AirQuality](https://github.com/CFenner/MMM-AirQuality)              |
| MMM-DHT            | Mostra temperatura e umidità locali (usa sensore: `DHT11`)                                   | [MMM-DHT](https://github.com/bernardpletikosa/MMM-DHT-Sensor)            |
| MMM-EveryNews      | Mostra le news più recenti                                                                   | [MMM-EveryNews](https://github.com/mykle1/MMM-EveryNews)                 |
| MMM-AVStock        | Mostra gli aggiornamenti relativi alle quotazioni in borsa                                   | [MMM-AVStock](https://github.com/lavolp3/MMM-AVStock)                    |
| Clock              | Mostra data e ora correnti                                                                   | [Clock](https://docs.magicmirror.builders/modules/clock.html)            |
| Weather Module     | Mostra il meteo della settimana corrente                                                     | [Weather Module](https://docs.magicmirror.builders/modules/weather.html) |
| Calendar           | Mostra un calendario interattivo                                                             | [Calendar](https://docs.magicmirror.builders/modules/calendar.html)      |
| Alert              | Gestisce le notifiche del sistema                                                            | [Alert](https://docs.magicmirror.builders/modules/alert.html)            |
| MMM-StopwatchTimer | Mostra un timer/cronometro                                                                   | [MMM-StopwatchTimer](https://github.com/Klettner/MMM-StopwatchTimer)     |
| MMM-Memo           | Gestisce le annotazioni                                                                      | [MMM-Memo](https://github.com/schnibel/MMM-Memo)                         |
| Camera             | Gestisce l'utilizzo di una fotocamera                                                        | [Camera](https://github.com/alexyak/camera)                              |
| MMM-Screencast     | Permette di effettuare il cast di contenuti multimediali                                     | [MMM-Screencast](https://github.com/kevinatown/MMM-Screencast)           |
| MMM-Mail           | Permette la visualizzazione delle email in entrata (sola lettura. Nessuna opzione di invio.) | [MMM-Mail](https://github.com/MMPieps/MMM-Mail)                          |

---

## Assistente Vocale

Sono riportate diverse possibilità __ancora in discussione__.

| Nome                | Descrizione                       | Link                                                                    |
| ------------------- | --------------------------------- | ----------------------------------------------------------------------- |
| MMM-GoogleAssistant | Gestisce il riconoscimento vocale | [MMM-GoogleAssistant](https://github.com/bugsounet/MMM-GoogleAssistant) |
| MMM-Hello-Mirror    | Gestisce il riconoscimento vocale | [MMM-Hello-Mirror](https://github.com/Matzefication/MMM-Hello-Mirror)   |

---

## Music Streaming

__Beta__.

| Nome                    | Descrizione                                                                                              | Link                                                                        |
| ----------------------- | -------------------------------------------------------------------------------------------------------- | --------------------------------------------------------------------------- |
| raspotify               | Abilità un dispositivo __Raspberry Pi__ al __Cast Spotify__.                                             | [raspotify](https://github.com/dtcooper/)                                   |
| MMM-NowPlayingOnSpotify | Visualizza informazioni riguardo ___Current Playing On Spotify___. _Non permette lo streaming musicale_. | [MMM-NowPlayingOnSpotify](https://github.com/raywo/MMM-NowPlayingOnSpotify) |

---

## Mappe

| Nome                  | Descrizione               | Link                                                                      |
| --------------------- | ------------------------- | ------------------------------------------------------------------------- |
| MMM-GoogleMapsTraffic | Mostra mappe interattive. | [MMM-GoogleMapsTraffic](https://github.com/vicmora/MMM-GoogleMapsTraffic) |

---

## Problemi

`Invio email`: sarebbe opportuno fornire un servizio di invio email, che fungerebbe da servizio di messaggistica direttamente dal Magic Mirror.
Una soluzione potrebbe essere riscontrata qui: [https://iotdesignpro.com/projects/sending-smtp-email-using-raspberry-pi](https://iotdesignpro.com/projects/sending-smtp-email-using-raspberry-pi).
__Per adesso è possibile solo la lettura di email__.
__Per adesso non è stato ancora individuato un modulo _MMM___.

`Mappe`: sarebbe opportuno fornire un servizio di consultazione mappe digitali direttamente dal Magic Mirror.
Una soluzione potrebbe essere riscontrata dal seguente modulo: [https://github.com/vicmora/MMM-GoogleMapsTraffic](https://github.com/vicmora/MMM-GoogleMapsTraffic).
Questo, però, __necessita di una API Key Google__, ottenibile da [https://developers.google.com/](https://developers.google.com/) con la richiesta di un
__ACCOUNT GOOGLE PERSONALE__ con __METODO DI PAGAMENTO VALIDO ASSOCIATO!__. Questo può creare disagi!

`Assistente Vocale`: il modulo ideale è il seguente: [https://github.com/bugsounet/MMM-GoogleAssistant](https://github.com/bugsounet/MMM-GoogleAssistant).
Questo, però, è da analizzare più specificatamente, in quanto la configurazione dell'Assistente Google richiede la __REGISTRAZIONE DEL PRODOTTO USUFRUENTE
(i.e. Magic Mirror)__ con i servizi __Google Cloud Platform__: [Google Cloud Platform](https://cloud.google.com/gcp/?hl=it&utm_source=google&utm_medium=cpc&utm_campaign=emea-it-all-it-dr-bkws-all-all-trial-e-gcp-1009139&utm_content=text-ad-none-any-DEV_c-CRE_187871187501-ADGP_Hybrid%20%7C%20BKWS%20-%20EXA%20%7C%20Txt%20~%20GCP%20~%20General%23v8-KWID_43700053282341344-aud-606988878214%3Akwd-49842666111-userloc_20544&utm_term=KW_clouds%20google-NET_g-PLAC_&ds_rl=1242853&ds_rl=1245734&ds_rl=1242853&ds_rl=1245734&gclid=Cj0KCQiAj9iBBhCJARIsAE9qRtAgZijxwlHd9Yj6R04YYbL3mEgHP7mv6yxS_tCkYasP02T7AeTisfkaApIwEALw_wcB).
Questi potrebbero richiedere __COSTI__!

`Streaming Musicale da Spotify`: moduli già individuati e riportati nella tabella `Music Streaming` sopra riportata. Questi, però, fanno affidamento alle
__Spotify API__, che richiedono un __ACCOUNT CON ABBONAMENTO PREMIUM__ per l'utilizzo. Questo può creare disagi!
_Potrebbe essere necessario e OPPORTUNO cambiare piattaforma di streaming musicale o __LIMITARSI ALL'USO DI__: [MMM-Screencast](https://github.com/kevinatown/MMM-Screencast)_.

## Link Utili

[https://github.com/MichMich/MagicMirror/wiki/3rd-party-modules](https://github.com/MichMich/MagicMirror/wiki/3rd-party-modules)
[https://www.youtube.com/watch?v=Mlb2EyzlZRE&ab_channel=misperry](https://www.youtube.com/watch?v=Mlb2EyzlZRE&ab_channel=misperry)

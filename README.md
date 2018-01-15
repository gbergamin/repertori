# Pagina web con elenco di risorse in rete  (anche _aggiornabile da un foglio excel_) 

L'obiettivo è quello di presentare una pagina di risorse in rete e di poterla modificare a  partire da un foglio excel.

Inoltre si prende anche in conto il caso che alcune risorse  siano accessibili (per esempio per questioni di licenza) solo a partire da determinati indirizzi IP

Tutte le risorse vengono comunque presentate: se l'indirizzo IP chiamante non può accedere a una determinata risorsa, quella risorsa non avrà il collegamento ipertestuale (link) attivo 

La realizzazione - basata su _spaghetti coding_ - vuole semplicemente dare un'idea delle possibilità

## Configurazione
Il file _config.live_ deve essere completato:
* con *$indirizzo_file* (il file tsv contenente le risorse da presentare)
* con l'elenco degli indirizzi ip che potranno accedere  a tutte le risorse(per tutti gli altri indirizzi ip chiamanti, la pagina presentata non avrà - per le risorse con limitazioni di accesso - i link attivati).Il formato del file à descritto nel paragrafo successivo.
*header.php*,  *footer.php* e *index.php* dovranno essere personalizzati (vengono distribuiti con la prova fatta per la Biblioteca Nazionale Centrale di Firenze)

**Importante**: rinominare il file *config.live* - configurato - in *config.live.php*


## File tsv
Il file tsv deve avere il formato conforme al file  distribuito *esempio_risorse.tsv*
E' possibile indicare un file locale o un file accessibile in rete (ad esempio un *Foglio* di *Google drive* pubblicato su WEB come *tsv*. In questo ultimo caso sarà possibile aggiornare la pagina web automaticamente a partire dal *Foglio* di *Google_drive*)
 



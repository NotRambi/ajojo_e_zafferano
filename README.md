# Ajojo & Zafferano

Questo sito web è stato realizzato come progetto di gruppo per il corso di Linguaggi e Tecnologie per il Web presso La Sapienza, l'intero sviluppo del sito web è stato realizzato scrivendo codice originale o utilizzando librerie open source disponibili in rete.

## Idea di fondo

Ajojo & Zafferano è un sito web che permette di consultare un ampio ricettario online, con la possibilità di cercare ricette in base agli ingredienti presenti nel proprio frigorifero. Infatti tramite l'inserimento di una lista di ingredienti nella seconda pagina del sito sarà possibile visualizzare tutte le ricette contenenti quest'ultimi. Sarà inoltre possibile lasciarsi ispirare dalle varie sezioni della pagina principale, nella quale in base alle categorie alla quale appartengono verranno consigliate ricette selezionate.
Per ottenere completo accesso al sito sarà possibile creare un proprio account personale, tramite il quale si potranno salvare le ricette preferite o filtrarle segnalando le proprie intolleranze o preferenze alimentari.


<p align="center">
  <img width=400 alt="Logo" src="logo.png">
</p>


# Documentazione

## index.php
questo file contiene la struttura della pagina principale del sito, al suo interno oltre al codice _HTML_ che definisce gli elementi che compongono la pagina contiene anche le classi _CSS_ per definirne lo stile, gli script _JS_ che ne permettono il funzionamento, e le funzioni _PHP_ che gestiscono il collegamento con il DataBase.

La pagina è organizzata in 5 sezioni, tutte raggiungibili velocemente grazie alle carte visualizzabili ad inizio pagina:
- La prima sezione è una lista di categorie che rimandano al ricettario filtrando o per tipo di portata o preapplicando i filtri disponibili;
- La seconda sezione è una collezione di ricette selezionate separate in base alle categorie di appartenenza;
- La terza sezione è una dedica al mondo del cibo stellato, passando dalla storia della Stella Micheline arrivando alle nostre offerte di ricette stellate;
- La quarta sezione è un riferimento all'importanza della scelta di ingredienti di buona qualità, nella quale vengono illustrati gli errori principali spesso commessi nella scelta tra più ingredienti;
- L'ultima sezione è il Footer della pagina, nella quale sono presenti informazioni utili sul sito stesso e sul team di sviluppo.

## frigo.php
questo file definisce la seconda pagina accedibile tramite la barra di navigazione "Frigorifero", nella quale è possibile inserire in un form dinamico tutti gli ingredienti disponibili, i quali tramite una richiesta di tipo POST verranno poi inseriti nella query _SQL_ dal codice di ricettario.php. Inoltrè sono presenti gli stili _CSS_ e gli script _JS_ necessari. 

## ricettario.php
questo file definisce la terza pagina della barra di navigazione "Ricetario". IL codice _PHP_ e _JS_ gestiscono tutte le richieste in arrivo dalle altre due pagine convertendole in una query _SQL_ inviata al DataBase, questo permette di mostrare tutte le ricette presenti nel DB ed eventualmente filtrarle. E' possibile filtrare in base al tipo di portata, al nome della ricetta, agli ingredienti che compongono la ricetta, o in base alla catageria di appartenenza (Piccante, Senza Glutine, Vegano, Leggero, Stellato).

## profilo.php
questo file definisce la pagina che mostra il proprio profilo personale, accedibile tramite il botton in alto a destra della barra di navigazione. In questa pagina è possibile visualizzare e modificare le proprie informazioni personale, oltre che gestire le ricette preferite o visualizzarle per intero dal ricettario.

## File Ausiliari
sono una serie di file _PHP_ che vengono chiamati solamente tramite richieste _XML_ ma che no definiscono una vera pagina visitabile:
### delUser.php
- funzione chiamata quando si prova ad eliminare un account dalla pagina Profilo.
### filtri.php
- funzione che aggiorna i filtri salvati nella sessione corrente chiamata dalla pagina Ricettario cliccando sui fari filtri o selezionando il tipo di portata. 
### logout.php
- funzione chiamata dal profilo che permette di annullare la sessione corrente.
### preferiti.php
- funzione chiamata da Profilo o da Ricettario quando si aggiunge o toglie una ricetta dai preferiti, serve ad aggiornare la tabella del DB che gestisce i preferiti.

## Altri File
### creaRicette.py
- script in python che permette di generare velocemente nuove ricette inserendo tutti i dati necessarie, stampando in output il formato corretto per _SQL_.
### query frigo.txt
- file di testo contenente la query _SQL_ necessaria per creare o aggiornare il DataBase, necessario da usare almeno una volta per far funzionare correttamente il sito.


# Come Usare
per utilizzare questo sito è necessario scaricare PostGreSQL (ad esempio tramite PgAdmin), XAMPP e un IDE che permette di hostare un server PHP (come VSCode con le estenzioni del caso).
Per prima cosa è necessario creare un profilo per SQL con cui creare un nuovo DataBase chiamato "ajojo",
successivamente popolare le tabelle del DB mandando la query scritta in query_frigo.txt,
infine aprire index.php con VS Code e avviare il server PHP sul localhost:3000 grazie all'estensione "PHP Server"

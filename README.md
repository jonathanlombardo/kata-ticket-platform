# KataTicket

## About

L'applicazione permette di gestire ticket di supporto per ottimizzare il servizio clienti.

## Features

#### Autenticazione:

```
L'utente può registrarsi ed autenticarsi per gestire i ticket di supporto.

La piattaforma prevede un solo ruolo per gli utenti, ossia il ruolo d'amministratore.

Tutte le pagine sono raggiungibili solo dall'utente autenticato, ad eccezione della registrazione/login e della home pubblica.
```

#### Gestione dei Ticket

-   La creazione di un Ticket permette di assegnare:

    -   Un titolo, una descrizione e delle note;
    -   Uno specifico operatore solo se disponibile;
    -   Una specifica categoria;
    -   Una specifica priorità;

-   La modifica di un ticket permette di.

    -   Assegnare un nuovo stato al ticket;

-   L'eliminazione di un ticket permette di:

    -   Eliminare il ticket senza perdere i dati ad esso relativi che resteranno salvati a sistema,
    -   Evitare eliminazioni accidentali tramite richiesta di conferma;

-   La ricerca di un ticket permette di:
    -   Ricercare i ticket con filtri istantanei e senza refresh della pagina;
    -   Ricercare i ticket in base alla data di creazione;
    -   Ricercare i ticket in base alla categoria assegnate;
    -   Ricercare i ticket in base all'operatore assegnato;
    -   Ricercare i ticket in base allo stato assegnato;
    -   Visualizzare risultati impaginati evitando lunghi caricamenti;
    -   Applicare più filtri con un solo un caricamento;

#### Gestione Categorie

-   La gestione delle categorie permette di:
    -   Visualizzare, creare, aggiornare ed eliminare le categorie;
    -   Evitare eliminazioni accidentali tramite richiesta di conferma;
    -   Mantenere i dati salvati a sistema dopo l'eliminazione per una corretta visualizzazione di ticket ai quali era stata assegnata la categoria eliminata;

#### Gestione degli Operatori

-   La gestione degli operatori permette di:

    -   Visualizzare, creare, aggiornare ed eliminare gli operatori;
    -   Evitare eliminazioni accidentali tramite richiesta di conferma;
    -   Mantenere i dati salvati a sistema dopo l'eliminazione per una corretta visualizzazione di ticket ai quali era stato assegnato l'operatore eliminato;

-   Ogni operatore è considerato disponibile all'assegnazione di un ticket solo se non ha altri ticket ancora in lavorazione ed è stato contrassegnato come disponibile tramite l'apposita opzione (in fase di creazione e/o aggiornamento);

## Next Features

#### Validazione dei form

E' in fase di sviluppo la validazione dei form per accompagnare l'utente ad una corretta compilazione.

#### Mail transazionali

E' in fase di sviluppo l'integrazione dell'invio di mail automatiche agli operatori ai quali viene assegnato un ticket.

#### Smaltimento della coda

E' in fase di sviluppo l'integrazione di un sistema di auto smaltimento dei ticket in coda. Se tutti gli operatori sono occupati il ticket verrà messo in coda e, una volta che si sarà liberato un'operatore, gli verrà assegnato un ticket in base alla priorità dello stesso.

## Tecnologie utilizzate

-   BackEnd in PHP 8.1 con framework [Laravel 10.x](https://laravel.com/)
-   FrontEnd in [Blade](https://laravel.com/docs/10.x/blade) con integrazione di [Vue.js](https://vuejs.org/) via CDN.
-   Chiamate API Restfull tramite [Axios](https://axios-http.com/)
-   Styling in [SASS SCSS](https://sass-lang.com/)
-   Precompilazione tramite [Vite](https://vitejs.dev/)

## Inizializzare il progetto

-   Creare il file `.env` a partire dal file `.env.example`;
-   Eseguire il comando `composer i` per installare le dipendenze composer;
-   Eseguire il comando `php artisan key:generate` per generare l'APP_KEY;
-   Eseguire il comando `npm i` per installare le dipendenze NPM;
-   Eseguire il comando `php artisan serve` per eseguire l'app in locale;
-   Eseguire il comando `npm run dev` per eseguire il frontend in locale;

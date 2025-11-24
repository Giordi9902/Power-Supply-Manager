# Power-Supply-Manager

PowerSupply Manager è un'applicazione web progettata per gestire e monitorare alimentatori elettrici. Consente di aggiungere, modificare, eliminare e visualizzare dettagli sugli alimentatori, con funzionalità avanzate come ricerca multifiltro, ordinamento e gestione utenti.

## Stack Tecnologico

- **Linguaggio Backend**: PHP 8.x
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, Bootstrap 5
- **Server Web**: Apache
- **Gestione Sessioni**: PHP Sessions
- **Architettura**: MVC (Model-View-Controller)

## Funzionalità Principali

- **Gestione Utenti**:
  - Registrazione e login con hashing delle password.
  - Autenticazione basata su sessioni.
- **Gestione Alimentatori**:
  - Aggiunta, modifica e cancellazione di alimentatori.
  - Visualizzazione dettagliata di ogni alimentatore.
  - Ricerca avanzata con filtri e ordinamento.
- **Interfaccia Utente**:
  - Design responsivo con Bootstrap 5.
  - Finestra modale per conferme (es. eliminazione, annullamento modifiche).
  - Tabelle interattive con frecce per ordinamento.
- **Sicurezza**:
  - Protezione contro SQL Injection con PDO.
  - Validazione e sanitizzazione dei dati utente.

## Requisiti

- PHP 8.x o superiore
- MySQL 5.7 o superiore
- Apache con `mod_rewrite` abilitato

## Installazione

1. Clona la repository:
   ```bash
   git clone https://github.com/tuo-username/powersupply-manager.git
   cd powersupply-manager
   ```

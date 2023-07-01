# Fact Check Engine
## Un portale che da la possibilità agli utenti di poter verificare una notizia
### *CdL: ICD*
### *Progetto universitario di Ingegneria del Software*
### *UniBA* | *Docenti: Antonio Piccinno, Vita Santa Bartella, Mirko De Vincentiis*
---
### Requisiti
- XAMPP

### Utilizzo
- Clonare la repository nel seguente url C:\xampp\htdocs
- Avviare il pannello di controllo di XAMPP
- Avviare il modulo Apache
- Avviare il modulo MySQL
- Collegarsi all'URL localhost/factcheck/index.php
---
### Creazione DB
- Modificare le credenziali nel file config.php 
```php
$servername = "localhost";
$username = "root"; // Nome utente del database
$password = "password"; // Password del database
$dbname = "factcheck"; // Nome del database
```
- Modificare le credenziali nel file configdb.php 
```php
$servername = "localhost";
$username = "root"; // Nome utente del database
$password = "password"; // Password del database
$dbname = "factcheck"; // Nome del database
```

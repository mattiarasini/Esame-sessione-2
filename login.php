<!DOCTYPE html>
<html lang="it">
<head>
  <title>Login</title>
</head>
<body>
  
</body>
</html>
<?php

// HEADER #############################//
include('layout/header.php')
?>



<!-- SECTION -->

<body>
  <section id="heading">
    <div class="container heading-grid">
      <div class="heading-wrap">
        <h1>accedi alla tua area riservata</h1>
        <p>compila il modulo quo sotto per accedere.</p>
      </div>
    </div>
  </section>

  <section id="form-box" class="animated jackInTheBox">
    <div class="container">
      <div class="form-box form-box-grid">
        
  
        <div class="form-input">
          <h3>Login</h3>

          <form action="login.php" method="post">
            <p>
              <label for="nome">Nome</label>
              <input type="text" id="username" name="username" placeholder="First Name..." required>
            </p>
            

            <p class="full">
              <label for="testo">Password</label>
              <input type="password" id="password" name="password" placeholder="Password..." required>
            </p>
            <p class="full">
              <button type="submit" value="login" >Accedi</button>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>

  <?php
// Controlla se sono stati inviati dati via POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Leggi i dati inviati
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Carica i dati degli utenti da un file JSON
    $usersData = file_get_contents('utenti.json');
    $users = json_decode($usersData, true);

    // Controlla se l'utente esiste e se la password è corretta
    if (isset($users[$username]) && $users[$username]['password'] === $password) {
        // Login riuscito, reindirizza alla pagina di successo
        header("Location: success.php");
        exit;
    } else {
        // Login fallito, reindirizza alla pagina di login con un messaggio di errore
        header("Location: login-fail.php");
        exit;
    }
}
?>

  <?php

// funzione scrivi dati su un file di testo #############################//


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cognome = $_POST["cognome"];
    $email = $_POST["email"];
    $testo = $_POST["testo"];
    
    // Apri il file in modalità append
    $file = fopen("dati_modulo.txt", "a");
    
    // Scrivi i dati nel file
    fwrite($file, "Nome: " . $nome . "\n");
    fwrite($file, "Cognome: " . $cognome . "\n");
    fwrite($file, "email: " . $email . "\n");
    fwrite($file, "Testo: " . $testo . "\n\n");
    
    // Chiudi il file
    fclose($file);
    
    echo "Dati inviati correttamente!";
} 
?>




  <?php
      // FOOTER ##################################//
      include('layout/footer.php')

      ?>
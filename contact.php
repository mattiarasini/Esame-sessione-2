<!DOCTYPE html>
<html lang="it">
<head>
  <title>contact</title>
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
        <h1>Get in Touch</h1>
        <p>Do you need more information? Please contact us to find more about our products and services</p>
      </div>
    </div>
  </section>

  <section id="form-box" class="animated jackInTheBox">
    <div class="container">
      <div class="form-box form-box-grid">
        <div class="form-info">
          <h3>Contact information</h3>
          <ul>
            <li><i class="fas fa-map-marker-alt"></i> 345 Street 2, Bucharest</li>
            <li><i class="fas fa-mobile-alt"></i>+13(0243)123 123</li>
            <li><i class="fas fa-envelope"></i>contact@yoursite.com</li>
          </ul>
        </div>
  
        <div class="form-input">
          <h3>Send us a message</h3>

          <form action="send.php" method="post">
            <p>
              <label for="nome">Nome</label>
              <input type="text" id="nome" name="nome" placeholder="First Name..." required>
            </p>
            <p>
              <label for="cognome">Cognome</label>
              <input type="text" id="cognome" name="cognome" placeholder="Last Name..." required>
            </p>
            <p>
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="E-mail" required>
            </p>

            <p class="full">
              <label for="testo">Messaggio</label>
              <textarea id="testo" name="testo" required></textarea>
            </p>
            <p class="full">
              <button type="submit" >Send Message</button>
            </p>
          </form>
        </div>
      </div>
    </div>
  </section>

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
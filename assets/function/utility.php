<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>


<?php
// funzione per estrarre dal $_POST o dal $_GET la proprieta richiesta

function richiesta($str)
{
   $rit = null;
   if ($str !== null) {
    if (isset($_POST[$str])) {
          $rit = $_POST[$str];
    } elseif (isset($_GET[$str])) {
      $rit = $_GET[$str];
    }
   }
   return $rit;
}


  // funzione per scrivere testo su un file

  function scriviTesto($file, $Stringa)
  {
    $rit = false;
  if (!$fp = fopen($file, 'a')) {
      echo "non posso aprire il file $file";
 } else {
  if (is_writable($file) === false) {
    echo "il file non è scrivibile";
  } else {
    if (!fwrite($fp, $stringa)) {
      echo "non posso aprire il file $file";
    } else {
      echo "operazione completata! ho scritto:<br>" 
      $rit = true;
    }
  }
 }
 fclose($fp);
 return $rit;

  }

  ?>


  <p>
     <?php

     if (richiesta("inviato") != null) {
      $titolo = strtoupper(richiesta("tit"));
      $testo = richiesta("txt");
      $stringa = $titolo .chr(10) . $testo . chr(10);
      if (scriviTesto($file, $stringa, CCOMMENTA)){
        echo("fine!");
      } else {
        echo("si è verificato un errore");
      }

     }


     ?>

  </p>
  </html>
  
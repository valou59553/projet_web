<?php 
    session_start();
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Page d'inscription au jeu concours</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body id='body'>
    <div id="div_succee">
        <h1> Bonjour <?php if(isset($_SESSION['person_name'])){ echo $_SESSION['person_name'];} else{ echo "prénom";} unset($_SESSION['person_name']); ?>
        , tu as <?php if(isset($_SESSION['person_age'])){ echo $_SESSION['person_age'];} else{ echo "xx";} unset($_SESSION['person_age']); ?> ans. </h1>
    </div>
</body>
</html>
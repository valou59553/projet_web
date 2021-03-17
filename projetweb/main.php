<?php 
    session_start();

    function anti_hack($var){
        $var = htmlspecialchars($var);
        $var = stripslashes($var);
        $var = trim($var);
        $var = htmlentities($var);
        return $var;
    }

    if(!empty($_POST['person_name']) && !empty($_POST['person_age'])){
        $_SESSION['person_name'] = anti_hack($_POST['person_name']);
        $_SESSION['person_age'] = anti_hack($_POST['person_age']);
        header ('location: inscription_succee.php');
    }
?>
<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <title>Page d'inscription au jeu concours</title>
  <link rel="stylesheet" href="styles.css">
</head>
<body id='body'>
    <h1> Voici le formulaire à remplir pour être inscrit </h1>
    <form method="post" id="formulaire" action="" onsubmit="return validationForm(this);">
        <fieldset id="main_content">
            <legend> Votre formulaire d'inscription </legend>
            <label for="person_name"> Renseignez votre prénom </label>
            <input type="text" id="person_name" name="person_name" placeholder="Votre nom" value="<?php if(!empty($_POST['person_name'])){echo $_POST['person_name'];} ?>"/>

            <label for="person_age"> Renseignez votre prénom </label>
            <input type="text" id="person_age" name="person_age" placeholder="Votre nom" value="<?php if(!empty($_POST['person_age'])){echo $_POST['person_age'];} ?>"/>

            <input type="submit" id="validation_button" value="Valider l'inscription" />
        </fieldset>
    </form>

    <script>

        var prenom = document.getElementById('person_name');
        var age = document.getElementById('person_age');
        
        var regexPrenom = /^[A-Za-zéèàâäîï][a-zéèàâäîï]+([- ][A-Za-zéèàâäîï][a-zéèàâäîï]+)?$/;
        var regexAge = /^(1[8-9]|[2-7]{1}[0-9]{1}|80)$/;

        function validationForm(event){

            fieldsEmpty = "";

            if(prenom.value == ""){
                fieldsEmpty += "\n - prenom";
                prenom.style.backgroundColor='#DF3F3F';
            }
            else{
                prenom.style.backgroundColor='#FFFFFF';
            }
            if(age.value == ""){
                fieldsEmpty += "\n - age";
                age.style.backgroundColor='#DF3F3F';
            }
            else{
                age.style.backgroundColor='#FFFFFF';
            }

            if(fieldsEmpty == ""){
                fieldsError = "";

                if(regexPrenom.test(prenom.value) == false){
                    fieldsError += "\n - Prenom";
                    prenom.style.backgroundColor='#DF3F3F';
                    prenom.value = "";
                }
                else{
                    prenom.style.backgroundColor='#FFFFFF';
                }

                if(regexAge.test(age.value) == false){
                    fieldsError += "\n - Age";
                    age.style.backgroundColor='#DF3F3F';
                    age.value = "";
                }
                else{
                    age.style.backgroundColor='#FFFFFF';
                }

                if(fieldsError == ""){
                    return true;
                }
                else{
                    alert("Le ou les champs suivants sont incorrects :" + fieldsError);
                    return false;
                }
            }
            else{
                alert("Le ou les champs suivants sont incorrects :" + fieldsEmpty);
                return false;
            }
        }
    </script>
</body>
</html>
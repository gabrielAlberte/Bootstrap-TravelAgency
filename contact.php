<?php

$nom = $email = $telephone = $commentaire = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
      }
    }
      if (empty($_POST["nom"])) {
        $name_error = "Le nom est requis";
      } else {
        $name = test_input($_POST["nom"]);
        // vérifier si le nom ne contient que des lettres et des espaces
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
          $name_error = "Seuls les lettres et les espaces blancs sont autorisés";
          echo $name_error; 
        }
      }

      if (empty($_POST["email"])) {
        $email_error = "Email est requis";
      } else {
        $email = test_input($_POST["email"]);
        // vérifier si l'adresse e-mail est bien formée
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
          $email_error = "Format d'email invalide";
          echo $email_error; 
        }
      }

      if (empty($_POST["telephone"])) {
        $phone_error = "Le téléphone est requis";
      } else {
        $phone = test_input($_POST["telephone"]);
        // vérifier si l'adresse e-mail est bien formée
        if (!preg_match("/^(\d[\s-]?)?[\(\[\s-]{0,2}?\d{3}[\)\]\s-]{0,2}?\d{3}[\s-]?\d{4}$/i",$phone)){
          $phone_error = "Numéro de téléphone invalide"; 
          echo $phone_error;
        }
      }

$data = array(
    $_POST['nom'],
    $_POST['email'],
    $_POST['telephone'],
    $_POST['commentaire']
);

// Open file in append mode 
$fp = fopen('databaseContact.csv', 'a');

// Append input data to the file   
fputcsv($fp, $data);

// close the file 
fclose($fp);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
        integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="icon" type="logo" href="assets/img/logo-fleur.png" />
    <link type="text/css" rel="stylesheet" href="style.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <title>LocalTaste - Contact</title>
</head>

<body id="body-contact">

    <header>
        <!-- Bannière réduction -->
        <div class="banner alert-info text-white p-1" style="text-align: center; background-color: #344764;"><i
                class="icon-gift icon-white"></i>Utilisez le code COVID et bénéficiez de -15% sur TOUS les voyages !
        </div>


        <!-- Barre de navigation avec logo -->
        <div class="container">
            <nav class="navbar navbar-light navbar-expand-lg">
                <div class="row">
                    <a href="index.html" class="navbar-brand">
                        <img src="assets/img/logo-fleur.png" alt="Edelweiss" class="float-left logo-fleur mr-2">
                        <p class="align-middle">
                            <h1><span style="color:rgb(194, 31, 31);">local</span> <span
                                    style="color:rgb(223, 84, 84)">taste</span></h1>
                        </p>
                    </a>
                </div>

                <button class="navbar-toggler" data-toggle="collapse" data-target=#navbarCollapse><span
                        class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav ml-auto">
                        <li>
                            <a href="index.html" class="nav-link">Accueil</a>
                        </li>
                        <li>
                            <a href="nos_preferences.html" class="nav-link">Nos coups de coeur</a>
                        </li>
                        <li>
                            <a href="notre-entreprise.html" class="nav-link">Notre entreprise</a>
                        </li>
                        <li>
                            <a href="contact.html" class="nav-link">Contact</a>
                        <li>
                            <a href="./login.html" class="btn btn-primary" role="button">&#9757lOGIN</a>

                        </li>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>

    <section id="formulaire-contact">
        <div class="container">

            <form action="contact.php" method="post">
                <fieldset>
                    <h1 id="titre-contact">Contact</h1>
                    <div class="form-group row">
                        <label for="inlineFormInputName" class="col-sm-2 col-form-label">Nom:</label>
                        <div class="col-sm-10">
                            <input type="text" name="nom" class="form-control" id="inlineFormInputName">
                        </div>
                        <?php

                            echo "<div class= \"messsage-erreur\" > $name_error </div> ";

                        ?>
                    
                    </div>
                    <div class="form-group row">
                        <label for="phone" class="col-sm-2 col-form-label">Tél:</label>
                        <div class="col-sm-10">
                            <input type="text" name="telephone" class="form-control" id="phone">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Email:</label>
                        <div class="col-sm-10">
                            <input type="text" name="email" class="form-control" id="inputEmail">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Commentaires:</label>
                        <textarea name="commentaire" class="form-control" id="exampleFormControlTextarea1"
                            rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary bouton-envoyer">Envoyer</button>
                </fieldset>
            </form>
        </div>
        <div class="container">
            <div id="map-container-google-1" class="z-depth-1-half map-container" style="height: 500px">
                <iframe
                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.8773310194797!2d6.126604616619462!3d46.19299969253617!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c7b2e1299827b%3A0x6058f3a4660b6a0b!2sRue%20Viguet%208%2C%201227%20Gen%C3%A8ve!5e0!3m2!1sfr!2sch!4v1605703114904!5m2!1sfr!2sch"
                    width="600" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false"
                    tabindex="0"></iframe>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>

    <footer id="footer-contact">

        <div class="container">
            <div class="row mt-4">
                <div class="col-sm-6">
                    <h4>Adresse</h4>
                    <ul>
                        <li>8, rue Viguet - 1227 Les Acacias </li>
                    </ul>
                    <h4>Téléphone</h4>
                    <ul>
                        <li>+ 41 (0)22 308 60 10</li>
                    </ul>
                    <h4>Horaires</h4>
                    <ul>
                        <li>Du lundi au vendredi, de 9h à 17H</li>
                    </ul>
                </div>
                <div class="col-sm-6">
                    <h4>Contact</h4>
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2761.8802012085266!2d6.12650291555611!3d46.19294257911629!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c7b2e1299827b%3A0xb6bbc30dd8e5306f!2sr%C3%A9alise%20-%20magasin%20d&#39;informatique%20d&#39;occasion!5e0!3m2!1sfr!2sch!4v1605783655516!5m2!1sfr!2sch"
                        width="100%" height="300" frameborder="0" style="border:0;" allowfullscreen=""
                        aria-hidden="false" tabindex="0"></iframe>
                </div>
            </div>

            <!--/Bas de page Super Mario-->

            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <hr>
                        <p>&#169 par Super Mario Agency 2020</p>
                    </div>
                </div>
            </div>


    </footer>

</body>

</html>
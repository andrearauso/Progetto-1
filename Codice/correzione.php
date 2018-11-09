<?php
session_start();

?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Form di registrazione</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="vendors/linericon/style.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/owl-carousel/owl.carousel.min.css">
    <link rel="stylesheet" href="vendors/lightbox/simpleLightbox.css">
    <link rel="stylesheet" href="vendors/nice-select/css/nice-select.css">
    <link rel="stylesheet" href="vendors/animate-css/animate.css">
    <link rel="stylesheet" href="vendors/popup/magnific-popup.css">
    <!-- main css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="intl-tel-input/intl-tel-input-master/build/css/intlTelInput.css">
</head>

<body data-spy="scroll" data-target="#mainNav" data-offset="70">


<?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){


    $nome = isset($_POST["nome"]) ? htmlspecialchars($_POST["nome"]) : "";
    $cognome = isset($_POST["cognome"]) ? htmlspecialchars($_POST["cognome"]) : "";
    $dataNascita = isset($_POST["dataNascita"]) ? htmlspecialchars($_POST["dataNascita"]) : "";
    $via = isset($_POST["via"]) ? htmlspecialchars($_POST["via"]) : "";
    $numeroCivico = isset($_POST["numeroCivico"]) ? htmlspecialchars($_POST["numeroCivico"]) : "";
    $citta = isset($_POST["citta"]) ? htmlspecialchars($_POST["citta"]) : "";
    $nap = isset($_POST["nap"]) ? htmlspecialchars($_POST["nap"]) : "";
    $email = isset($_POST["email"]) ? htmlspecialchars($_POST["email"]) : "";
    $gender = isset($_POST["Sesso"]) ? htmlspecialchars($_POST["Sesso"]) : "";
    $numeroTelefono = isset($_POST["numeroTelefono"]) ? htmlspecialchars($_POST["numeroTelefono"]) : "";
    $hobby = isset($_POST["hobby"]) ? htmlspecialchars($_POST["hobby"]) : "";
    $professione = isset($_POST["professione"]) ? htmlspecialchars($_POST["professione"]) : "";


    /*
     * Trim dei valori per togliere tutti gli spazi non necessari
     * dalle stringhe 
     */
    $_SESSION["nome"] = trim($nome);
    $_SESSION["cognome"] = trim($cognome);
    $_SESSION["dataNascita"] = trim($dataNascita);
    $_SESSION["via"] = trim($via);
    $_SESSION["numeroCivico"] = trim($numeroCivico);
    $_SESSION["citta"] = trim($citta);
    $_SESSION["nap"] = trim($nap);
    $_SESSION["email"] = trim($email);
    $_SESSION["Sesso"] = trim($gender);
    $_SESSION["numeroTelefono"] = trim($numeroTelefono);
    $_SESSION["hobby"] = trim($hobby);
    $_SESSION["professione"] = trim($professione);

}
?>

<div class="container">
    <div class="jumbotron">
        <h1>Form di correzione</h1>
        <p>Controlla se i dati inseriti sono giusti e clicca registrati per terminare il form.
        </p>
        <p>Nel caso trovi che i tuoi dati siano errati, corregili con il tasto correggi</p>
    </div>
</div>
<div class="container">
    <form method="post" action="riepilogo.php">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Nome*</label>
                <p style="font-weight: bold"> <?php echo $nome ?> </p>
            </div>
            <div class="form-group col-md-6">
                <label for="inputLastName">Cognome*</label>
                <p style="font-weight: bold"> <?php echo $cognome ?> </p>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName">Data di Nascita</label>
            <p style="font-weight: bold"><?php echo $dataNascita ?>  </p>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Via*</label>
                <p style="font-weight: bold"><?php echo $via ?>  </p>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Numero civico*</label>
                <p style="font-weight: bold"> <?php echo $numeroCivico ?>  </p>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Città*</label>
                <p style="font-weight: bold"> <?php echo $citta ?>  </p>
            </div>
            <div class="form-group col-md-6">
                <label for="inputCivic">NAP*</label>
                <p style="font-weight: bold"> <?php echo $nap ?>  </p>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail">Email*</label>
            <p style="font-weight: bold"> <?php echo $email ?>  </p>
        </div>
        <div class="form-group">
            <label for="phone">Numero di telefono*</label><br>
            <p style="font-weight: bold"><?php echo $numeroTelefono ?>  </p>
        </div>
        <div class="form-check">
            <label>Sesso*</label><br>
            <p style="font-weight: bold"> <?php echo $gender ?>  </p>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Hobby</label>
                <p style="font-weight: bold"><?php echo $hobby ?>   </p>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Professione</label>
                <p style="font-weight: bold"><?php echo $professione ?>  </p>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <button type="submit" formaction="form.php" class="btn btn-primary">Correggi</button>
            </div>
            <div class="form-group col-md-6">
                <button type="submit" id="submitButton" class="btn btn-primary">Registrati</button>
            </div>
        </div>
    </form>
</div>


<!-- Optional JavaScript -->
<script src="js/noback.js"></script>
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="js/jquery-3.2.1.min.js"></script>
<script src="js/popper.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/stellar.js"></script>
<script src="vendors/lightbox/simpleLightbox.min.js"></script>
<script src="vendors/nice-select/js/jquery.nice-select.min.js"></script>
<script src="vendors/isotope/imagesloaded.pkgd.min.js"></script>
<script src="vendors/isotope/isotope-min.js"></script>
<script src="vendors/owl-carousel/owl.carousel.min.js"></script>
<script src="js/jquery.ajaxchimp.min.js"></script>
<script src="vendors/counter-up/jquery.waypoints.min.js"></script>
<script src="vendors/counter-up/jquery.counterup.js"></script>
<script src="js/mail-script.js"></script>
<script src="vendors/popup/jquery.magnific-popup.min.js"></script>
<script src="js/theme.js"></script>
</body>

</html>
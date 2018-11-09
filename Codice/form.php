<?php
session_start();

?>
<!DOCTYPE html>
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
$nome = $cognome = $dataNascita = $via = $numeroCivico = $citta = $nap = $email = $gender = $numeroTelefono = $hobby = $professione = "";

if(isset($_SESSION["nome"]) && isset($_SESSION["cognome"]) && isset($_SESSION["dataNascita"])
    && isset($_SESSION["via"]) && isset($_SESSION["numeroCivico"]) && isset($_SESSION["citta"])
    && isset($_SESSION["nap"]) && isset($_SESSION["email"]) && isset($_SESSION["Sesso"])
    && isset($_SESSION["numeroTelefono"]) && isset($_SESSION["hobby"]) && isset($_SESSION["professione"])){

    $nome = isset($_SESSION["nome"]) ? $_SESSION["nome"] : "";
    $cognome = isset($_SESSION["cognome"]) ? $_SESSION["cognome"] : "";
    $dataNascita = isset($_SESSION["dataNascita"]) ? $_SESSION["dataNascita"] : "";
    $via = isset($_SESSION["via"]) ? $_SESSION["via"] : "";
    $numeroCivico = isset($_SESSION["numeroCivico"]) ? $_SESSION["numeroCivico"] : "";
    $citta = isset($_SESSION["citta"]) ? $_SESSION["citta"] : "";
    $nap = isset($_SESSION["nap"]) ? $_SESSION["nap"] : "";
    $email = isset($_SESSION["email"]) ? $_SESSION["email"] : "";
    $gender = isset($_SESSION["Sesso"]) ? $_SESSION["Sesso"] : "";
    $numeroTelefono = isset($_SESSION["numeroTelefono"]) ? $_SESSION["numeroTelefono"] : "";
    $hobby = isset($_SESSION["hobby"]) ? $_SESSION["hobby"] : "";
    $professione = isset($_SESSION["professione"]) ? $_SESSION["professione"] : "";


}

$_SESSION["isSessionStarted"] = true;

?>


<div class="container">
    <div class="jumbotron">
        <h1>Form di registrazione</h1>
        <p>Inserisci i tuoi dati per poterti registrare.</p>
        <p>I campi contrassegnati da un asterisco(*) sono campi obbligatori.</p>
        <p>Alcuni campi possono contenere al massimo 50 caratteri.</p>
        <p>I campi contenenti valori errati vengono marcati in colore rosso, altrimenti verde</p>
    </div>
</div>
<div class="container">
    <form id="mainForm" method="post" action="correzione.php">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputName">Nome*</label>
                <input type="text" onkeyup="checkName()"class="form-control" name="nome" id="inputName"
                       title="Inserisci un nome contenente solo lettere"
                       placeholder="Nome" maxlength="50" value="<?php echo $nome ?>" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputLastName">Cognome*</label>
                <input type="text" onkeyup="checkLastName()"class="form-control" name="cognome" id="inputLastName"
                       title="Inserisci un nome contenente solo lettere" value="<?php echo $cognome ?>"
                       placeholder="Cognome" maxlength="50" required>
            </div>
        </div>
        <div class="form-group">
            <label for="inputName">Data di Nascita</label>
            <input type="date" class="form-control" onchange="checkDate()" name="dataNascita" id="inputDate"
                   title="Inserisci un nome contenente solo lettere" value="<?php echo $dataNascita ?>"
                   placeholder="Data di Nascita" required>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputAddress">Via*</label>
                <input type="text" onkeyup="checkVia()"class="form-control" name="via" id="inputAddress"
                       title="Inserisci un nome contenente solo lettere" value="<?php echo $via ?>"
                       placeholder="Via" maxlength="50" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputAddress">Numero civico*</label>
                <input type="text" onkeyup="checkNumeroCivico()" class="form-control" name="numeroCivico" id="inputCivic"
                       title="Inserisci un nome contenente solo lettere" value="<?php echo $numeroCivico ?>"
                       placeholder="Numero Civico" maxlength="4" required>
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputCity">Città*</label>
                <input type="text" class="form-control" onkeyup="checkCitta()" id="inputCity" name="citta"
                       title="Inserisci un nome contenente solo lettere" value="<?php echo $citta ?>"
                       placeholder="Città" maxlength="50" required>
            </div>
            <div class="form-group col-md-6">
                <label for="inputNap">NAP*</label>
                <input type="number" class="form-control" onkeyup="checkNAP()" id="inputNap" name="nap"
                       title="Inserisci un nome contenente solo lettere" value="<?php echo $nap ?>"
                       placeholder="Numero di avviamento postale" min="1000" max="99999" required>
            </div>
        </div>

        <div class="form-group">
            <label for="inputEmail">Email*</label>
            <input type="text" class="form-control" id="inputEmail"
                   name="email" onkeyup="checkEmail()" value="<?php echo $email ?>"
                   placeholder="test@google.com" required>
        </div>
        <div class="form-group">
            <label for="inputGender">Sesso*</label><br>
            <select name="Sesso" id="inputGender" required>
                <option value="Uomo" <?php if($gender == "Uomo"){echo "selected";} ?>>Uomo</option>
                <option value="Donna" <?php if($gender == "Donna"){echo "selected";} ?>>Donna</option>
            </select><br><br>
        </div>
        <div class="form-group">
            <label for="phone">Numero di telefono*</label><br>
            <input id="phone" value="<?php echo $numeroTelefono ?>" name="numeroTelefono" type="tel">
            <span id="valid-msg" class="hide">✓ Valido</span>
            <span id="error-msg" class="hide"></span>

            <script src="intl-tel-input/intl-tel-input-master/build/js/intlTelInput.js"></script>
            <script>
                var input = document.querySelector("#phone"),
                    errorMsg = document.querySelector("#error-msg"),
                    validMsg = document.querySelector("#valid-msg");

                // here, the index maps to the error code returned from getValidationError - see readme
                var errorMap = ["Numero non valido", "Codice telefonico invalido", "Numero troppo corto", "Numero troppo lungo", "Numero non valido"];

                // initialise plugin
                var iti = window.intlTelInput(input, {
                    utilsScript: "../../build/js/utils.js?1537727621611"
                });

                var reset = function () {
                    input.value = iti.getNumber();
                    input.classList.remove("error");
                    errorMsg.innerHTML = "";
                    errorMsg.classList.add("hide");
                    validMsg.classList.add("hide");
                };

                // on blur: validate
                input.addEventListener('blur', function () {
                    reset();
                    if (input.value.trim()) {
                        if (iti.isValidNumber()) {
                            validMsg.classList.remove("hide");
                            checkPhone(true);
                        } else {
                            input.classList.add("error");
                            var errorCode = iti.getValidationError();
                            errorMsg.innerHTML = errorMap[errorCode];
                            errorMsg.classList.remove("hide");
                            checkPhone(false);
                        }
                    }
                });

                // on keyup / change flag: reset
                input.addEventListener('change', reset);
                input.addEventListener('keyup', reset);
            </script>
            <script class="iti-load-utils" async=""
                    src="intl-tel-input/intl-tel-input-master/build/js/utils.js"></script>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="inputHobby">Hobby</label>
                <input type="text" value="<?php echo $hobby ?>" onkeyup="checkHobby()" maxlength="50" name="hobby" class="form-control" id="inputHobby" placeholder="Hobby">
            </div>
            <div class="form-group col-md-6">
                <label for="inputProfessione">Professione</label>
                <input type="text" value="<?php echo $professione ?>" onkeyup="checkProfessione()" maxlength="50" name="professione" class="form-control" id="inputProfessione" placeholder="Professione">
            </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <input type="reset" id="resetButton" onclick="removeIsValid()"  class="btn btn-primary">
            </div>
            <div class="form-group col-md-6">
                <button type="submit" id="submitButton" class="btn btn-primary" disabled>Avanti</button>
            </div>
        </div>
    </form>
</div>

<!-- Optional JavaScript -->
<script src="js/main.js"></script>
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
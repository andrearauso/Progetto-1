<?php
session_start();
date_default_timezone_set("Europe/Zurich")

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Riepilogo dati</title>
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

<?php


?>


<div class="container">
    <div class="jumbotron">
        <h1>Riepilogo dei dati</h1>
        <p>La data di oggi é <?php echo date("d-m-Y"); ?></p>
        <p>In questa pagina puoi trovare le registrazioni fatte in data odierna.</p>
        <p>I dati sono mostrati in forma tabellare.</p>
    </div>
    <div class="table-responsive">
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Data Registrazione</th>
                <th scope="col">Nome</th>
                <th scope="col">Cognome</th>
                <th scope="col">Data di Nascita</th>
                <th scope="col">Via</th>
                <th scope="col">Numero Civico</th>
                <th scope="col">Città</th>
                <th scope="col">NAP</th>
                <th scope="col">Email</th>
                <th scope="col">Sesso</th>
                <th scope="col">Numero Telefono</th>
                <th scope="col">Hobby</th>
                <th scope="col">Professione</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $csvPath = "registrazioni/";
            $globalFilePath = $csvPath . "Registrazioni_Tutte.csv";
            $dailyFilePath = $csvPath . "Registrazione_" . date("Y-m-d") . ".csv";

            $nome = $cognome = $dataNascita = $via = $numeroCivico = $citta = $nap = $email = $gender = $numeroTelefono = $hobby = $professione = "null";

            if (isset($_SESSION["isSessionStarted"])) {

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

                

                $registrationDate = date("Y-m-d H:i:s");

                $inputs = array(array($registrationDate, $nome, $cognome, 
                                        $dataNascita, $via, $numeroCivico, $citta, $nap, 
                                        $email, $gender, $numeroTelefono, $hobby, $professione));


                //Il file globale non esiste?
                if (!(file_exists($globalFilePath))) {
                    $globalFile = fopen($globalFilePath, "a+");
                    //Inserimento dei valori nel CSV globale
                    foreach ($inputs as $data) {
                        fputcsv($globalFile, $data, ";");
                    }

                    fclose($globalFile);

                    //Il file giornaliero non esiste?
                    if (!(file_exists($dailyFilePath))) {
                        $dailyFile = fopen($dailyFilePath, "a+");
                        //inserimento dei dati nel CSV giornaliero
                        foreach ($inputs as $data) {
                            fputcsv($dailyFile, $data, ";");
                        }

                        //stampa dei dati
                        $data = file($dailyFilePath);
                        foreach ($data as $lines) {
                            $dataArray = explode(";", $lines);
                            list($regDate, $name, $lastName, $birthday, $address, $civicNum, $city, $cap, $phone, $email, $sex, $hobbyA, $job) = $dataArray;

                            echo "<tr><td>$regDate</td><td>$name</td><td>$lastName</td><td>$birthday</td><td>$address</td><td>$civicNum</td><td>$city</td>
                                    <td>$cap</td><td>$phone</td><td>$email</td><td>$sex</td><td>$hobbyA</td><td>$job</td></tr>";
                        }
                        fclose($dailyFile);
                    } else {
                        $dailyFile = fopen($dailyFilePath, "a+");
                        foreach ($inputs as $data) {
                            fputcsv($dailyFile, $data, ";");
                        }

                        $data = file($dailyFile);
                        foreach ($data as $lines) {
                            $dataArray = explode(";", $lines);
                            list($regDate, $name, $lastName, $birthday, $address, $civicNum, $city, $cap, $phone, $email, $sex, $hobbyA, $job) = $dataArray;

                            echo "<tr>
                        <td>$regDate</td>
                        <td>$name</td>
                        <td>$lastName</td>
                        <td>$birthday</td>
                        <td>$address</td>
                        <td>$civicNum</td>
                        <td>$city</td>
                        <td>$cap</td>
                        <td>$phone</td>
                        <td>$email</td>
                        <td>$sex</td>
                        <td>$hobbyA</td>
                        <td>$job</td>
                        </tr>";
                        }
                        fclose($dailyFile);
                    }
                } else {
                    $globalFile = fopen($globalFilePath, "a+");
                    foreach ($inputs as $data) {
                        fputcsv($globalFile, $data, ";");
                    }

                    fclose($globalFile);

                    if (!(file_exists($dailyFilePath))) {
                        $dailyFile = fopen($dailyFilePath, "a+");
                        foreach ($inputs as $data) {
                            fputcsv($dailyFile, $data, ";");
                        }

                        $data = file($dailyFilePath);
                        foreach ($data as $lines) {
                            $dataArray = explode(";", $lines);
                            list($regDate, $name, $lastName, $birthday, $address, $civicNum, $city, $cap, $phone, $email, $sex, $hobbyA, $job) = $dataArray;

                            echo "<tr>
                        <td>$regDate</td>
                        <td>$name</td>
                        <td>$lastName</td>
                        <td>$birthday</td>
                        <td>$address</td>
                        <td>$civicNum</td>
                        <td>$city</td>
                        <td>$cap</td>
                        <td>$phone</td>
                        <td>$email</td>
                        <td>$sex</td>
                        <td>$hobbyA</td>
                        <td>$job</td>
                        </tr>";
                        }
                        fclose($dailyFile);
                    } else {
                        $dailyFile = fopen($dailyFilePath, "a+");
                        foreach ($inputs as $data) {
                            fputcsv($dailyFile, $data, ";");
                        }

                        $data = file($dailyFilePath);
                        foreach ($data as $lines) {
                            $dataArray = explode(";", $lines);
                            list($regDate, $name, $lastName, $birthday, $address, $civicNum, $city, $cap, $phone, $email, $sex, $hobbyA, $job) = $dataArray;

                            echo "<tr>
                        <td>$regDate</td>
                        <td>$name</td>
                        <td>$lastName</td>
                        <td>$birthday</td>
                        <td>$address</td>
                        <td>$civicNum</td>
                        <td>$city</td>
                        <td>$cap</td>
                        <td>$phone</td>
                        <td>$email</td>
                        <td>$sex</td>
                        <td>$hobbyA</td>
                        <td>$job</td>
                        </tr>";
                        }
                        fclose($dailyFile);
                    }
                }
            }else{
                if (!(file_exists($dailyFilePath))) {
                    $data = file($dailyFilePath);
                    foreach ($data as $lines) {
                        $dataArray = explode(";", $lines);
                        list($regDate, $name, $lastName, $birthday, $address, $civicNum, $city, $cap, $phone, $email, $sex, $hobbyA, $job) = $dataArray;

                        echo "<tr>
                    <td>$regDate</td>
                    <td>$name</td>
                    <td>$lastName</td>
                    <td>$birthday</td>
                    <td>$address</td>
                    <td>$civicNum</td>
                    <td>$city</td>
                    <td>$cap</td>
                    <td>$phone</td>
                    <td>$email</td>
                    <td>$sex</td>
                    <td>$hobbyA</td>
                    <td>$job</td>
                    </tr>";
                    }
                    fclose($dailyFile);
                } else {
                    $dailyFile = fopen($dailyFilePath, "a+");
                    
                    $data = file($dailyFilePath);
                    foreach ($data as $lines) {
                        $dataArray = explode(";", $lines);
                        list($regDate, $name, $lastName, $birthday, $address, $civicNum, $city, $cap, $phone, $email, $sex, $hobbyA, $job) = $dataArray;

                        echo "<tr>
                    <td>$regDate</td>
                    <td>$name</td>
                    <td>$lastName</td>
                    <td>$birthday</td>
                    <td>$address</td>
                    <td>$civicNum</td>
                    <td>$city</td>
                    <td>$cap</td>
                    <td>$phone</td>
                    <td>$email</td>
                    <td>$sex</td>
                    <td>$hobbyA</td>
                    <td>$job</td>
                    </tr>";
                    }
                    fclose($dailyFile);
                }
            }
            ?>
            </tbody>
        </table>
        <?php
        session_destroy();
        ?>
    </div>
    <a class="btn btn-primary btn-lg btn-block" href="index.html" role="button">Ritorna alla pagina principale</a>
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
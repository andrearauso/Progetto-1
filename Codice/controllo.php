<!DOCTYPE html>
<html lang="en">

<head>
    <title>Tabella</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="imagesTable/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendorTable/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fontsTable/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendorTable/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendorTable/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendorTable/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="cssTable/util.css">
    <link rel="stylesheet" type="text/css" href="cssTable/main.css">
    <!--===============================================================================================-->
    <script>
        (function (global) {

            if (typeof (global) === "undefined") {
                throw new Error("window is undefined");
            }

            var _hash = "!";
            var noBackPlease = function () {
                global.location.href += "#";

                // making sure we have the fruit available for juice (^__^)
                global.setTimeout(function () {
                    global.location.href += "!";
                }, 50);
            };

            global.onhashchange = function () {
                if (global.location.hash !== _hash) {
                    global.location.hash = _hash;
                }
            };

            global.onload = function () {
                noBackPlease();

                // disables backspace on page except on input fields and textarea..
                document.body.onkeydown = function (e) {
                    var elm = e.target.nodeName.toLowerCase();
                    if (e.which === 8 && (elm !== 'input' && elm !== 'textarea')) {
                        e.preventDefault();
                    }
                    // stopping event bubbling up the DOM tree..
                    e.stopPropagation();
                };
            }

        })(window);
    </script>
</head>

<body>

    <!--===============================================================================================-->
    <script src="vendorTable/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendorTable/bootstrap/js/popper.js"></script>
    <script src="vendorTable/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="vendorTable/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="jsTable/main.js"></script>

</body>

</html>
<?php
function checkAll($first_name, $last_name, $birthday, $street, $civic, $city, $email, $cap, $phone, $gender, $hobby, $job)
{
    $inputs = array(
        $first_name,
        $last_name,
        $birthday,
        $street,
        $civic,
        $city,
        $email,
        $cap,
        $phone,
        $gender,
        $hobby,
        $job
    );

    if (validateCAP($cap) && validateCivicNumber($civic) && validateVia($street) && validateCharAndSpace($first_name) && validateCharAndSpace($last_name) && validateCharAndSpace($city)) {
        $today = date("Y-m-d");

        $csvDate = date("Y-m-d H:i:s");

        $list = array(
            array($first_name, $last_name, $birthday, $street, $civic, $city, $email, $cap, $phone, $gender, $hobby, $job)
        );

        if (!(file_exists("Registrazioni/Registrazioni_tutte.csv"))) {
            $file = fopen("Registrazioni/Registrazioni_tutte.csv", "a+");
            foreach ($list as $line) {
                fputcsv($file, $line, ";");
            }

            fclose($file);
            if (!(file_exists("Registrazioni/Registrazione_" . $today . ".csv"))) {
                $fileToday = fopen("Registrazioni/Registrazione_" . $today . ".csv", "a+");
                foreach ($list as $line) {
                    fputcsv($fileToday, $line, ";");
                }
                
                $data = file("Registrazioni/Registrazione_" . $today . ".csv");
                foreach ($data as $lines) {
                    $lineArray = explode(";", $lines);
                    list($first_nameA, $last_nameA, $birthdayA, $streetA, $civicA, $cityA, $capA, $phoneA, $emailA, $genderA, $hobbyA, $jobA) = $lineArray;

                    echo "<tr>
                    <td>$first_nameA</td>
                    <td>$last_nameA</td>
                    <td>$birthdayA</td>
                    <td>$streetA</td>
                    <td>$civicA</td>
                    <td>$cityA</td>
                    <td>$capA</td>
                    <td>$phoneA</td>
                    <td>$emailA</td>
                    <td>$genderA</td>
                    <td>$hobbyA</td>
                    <td>$jobA</td>
                    </tr>";
                }
                echo "</table></div></div></div></div>";
                fclose($fileToday);
            } else {
                $fileToday = fopen("Registrazioni/Registrazione_" . $today . ".csv", "a+");
                foreach ($list as $line) {
                    fputcsv($fileToday, $line, ";");
                }


                echo "
                <div class='limiter'>
                    <div class='container-table100'>
                        <div class='wrap-table100'>
                            <div class='table100'>
                                <table>
                                    <thead>
                                        <tr class='table100-head'>
                                            <th>Nome</th>
                                            <th>Cognome</th>
                                            <th>Data di nascita</th>
                                            <th>Via</th>
                                            <th>Numero civico</th>
                                            <th>Città</th>
                                            <th>Email</th>
                                            <th>CAP</th>
                                            <th>Numero di telefono</th>
                                            <th>Sesso</th>
                                            <th>Hobby</th>
                                            <th>Lavoro</th>
                                        </tr>
                                    </thead>";
                $data = file("Registrazioni/Registrazione_" . $today . ".csv");
                foreach ($data as $lines) {
                    $lineArray = explode(";", $lines);
                    list($first_nameA, $last_nameA, $birthdayA, $streetA, $civicA, $cityA, $capA, $phoneA, $emailA, $genderA, $hobbyA, $jobA) = $lineArray;

                    echo "<tr>
                    <td>$first_nameA</td>
                    <td>$last_nameA</td>
                    <td>$birthdayA</td>
                    <td>$streetA</td>
                    <td>$civicA</td>
                    <td>$cityA</td>
                    <td>$capA</td>
                    <td>$phoneA</td>
                    <td>$emailA</td>
                    <td>$genderA</td>
                    <td>$hobbyA</td>
                    <td>$jobA</td>
                    </tr>";
                }
                echo "</table></div></div></div></div>";
                fclose($fileToday);
            }
        } else {
            $file = fopen("Registrazioni/Registrazioni_tutte.csv", "a+");
            foreach ($list as $line) {
                fputcsv($file, $line, ";");
            }

            fclose($file);
            if (!(file_exists("Registrazioni/Registrazione_" . $today . ".csv"))) {
                $fileToday = fopen("Registrazioni/Registrazione_" . $today . ".csv", "a+");
                foreach ($list as $line) {
                    fputcsv($fileToday, $line, ";");
                }

                echo "
                <div class='limiter'>
                    <div class='container-table100'>
                        <div class='wrap-table100'>
                            <div class='table100'>
                                <table>
                                    <thead>
                                        <tr class='table100-head'>
                                            <th>Nome</th>
                                            <th>Cognome</th>
                                            <th>Data di nascita</th>
                                            <th>Via</th>
                                            <th>Numero civico</th>
                                            <th>Città</th>
                                            <th>Email</th>
                                            <th>CAP</th>
                                            <th>Numero di telefono</th>
                                            <th>Sesso</th>
                                            <th>Hobby</th>
                                            <th>Lavoro</th>
                                        </tr>
                                    </thead>";
                $data = file("Registrazioni/Registrazione_" . $today . ".csv");
                foreach ($data as $lines) {
                    $lineArray = explode(";", $lines);
                    list($first_nameA, $last_nameA, $birthdayA, $streetA, $civicA, $cityA, $capA, $phoneA, $emailA, $genderA, $hobbyA, $jobA) = $lineArray;

                    echo "<tr>
                    <td>$first_nameA</td>
                    <td>$last_nameA</td>
                    <td>$birthdayA</td>
                    <td>$streetA</td>
                    <td>$civicA</td>
                    <td>$cityA</td>
                    <td>$capA</td>
                    <td>$phoneA</td>
                    <td>$emailA</td>
                    <td>$genderA</td>
                    <td>$hobbyA</td>
                    <td>$jobA</td>
                    </tr>";
                }
                echo "</table></div></div></div></div>";
                fclose($fileToday);
            } else {
                $fileToday = fopen("Registrazioni/Registrazione_" . $today . ".csv", "a+");
                foreach ($list as $line) {
                    fputcsv($fileToday, $line, ";");
                }

                echo "
                <div class='limiter'>
                    <div class='container-table100'>
                        <div class='wrap-table100'>
                            <div class='table100'>
                                <table>
                                    <thead>
                                        <tr class='table100-head'>
                                            <th>Nome</th>
                                            <th>Cognome</th>
                                            <th>Data di nascita</th>
                                            <th>Via</th>
                                            <th>Numero civico</th>
                                            <th>Città</th>
                                            <th>Email</th>
                                            <th>CAP</th>
                                            <th>Numero di telefono</th>
                                            <th>Sesso</th>
                                            <th>Hobby</th>
                                            <th>Lavoro</th>
                                        </tr>
                                    </thead>";
                $data = file("Registrazioni/Registrazione_" . $today . ".csv");
                foreach ($data as $lines) {
                    $lineArray = explode(";", $lines);
                    list($first_nameA, $last_nameA, $birthdayA, $streetA, $civicA, $cityA, $capA, $phoneA, $emailA, $genderA, $hobbyA, $jobA) = $lineArray;

                    echo "<tr>
                    <td>$first_nameA</td>
                    <td>$last_nameA</td>
                    <td>$birthdayA</td>
                    <td>$streetA</td>
                    <td>$civicA</td>
                    <td>$cityA</td>
                    <td>$capA</td>
                    <td>$phoneA</td>
                    <td>$emailA</td>
                    <td>$genderA</td>
                    <td>$hobbyA</td>
                    <td>$jobA</td>
                    </tr>";
                }
                echo "</table></div></div></div></div>";
                fclose($fileToday);
            }
        }
    }
}

checkAll($first_name, $last_name, $birthday, $street, $civic, $city, $email, $cap, $phone, $gender, $hobby, $job);

?>
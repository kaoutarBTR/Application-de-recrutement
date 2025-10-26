<?php

try {

    require_once "../DB_class.php";

} catch (Exception $e) {

    echo "Error: " . $e->getMessage();

}


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $DB = new DB_class();

    $idRec = isset ($_POST['idRec']) ? $_POST['idRec'] : null;
    $sujet = isset ($_POST['sujet']) ? $_POST['sujet'] : null;
    $prof = isset ($_POST['prof']) ? $_POST['prof'] : null;
    $ville = isset ($_POST['ville']) ? $_POST['ville'] : null;
    $type = isset ($_POST['type']) ? $_POST['type'] : null;
    $duree = isset ($_POST['duree']) ? $_POST['duree'] : null;
    $desc = isset ($_POST['desc']) ? $_POST['desc'] : null;
    $exp = isset ($_POST['exp']) ? $_POST['exp'] : null;

    $DB->insertJobOffer($idRec, $prof, $sujet, $desc, $ville, $type, $duree, $exp);

} else {
    header("Location: ../../index.html");
    exit; // Ensure that script execution stops after redirection
}




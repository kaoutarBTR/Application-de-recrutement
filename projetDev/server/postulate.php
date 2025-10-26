<?php

require_once("./DB_class.php");

$DB = new DB_class();

if(isset($_POST['Offre']) && isset($_POST['Client'])) {
    
    $tempPdfFile = $DB->postulation($_POST['Client'],$_POST['Offre']);
    echo "0";

} else {
    echo "No value received from button or PHP data.";
}

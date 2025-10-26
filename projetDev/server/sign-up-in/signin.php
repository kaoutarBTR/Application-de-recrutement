<?php

try {

    require_once "../DB_class.php";

} catch (Exception $e) {

    echo "Error: " . $e->getMessage();

}


session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $DB = new DB_class();
    if ($_POST["form-name"] == "client-form") {

        $user_id = $DB->Authentification( $_POST["email"], $_POST["password"],"Client");

    }
    else if ($_POST["form-name"] == "HR-form"){

        $user_id = $DB->Authentification( $_POST["email"], $_POST["password"],"HR");

    }

    if(!is_null($user_id)){
        $_SESSION['id'] = $user_id;
    }
    
} else {
    header("Location: ../../index.html");
    exit; // Ensure that script execution stops after redirection
}

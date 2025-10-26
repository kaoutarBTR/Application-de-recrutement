<?php

try {

    require_once "../DB_class.php";

} catch (Exception $e) {

    echo "Error: " . $e->getMessage();

}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["form-name"])) {
    if($_POST['form-name']=='client-form'){
        try {
            $DB = new DB_class();
    
            //checks what form we received the request from and treats it accordingly     
                if(isset($_POST['website'])){
                    $website=$_POST['website'];
                }else{
                    $website=null;
                }
                if(isset($_POST['github'])){
                    $github=$_POST['github'];
                }else{
                    $github=null;
                }
                if(isset($_POST['twitter'])){
                    $twitter=$_POST['twitter'];
                }else{
                    $twitter=null;
                }
                if(isset($_POST['instagram'])){
                    $instagram=$_POST['instagram'];
                }else{
                    $instagram=null;
                }
                if(isset($_POST['facebook'])){
                    $facebook=$_POST['facebook'];
                }else{
                    $facebook=null;
                }
    
                $DB->insertClient($_POST["username"], $_POST["password"], $_POST["firstName"], $_POST["lastName"], $_POST["city"], $_POST["job"], $_POST["email"], $_POST["tel"], $_FILES["cv"], $website, $github, $twitter, $instagram,$facebook);
            
        } catch (Exception $e) {
    
            echo "Database error: " . $e->getMessage();
    
        }
    }else if($_POST['form-name']=='HR-form'){
        try{
            $DB = new DB_class();

            $DB->insertHR($_POST["companyName"], $_POST["ICE"], $_POST["industry"], $_POST["HRFirstName"], $_POST["HRLastName"], $_POST["email"], $_POST["password"], $_POST["tel"], $_POST["city"]);

        }catch(PDOException $e){

            echo "Database error: " . $e->getMessage();

    }}
    
} else {

    header("Location: ../../signin-page.html");
    exit; // Ensure that script execution stops after redirection

}

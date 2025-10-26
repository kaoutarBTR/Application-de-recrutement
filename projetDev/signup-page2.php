<?php

try {

  require_once "./server/DB_class.php";

  $DB = new DB_class();

} catch (Exception $e) {

  echo "Error requiring DB module : " . $e->getMessage();

}


?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Signup</title>
  <link href="css/bootstrap.css" rel="stylesheet">
</head>

<body>
  <nav class="navbar navbar-light bg-light">
    <a class="navbar-brand" href="#">
      <img src="./assets/png/logo-black-removebg-preview.png" width="200" height="50" class="d-inline-block align-top"
        alt="">
    </a>
  </nav>
  <div class="container">
    <h1 class="col-12 text-center p-4">Sign up</h1>

    <h2>Important info : </h2>


    <div class="column col-12">
      <form enctype="multipart/form-data" action="./server/sign-up-in/signup.php" method="post" id="client-form">
      <input required type="hidden" name="form-name" value="client-form">
        <div id="client-alert" class="alert alert-warning " style="display: none !important;" role="alert">
          <h4 id="client-alert-head" class="alert-heading">Well done!</h4>
          <p id="client-alert-par" class="alert-body"</p>
        </div>

        <label for="name">Name</label>
        <div class="row p-1">
          <div class="form-group col-6">
            <input required type="text" class="form-control" name="firstName" id="firstName_client"
              placeholder="Enter first name" >
            <small id="firstNameHelp" class="form-text text-muted">First name</small>
          </div>
          <div class="form-group col-6">
            <input required type="text" class="form-control" name="lastName" id="lastName_client" placeholder="Enter last name"
              >
            <small id="lastNameHelp" class="form-text text-muted">Last name</small>
          </div>
        </div>
        <div class="form-group p-1">
          <label for="city">City</label>
          <input required type="text" class="form-control" name="city" id="city_client" placeholder="City" >
        </div>
        <div class="form-group p-1">
          <label for="job">Job title</label>
          <select name="job" id="job" class="form-control" >
            <option value="" disabled selected>Choose your job</option>
            <?php
            $professions = $DB->fetchProfessions();
            // Check if records were found
            if (count($professions) > 0) {
              // Output data of each row as options for the select list
              foreach ($professions as $row) {
                echo '<option value="' . $row["id"] . '">' . $row["nom"] . '</option>';
            }
            } else {
              echo '<option value="-1" selected disabled >No job titles found</option>';
            }
            ?>
          </select>
        </div>
        <div class="form-group p-1">
          <label for="username">Username</label>
          <input required type="text" class="form-control" name="username" id="username" placeholder="Username" >
          <small id="usernameHelp" class="form-text text-muted">For people to identify you.</small>
        </div>
        <div class="form-group p-1">
          <label for="exampleInputEmail1">Email address</label>
          <input required type="email" class="form-control" name="email" id="exampleInputEmail_client"
            aria-describedby="emailHelp" placeholder="Enter email" >
          <small id="emailHelp" class="form-text text-muted">Two accounts cannot use the same email.</small>
        </div>
        <div class="form-group p-1">
          <label for="tel">Telephone</label>
          <input required type="tel" pattern="0[67][0-9]{8}" name="tel" title="Example: 0612345678" class="form-control"
            id="tel_client" placeholder="Telephone" >
          <small id="telHelp" class="form-text text-muted">Example: 0612345678.</small>
        </div>
        <div class="form-group p-1">
          <label for="exampleInputPassword1">Password</label>
          <input required type="password" class="form-control" name="password" id="exampleInputPassword1" placeholder="Password"
            >
          <small id="emailHelp" class="form-text text-muted">Password is case sensitive.</small>
        </div>
        <div class="form-group p-1">
          <label for="cv">Your CV</label>
          <input required type="file" class="form-control" name="cv" id="cv" placeholder="cv" >
          <small id="CVHelp" class="form-text text-muted">You can modify it later.</small>
          <div class="alert alert-info" role="alert">
            Make sure to give each section in the CV a title so it can be processed.
          </div>
        </div>

        <h2>Socials : </h2>

        <div class="form-group p-1">
          <label for="website">Website</label>
          <input type="text" class="form-control" name="website" id="exampleInputWebsite" placeholder="Website...">
        </div>

        <div class="form-group p-1">
          <label for="github">Github</label>
          <input type="text" class="form-control" name="github" id="exampleInputGithub" placeholder="Github...">
        </div>

        <div class="form-group p-1">
          <label for="twitter">Twitter</label>
          <input type="text" pattern="^@[a-zA-Z0-9_]+$" class="form-control" name="twitter" id="exampleInputTwitter" placeholder="Twitter...">
        </div>

        <div class="form-group p-1">
          <label for="instagram">Instagram</label>
          <input type="text" pattern="^@[a-zA-Z0-9_.]+$" class="form-control" name="instagram" id="exampleInputInstagram" placeholder="Instagram...">
        </div>

        <div class="form-group p-1">
          <label for="facebook">Facebook</label>
          <input type="text" class="form-control" name="facebook" id="exampleInputFacebook" placeholder="Facebook...">
        </div>

        <div class="row p-4 mx-auto ">
          <button type="submit" class="btn btn-primary col-4 mx-auto">Register</button>
        </div>
        <div class="row p-4 mx-auto ">
          <button id="HR-toggle" class="btn btn-link col-4 mx-auto">Register as HR?</button>
        </div>
      </form>

      <!-- ============================================================================================================================== -->

      <!-- FORM 2 -->

      <!-- ============================================================================================================================== -->
      <form action="./server/sign-up-in/signup.php" method="post" id="HR-form" style="display: none !important;">
        <input required type="hidden" name="form-name" value="HR-form">
        <div id="HR-alert" class="alert alert-warning " style="display: none !important;" role="alert">
          <h4 id="HR-alert-head" class="alert-heading">Well done!</h4>
          <p id="HR-alert-par" class="alert-body"</p>
        </div>
        <div class="form-group p-1">
          <label for="companyName">Company name</label>
          <input required type="text" name="companyName" class="form-control" id="companyName" placeholder="Enter company name"
            >
        </div>
        <div class="form-group p-1">
          <label for="ICE">ICE</label>
          <input required type="text" name="ICE" class="form-control" id="ICE" placeholder="Enter ICE" >
          <small id="ICEHelp" class="form-text text-muted">"Identifiant Commun des Entreprises (Exemples : 123456789000057)"</small>
        </div>
        <div class="form-group p-1">
          <label for="industry">Industry</label>
          <select name="industry" id="industry" class="form-control" >
            <option value="" disabled selected>Choose your industry</option>
            <?php
            $industries = $DB->fetchIndustries();
            // Check if records were found
            if (count($industries) > 0) {
              // Output data of each row as options for the select list
              foreach ($industries as $row) {
                echo '<option value="' . $row["id"] . '">' . $row["nom"] . '</option>';
            }
            } else {
              echo '<option value="">No industries found</option>';
            }
            ?>
          </select>
          <small id="industryHelp" class="form-text text-muted">select your industry.</small>
        </div>
        <div class="form-group p-1">
          <label for="city">City</label>
          <input required type="text" class="form-control" name="city" id="city_HR" placeholder="City" >
        </div>
        <label for="name">HR manager's name</label>
        <div class="row p-1">
          <div class="form-group col-6">
            <input required type="text" name="HRFirstName" class="form-control" id="firstName_HR" placeholder="Enter first name"
              >
            <small id="firstNameHelp" class="form-text text-muted">First name</small>
          </div>
          <div class="form-group col-6">
            <input required type="text" name="HRLastName" class="form-control" id="lastName_HR" placeholder="Enter last name"
              >
            <small id="lastNameHelp" class="form-text text-muted">Last name</small>
          </div>
        </div>
        <div class="form-group p-1">
          <label for="email">Email address</label>
          <input required type="email" name="email" class="form-control" id="exampleInputEmail_HR" aria-describedby="emailHelp"
            placeholder="Enter email" >
          <small id="emailHelp" class="form-text text-muted">Two accounts cannot use the same email.</small>
        </div>
        <div class="form-group p-1">
          <label for="tel">Telephone</label>
          <input required type="tel" name="tel" pattern="0[67][0-9]{8}" title="Example: 0612345678" class="form-control"
            id="tel_HR" placeholder="Telephone" >
          <small id="telHelp" class="form-text text-muted">Example: 0612345678.</small>
        </div>
        <div class="form-group p-1">
          <label for="password">Password</label>
          <input required type="password" name="password" class="form-control" id="password" placeholder="Password" >
          <small id="passwordHelp" class="form-text text-muted">Password is case sensitive.</small>
        </div>
        <div class="row p-4 mx-auto ">
          <button type="submit" class="btn btn-outline-primary col-4 mx-auto">Register</button>
        </div>
        <div class="row p-4 mx-auto ">
          <button type="submit" id="client-toggle" class="btn btn-link col-4 mx-auto">Register as client?</button>
        </div>
      </form>
    </div>
  </div>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="./server/sign-up-in/signup.js"></script>
  <script src="./custom js/sign.js"></script>
</body>

</html>
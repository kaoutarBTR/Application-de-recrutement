<?php

session_start();

if (!isset ($_SESSION['id'])) {
  // Redirect to the login page if not logged in
  header("Location: ./signin-page.php");
  exit();
}

// Fetch user data from the database based on the user ID stored in the session
$user_id = $_SESSION['id'];

try {

  require_once "./server/DB_class.php";

  $DB = new DB_class();

} catch (Exception $e) {

  echo "Error requiring DB module : " . $e->getMessage();

}

$userData = $DB->getClientData($user_id);
$offreEmloi = $DB->getJobOffersByIndustry($userData['profession']);


// Close the statement
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Profile</title>
  <link rel="stylesheet" href="./css/bootstrap.css" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
</head>

<body>
  <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop"
    aria-labelledby="offcanvasWithBackdropLabel">
    <div class="offcanvas-header">
      <h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">
        Notification center
      </h5>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="offcanvas-body">
      <p>no notifications at the moment...</p>
    </div>
  </div>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: rgba(87, 157, 169, 0.332)">
    <a class="navbar-brand" href="#"><img src="./assets/png/logo-black-removebg-preview.png" width="170" height="45"
        alt="" /></a>
    <button class="btn btn-primary ml-auto" type="button" data-bs-toggle="offcanvas"
      data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop">
      <i class="fa fa-bell"></i>
    </button>
    <a href="./signin-page.php" class="btn btn-danger my-sm-0 ml-2">
      Log-out
    </a>
  </nav>

  <div class="container col-12 col-sm-10 col-md-8 mt-3 p-2" style="
        background-color: rgba(220, 255, 255, 0.588);
        border-radius: 5px;
        border: solid rgba(0, 0, 0, 0.144) 1px;
      ">
    <div class="row gutters-sm">
      <div class="col-md-4 mb-3">
        <div class="card">
          <div class="card-body">
            <div class="d-flex flex-column align-items-center text-center">
              <img src="./assets/otherassets/default-pfp.jpg" alt="Admin" class="rounded-circle" width="150" />
              <div class="mt-3">
                <h4>
                  <?php echo $userData['nom'] . ' ' . $userData['prenom']; ?>
                </h4>
                <p class="text-secondary mb-1">
                  <?php echo $userData['profession_name']; ?>
                </p>
                <p class="text-muted font-size-sm">
                  <?php echo $userData['ville']; ?>
                </p>
                <a download href=<?php

                // Local file path
                $localFilePath = $userData['cv_path'];

                // Replace backslashes with forward slashes (for Windows compatibility)
                $localFilePath = str_replace('\\', '/', $localFilePath);

                // Get the document name from the file path
                $documentName = basename($localFilePath);

                // Define the base URL of your web server
                $baseURL = 'http://localhost/';

                // Construct the URL to the document
                $documentURL = $baseURL . 'CV/' . $documentName;

                echo $documentURL;
                ?> class="btn btn-primary">Download CV</a>
              </div>
            </div>
          </div>
        </div>
        <div class="card mt-3">
          <ul class="list-group list-group-flush">
            <?php
            if ($userData['website'] !== "") {
              echo '<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-globe mr-2 icon-inline">
                          <circle cx="12" cy="12" r="10"></circle>
                          <line x1="2" y1="12" x2="22" y2="12"></line>
                          <path d="M12 2a15.3 15.3 0 0 1 4 10 15.3 15.3 0 0 1-4 10 15.3 15.3 0 0 1-4-10 15.3 15.3 0 0 1 4-10z">
                          </path>
                        </svg>Website
                      </h6>
                      <span class="text-secondary">' . $userData['website'] . '</span>
                    </li>';
            }
            ?>

            <?php
            if ($userData['github'] !== "") {
              echo '<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-github mr-2 icon-inline">
                          <path
                            d="M9 19c-5 1.5-5-2.5-7-3m14 6v-3.87a3.37 3.37 0 0 0-.94-2.61c3.14-.35 6.44-1.54 6.44-7A5.44 5.44 0 0 0 20 4.77 5.07 5.07 0 0 0 19.91 1S18.73.65 16 2.48a13.38 13.38 0 0 0-7 0C6.27.65 5.09 1 5.09 1A5.07 5.07 0 0 0 5 4.77a5.44 5.44 0 0 0-1.5 3.78c0 5.42 3.3 6.61 6.44 7A3.37 3.37 0 0 0 9 18.13V22">
                          </path>
                        </svg>Github
                      </h6>
                      <span class="text-secondary">' . $userData['github'] . '</span>
                    </li>';
            }
            ?>
            <?php
            if ($userData['twitter'] !== "")
              echo '<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-twitter mr-2 icon-inline text-info">
                          <path
                            d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                          </path>
                        </svg>Twitter
                      </h6>
                      <span class="text-secondary">' . $userData['twitter'] . '</span>
                    </li>';
            ?>
            <?php
            if ($userData['instagram'] !== "")
              echo '<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-instagram mr-2 icon-inline text-danger">
                          <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                          <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                          <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                        </svg>Instagram
                      </h6>
                      <span class="text-secondary">' . $userData['instagram'] . '</span>
                    </li>';
            ?>
            <?php
            if ($userData['facebook'] !== "")
              echo '<li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                      <h6 class="mb-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                          stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                          class="feather feather-facebook mr-2 icon-inline text-primary">
                          <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                        </svg>Facebook
                      </h6>
                      <span class="text-secondary">' . $userData['facebook'] . '</span>
                    </li>';
            ?>

          </ul>
        </div>
      </div>
      <div class="col-md-8">
        <div class="card mb-3">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Full Name</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $userData['nom'] . ' ' . $userData['prenom']; ?>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Email</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $userData['email']; ?>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Phone</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $userData['telephone']; ?>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-sm-3">
                <h6 class="mb-0">Address</h6>
              </div>
              <div class="col-sm-9 text-secondary">
                <?php echo $userData['ville']; ?>
              </div>
            </div>
            <hr />
            <div class="row">
              <div class="col-sm-12">
                <a class="btn btn-info" target="__blank" href="#">Edit</a>
              </div>
            </div>
          </div>
        </div>

        <div class="row gutters-sm">
          <div class="col-sm-12 mb-3">
            <div class="card mb-3 text-center">
              <h3 class="m-2">Job offers :</h3>
              <?php
              if (!isset ($offreEmloi) || $offreEmloi === []) {
                echo "<p>Pas d'offre pour le momment</p>";
              } else {
                foreach ($offreEmloi as $row) {
                  echo '<div class="card text-center m-2">
                    <div class="card-header">
                      ' . $row['nomSociete'] . '
                    </div>
                    <div class="card-body">
                      <h5 class="card-title">' . $row['sujet'] . '</h5>
                      <p class="card-text">' . $row['description'] . '</p>
                      <button class=" btn btn-primary executePHP" value="' . $row['id'] . '" class="btn btn-outline-dark">Submit application</button>
                    </div>
                    <div class="card-footer text-body-secondary">
                      Duree : ' . $row['duree'] . '
                    </div>
                  </div>';
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
  $('.executePHP').click(function () { // Change selector to target elements with class executePHP

    var idOffre = Number($(this).val()); // Get the value of the clicked button
    var idClient = "<?php echo $userData['id']; ?>";

    var clickedButton = this; // Store reference to the clicked button

    $.ajax({
      url: './server/postulate.php',
      type: 'POST',
      data: {
        Offre: idOffre,
        Client: idClient
      },
      success: function (response) {
        clickedButton.classList.remove("btn-outline-dark");
        if (response === "0") {
          clickedButton.classList.add("btn-success", "disabled");
          clickedButton.innerHTML = "Sent successfully";
        } else {
          clickedButton.classList.add("btn-secondary", "disabled");
          clickedButton.innerHTML = "Already postulated";
        }
        console.log(response);
      },
      error: function (xhr, status, error) {
        console.error(error);
      }
    });
  });
});

</script>

<!-- Keep this script tag -->
<script src="./js/bootstrap.js"></script>

</body>

</html>
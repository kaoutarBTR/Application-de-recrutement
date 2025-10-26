<?php
if(isset($_SESSION['id'])){
  session_destroy();
}
session_start();
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Sign-in</title>

    <link
      rel="canonical"
      href="https://getbootstrap.com/docs/5.0/examples/sign-in/"
    />
    <link href="css/bootstrap.css" rel="stylesheet" />
    <link href="custom css/signin.css" rel="stylesheet" />
  </head>
  <body class="text-center">
    <main class="form-signin">
      <form
        id="client-form"
        class="form-signin"
        method="post"
        action="./server/sign-up-in/signin.php"
        enctype="multipart/form-data"
      >
        <input type="hidden" name="form-name" value="client-form">
        <img
          class="mb-1"
          src="./assets/png/workwave-favicon-black.png"
          alt=""
          width="72"
          height="77"
        />
        <h1 class="h3 fw-normal">Please sign in</h1>
        <p class="mb-3">client space</p>

        <div class="form-floating">
          <input
            type="email"
            name="email"
            class="form-control"
            id="client-email"
            placeholder="name@example.com"
            required
          />
          <label for="client-email">Email address</label>
        </div>
        <div class="form-floating">
          <input
            type="password"
            name="password"
            class="form-control"
            id="client-password"
            placeholder="Password"
            required
          />
          <label for="client-password">Password</label>
        </div>
        <div id="client_alert" class="alert alert-danger mt-2" style="display: none !important;" role="alert">
          A simple danger alert with. Give it a click if you like.
        </div>
        <div class="checkbox mb-3">
          <label>
            <button class="btn btn-sm btn-outline-secondary" id="HR-toggle">
              sign-in as HR?
            </button>
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">
          Sign in
        </button>
        <p style="margin-top: 10px">
          don't have an account? <a href="./signup-page2.php">sign-up</a>
        </p>

        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
      </form>
      <!-- ======================================================================================================== -->

      <!-- HR-form -->

      <!-- ======================================================================================================== -->
      <form
        id="HR-form"
        method="post"
        action="./server/sign-up-in/signin.php"
        style="display: none"
        enctype="multipart/form-data"
      >
        <input type="hidden" name="form-name" value="HR-form">
        <img
          class="mb-1"
          src="./assets/png/workwave-favicon-black.png"
          alt=""
          width="72"
          height="77"
        />
        <h1 class="h3 fw-normal">Please sign in</h1>
        <p class="mb-3">HR space</p>

        <div class="form-floating">
          <input
            type="email"
            class="form-control"
            id="HR-email"
            placeholder="name@example.com"
            name="email"
          />
          <label for="HR-email">Email address</label>
        </div>
        <div class="form-floating">
          <input
            type="password"
            class="form-control"
            id="HR-password"
            placeholder="Password"
            name="password"
          />
          <label for="HR-password">Password</label>
        </div>
        <div id="HR_alert" class="alert alert-danger mt-2" style="display: none !important;" role="alert">
          A simple danger alert with. Give it a click if you like.
        </div>

        <div class="checkbox mb-3">
          <label>
            <button class="btn btn-sm btn-outline-secondary" id="client-toggle">
              sign-in as client?
            </button>
          </label>
        </div>
        <button class="w-100 btn btn-lg btn-primary" type="submit">
          Sign in
        </button>
        <p style="margin-top: 10px">
          don't have an account? <a href="./signup-page2.php">sign-up</a>
        </p>
        <p class="mt-5 mb-3 text-muted">&copy; 2017–2021</p>
      </form>
    </main>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="./server/sign-up-in/signin.js"></script>
    <script src="./custom js/sign.js"></script>
  </body>
</html>

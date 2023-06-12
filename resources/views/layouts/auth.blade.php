<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous" />

  <!-- font awesome  -->
  {{-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" /> --}}
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.7.2/css/all.min.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />


  <script src="https://www.google.com/recaptcha/api.js" async defer></script>


  <link rel="stylesheet" href="/vendor/css/auth.css">
    <title>@yield('title')</title>
  </head>
  <body>

    {{-- Page Content --}}
    @yield('content')


    {{-- Script --}}
   <script>
      function password_show_hide() {
        var passwordInput = document.getElementById("password");
        var showEye = document.getElementById("show_eye");
        var hideEye = document.getElementById("hide_eye");
        
        if (passwordInput.type === "password") {
            passwordInput.type = "text";
            confirmInput.type = "text";
            showEye.classList.add("d-none");
            hideEye.classList.remove("d-none");
        } else {
            passwordInput.type = "password";
            confirmInput.type = "password";
            showEye.classList.remove("d-none");
            hideEye.classList.add("d-none");
        }
      }
      function confirm_password_show_hide() {
        var passwordConfirmInput = document.getElementById("password-confirm");
        var showEyeConfirm = document.getElementById("show_eye_confirm");
        var hideEyeConfirm = document.getElementById("hide_eye_confirm");

        if (passwordConfirmInput.type === "password") {
            passwordConfirmInput.type = "text";
            showEyeConfirm.classList.add("d-none");
            hideEyeConfirm.classList.remove("d-none");
        } else {
            passwordConfirmInput.type = "password";
            showEyeConfirm.classList.remove("d-none");
            hideEyeConfirm.classList.add("d-none");
        }
    }
   </script>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
</html>

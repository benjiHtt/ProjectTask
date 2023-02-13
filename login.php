<!DOCTYPE html>

<?php
include('functions.php');
session_start();
?>

<html lang="en">

<head>
    <!--*********************************************************************** -->
    <!-- by : D csapat[Lieber Marcell ][Varga Péter ][Hitter Benjámin ] -->
    <!-- Jelenleg 2 Section van:1. Belépés; 2.Footer -->
    <!--*********************************************************************** -->
<link rel="icon" type="image/x-icon" href="img/favicon.svg">

<meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"
    />
    <link
      href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Bottyanchat Login</title>

      <script>

const myModal = document.getElementById('myModal')
const myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', () => {
  myInput.focus()
})

</script>

</head>

<body style= "background-image: url('img/hatter_2.0.jpg');">

<!--1.Belépés section-->
<section class="vh-100 gradient-custom">
<div>
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">

              <h2 class="fw-bold mb-2 text-uppercase"><span class="text-warning">Bejelentkezés</span></h2>
              <p class="text-white-50 mb-5">Írd be a felhasználóneved és a jelszavad!</p>
            
              <form method="post">

              <div class="form-outline form-white mb-4">
                <input type="text" name="user" id="user" placeholder="Felhasználónév" class="form-control form-control-lg" />
                <label class="form-label" for="user"></label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" name="password" id="Password" placeholder="Jelszó" class="form-control form-control-lg" />
                <label class="form-label" for="Password"></label>
              </div>

              <p class="small mb-5 pb-lg-2"><a class="text-white-50" href="#!">Elfelejtetted a jelszavad?</a></p>

              <div id="liveAlertPlaceholder"></div>
              <button class="btn btn-outline-light btn-lg px-5" id="belepes" name="belepes" type="submit">Belépés</button>
        
                   </form>

              <div class="d-flex justify-content-center text-center mt-4 pt-1">
                <a href="#!" class="text-white"><i class="fab fa-facebook-f fa-lg"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-twitter fa-lg mx-4 px-2"></i></a>
                <a href="#!" class="text-white"><i class="fab fa-google fa-lg"></i></a>
              </div>

            </div>

            <div>
              <p class="mb-0">Amennyiben nem rendelkezel még fiókkal, igényelj egyet az adminisztrátortól!
              </p>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</section>

<?php

if(isset($_GET["belepo"])){

    $_SESSION['belepouser']=$_REQUEST["user"];
    //$_SESSION['belepopass'] = md5($_REQUEST["password"]);
    $_SESSION['belepopass'] = $_REQUEST["password"];

    if (isset($_SESSION["belepouser"])){

      $kapcs = new kapcsolat;
      $kapcs->bejelentkezes();
    

if ($_SESSION['privilege'] == 10){
?>

<script>
    
    window.location.href = 'admin.php';
    
    </script>

    <?php

}

else {

  ?>

<script>
    
    window.location.href = 'index.php';
    
    </script>

    <?php

}

}

}

?>

<!-- 2.Footer Section -->
<!-- utolsó modosítás : Hitter Benjámin 16:43 2023/02/10 -->
<section id="footer" >
<footer class="p-5 bg-dark text-white text-center position-relative">
      <div class="container">
        <p class="lead">Copyright &copy; 2023 Bottyán János Kutatóközpont</p>
        <p class="lead"> D Csapat</p>

        <a href="#" class="position-absolute bottom-0 end-0 p-5">
          <i class="bi bi-arrow-up-circle h1"></i>
        </a>
      </div>
    </footer>
  </section>
</body>


</html>
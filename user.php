<!DOCTYPE html>

<?php
include('functions.php');
session_start();
?>

<html lang="en">

<head>
    <!--*********************************************************************** -->
    <!-- by : D csapat[Lieber Marcell ][Varga Péter ][Hitter Benjámin ] -->
    <!-- Jelenleg 8 sectionbol áll az oldal: 1.Navbar 2.Showcase 3.Hírlevél 4.Boxes 5.Tech 6.GYIK 7.Kontakt-Térkép 8.Footer-->
    <!-- utolsó modosítás : Hitter Benjamin 12:21 2023/02/12 -->
    <!--*********************************************************************** -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <title>Bottyanchat User</title>
    <link rel="icon" type="image/x-icon" href="img/favicon.svg">

    <script>
    const myModal = document.getElementById('myModal')
    const myInput = document.getElementById('myInput')

    myModal.addEventListener('shown.bs.modal', () => {
        myInput.focus()
    })
    </script>


</head>

<body>

    <!-- utolsó modosítás : Hitter Benjámin 16:43 2023/02/10-->
<div>
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark py-3 fixed-top">
        <div class="container">
        <a href="#" class="navbar-brand">
      <svg height="130" width="600">
  <defs>
    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" style="stop-color:rgb(13,110,253);stop-opacity:1" />
      <stop offset="100%" style="stop-color:rgb(255,0,0);stop-opacity:1" />
    </linearGradient>
  </defs>
  <ellipse cx="200" cy="70" rx="175" ry="60" fill="url(#grad1)" />
  <text fill="#ffffff" font-size="25" font-family="Verdana" x="84" y="79">Bottyanchat User</text>
  Sajnos a bongésződ nem támogatja az SVG formátumot :(
 </svg>
   </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" class="nav-link">Chat</a>
                    </li>
                    <li class="nav-item">
                        <a href="#questions" class="nav-link">Felhasználó Felület</a>
                    </li>                  
                    <li class="nav-item">
                        <form method="post" action="logout.php">
                            <button type="submit" name="logout" id="logout"
                                class="btn btn-link btn-logout">Kilépés</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
    <!-- 1. Navbar Section VÉGE-->

    <?php

        if (isset($_POST['logout'])) {
            session_unset();
            ?>

    <script>
    window.location.href = 'index.php';
    </script>

    <?php
        }
    
    ?>
    <!-- 2. Showcase Section KEZDETE-->
    <!-- utolsó modosítás : Hitter Benjamin 23:18 2023/10/10 -->
<div>
    <section class="bg-dark text-light p-5 p-lg-0 pt-lg-5 text-center text-sm-start">
        <div class="container">
            <div class="d-sm-flex align-items-center justify-content-between">
                <div>
                    <h1>Szia, <span class="text-warning"> <?php echo $_SESSION['name']?> </span> !</h1>
                    <p class="lead my-4">
                        Üdv a Bottyanchat felhasználó rangú oldalán!
                    </p>            
                </div>
                <img img width="500" height="500" src="img/user.png" alt="user_image_error" />
            </div>
        </div>
    </section>
</div>
<!-- 2. Showcase Section VÉGE-->
                                      
<!-- 3. kék Section KEZDETE-->
    <!-- utolsó modosítás : Hitter Benjámin 20:50 2023/02/10 -->
<div>
    <section class="bg-primary text-light p-5">
      <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">
        </div>
      </div>
    </section>
</div>
<!-- 3. kék Section VÉGE-->

<!-- 4.Boxes Section KEZDETE--> 
    <!-- utolsó modosítás : Hitter Benjámin 20:50 2023/02/10 -->
<div>
    <section class="p-5" id="ide">
        <div class="container">
            <div class="row text-center g-4">
              <!-- Fajl Fel Card KEZDETE-->
            <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/file.png" width="100" height="100" class="rounded mx-auto d-block" alt="file fel img error">
                            </div>
                            <h3 class="card-title mb-3">Fájl Feltöltése</h3>
                            <p class="card-text">
                               Tölts fel új fájlt a <span class="text-warning"> Bottyanchat </span> oldalra:
                            </p>
                            <!-- file fel modal trigger -->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Feltöltés
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="text-light bg-dark modal-content">

                                        <form method="post">

                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Fájl Feltöltése</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                            <div class="mb-3">
                                            <label for="formFile" class="form-label">Fájl Feltöltés</label>
                                            <input class="form-control" type="file" id="formFile">
                                               </div>
                                                                                          
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Mégse</button>
                                                <button type="submit" name="regusersubmit" id="regusersubmit"
                                                    class="btn btn-primary">Feltöltés</button>
                                            </div>
                                    </div>

                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- Fajl Fel Card VÉGE-->

                <!-- Fajl Le Card KEZDETE-->
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/file2.png" width="100" height="100" class="rounded mx-auto d-block" alt="Fajl le img error">
                            </div>
                            <h3 class="card-title mb-3">Fajl Letöltése</h3>
                            <p class="card-text">
                               Tölts le fájlt <span class="text-warning"> Bottyanchat </span> oldalról:
                            </p>
                            <!-- user regisztráció modal trigger -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Letöltés
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="text-light bg-dark modal-content">

                                        <form method="post">

                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Fájl Letöltése</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <input type="text" name="regusername" id="regusername"
                                                    placeholder="Felhasználónév" class="form-control form-control-lg" />
                                                <label class="form-label" for="regusername"></label>

                                                <input type="text" name="reguserpw" id="reguserpw" placeholder="Jelszó"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="reguserpw"></label>

                                                <input type="text" name="regpriv" id="regpriv"
                                                    placeholder="Jogosultság(0 - 5 - 10)"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="regpriv"></label>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Mégse</button>
                                                <button type="submit" name="regusersubmit" id="regusersubmit"
                                                    class="btn btn-success">Letöltés</button>
                                            </div>
                                    </div>

                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- Fajl Le Card VÉGE-->

                <!-- Chat Card Kezdete -->

                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/chat.png" width="100" height="100" class="rounded mx-auto d-block" alt="Fajl le img error">
                            </div>
                            <h3 class="card-title mb-3">Chat</h3>
                            <p class="card-text">
                               Nézz rá a  <span class="text-warning"> Bottyanchat </span> üzeneteidre:
                            </p>
                            <!-- user chat offcanvas trigger -->
                            <button class="btn btn-info" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                             aria-controls="offcanvasRight">Chat!</button>
                           
                        </div>
                    </div>
                </div>
                <!-- Chat Card VÉGE -->

                <!-- Feladat Card Kezdete -->

                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/task2.png" width="100" height="100" class="rounded mx-auto d-block" alt="Fajl le img error">
                            </div>
                            <h3 class="card-title mb-3">Feladatok</h3>
                            <p class="card-text">
                               Nézz rá a  <span class="text-warning"> Bottyanchat </span> feladataidra:
                            </p>
                            <!-- user chat offcanvas trigger -->
                            <button class="btn btn-warning" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasLeft"
                             aria-controls="offcanvasRight">Megnyitás</button>
                           
                        </div>
                    </div>
                </div>
                <!-- Feladat Card VÉGE -->

    </div>
   </div>
  </section>
</div>

<!--5. Canvas Section KEZDETE-->
<!--Kettő(!!) Cancast tartalmaz:1.Chat; 2.Feladatok -->
<div>
 <!--ELSO (Chat) Canvas Section Kezdete-->

 <div>
 
 <div class="offcanvas offcanvas-end " tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 800px !important; background-color:#212529">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasRightLabel">
      
    <svg height="130" width="400">
  <defs>
    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" style="stop-color:rgb(13,110,253);stop-opacity:1" />
      <stop offset="100%" style="stop-color:rgb(255,0,0);stop-opacity:1" />
    </linearGradient>
  </defs>
  <ellipse cx="200" cy="70" rx="185" ry="50" fill="url(#grad1)" />
  <text fill="#ffffff" font-size="45" font-family="Verdana" x="63" y="86">Bottyanchat</text>
  Sajnos a bongésződ nem támogatja az SVG formátumot :(
 </svg>
  
  </h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
       <?php include('chat/index.php'); ?>
  </div>
 </div>
 </div>

 <div>
 <!--ELSO (Chat) Canvas Section VÉGE-->

 <!--MASODIK (Feladatok) Canvas Section KEZDETE-->
 <div>
 <div class="offcanvas offcanvas-start " tabindex="-1" id="offcanvasLeft" aria-labelledby="offcanvasLeftLabel" style="width: 800px !important; background-color:#212529">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasLeftLabel">
      
    <svg height="130" width="400">
  <defs>
    <linearGradient id="grad1" x1="0%" y1="0%" x2="100%" y2="0%">
      <stop offset="0%" style="stop-color:rgb(13,110,253);stop-opacity:1" />
      <stop offset="100%" style="stop-color:rgb(255,0,0);stop-opacity:1" />
    </linearGradient>
  </defs>
  <ellipse cx="200" cy="70" rx="185" ry="50" fill="url(#grad1)" />
  <text fill="#ffffff" font-size="45" font-family="Verdana" x="89" y="86">Feladatok</text>
  Sajnos a bongésződ nem támogatja az SVG formátumot :(
 </svg>
  
  </h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">


  <div class="row">
  <div class="col-4">
    <div id="list-example" class="list-group">
      <a class="list-group-item list-group-item-action" href="#list-item-1">Feladat 1</a>   
    </div>
  </div>
  <div class="col-8">
    <div data-bs-spy="scroll" data-bs-target="#list-example" data-bs-smooth-scroll="true" class="scrollspy-example" tabindex="0">
        
      <h4 id="list-item-1">Feladat 1</h4>
      <p>

      This is some placeholder content for the scrollspy page. Note that as you scroll down the page, the appropriate navigation link is highlighted.
       It's repeated throughout the component example. We keep adding some more example copy here to emphasize the scrolling and highlighting.

      </p>

    </div>
    </div>
    </div>
  </div>
 </div>


   </div>
 </div>
 <!--MASODIK (Feladatok) Canvas Section VÉGE-->
</div>
<!--5. Canvas Section VÉGE-->

    <!-- 6.Footer Section KEZDETE-->
    <!-- utolsó modosítás : Hitter Benjámin 23:33 2023/02/10 -->
<div>
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
    
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4"
      crossorigin="anonymous"
    ></script>
  </section>
</div>
<!-- 6.Footer Section VÉGE-->

    <?php


    ?>
</body>

</html>
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
    <!-- utolsó modosítás : Hitter Benjamin 16:27 2023/02/11 -->
    <!--*********************************************************************** -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <title>Bottyanchat Groupleader</title>
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

    <?php
    //védelem ahhoz a kiskapuhoz, amikor belépünk admin accounttal h betöltsön az oldal majd megint belépve egy alacsonyabb jogú felhasználóba ugyan úgy használható az oldal
  if($_SESSION['privilege']!=5){
    
    ?>
    <script>
   alert('Nincs jogosultságod az oldal használatához.');
   </script>

    <?php
  }

if ($_SESSION['privilege']==5){


  ?>
    <!-- 1. Navbar Section KEZDETE-->
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
  <text fill="#ffffff" font-size="22" font-family="Verdana" x="66" y="79">Bottyanchat Groupleader</text>
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
                        <a href="#questions" class="nav-link">Vezér Felület</a>
                    </li>                  
                    <li class="nav-item">
                        <form method="post"  action="logout.php">
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
                    Üdv a Bottyanchat vezér rangú oldalán!
                    </p>            
                </div>
                <img width="500" height="500" src="img/groupleader.svg" alt="groupleader_image_error" />
            </div>
        </div>
    </section>
</div>
<!-- 2. Showcase Section VÉGE--> 

   <!-- 3. KÉK Section KEZDETE-->
    <!-- utolsó modosítás : Hitter Benjámin 20:50 2023/02/10 -->
<div>
    <section class="bg-primary text-light p-5">
      <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">  
        </div>
      </div>
      
    </section>

</div>
<!-- 3. KÉK Section VÉGE-->

    <!-- 4.Boxes Section KEZDETE--> 
    <!-- utolsó modosítás : Hitter Benjámin 20:50 2023/02/10 -->
<div>
    <section class="p-5" id="ide">
        <div class="container">
            <div class="row text-center g-4">

            <!-- Felhasznaló Regisztralasa Card KEZDETE-->
            <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/add_user.svg" width="100" height="100" class="rounded mx-auto d-block" alt="add_user img error">
                            </div>
                            <h3 class="card-title mb-3">Felhasználó Regisztrálása</h3>
                            <p class="card-text">
                                Regisztrálj új felhasználót a <span class="text-warning"> Bottyanchat </span> oldalra:
                            </p>
                            <!-- user regisztráció modal trigger -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop">
                                Felhasználó Regisztrálása
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="text-light bg-dark modal-content">

                                        <form method="post" action="reguser.php">

                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Felhasználó
                                                    Regisztrálása</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="caller" value="groupleader.php">
                                                <input type="hidden" name="reguserprivilege" value="0">

                                                <input type="text" name="regusername" id="regusername"
                                                    placeholder="Felhasználónév" class="form-control form-control-lg" />
                                                <label class="form-label" for="regusername"></label>

                                                <input type="text" name="reguserpw" id="reguserpw" placeholder="Jelszó"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="reguserpw"></label>

                                                <select class="form-select" id="inlineFormSelectPref" name="regusergroup">
                                                  <option selected value="0">Csoport</option>

                                                     </select>

                                                </div>
                                                                           
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Mégse</button>
                                                <button type="submit" name="regusersubmit" id="regusersubmit"
                                                    class="btn btn-success">Regisztráció</button>
                                            </div>
                                    </div>

                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- Felhasznaló Regisztrálás Card VÉGE-->

                <!-- Felhasznaló Törlés Card KEZDETE-->
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/remove_user.svg" width="100" height="100" class="rounded mx-auto d-block" alt="add_user img error">
                            </div>
                            <h3 class="card-title mb-3">Felhasználó Törlése</h3>
                            <p class="card-text">
                               Törölj felhasználó jogosultságú fiókot a <span class="text-warning"> Bottyanchat </span> oldalról:
                            </p>
                            <!-- user regisztráció modal trigger -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop_user_delete">
                                Felhasználó Törlése
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop_user_delete" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop_user_delete"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="text-light bg-dark modal-content">

                                        <form method="post" action="deluser.php">

                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel_user_delete">Felhasználó
                                                    Törlése</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="caller" value="groupleader.php">
                                                <input type="text" name="regusername" id="regusername"
                                                    placeholder="Felhasználónév" class="form-control form-control-lg" />
                                                <label class="form-label" for="regusername"></label>

                                                <input type="text" name="reguserpw" id="reguserpw" placeholder="Jelszó"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="reguserpw"></label>                                                

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Mégse</button>
                                                <button type="submit" name="regusersubmit" id="regusersubmit"
                                                    class="btn btn-danger">Törlés</button>
                                            </div>
                                    </div>

                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- Felhasznaló Törlés Card VÉGE-->

                <!-- Felhasznaló Törlés Card KEZDETE-->
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/task.png" width="100" height="100" class="rounded mx-auto d-block" alt="add_user img error">
                            </div>
                            <h3 class="card-title mb-3">Feladat Létrehozása</h3>
                            <p class="card-text">
                               Hozz létre feladatot a felhasználóknak <span class="text-warning"> Bottyanchat </span> oldalon keresztül:
                            </p>
                            <!-- user regisztráció modal trigger -->
                            <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                data-bs-target="#staticBackdrop_task">
                                Feladat Létrehozása
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="staticBackdrop_task" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdrop_task_Label"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="text-light bg-dark modal-content">

                                        <form method="post">

                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdrop_task_Label">Feladat Létrehozása</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <input type="text" name="regusername" id="regusername"
                                                    placeholder="Csoport ID" class="form-control form-control-lg" />
                                                <label class="form-label" for="regusername"></label>

                                                <input type="text" name="regusername" id="regusername"
                                                    placeholder="Feladat Címe" class="form-control form-control-lg" />
                                                <label class="form-label" for="regusername"></label>

                                              <input type="text" name="regpriv" id="regpriv"
                                                    placeholder="Feladat Leírás"
                                                    class="form-control form-control-lg" />
                                                <label class="form-label" for="regpriv"></label>

                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Mégse</button>
                                                <button type="submit" name="regusersubmit" id="regusersubmit"
                                                    class="btn btn-warning">Létrehozás</button>
                                            </div>
                                    </div>

                                    </form>

                                </div>
                            </div>


                        </div>
                    </div>
                </div>
                <!-- Felhasznaló Törlés Card VÉGE-->

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
      </div>
      </div>
    </section>
</div>
<!-- 4.Boxes Section VÉGE--> 

<!--5.Canvas Section KEZDETE-->
<div>

 <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel" style="width: 800px !important; background-color:#212529">">
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
<!-- 5. Canvas Section VÉGE-->


    <!--6.Footer Section KEZDETE -->
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

  </div>
  </section>
</div>
<!--6.Footer Section VÉGE -->
    <?php
    }

    ?>
</body>

</html>
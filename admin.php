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
    <!-- utolsó modosítás : Hitter Benjamin 1:09 2023/02/11 -->
    <!--*********************************************************************** -->
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
    <link href="https://api.mapbox.com/mapbox-gl-js/v2.1.1/mapbox-gl.css" rel="stylesheet" />
    <link rel="stylesheet" href="style.css" />
    <title>Bottyanchat Admin</title>
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
  if($_SESSION['privilege']!=10){
    
    ?>
    <script>
   alert('Nincs jogosultságod az oldal használatához.');
   </script>

    <?php
  }

if ($_SESSION['privilege']==10){


  ?>
    <!-- 1. Navbar Section KEZDETE-->
    <!-- utolsó modosítás : Hitter Benjámin 1:09 2023/02/11-->
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
  <text fill="#ffffff" font-size="25" font-family="Verdana" x="76" y="79">Bottyanchat Admin</text>
  Sajnos a bongésződ nem támogatja az SVG formátumot :(
 </svg>
   </a>
        
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navmenu">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navmenu">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#chat.php" class="nav-link">Chat</a>
                    </li>
                    <li class="nav-item">
                        <a href="#questions" class="nav-link">Admin Felület</a>
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
   <!--1.Navbar Section VÉGE-->

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
                    Üdv a Bottyanchat admin rangú oldalán!
                    </p>            
                </div>
                <img class="img-fluid w-50 d-none d-sm-block" src="img/admin_page.svg" alt="admin_image_error" />
            </div>
        </div>
    </section>
</div>
    <!--2.Showcase VÉGE-->

    <!-- 3.kék Section KEZDETE-->
    <!-- utolsó modosítás : Hitter Benjámin 20:50 2023/02/10 -->
 <div>
    <section class="bg-primary text-light p-5">
      <div class="container">
        <div class="d-md-flex justify-content-between align-items-center">    
        </div>
      </div>      
    </section>
</div>
    <!-- 3.kék Section VÉGE-->

    <!-- 4.Boxes Section-->
    <!-- utolsó modosítás : Hitter Benjamin 11:00 2023/02/11 -->
    <section class="p-5" id="ide">
        <div class="container">
            <div class="row text-center g-4">
            
                <!-- Vezér Regisztralas Card KEZDETE-->
            
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/add_user.svg" width="100" height="100" class="rounded mx-auto d-block" alt="add_user img error">
                            </div>
                            <h3 class="card-title mb-3">Vezér regisztrálása</h3>
                            <p class="card-text">
                                Regisztrálj új vezért a <span class="text-warning"> Bottyanchat </span> oldalra:
                            </p>
                            <!-- vezér regisztráció modal trigger -->
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#gl_reg">
                                Vezér Regisztrálása
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="gl_reg" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="text-light bg-dark modal-content">

                                        <form method="post" action="reguser.php">

                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="#gl_regLabel">Vezér
                                                    regisztrálása</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="caller" value="admin.php">
                                                <input type="hidden" name="reguserprivilege" value="5">

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
           
                <!--Vezér Regisztrálás Card VÉGE-->

                <!-- Vezér Törlés Card KEZDETE-->
            
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/remove_user.svg" width="100" height="100" class="rounded mx-auto d-block" alt="add_user img error">
                            </div>
                            <h3 class="card-title mb-3">Vezér Törlése</h3>
                            <p class="card-text">
                               Törölj vezér jogosultságú fiókot a <span class="text-warning"> Bottyanchat </span> oldalról:
                            </p>
                            <!-- vezér törlés modal trigger -->
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#gl_del">
                                Vezér Törlése
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="gl_del" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="gl_delLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="text-light bg-dark modal-content">

                                        <form method="post" action="deluser.php">

                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Vezér Törlése</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <input type="hidden" name="caller" value="admin.php">

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
            
                <!-- Vezér Törlés Card VÉGE-->

                <!-- Csoport Card KEZDETE-->
                <div class="col-md">
                    <div class="card bg-secondary text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/create_group.svg" width="100" height="100" class="rounded mx-auto d-block" alt="group img error">
                            </div>
                            <h3 class="card-title mb-3">Csoportok</h3>
                            <p class="card-text">
                                Hozz létre új csoportot vagya törölj egy már létrehozottat a <span class="text-warning"> Bottyanchat </span> oldalról:
                            </p>

                            <!-- csoport  modal trigger -->
                            <button type="button" class="btn btn-light" data-bs-toggle="modal"
                                data-bs-target="#groupreg">
                                Tovább
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="groupreg" data-bs-backdrop="static" data-bs-keyboard="false"
                                tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="text-light bg-dark modal-content">

                                        <form method="post" action="reggroup.php">

                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Csoport
                                                    létrehozása</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <input type="text" name="reggroup" id="reggroup"
                                                    placeholder="Csoportnév" class="form-control form-control-lg" />
                                                <label class="form-label" for="reggroup"></label>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Mégse</button>
                                                <button type="submit" name="reggroupsubmit" id="reggroupsubmit"
                                                    class="btn btn-primary">Létrehozás</button>
                                            </div>
                                    </div>

                                    </form>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- Csoport Card VÉGE-->

                <!-- Csoport Jogosultságok Card Kezdete--->
                <div class="col-md">
                    <div class="card bg-dark text-light">
                        <div class="card-body text-center">
                            <div class="h1 mb-3">
                            <img src="img/hierarchy.png" width="100" height="100" class="rounded mx-auto d-block" alt="hierarchy img error">
                            </div>
                            <h3 class="card-title mb-3">Jogosultságok</h3>
                            <p class="card-text">
                                Kezeld a <span class="text-warning"> Bottyanchat </span> felhasználóinak jogosultságait:
                            </p>

                            <!--PHP az adatok lekéréshez KEZDET -->
                            <?php

                              $kapcs = new kapcsolat;
                               $showdata = $kapcs->showdata();
                                    //adatokat leszedi az adatbázisból h ki tudjuk őket írni a jogok módosításánál
                                    while ($m = mysqli_fetch_array($showdata)) {
                                     $userid = $m['userid'];
                                      $username = $m['username'];
                                       $privilege = $m['privilege'];
                                     $groupid = $m['groupid'];
                                     $groupname = $m['groupname'];

                                       $privname;

                                    if ($privilege == 10) {
                                       $privname = "Admin";
                                      }

                                     if ($privilege == 5) {
                                       $privname = "Groupleader";
                                      }

                                      if ($privilege == 0) {
                                         $privname = "User";
                                        }

                                ?>
                            <!--PHP az adatok lekéréshez VÉGE -->

                            <!-- jogosultság modal trigger-->
                            <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                data-bs-target="#jogok">
                                Tovább
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="jogok" tabindex="-1" aria-labelledby="exampleModalLabel"
                                data-bs-backdrop="static" data-bs-keyboard="false" aria-hidden="true">
                                <div class="modal-dialog">


                                    <form method="post" action="#ide">
                                        <div class="text-light bg-dark modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="staticBackdropLabel">Felhasználó
                                                    kiválasztása</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">

                                                <div class="dropup">
                                                    <select name="userpriv" id="userpriv"
                                                        class="btn btn-secondary dropdown-toggle"
                                                        data-bs-toggle="dropdown" aria-expanded="false">


                                                        <?php

                                                //legördülő listába kilistázza a létező accountokat, usernamere hivatkozik

                                                foreach ($showdata as $value) {
                                                    ?>
                                                        <option value="<?php echo $value['username'];?>">
                                                            <?php echo $value['username'];?></option>
                                                        <?php

                                                }


    ?>

                                                    </select>
                                                </div>
                                            </div>

                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Mégse</button>
                                                <button type="submit" name="next" id="next"
                                                    class="btn btn-primary">Tovább</button>
                                            </div>
                                        </div>
                                    </form>




                                </div>
                            </div>


                            <?php
}
      ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>

        <!--PHP vezér reg.hez KEZDET-->
        <?php
    //user regisztrációt végzi
      if(isset($_POST['regusersubmit'])){
         $_SESSION['regusername'] = $_REQUEST['regusername'];
         $_SESSION['regpriv'] = $_REQUEST['regpriv'];
         $_SESSION['reguserpw'] = md5($_REQUEST['reguserpw']);
                    
                                  
                  $kapcs = new kapcsolat;
                  $kapcs->reguser();
                
                  ?>

        <script>
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        alert("Sikeresen létrehoztad a felhasználót!");
        </script>

        <?php
}
//csoport létrehozását végzi
if(isset($_POST['reggroupsubmit'])){
    $_SESSION['reggroupname'] = $_REQUEST['reggroup'];
                   
  $kapcs = new kapcsolat;
  $kapcs->reggroup();

  ?>

        <script>
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });

        alert("Sikeresen létrehoztad a csoportot!");
        </script>

        <?php
}


//ha megnyomjuk a tovább gombot az account kiválasztásánál a jogmódosító kártyában
if(isset($_POST['next'])){
?>
    <script>
    window.location.href = 'privilege.php';
    </script>

    <?php

//a kiválasztott felhasználót eltárolja
            $currentuser = $_REQUEST['userpriv'];
            $_SESSION['currentuser'] = $currentuser;

        }
    ?>



    <!-- 5.Tech Sections -->
    <!-- utolsó modosítás : Lieber Marcell 12:10 2023/02/02 -->
    <section id="tech" class="p-5">
        <div class="container">

            <?php
          //alsó tábla ahol kiírja az egész adatbázisunkat a csoportokról és accountokról
        $kapcs = new kapcsolat;

      $kiiras = $kapcs->showdata();
        ?>

            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">UserID</th>
                        <th scope="col">Felhasználónév</th>
                        <th scope="col">Csoport</th>
                        <th scope="col">Jogosultság</th>
                    </tr>
                </thead>
                <tbody>



                    <?php

      while ($m = mysqli_fetch_array($kiiras)) {
      
        $userid = $m['userid'];
        $username = $m['username'];
        $privilege = $m['privilege'];
        $groupid = $m['groupid'];
        $groupname = $m['groupname'];

          $privname;

          if ($privilege == 10){
              $privname = "Admin";
          }

          if ($privilege == 5){
              $privname = "Groupleader";
          }

          if ($privilege == 0){
              $privname = "User";
          }

          ?>

                    <tr>
                        <th scope="row"><?php echo $userid?></th>
                        <td><?php echo $username ?></td>
                        <td><?php echo $groupname ?></td>
                        <td><?php echo $privname ?></td>
                    </tr>

                    <?php
    }
        ?>
                </tbody>
            </table>
        </div>
    </section>

    <!-- Footer Section KEZDET-->
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
<!-- Footer Section VÉGE-->
    <?php
    }

    ?>
</body>

</html>